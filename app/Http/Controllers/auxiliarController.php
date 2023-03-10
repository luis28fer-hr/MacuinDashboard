<?php

namespace App\Http\Controllers;

use App\Http\Requests\perfilController;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Http\Requests\searchTickets;

class auxiliarController extends Controller
{
    public function index()
    {
        $ConsultaTicket = DB::select('select * from tickets as t, auxiliares as a where t.auxiliar_id = a.id_auxiliar and usuario_id = 1000016');
        $consulDepartaments = DB::table('departamentos')->get();
        return view('Auxiliar/Tickets',compact('ConsultaTicket','consulDepartaments'));
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

        

    public function searchTickets(searchTickets $request)
    {    //Consulta de los departamentos
        $consulDepartaments = DB::table('departamentos')->get();

        //Obetener los datos de los filtros
        $estatus = $request->input('searchByEstatus');
        $departamento = $request->input('searchByDepartamento');
        $fecha = $request->input('searchByFecha');


        if (empty($estatus) and empty($departamento) and empty($fecha)) { //Sin ningun filtro seleccionado

            return redirect('auxiliar/tickets')->with('selectFiltro', 'Ticket');
        } elseif (empty($estatus) and empty($departamento)) { //Busqueda por Fecha

            $consultaTickets = DB::select('select * from tickets as t, auxiliares as a where (t.auxiliar_id = a.id_auxiliar 
            and usuario_id = ?) and date(t.created_at) = ?', [Auth::user()->id,$fecha]);
            
            if ($consultaTickets != null) {
                $consultaTickets =  $this->asignarDatosFiltro($consultaTickets);
                return view('auxiliar/tickets', compact('consultaTickets', 'consulDepartaments'));
            } else {
                return redirect('auxiliar/tickets')->with('noExiste', 'Ticket');
            }
        } elseif (empty($estatus) and empty($fecha)) { //Busqueda por Departamento

            $consultaTickets = DB::select('select * from tickets as t, auxiliares as a
              where (t.auxiliar_id = a.id_auxiliar and usuario_id = ?) and t.cliente_id in(select c.id_cliente from clientes as c
              where c.departamento_id = ?)', [Auth::user()->id,$departamento]);
                
            if ($consultaTickets != null) {
                $consultaTickets =  $this->asignarDatosFiltro($consultaTickets);
                return view('auxiliar/tickets', compact('consultaTickets', 'consultaAuxiliares', 'consulDepartaments'));
            } else {
                return redirect('auxiliar/tickets')->with('noExiste', 'Ticket');
            }
        } elseif (empty($fecha) and empty($departamento)) { //Busqueda por Estatus

            $consultaTickets = DB::select('select * from tickets where estatus = ?', [$estatus]);

            $consultaTickets = DB::select('select * from tickets as t, auxiliares as a where (t.auxiliar_id = a.id_auxiliar 
            and usuario_id = ?) and t.estatus = ?', [Auth::user()->id,$estatus]);

            if ($consultaTickets != null) {
                $consultaTickets =  $this->asignarDatosFiltro($consultaTickets);
                return view('auxiliar/tickets', compact('consultaTickets', 'consultaAuxiliares', 'consulDepartaments'));
            } else {
                return redirect('auxiliar/tickets')->with('noExiste', 'Ticket');
            }
        } elseif (empty($fecha)) { //Busqueda por Estatus y Departamento

            $consultaTickets = DB::select('select * from tickets as t, auxiliares as a
              where (t.auxiliar_id = a.id_auxiliar and usuario_id = ?)and t.cliente_id in(select c.id_cliente from clientes as c
              where c.departamento_id = ?) and t.estatus=?', [Auth::user()->id,$departamento,$estatus]);

            if ($consultaTickets != null) {
                $consultaTickets =  $this->asignarDatosFiltro($consultaTickets);
                return view('auxiliar/tickets', compact('consultaTickets', 'consultaAuxiliares', 'consulDepartaments'));
            } else {
                return redirect('auxiliar/tickets')->with('noExiste', 'Ticket');
            }
        } elseif (empty($departamento)) { //Busqueda por Estatus y Fecha

            $consultaTickets = DB::select('select * from tickets as t, auxiliares as a where (t.auxiliar_id = a.id_auxiliar 
            and usuario_id = ?) and date(t.created_at) = ? and t.estatus=?', [Auth::user()->id,$fecha,$estatus]);

            if ($consultaTickets != null) {
                $consultaTickets =  $this->asignarDatosFiltro($consultaTickets);
                return view('auxiliar/tickets', compact('consultaTickets', 'consultaAuxiliares', 'consulDepartaments'));
            } else {
                return redirect('auxiliar/tickets')->with('noExiste', 'Ticket');
            }
        } elseif (empty($estatus)) { //Busqueda por Departamento y Fecha

            $consultaTickets = DB::select('select * from tickets as t, auxiliares as a
            where (t.auxiliar_id = a.id_auxiliar and usuario_id = ?) and t.cliente_id in(select c.id_cliente from clientes as c
            where c.departamento_id = ?) and date(t.created_at) = ?', [Auth::user()->id,$departamento,$fecha]);


            if ($consultaTickets != null) {
                $consultaTickets =  $this->asignarDatosFiltro($consultaTickets);
                return view('auxiliar/tickets', compact('consultaTickets', 'consultaAuxiliares', 'consulDepartaments'));
            } else {
                return redirect('auxiliar/tickets')->with('noExiste', 'Ticket');
            }
        } else { //Busqueda por Estatus, Departamento y Fecha

            $consultaTickets = DB::select('select * from tickets as t, auxiliares as a
            where (t.auxiliar_id = a.id_auxiliar and usuario_id = ?) and t.cliente_id in(select c.id_cliente from clientes as c
            where c.departamento_id = ?) and date(t.created_at) = ? and t.estatus =?', [Auth::user()->id,$departamento,$fecha,$estatus]);

            if ($consultaTickets != null) {
                $consultaTickets =  $this->asignarDatosFiltro($consultaTickets);
                return view('auxiliar/tickets', compact('consultaTickets', 'consultaAuxiliares', 'consulDepartaments'));
            } else {
                return redirect('tickets')->with('noExiste', 'Ticket');
            }
        }
    }
    }

