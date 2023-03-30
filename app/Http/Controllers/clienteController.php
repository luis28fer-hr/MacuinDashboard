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
            return redirect('cliente/tickets')->with('ticket_agregado', 'cliente');

    private function asignarDatos($consultaTickets)
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

}
