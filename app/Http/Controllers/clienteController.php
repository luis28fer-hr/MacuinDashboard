<?php

namespace App\Http\Controllers;

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
}
