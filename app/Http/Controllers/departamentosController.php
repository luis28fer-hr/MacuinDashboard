<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class departamentosController extends Controller
{

    public function index()
    {

        return view('Administrador/Departamentos');
    }
}