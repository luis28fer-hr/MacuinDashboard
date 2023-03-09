<?php

namespace App\Http\Controllers;

use App\Http\Requests\perfilController;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class auxiliarController extends Controller
{
    public function index()
    {

        return view('Auxiliar/Tickets');
    }

    public function updatePerfil(perfilController $request)
    {
   
            try {
    
                $img = $request->file('fotoPerfil')->store('public/img');
                $url = Storage::url($img);
    
                $idActivo = Auth::user()->id;
     
    
                DB::table('users')->where('id', $idActivo)->update([
                    "name" => $request->input('name'),
                    "apellido_p" => $request->input('apellido_p'),
                    "apellido_m" => $request->input('apellido_m'),
                    "num_telefono" => $request->input('numTel'),
                    "url_foto" => $url,
                    "email" => $request->input('correo'),
                    "updated_at" => Carbon::now()
                ]);
    
                return redirect('auxiliar/tickets')->with('perfil_actualizado', 'perfil');
    
            } catch (Exception $e) {
    
    
                return redirect('auxiliar/tickets')->with('error_email', 'error');
            }
        }
    }

