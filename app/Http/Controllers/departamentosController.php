<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\departamentos;

class departamentosController extends Controller
{

    public function index()
    {

        return view('Administrador/Departamentos');
    }

    public function newDepartamento(departamentos $request ){
        return redirect('departamentos')->with('Nuevo_departamento','departamentos');
    }
    public function editDepartamento(departamentos $request ){
        return redirect('departamentos')->with('Editar_departamento','departamentos');
    }
}
