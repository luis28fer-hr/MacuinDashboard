<?php

namespace App\Http\Controllers;

use App\Http\Requests\newTicket;
use Illuminate\Http\Request;
use App\Http\Requests\perfilController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Exception;

class clienteController extends Controller
{
    public function index()
    {
        // Tickets del cliente logueado
        $consultaTickets = DB::select('select t.* from tickets as t, clientes as c where t.cliente_id = c.id_cliente and usuario_id = ? ORDER BY t.created_at DESC', [Auth::user()->id]);

        $consultaTickets = $this->asignarDatos($consultaTickets);

        return view('Cliente/Tickets', compact('consultaTickets'));
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

            return redirect('cliente/tickets')->with('perfil_actualizado', 'perfil');
        } catch (Exception $e) {


            return redirect('cliente/tickets')->with('error_email', 'error');
        }
    }

    public function newTicket(newTicket $request)
    {

        $idCliente= DB::select('select id_cliente from clientes
        where usuario_id = ?', [Auth::user()->id]);
        $cliAct = ($idCliente) ? $idCliente[0]->id_cliente : null;

        DB::table('tickets')->insert([
            "auxiliar_id"=>2001,
            "cliente_id"=>$cliAct,
            "estatus"=>'En espera de ser asignado',
            "problema"=>$request->input('problema'),
            "detalles"=>$request->input('detalles'),
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now()
        ]);

        return redirect('cliente/tickets')->with('ticket_agregado', 'cliente');
    }

    public function cancel($id_ticket)
    {
        //Obtenemos el estatus actual
        $estatus = DB::table('tickets')
                    ->select('estatus')
                    ->where('id_ticket', $id_ticket)
                    ->first()
                    ->estatus;

        // Si el estatus es Completado o No solucionado o ya esta Cancelado no permitimos que se cancele caso contrario si se puede cancelar.
        if ($estatus === "Completado" OR $estatus === "No solucionado" OR $estatus === "Cancelado"){

            return redirect('cliente/tickets')->with('noCancelado', 'cliente');
        }
        else {
            // Actualizamos el estatus a Cancelado
            DB::table('tickets')->where('id_ticket', $id_ticket)->update([
                "estatus" =>'Cancelado',
                "updated_at" => Carbon::now()
            ]);

            return redirect('cliente/tickets')->with('cancelado', 'cliente');
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

            //comentarios del ticket / admin a cliente
            $ticket->comentarioAdminCli = DB::select('select * from cometarioadministrador where ticket_id = ? and tipo = 2 ORDER BY created_at DESC', [$ticket->id_ticket]);
        }

        return $consultaTickets;
    }

}

