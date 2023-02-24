<?php

namespace App\Http\Controllers;

use App\Http\Requests\auxiliares;
use App\Http\Requests\searchAuxiliares;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

use Carbon\Carbon;
use Exception;

class auxiliaresController extends Controller
{

    public function index()
    {
        $consulAuxiliares = DB::select('select u.* from users as u,
        auxiliares as a where a.usuario_id = u.id');

        return view('Administrador/Auxiliares', compact('consulAuxiliares'));
    }


    public function newAuxiliares(auxiliares $request)
    {
        try {

            $img = $request->file('fotoPerfil')->store('public/img');
            $url = Storage::url($img);

            DB::table('users')->insert([
                "name" => $request->input('name'),
                "apellido_p" => $request->input('apellido_p'),
                "apellido_m" => $request->input('apellido_m'),
                "num_telefono" => $request->input('numCel'),
                "email" => $request->input('email'),
                "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "url_foto" => $url,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]);

            $consulNewUser = DB::select('select id from users
                where email = ?', [$request->input('email')]);

            $idNewUser = ($consulNewUser) ? $consulNewUser[0]->id : null;
            //es para tomar el valor solo nuemrrico del array

            DB::table('auxiliares')->insert([
                "usuario_id" => $idNewUser,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]);

            return redirect('auxiliares')->with('Nuevo_auxiliar', 'auxiliares');

        } catch (Exception $e) {


        return redirect('auxiliares')->with('error_email', 'error');
        }
    }

    public function editAuxiliares(auxiliares $request, $id)
    {
        $img = $request->file('fotoPerfil')->store('public/img');
        $url = Storage::url($img);

        DB::table('users')->where('id', $id)->update([
            "name" => $request->input('name'),
            "apellido_p" => $request->input('apellido_p'),
            "apellido_m" => $request->input('apellido_m'),
            "num_telefono" => $request->input('numCel'),
            "email" => $request->input('email'),
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            "url_foto" => $url,
            "updated_at" => Carbon::now()
        ]);

        return redirect('auxiliares')->with('Editar_auxiliar', 'auxiliares');
    }

    public function deleteAuxiliares($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect('auxiliares')->with('Eliminar_auxiliar', 'auxiliares');
    }

    public function searchAuxiliares(searchAuxiliares $request)
    {
        $name = $request->input('searchName');

        //$consulAuxiliares = DB::table('users')->where('name', 'LIKE', '%' . $name . '%')->orWhere('apellido_p', 'LIKE', '%' . $name . '%')->orWhere('apellido_m', 'LIKE', '%' . $name . '%')->get();

        $consulAuxiliares = DB::select('select u.* from users as u, auxiliares as a WHERE (name  like ? or apellido_p like ? or apellido_m like ?) and u.id = a.usuario_id', ['%'.$name.'%', '%'.$name.'%', '%'.$name.'%']);

        if($consulAuxiliares!=null){

            return view('Administrador/Auxiliares', compact('consulAuxiliares'));
        }else{

            return redirect('auxiliares')->with('nocoincide', 'auxiliares');
        }

    }
}
