<?php

namespace App\Http\Controllers;

use App\Http\Requests\auxiliares;
use App\Http\Requests\editAuxiliares;
use App\Http\Requests\searchAuxiliares;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

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
}
