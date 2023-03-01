<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ticketsController extends Controller
{
    public function index()
    {

        return view('Administrador/Tickets');
    }
}
