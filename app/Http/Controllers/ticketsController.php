<?php

namespace App\Http\Controllers;

use App\Http\Requests\comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class ticketsController extends Controller
{
    public function index()
    {

        $consultaTickets = DB::table('tickets')->get();
        foreach($consultaTickets as $ticket){
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


        return view('Administrador/Tickets', compact('consultaTickets', 'consultaAuxiliares'));
    }

    public function actualizar($id_ticket, $aux_id)
    {
        //ID AUXLIAR = id del usuario que se eleigio (ID de usuario NO DE LA TABLA AUXILIARES)

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


    public function enviarMensajeAdminAux(comentario $request, $id_ticket)
    {
        if($request->input('comentario')==null){
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
        if($request->input('comentario')==null){
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
}
