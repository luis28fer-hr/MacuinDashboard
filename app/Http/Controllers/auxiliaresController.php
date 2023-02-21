<?php

namespace App\Http\Controllers;

use App\Http\Requests\auxiliares;
use Illuminate\Http\Request;

class auxiliaresController extends Controller
{

    public function index()
    {

        return view('Administrador/Auxiliares');
    }

    public function newAuxiliares(auxiliares $request)
    {
        return redirect('Auxiliares')->with('Nuevo_auxiliar','perfil');
    }


}
