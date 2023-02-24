<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\departamentos;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class departamentosController extends Controller
{

    public function index()
    {

        return view('Administrador/Departamentos');
    }

    public function newDepartamento(departamentos $request ){

        $img =$request->file('fotoPerfil')->store('public/img');
        $url = Storage::url($img);

            DB::table('departamentos')->insert([
                "nombre"=>$request->input('name'),
                "descripcion"=>$request->input('descripcion'),
                "url_foto"=> $url,
                "created_at"=>Carbon::now(),
                "updated_at"=>Carbon::now()
            ]);

        return redirect('departamentos')->with('Nuevo_departamento','departamentos');
    }
    public function editDepartamento(departamentos $request ){
        return redirect('departamentos')->with('Editar_departamento','departamentos');
    }
}
