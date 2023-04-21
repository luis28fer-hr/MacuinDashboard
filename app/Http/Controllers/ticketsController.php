<?php

namespace App\Http\Controllers;

use App\Http\Requests\comentario;
use App\Http\Requests\departamentos;
use Illuminate\Http\Request;
use App\Http\Requests\searchTickets;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class ticketsController extends Controller
{
    public function index()
    {

        $consultaTickets = DB::select('SELECT * FROM tickets ORDER BY created_at DESC');

        foreach ($consultaTickets as $ticket) {
            //auxiliar
            $ticket->auxiliar = DB::table('auxiliares')->select(['usuario_id'])->where('id_auxiliar', $ticket->auxiliar_id)->first();
            $ticket->auxiliar->datos = DB::table('users')->select(['name', 'apellido_p', 'apellido_m'])->where('id', $ticket->auxiliar->usuario_id)->first();

            //cliente
            $ticket->cliente = DB::table('clientes')->select(['usuario_id', 'departamento_id'])->where('id_cliente', $ticket->cliente_id)->first();
            $ticket->cliente->datos = DB::table('users')->select(['name', 'apellido_p', 'apellido_m'])->where('id',  $ticket->cliente->usuario_id)->first();
            $ticket->cliente->departamento = DB::table('departamentos')->select(['nombre'])->where('id_departamento',  $ticket->cliente->departamento_id)->first();

            //comentarios del ticket / admin a aux
            $ticket->comentarioAdminAux = DB::select('select * from cometarioadministrador where ticket_id = ? and tipo = 1 ORDER BY created_at DESC', [$ticket->id_ticket]);
            $ticket->comentarioAdminCli = DB::select('select * from cometarioadministrador where ticket_id = ? and tipo = 2 ORDER BY created_at DESC', [$ticket->id_ticket]);
        }

        $consultaAuxiliares = DB::select('select u.* from users as u,
        auxiliares as a where a.usuario_id = u.id and not u.id = 999999');

        foreach ($consultaAuxiliares as $auxiliar) {
            $auxiliar->cantidadTickets = DB::select("SELECT COUNT(t.id_ticket) as 'can' from tickets as t, auxiliares as a WHERE (t.auxiliar_id = a.id_auxiliar and a.usuario_id = ?) AND (t.estatus = 'En proceso' OR t.estatus = 'Asignado')", [$auxiliar->id]);
        }

        //departamentos
        $consulDepartaments = DB::table('departamentos')->get();

        return view('Administrador/Tickets', compact('consultaTickets', 'consultaAuxiliares', 'consulDepartaments'));
    }

    public function actualizar($id_ticket, $aux_id)
    {
        //ID AUXLIAR = id del usuario que se eleigio (ID de usuario NO DE LA TABLA AUXILIARES)

        $ticket = DB::table('tickets')->where('id_ticket', $id_ticket)->first();
        if ($ticket->estatus != "Cancelado") {
            //consultar el ID de la tabla auxiliares para despues insertarlo en el ticket
            $consultaAuxiliar = DB::table('auxiliares')->select('id_auxiliar')->where('usuario_id', $aux_id)->get();
            $id_Aux = ($consultaAuxiliar) ? $consultaAuxiliar[0]->id_auxiliar : null;

            DB::table('tickets')->where('id_ticket', $id_ticket)->update([
                "auxiliar_id" => $id_Aux,
                "estatus" => 'Asignado',
                "updated_at" => Carbon::now()
            ]);

            return redirect('tickets')->with('Actualizado', 'Ticket');
        }
        else{
            return redirect('tickets')->with('TicketCancelado', 'Ticket');
        }
    }

    public function enviarMensajeAdminAux(comentario $request, $id_ticket)
    {
        if ($request->input('comentario') == null) {
            return redirect('tickets')->with('MensajeNoEnviado', 'Ticket');
        }
        DB::table('cometarioadministrador')->insert([
            "ticket_id" => $id_ticket,
            "tipo" => 1,
            "comentario" =>  $request->input('comentario'),
            "created_at" => Carbon::now(),
        ]);

        return redirect('tickets')->with('MensajeEnviado', 'Ticket');
    }

    public function enviarMensajeAdminCli(comentario $request, $id_ticket)
    {
        if ($request->input('comentario') == null) {
            return redirect('tickets')->with('MensajeNoEnviado', 'Ticket');
        }
        DB::table('cometarioadministrador')->insert([
            "ticket_id" => $id_ticket,
            "tipo" => 2,
            "comentario" =>  $request->input('comentario'),
            "created_at" => Carbon::now(),
        ]);

        return redirect('tickets')->with('MensajeEnviado', 'Ticket');
    }

    public function searchTickets(searchTickets $request)
    {
        //Consulta de los auxiliares
        $consultaAuxiliares = DB::select('select u.* from users as u,
        auxiliares as a where a.usuario_id = u.id and not u.id = 999999');

        foreach ($consultaAuxiliares as $auxiliar) {
            $auxiliar->cantidadTickets = DB::select("SELECT COUNT(t.id_ticket) as 'can' from tickets as t, auxiliares as a WHERE (t.auxiliar_id = a.id_auxiliar and a.usuario_id = ?) AND (t.estatus = 'En proceso' OR t.estatus = 'Asignado')", [$auxiliar->id]);
        }

        //Consulta de los departamentos
        $consulDepartaments = DB::table('departamentos')->get();

        //Obetener los datos de los filtros
        $estatus = $request->input('searchByEstatus');
        $departamento = $request->input('searchByDepartamento');
        $fecha = $request->input('searchByFecha');


        if (empty($estatus) and empty($departamento) and empty($fecha)) { //Sin ningun filtro seleccionado


            return redirect('tickets')->with('selectFiltro', 'Ticket');
        } elseif (empty($estatus) and empty($departamento)) { //Busqueda por Fecha

            $consultaTickets = DB::select('select * from tickets where date(created_at) = ? ORDER BY created_at DESC', [$fecha]);

            if ($consultaTickets != null) {

                $consultaTickets =  $this->asignarDatosFiltro($consultaTickets);
                return view('Administrador/Tickets', compact('consultaTickets', 'consultaAuxiliares', 'consulDepartaments'));
            } else {

                return redirect('tickets')->with('noExiste', 'Ticket');
            }
        } elseif (empty($estatus) and empty($fecha)) { //Busqueda por Departamento

            $consultaTickets = DB::select('select * from tickets where cliente_id in (select id_cliente from clientes where departamento_id = ? ORDER BY created_at DESC)', [$departamento]);

            if ($consultaTickets != null) {

                $consultaTickets =  $this->asignarDatosFiltro($consultaTickets);
                return view('Administrador/Tickets', compact('consultaTickets', 'consultaAuxiliares', 'consulDepartaments'));
            } else {

                return redirect('tickets')->with('noExiste', 'Ticket');
            }
        } elseif (empty($fecha) and empty($departamento)) { //Busqueda por Estatus

            $consultaTickets = DB::select('select * from tickets where estatus = ? ORDER BY created_at DESC', [$estatus]);

            if ($consultaTickets != null) {

                $consultaTickets =  $this->asignarDatosFiltro($consultaTickets);
                return view('Administrador/Tickets', compact('consultaTickets', 'consultaAuxiliares', 'consulDepartaments'));
            } else {
                return redirect('tickets')->with('noExiste', 'Ticket');
            }
        } elseif (empty($fecha)) { //Busqueda por Estatus y Departamento

            $consultaTickets = DB::select('select * from tickets where cliente_id in(select id_cliente from clientes where departamento_id =?) and estatus = ? ORDER BY created_at DESC', [$departamento, $estatus]);

            if ($consultaTickets != null) {

                $consultaTickets =  $this->asignarDatosFiltro($consultaTickets);
                return view('Administrador/Tickets', compact('consultaTickets', 'consultaAuxiliares', 'consulDepartaments'));
            } else {
                return redirect('tickets')->with('noExiste', 'Ticket');
            }
        } elseif (empty($departamento)) { //Bysqueda por Estatus y Fecha

            $consultaTickets = DB::select('select * from tickets where estatus = ? and date(created_at) = ? ORDER BY created_at DESC', [$estatus, $fecha]);

            if ($consultaTickets != null) {

                $consultaTickets =  $this->asignarDatosFiltro($consultaTickets);
                return view('Administrador/Tickets', compact('consultaTickets', 'consultaAuxiliares', 'consulDepartaments'));
            } else {

                return redirect('tickets')->with('noExiste', 'Ticket');
            }
        } elseif (empty($estatus)) { //Busqueda por Departamento y Fecha

            $consultaTickets = DB::select('select * from tickets where cliente_id in(select id_cliente from clientes where departamento_id = ?) and date(created_at) = ? ORDER BY created_at DESC', [$departamento, $fecha]);

            if ($consultaTickets != null) {

                $consultaTickets =  $this->asignarDatosFiltro($consultaTickets);
                return view('Administrador/Tickets', compact('consultaTickets', 'consultaAuxiliares', 'consulDepartaments'));
            } else {

                return redirect('tickets')->with('noExiste', 'Ticket');
            }
        } else { //Busqueda por Estatus, Departamento y Fecha

            $consultaTickets = DB::select('select * from tickets where cliente_id in(select id_cliente from clientes where departamento_id = ?) and estatus = ? and date(created_at) = ? ORDER BY created_at DESC', [$departamento, $estatus, $fecha]);

            if ($consultaTickets != null) {

                $consultaTickets =  $this->asignarDatosFiltro($consultaTickets);
                return view('Administrador/Tickets', compact('consultaTickets', 'consultaAuxiliares', 'consulDepartaments'));
            } else {

                return redirect('tickets')->with('noExiste', 'Ticket');
            }
        }
    }

    public function generatePDF($id)
    {
        $consultaTicket = DB::table('tickets')->where('id_ticket', $id)->first();
        $consultaTicket->auxiliar = DB::table('auxiliares')->select(['usuario_id'])->where('id_auxiliar', $consultaTicket->auxiliar_id)->first();
        $consultaTicket->auxiliar->datos = DB::table('users')->select(['name', 'apellido_p', 'apellido_m'])->where('id', $consultaTicket->auxiliar->usuario_id)->first();
        $consultaTicket->cliente = DB::table('clientes')->select(['usuario_id', 'departamento_id'])->where('id_cliente', $consultaTicket->cliente_id)->first();
        $consultaTicket->cliente->datos = DB::table('users')->select(['name', 'apellido_p', 'apellido_m'])->where('id',  $consultaTicket->cliente->usuario_id)->first();
        $consultaTicket->cliente->departamento = DB::table('departamentos')->select(['nombre'])->where('id_departamento',  $consultaTicket->cliente->departamento_id)->first();
        $consultaTicket->comentarioAdminAux = DB::select('select * from cometarioadministrador where ticket_id = ? and tipo = 1 ORDER BY created_at DESC', [$consultaTicket->id_ticket]);
        $consultaTicket->comentarioAdminCli = DB::select('select * from cometarioadministrador where ticket_id = ? and tipo = 2 ORDER BY created_at DESC', [$consultaTicket->id_ticket]);

        $pdf = PDF::loadView('Administrador/Reportes/Tickets', compact('consultaTicket'));
        return $pdf->stream();
    }

    public function generatePDFfiltro(searchTickets $request)
    {

        $aux = $request->input('auxiliar');
        $departamento = $request->input('searchByDepartamento');
        $fecha = $request->input('searchByFecha');



        if ($aux != 0 and $departamento == 0 and $fecha == null) { //Verifica que aux tenga valor diferente a todos

            $consultaTickets = DB::select('SELECT t.* FROM tickets as t, auxiliares as a  WHERE t.auxiliar_id =  a.id_auxiliar and a.usuario_id = ?', [$aux]);

            $consultaTickets =  $this->asignarDatosPDF($consultaTickets);

            if ($consultaTickets != null) {
                $pdf = PDF::loadView('Administrador/Reportes/Auxiliar', compact('consultaTickets'));
                return $pdf->stream();
            } else {
                return redirect('tickets')->with('sinRegistros', 'Ticket');
            }
        }

        if ($aux != 0 and $departamento != 0 and $fecha == null) { //Verifica que aux y departamento tengan un valor diferente a todos

            $consultaTickets = DB::select('SELECT t.* FROM tickets as t, auxiliares as a, clientes as c WHERE (t.auxiliar_id =  a.id_auxiliar and a.usuario_id = ?) and (t.cliente_id = c.id_cliente and c.departamento_id = ?)', [$aux, $departamento]);

            $consultaTickets =  $this->asignarDatosPDF($consultaTickets);

            if ($consultaTickets != null) {
                $pdf = PDF::loadView('Administrador/Reportes/AuxiliarDepartamento', compact('consultaTickets'));
                return $pdf->stream();
            } else {
                return redirect('tickets')->with('sinRegistros', 'Ticket');
            }
        }


        if ($aux != 0 and $departamento != 0 and $fecha != null) { //Verifica que aux, departamento y fecha tenga valor difernte a todos y null

            $consultaTickets = DB::select('SELECT t.* FROM tickets as t, auxiliares as a, clientes as c WHERE (t.auxiliar_id =  a.id_auxiliar and a.usuario_id = ?) and (t.cliente_id = c.id_cliente and c.departamento_id = ?) and (date(t.created_at) = ?)', [$aux, $departamento, $fecha]);

            $consultaTickets =  $this->asignarDatosPDF($consultaTickets);

            if ($consultaTickets != null) {
                $pdf = PDF::loadView('Administrador/Reportes/Especifica', compact('consultaTickets'));
                return $pdf->stream();
            } else {
                return redirect('tickets')->with('sinRegistros', 'Ticket');
            }
        }

        if ($aux == 0 and $departamento != 0 and $fecha == null) { //Verifica que departamento sea el unico en pdf

            $consultaTickets = DB::select('SELECT t.* FROM tickets as t, clientes as c WHERE (t.cliente_id = c.id_cliente and c.departamento_id = ?)', [$departamento]);

            $consultaTickets =  $this->asignarDatosPDF($consultaTickets);

            if ($consultaTickets != null) {
                $pdf = PDF::loadView('Administrador/Reportes/AuxiliarDepartamento', compact('consultaTickets'));
                return $pdf->stream();
            } else {
                return redirect('tickets')->with('sinRegistros', 'Ticket');
            }
        }

        if ($aux == 0 and $departamento != 0 and $fecha != null) { //Verifica que departamento y fecha

            $consultaTickets = DB::select('SELECT t.* FROM tickets as t, clientes as c WHERE (t.cliente_id = c.id_cliente and c.departamento_id = ?) and (date(t.created_at) = ?)', [$departamento, $fecha]);
            $consultaTickets =  $this->asignarDatosPDF($consultaTickets);

            if ($consultaTickets != null) {
                $pdf = PDF::loadView('Administrador/Reportes/DepartamentoFecha', compact('consultaTickets'));
                return $pdf->stream();
            } else {
                return redirect('tickets')->with('sinRegistros', 'Ticket');
            }
        }

        if ($aux == 0 and $departamento == 0 and $fecha != null) { //Verifica fecha

            $consultaTickets = DB::select('SELECT * FROM tickets WHERE date(created_at) = ?', [$fecha]);

            $consultaTickets =  $this->asignarDatosPDF($consultaTickets);

            if ($consultaTickets != null) {
                $pdf = PDF::loadView('Administrador/Reportes/Fecha', compact('consultaTickets'));
                return $pdf->stream();
            } else {
                return redirect('tickets')->with('sinRegistros', 'Ticket');
            }
        }

        if ($aux != 0 and $departamento == 0 and $fecha != null) { //Verifica fecha y auxiliar

            $consultaTickets = DB::select('SELECT t.* FROM tickets as t, auxiliares as a  WHERE (t.auxiliar_id =  a.id_auxiliar and a.usuario_id = ?) and (date(t.created_at) = ?)', [$aux, $fecha]);
            $consultaTickets =  $this->asignarDatosPDF($consultaTickets);

            if ($consultaTickets != null) {
                $pdf = PDF::loadView('Administrador/Reportes/FechaAuxiliar', compact('consultaTickets'));
                return $pdf->stream();
            } else {
                return redirect('tickets')->with('sinRegistros', 'Ticket');
            }
        }



        if ($aux == 0 and $departamento == 0 and $fecha == null) { //Verifica que aux sean todos, departamento todos  y la fecha sea cualquiera

            $consultaTickets = DB::table('tickets')->get();
            $consultaTickets =  $this->asignarDatosPDF($consultaTickets);

            if ($consultaTickets != null) {
                $pdf = PDF::loadView('Administrador/Reportes/General', compact('consultaTickets'));
                return $pdf->stream();
            } else {
                return redirect('tickets')->with('sinRegistros', 'Ticket');
            }
        }
    }

    private function asignarDatosPDF($consultaTickets)
    {

        foreach ($consultaTickets as $ticket) {
            $ticket->auxiliar = DB::table('auxiliares')->select(['usuario_id'])->where('id_auxiliar', $ticket->auxiliar_id)->first();
            $ticket->auxiliar->datos = DB::table('users')->select(['name', 'apellido_p', 'apellido_m'])->where('id', $ticket->auxiliar->usuario_id)->first();
            $ticket->cliente = DB::table('clientes')->select(['usuario_id', 'departamento_id'])->where('id_cliente', $ticket->cliente_id)->first();
            $ticket->cliente->datos = DB::table('users')->select(['name', 'apellido_p', 'apellido_m'])->where('id',  $ticket->cliente->usuario_id)->first();
            $ticket->cliente->departamento = DB::table('departamentos')->select(['nombre'])->where('id_departamento',  $ticket->cliente->departamento_id)->first();
            $ticket->comentarioAdminAux = DB::select('select * from cometarioadministrador where ticket_id = ? and tipo = 1 ORDER BY created_at DESC', [$ticket->id_ticket]);
            $ticket->comentarioAdminCli = DB::select('select * from cometarioadministrador where ticket_id = ? and tipo = 2 ORDER BY created_at DESC', [$ticket->id_ticket]);
        }

        return $consultaTickets;
    }

    private function asignarDatosFiltro($consultaTickets)
    {

        foreach ($consultaTickets as $ticket) {
            //auxiliar
            $ticket->auxiliar = DB::table('auxiliares')->select(['usuario_id'])->where('id_auxiliar', $ticket->auxiliar_id)->first();
            $ticket->auxiliar->datos = DB::table('users')->select(['name', 'apellido_p', 'apellido_m'])->where('id', $ticket->auxiliar->usuario_id)->first();

            //cliente
            $ticket->cliente = DB::table('clientes')->select(['usuario_id', 'departamento_id'])->where('id_cliente', $ticket->cliente_id)->first();
            $ticket->cliente->datos = DB::table('users')->select(['name', 'apellido_p', 'apellido_m'])->where('id',  $ticket->cliente->usuario_id)->first();
            $ticket->cliente->departamento = DB::table('departamentos')->select(['nombre'])->where('id_departamento',  $ticket->cliente->departamento_id)->first();

            //comentarios del ticket / admin a aux
            $ticket->comentarioAdminAux = DB::select('select * from cometarioadministrador where ticket_id = ? and tipo = 1 ORDER BY created_at DESC', [$ticket->id_ticket]);
            $ticket->comentarioAdminCli = DB::select('select * from cometarioadministrador where ticket_id = ? and tipo = 2 ORDER BY created_at DESC', [$ticket->id_ticket]);
        }

        return $consultaTickets;
    }
}
