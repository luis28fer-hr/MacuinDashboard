<?php

namespace App\Http\Controllers;

use App\Http\Requests\perfilController;
use Illuminate\Http\Request;

class administradorController extends Controller
{
    public function updatePerfil(perfilController $request)
    {


        return redirect('dashboard')->with('perfil_actualizado','perfil');
    }
}
