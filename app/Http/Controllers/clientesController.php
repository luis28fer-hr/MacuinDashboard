<?php

namespace App\Http\Controllers;

use App\Http\Requests\auxiliares;
use App\Http\Requests\editAuxiliares;
use App\Http\Requests\searchAuxiliares;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\clientes;
use Illuminate\Support\Carbon;


class clientesController extends Controller
{
    public function index()
    {
        $consulClientes = DB::select('select u.*, c.* from users as u,
        clientes as c where c.usuario_id = u.id');

        foreach($consulClientes as $cliente){
            $cliente->departamento = DB::table('departamentos')->where('id_departamento',$cliente->departamento_id)->first();
        }

        $consulDepartaments= DB::table('departamentos')->get();

        return view('Administrador/Clientes', compact('consulClientes','consulDepartaments'));
    }
    public function editClientes(clientes $request, $id)
    {
        $img = $request->file('fotoPerfil')->store('public/img');
        $url = Storage::url($img);

        DB::table('users')->where('id', $id)->update([
            "name" => $request->input('name'),
            "apellido_p" => $request->input('apellido_p'),
            "apellido_m" => $request->input('apellido_m'),
            "num_telefono" => $request->input('numCel'),
            "email" => $request->input('email'),
            "url_foto" => $url,
            "updated_at" => Carbon::now()
        ]);

        return redirect('clientes')->with('Editar_cliente', 'auxiliares');
    }
}
