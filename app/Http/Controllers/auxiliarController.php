<?php

namespace App\Http\Controllers;

use App\Http\Requests\perfilController;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class auxiliarController extends Controller
{
    public function index()
    {

        return view('Auxiliar/Tickets');
    }

    public function updatePerfil(perfilController $request)
    {
        try {


        } catch (Exception $e) {


        }
    }




}
