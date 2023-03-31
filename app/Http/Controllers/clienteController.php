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

        return view('Cliente/Tickets');
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
                "estatus"=>'En Proceso',
                "problema"=>$request->input('problema'),
                "detalles"=>$request->input('detalles'),
                "created_at"=>Carbon::now(),
                "updated_at"=>Carbon::now()
            ]);
    
            return redirect('cliente/tickets')->with('ticket_agregado', 'cliente');        
        }
}
