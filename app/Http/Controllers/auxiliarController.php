<?php

namespace App\Http\Controllers;

use App\Http\Requests\comentario;
use App\Http\Requests\perfilController;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Http\Requests\searchTickets;
use Barryvdh\DomPDF\Facade\Pdf;

class auxiliarController extends Controller
{
    public function index()
    {
        // Tickets del auxiliar logueado
        $consultaTickets = DB::select('select t.* from tickets as t, auxiliares as a where t.auxiliar_id = a.id_auxiliar and usuario_id = ? ORDER BY t.created_at DESC', [Auth::user()->id]);

        $consultaTickets = $this->asignarDatos($consultaTickets);

        // Consulta de Departamentos
        $consulDepartaments = DB::table('departamentos')->get();

        return view('Auxiliar/Tickets', compact('consultaTickets', 'consulDepartaments'));
    }

    public function updatePerfil(perfilController $request)
    {

        try {

            $img = $request->file('fotoPerfil')->store('public/img');
            $url = Storage::url($img);

            $idActivo = Auth::user()->id;


            DB::table('users')->where('id', $idActivo)->update([
                "name" => $request->input('name'),
                "apellido_p" => $request->input('apellido_p'),
                "apellido_m" => $request->input('apellido_m'),
                "num_telefono" => $request->input('numTel'),
                "url_foto" => $url,
                "email" => $request->input('correo'),
                "updated_at" => Carbon::now()
            ]);

            return redirect('auxiliar/tickets')->with('perfil_actualizado', 'perfil');
        } catch (Exception $e) {


            return redirect('auxiliar/tickets')->with('error_email', 'error');
        }
    }

    public function updateStatus(searchTickets $request, $id_ticket)
    {
        //Obtenemos el estaus
        $estatus = $request->input('updateStatus');

        // Actualizamos el estatus
        DB::table('tickets')->where('id_ticket', $id_ticket)->update([
            "estatus" => $estatus,
            "updated_at" => Carbon::now()
        ]);

        //Consulta de los departamentos
        $consulDepartaments = DB::table('departamentos')->get();

        // Tickets del ticket editado
        $consultaTickets = DB::select('select * from tickets as t, auxiliares as a where t.auxiliar_id = a.id_auxiliar and usuario_id = ?', [Auth::user()->id]);
        $consultaTickets = $this->asignarDatos($consultaTickets);

        return redirect('auxiliar/tickets')->with('Actualizado', 'Ticket');
    }

    public function nuevoMensaje(comentario $request, $id_ticket)
    {

        if ($request->input('comentario') == null) {

            return redirect('auxiliar/tickets')->with('MensajeNoEnviado', 'Ticket');
        } else {
            DB::table('comentarioauxiliar')->insert([
                "ticket_id" => $id_ticket,
                "comentario" =>  $request->input('comentario'),
                "created_at" => Carbon::now(),
            ]);

            return redirect('auxiliar/tickets')->with('MensajeEnviado', 'Ticket');
        }
    }

