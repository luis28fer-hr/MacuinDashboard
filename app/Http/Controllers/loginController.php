<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginValidar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

            return redirect()->intended('dashboard');

        }

         return redirect('/');
    }

    public function logOut()
    {

        return redirect('/');
    }
}
