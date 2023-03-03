<?php

namespace App\Http\Controllers;

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
}
