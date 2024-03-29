<?php

namespace App\Http\Controllers;

use App\Http\Requests\perfilController;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class administradorController extends Controller
{
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

            return redirect('dashboard')->with('perfil_actualizado', 'perfil');

        } catch (Exception $e) {


            return redirect('dashboard')->with('error_email', 'error');
        }
    }
}
