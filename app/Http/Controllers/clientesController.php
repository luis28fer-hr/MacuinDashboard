<?php

namespace App\Http\Controllers;
use Exception;
use App\Http\Requests\auxiliares;
use App\Http\Requests\editAuxiliares;
use App\Http\Requests\searchAuxiliares;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\clientes;
use App\Http\Requests\searchClientes;
use Illuminate\Support\Carbon;


class clientesController extends Controller
{
    public function index()
    {
        $consulClientes = DB::select('select u.*, c.* from users as u,
        clientes as c where c.usuario_id = u.id');

        foreach($consulClientes as $cliente){
            $cliente->departamento = DB::table('departamentos')->where('id_departamento',$cliente->departamento_id)->first();
        }

        $consulDepartaments= DB::table('departamentos')->get();

        return view('Administrador/Clientes', compact('consulClientes','consulDepartaments'));
    }

    public function newClientes(clientes $request)
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

            DB::table('clientes')->insert([
                "departamento_id" => $request->input('departamento'),
                "usuario_id" => $idNewUser,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]);

            return redirect('clientes')->with('Nuevo_cliente', 'clientes'); 

        } catch (Exception $e) {


        return redirect('clientes')->with('error_email', 'error');
        } 
    }

    public function editClientes(clientes $request, $id)
    {

            /*       $depa=$request->input('departamento');

        return $depa; 
         */
        $img = $request->file('fotoPerfil')->store('public/img');
        $url = Storage::url($img);

       DB::table('users')->where('id', $id)->update([
            "name" => $request->input('name'),
            "apellido_p" => $request->input('apellido_p'),
            "apellido_m" => $request->input('apellido_m'),
            "num_telefono" => $request->input('numCel'),
            "email" => $request->input('email'),
            "url_foto" => $url,
            "updated_at" => Carbon::now()
        ]); 

        DB::table('clientes')->where('usuario_id', $id)->update([
            "departamento_id" => $request->input('departamento'),
            "updated_at" => Carbon::now()
        ]);

        return redirect('clientes')->with('Editar_cliente', 'clientes');
    }



    public function deleteClientes($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect('clientes')->with('Eliminar_cliente', 'clientes');
    }



    public function searchClientes(searchClientes $request)
    {
        $name = $request->input('searchName');

        $consulClientes = DB::select('select u.*, a.* from users as u, clientes as a WHERE (name  like ? or apellido_p like ? or apellido_m like ?) and u.id = a.usuario_id', ['%'.$name.'%', '%'.$name.'%', '%'.$name.'%']);


        foreach($consulClientes as $cliente){
            $cliente->departamento = DB::table('departamentos')->where('id_departamento',$cliente->departamento_id)->first();
        }


        $consulDepartaments= DB::table('departamentos')->get();

        if($consulClientes!=null){

            
            return view('Administrador/Clientes', compact('consulClientes','consulDepartaments'));
        }else{
            return redirect('clientes')->with('nocoincide_clientes', 'clientes');
        }

    }
}
