<?php

namespace App\Http\Controllers;

use App\Http\Requests\perfilController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class administradorController extends Controller
{
    public function updatePerfil(perfilController $request)
    {
        $img =$request->file('fotoPerfil')->store('public/img');
        $url = Storage::url($img);

        $id = 1;

        DB::table('users')->where('id', $id)->update([
            "name"=>$request->input('name'),
            "apellido_p"=>$request->input('apellido_p'),
            "apellido_m"=>$request->input('apellido_m'),
            "num_telefono"=>$request->input('numTel'),
            "url_foto"=> $url,
            "updated_at"=>Carbon::now()
        ]);


        return redirect('dashboard')->with('perfil_actualizado','perfil');
    }

}
