<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginValidar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{


    public function index()
    {

        return view('login');
    }

    public function validar(loginValidar $request){

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $id_activo = Auth::user()->id;

            $admin_activo=DB::table('administradores')->where('usuario_id', $id_activo)->first();

            if($admin_activo!=null){

                return redirect('dashboard')->with('activa_sesion', 'login');
            }
            else{
                /* Verifica si es auxiliar */
                $aux_activo=DB::table('auxiliares')->where('usuario_id', $id_activo)->first();
                if($aux_activo!=null){

                    return redirect('auxiliar/tickets')->with('activa_sesion', 'login');
                }

                /* Verifica si es cliente */
                $cli_activo = DB::table('clientes')->where('usuario_id', $id_activo)->first();
                if($cli_activo!=null){

                    return redirect('cliente/tickets')->with('activa_sesion', 'login');
                }

                //Si no es ninguno, se cierra la session y redirecciona al login
                Auth::logout();
                return redirect('/');
            }
        }

         return redirect('/')->with('error_sesion','login');
    }

    public function logOut()
    {
        Auth::logout();
        return redirect('/');
    }
}
