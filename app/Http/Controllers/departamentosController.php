<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\departamentos;
use App\Http\Requests\searchDepartamentos;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class departamentosController extends Controller
{

    public function index(){

        $consulDepartamentos=DB::table('departamentos')->get();    
        return view('Administrador/Departamentos',compact('consulDepartamentos'));
    }

    public function newDepartamento(departamentos $request ){

        $img =$request->file('fotoPerfil')->store('public/img');
        $url = Storage::url($img);

        DB::table('departamentos')->insert([
            "nombre"=>$request->input('name'),
            "descripcion"=>$request->input('descripcion'),
            "url_foto"=> $url,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now()
        ]);

        return redirect('departamentos')->with('Nuevo_departamento','departamentos');
    }

    public function editDepartamento(departamentos $request, $id){

        $img =$request->file('fotoPerfil')->store('public/img');
        $url = Storage::url($img);

        DB::table('departamentos')->where('id_departamento', $id)->update([
            "nombre"=>$request->input('name'),
            "descripcion"=>$request->input('descripcion'),
            "url_foto"=> $url,
            "updated_at"=>Carbon::now()
        ]);

        return redirect('departamentos')->with('Editar_departamento','departamentos');
    }

    public function deleteDepartamento($id){
        DB::table('departamentos')->where('id_departamento', $id)->delete();

        return redirect('departamentos')->with('Eliminar_departamento', 'departamentos');
    }

    public function searchDepartamento(searchDepartamentos $request){
        $name = $request->input('searchDepartamento');

        $consulDepartamentos = DB::table('departamentos')->where('nombre', 'LIKE', '%' . $name . '%')->get();

        if($consulDepartamentos==null){
            return redirect('departamentos')->with('nocoincide_departamento', 'departamentos');
        }else{
            return view('Administrador/Departamentos', compact('consulDepartamentos'));
        }

    }
}
