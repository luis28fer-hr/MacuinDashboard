<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

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

        $fecha = Carbon::now()->format('Y-m-d');
        $ticketsHoy = DB::select("select u.name, u.apellido_p from tickets as t, clientes as c, users as u where date(t.created_at) = ? and t.estatus = 'En espera de ser asignado' and t.cliente_id = c.id_cliente and c.usuario_id = u.id", [$fecha]);

        return view('Administrador/Dashboard', compact('contAux','contCli','contDep', 'contTick', 'ticketsHoy'));
    }
}