    public function searchTickets(searchTickets $request)
    {    //Consulta de los departamentos
        $consulDepartaments = DB::table('departamentos')->get();

        //Obetener los datos de los filtros
        $estatus = $request->input('searchByEstatus');
        $departamento = $request->input('searchByDepartamento');
        $fecha = $request->input('searchByFecha');


        if (empty($estatus) and empty($departamento) and empty($fecha)) { //Sin ningun filtro seleccionado

            return redirect('auxiliar/tickets')->with('selectFiltro', 'Ticket');
        } elseif (empty($estatus) and empty($departamento)) { //Busqueda por Fecha


            $consultaTickets = DB::select('select t.* from tickets as t, auxiliares as a where (t.auxiliar_id = a.id_auxiliar
            and a.usuario_id = ?) and date(t.created_at) = ?', [Auth::user()->id, $fecha]);

            if ($consultaTickets != null) {
                $consultaTickets =  $this->asignarDatos($consultaTickets);
                return view('Auxiliar/Tickets', compact('consultaTickets', 'consulDepartaments'));
            } else {
                return redirect('auxiliar/tickets')->with('noExiste', 'Ticket');
            }
        } elseif (empty($estatus) and empty($fecha)) { //Busqueda por Departamento

            $consultaTickets = DB::select('select t.* from tickets as t, auxiliares as a
              where (t.auxiliar_id = a.id_auxiliar and a.usuario_id = ?) and t.cliente_id in(select c.id_cliente from clientes as c where c.departamento_id = ?)', [Auth::user()->id, $departamento]);

            if ($consultaTickets != null) {
                $consultaTickets =  $this->asignarDatos($consultaTickets);
                return view('Auxiliar/Tickets', compact('consultaTickets', 'consulDepartaments'));
            } else {
                return redirect('auxiliar/tickets')->with('noExiste', 'Ticket');
            }
        } elseif (empty($fecha) and empty($departamento)) { //Busqueda por Estatus



            $consultaTickets = DB::select('select t.* from tickets as t, auxiliares as a where (t.auxiliar_id = a.id_auxiliar
            and a.usuario_id = ?) and t.estatus = ?', [Auth::user()->id, $estatus]);



            if ($consultaTickets != null) {
                $consultaTickets =  $this->asignarDatos($consultaTickets);
                return view('Auxiliar/Tickets', compact('consultaTickets',  'consulDepartaments'));
            } else {
                return redirect('auxiliar/tickets')->with('noExiste', 'Ticket');
            }
        } elseif (empty($fecha)) { //Busqueda por Estatus y Departamento

            $consultaTickets = DB::select('select t.* from tickets as t, auxiliares as a
              where (t.auxiliar_id = a.id_auxiliar and a.usuario_id = ?)and t.cliente_id in(select c.id_cliente from clientes as c
              where c.departamento_id = ?) and t.estatus=?', [Auth::user()->id, $departamento, $estatus]);

            if ($consultaTickets != null) {
                $consultaTickets =  $this->asignarDatos($consultaTickets);
                return view('Auxiliar/Tickets', compact('consultaTickets', 'consulDepartaments'));
            } else {
                return redirect('auxiliar/tickets')->with('noExiste', 'Ticket');
            }
        } elseif (empty($departamento)) { //Busqueda por Estatus y Fecha

            $consultaTickets = DB::select('select t.* from tickets as t, auxiliares as a where (t.auxiliar_id = a.id_auxiliar
            and a.usuario_id = ?) and date(t.created_at) = ? and t.estatus=?', [Auth::user()->id, $fecha, $estatus]);


            if ($consultaTickets != null) {
                $consultaTickets =  $this->asignarDatos($consultaTickets);
                return view('Auxiliar/Tickets', compact('consultaTickets', 'consulDepartaments'));
            } else {
                return redirect('auxiliar/tickets')->with('noExiste', 'Ticket');
            }
        } elseif (empty($estatus)) { //Busqueda por Departamento y Fecha

            $consultaTickets = DB::select('select t.* from tickets as t, auxiliares as a
            where (t.auxiliar_id = a.id_auxiliar and a.usuario_id = ?) and t.cliente_id in(select c.id_cliente from clientes as c
            where c.departamento_id = ?) and date(t.created_at) = ?', [Auth::user()->id, $departamento, $fecha]);


            if ($consultaTickets != null) {
                $consultaTickets =  $this->asignarDatos($consultaTickets);
                return view('Auxiliar/Tickets', compact('consultaTickets', 'consulDepartaments'));
            } else {
                return redirect('auxiliar/tickets')->with('noExiste', 'Ticket');
            }
        } else { //Busqueda por Estatus, Departamento y Fecha

            $consultaTickets = DB::select('select t.* from tickets as t, auxiliares as a
            where (t.auxiliar_id = a.id_auxiliar and a.usuario_id = ?) and t.cliente_id in(select c.id_cliente from clientes as c
            where c.departamento_id = ?) and date(t.created_at) = ? and t.estatus =?', [Auth::user()->id, $departamento, $fecha, $estatus]);

            if ($consultaTickets != null) {

                $consultaTickets =  $this->asignarDatosFiltro($consultaTickets);
                return view('Auxiliar/Tickets', compact('consultaTickets', 'consulDepartaments'));
            } else {
                return redirect('auxiliar/tickets')->with('noExiste', 'Ticket');
            }
        }
    }

    private function asignarDatos($consultaTickets)
    {

        foreach ($consultaTickets as $ticket) {
            //auxiliar
            $ticket->auxiliar = DB::table('auxiliares')->select(['usuario_id'])->where('id_auxiliar', $ticket->auxiliar_id)->first();
            $ticket->auxiliar->datos = DB::table('users')->select(['name', 'apellido_p', 'apellido_m'])->where('id', $ticket->auxiliar->usuario_id)->first();

            //cliente
            $ticket->cliente = DB::table('clientes')->select(['usuario_id', 'departamento_id'])->where('id_cliente', $ticket->cliente_id)->first();
            $ticket->cliente->datos = DB::table('users')->select(['name', 'apellido_p', 'apellido_m'])->where('id',  $ticket->cliente->usuario_id)->first();
            $ticket->cliente->departamento = DB::table('departamentos')->select(['nombre'])->where('id_departamento',  $ticket->cliente->departamento_id)->first();

            //comentarios del ticket / aux a cliente
            $ticket->comentarioAuxCli = DB::select('select * from comentarioauxiliar where ticket_id = ? ORDER BY created_at DESC', [$ticket->id_ticket]);

            //comentarios del ticket / admin a aux
            $ticket->comentarioAdminAux = DB::select('select * from cometarioadministrador where ticket_id = ? and tipo = 1 ORDER BY created_at DESC', [$ticket->id_ticket]);
        }

        return $consultaTickets;
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
        $consultaTicket->comentarioAuxCli = DB::select('select * from comentarioauxiliar where ticket_id = ? ORDER BY created_at DESC', [$consultaTicket->id_ticket]);

        $pdf = PDF::loadView('Auxiliar/Reportes/Ticket', compact('consultaTicket'));
        return $pdf->stream();
    }

    public function generatePDFfiltro(searchTickets $request)
    {

        $estatus = $request->input('auxiliar');
        $departamento = $request->input('searchByDepartamento');
        $fecha = $request->input('searchByFecha');




        if ($estatus != 0 and $departamento == 0 and $fecha == null) { //Verifica que estatus tenga valor diferente a todos

            $consultaTickets = DB::select('select * from tickets as t, auxiliares as a where (t.auxiliar_id = a.id_auxiliar
            and a.usuario_id = ?) and t.estatus = ?', [Auth::user()->id, $estatus]);

            $consultaTickets =  $this->asignarDatos($consultaTickets);

            if ($consultaTickets != null) {
                $pdf = PDF::loadView('Auxiliar/Reportes/Estatus', compact('consultaTickets'));
                return $pdf->stream();
            } else {
                return redirect('auxiliar/tickets')->with('sinRegistros', 'Ticket');
            }
        }

        if ($estatus != 0 and $departamento != 0 and $fecha == null) { //Verifica que estatus y departamento tengan un valor diferente a todos

            $consultaTickets = DB::select('select t.* from tickets as t, auxiliares as a where (t.auxiliar_id = a.id_auxiliar
            and a.usuario_id = ?) and date(t.created_at) = ? and t.estatus=?', [Auth::user()->id, $fecha, $estatus]);

            $consultaTickets =  $this->asignarDatos($consultaTickets);

            if ($consultaTickets != null) {
                $pdf = PDF::loadView('Auxiliar/Reportes/EstatusDepartamento', compact('consultaTickets'));
                return $pdf->stream();
            } else {
                return redirect('auxiliar/tickets')->with('sinRegistros', 'Ticket');
            }
        }


        if ($estatus != 0 and $departamento != 0 and $fecha != null) { //Verifica que estatus, departamento y fecha tenga valor difernte a todos y null

            $consultaTickets = DB::select('select t.* from tickets as t, auxiliares as a
            where (t.auxiliar_id = a.id_auxiliar and a.usuario_id = ?) and t.cliente_id in(select c.id_cliente from clientes as c
            where c.departamento_id = ?) and date(t.created_at) = ? and t.estatus =?', [Auth::user()->id, $departamento, $fecha, $estatus]);

            $consultaTickets =  $this->asignarDatos($consultaTickets);

            if ($consultaTickets != null) {
                $pdf = PDF::loadView('Auxiliar/Reportes/General', compact('consultaTickets'));
                return $pdf->stream();
            } else {
                return redirect('auxiliar/tickets')->with('sinRegistros', 'Ticket');
            }
        }

        if ($estatus == 0 and $departamento != 0 and $fecha == null) { //Verifica que departamento sea el unico en pdf

            $consultaTickets = DB::select('select t.* from tickets as t, auxiliares as a
            where (t.auxiliar_id = a.id_auxiliar and a.usuario_id = ?) and t.cliente_id in(select c.id_cliente from clientes as c where c.departamento_id = ?)', [Auth::user()->id, $departamento]);

            $consultaTickets =  $this->asignarDatos($consultaTickets);

            if ($consultaTickets != null) {
                $pdf = PDF::loadView('Auxiliar/Reportes/Departamento', compact('consultaTickets'));
                return $pdf->stream();
            } else {
                return redirect('auxiliar/tickets')->with('sinRegistros', 'Ticket');
            }
        }

        if ($estatus == 0 and $departamento != 0 and $fecha != null) { //Verifica que departamento y fecha

            $consultaTickets = DB::select('SELECT t.* from tickets as t, auxiliares as a
            where (t.auxiliar_id = a.id_auxiliar and a.usuario_id = ?) and t.cliente_id in(select c.id_cliente from clientes as c
            where c.departamento_id = ?) and date(t.created_at) = ?', [Auth::user()->id, $departamento, $fecha]);

            $consultaTickets =  $this->asignarDatos($consultaTickets);

            if ($consultaTickets != null) {
                $pdf = PDF::loadView('Auxiliar/Reportes/DepartamentoFecha', compact('consultaTickets'));
                return $pdf->stream();
            } else {
                return redirect('auxiliar/tickets')->with('sinRegistros', 'Ticket');
            }
        }

        if ($estatus == 0 and $departamento == 0 and $fecha != null) { //Verifica fecha

            $consultaTickets = DB::select('select t.* from tickets as t, auxiliares as a where (t.auxiliar_id = a.id_auxiliar
            and a.usuario_id = ?) and date(t.created_at) = ?', [Auth::user()->id, $fecha]);

            $consultaTickets =  $this->asignarDatos($consultaTickets);

            if ($consultaTickets != null) {
                $pdf = PDF::loadView('Auxiliar/Reportes/Fecha', compact('consultaTickets'));
                return $pdf->stream();
            } else {
                return redirect('auxiliar/tickets')->with('sinRegistros', 'Ticket');
            }
        }

        if ($estatus != 0 and $departamento == 0 and $fecha != null) { //Verifica fecha y estatus

            $consultaTickets = DB::select('select t.* from tickets as t, auxiliares as a where (t.auxiliar_id = a.id_auxiliar
            and a.usuario_id = ?) and date(t.created_at) = ? and t.estatus=?', [Auth::user()->id, $fecha, $estatus]);

            $consultaTickets =  $this->asignarDatos($consultaTickets);

            if ($consultaTickets != null) {
                $pdf = PDF::loadView('Auxiliar/Reportes/FechaEstatus', compact('consultaTickets'));
                return $pdf->stream();
            } else {
                return redirect('auxiliar/tickets')->with('sinRegistros', 'Ticket');
            }
        }



        if ($estatus == 0 and $departamento == 0 and $fecha == null) { //Verifica  sean todos, departamento todos  y la fecha sea cualquiera

            $consultaTickets = DB::select('select t.* from tickets as t, auxiliares as a where t.auxiliar_id = a.id_auxiliar and usuario_id = ?', [Auth::user()->id]);
            $consultaTickets =  $this->asignarDatos($consultaTickets);

            if ($consultaTickets != null) {
                $pdf = PDF::loadView('Auxiliar/Reportes/General', compact('consultaTickets'));
                return $pdf->stream();
            } else {
                return redirect('auxiliar/tickets')->with('sinRegistros', 'Ticket');
            }
        }
    }
}
