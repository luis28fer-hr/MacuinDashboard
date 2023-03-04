<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{

    public function index()
    {
        $auxiliares=DB::table('auxiliares')->get();
        $contAux = $auxiliares->count();

        $clientes=DB::table('clientes')->get();
        $contCli = $clientes->count();

        $departamentos=DB::table('departamentos')->get();
        $contDep = $departamentos->count();

        $tickets=DB::table('tickets')->get();
        $contTick = $tickets->count();


        return view('Administrador/Dashboard', compact('contAux','contCli','contDep', 'contTick'));
    }
}
