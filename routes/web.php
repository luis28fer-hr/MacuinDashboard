<?php

use App\Http\Controllers\administradorController;
use App\Http\Controllers\auxiliarController;
use App\Http\Controllers\auxiliaresController;
use App\Http\Controllers\clientesController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\departamentosController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ticketsAuxiliarController;
use App\Http\Controllers\ticketsController;
use Illuminate\Support\Facades\Route;


/* Route::get('/', function () {
    return view('Administrador/Dashboard');
}); */




/* Rutas login */

Route::get('/', [loginController::class, 'index'])->name('login');
Route::post('login', [loginController::class, 'validar'])->name('validar');
Route::get('salir', [loginController::class, 'logOut'])->name('logOut');

/* RUTAS DE PERFIL ADMINISTRADOR */

Route::get('dashboard', [dashboardController::class, 'index'])->name('Principal')->middleware('auth');
Route::post('perfil', [administradorController::class, 'updatePerfil'])->name('perfil')->middleware('auth');

/* Rutas auxiliares jefe */
Route::get('auxiliares', [auxiliaresController::class, 'index'])->name('Auxiliares')->middleware('auth');
Route::post('auxiliares/agregar', [auxiliaresController::class, 'newAuxiliares'])->name('Auxiliares.agregar')->middleware('auth');
Route::put('auxiliares/editar/{id}', [auxiliaresController::class, 'editAuxiliares'])->name('Auxiliares.editar')->middleware('auth');
Route::delete('auxiliares/eliminar/{id}', [auxiliaresController::class, 'deleteAuxiliares'])->name('Auxiliares.eliminar')->middleware('auth');
Route::get('auxiliares/buscar', [auxiliaresController::class, 'searchAuxiliares'])->name('Auxiliares.buscar')->middleware('auth');

/* Rutas departamentos jefe */
Route::get('departamentos', [departamentosController::class, 'index'])->name('Departamentos')->middleware('auth');
Route::post('departamentos/agregar', [departamentosController::class, 'newDepartamento'])->name('Departamentos.agregar')->middleware('auth');
Route::put('departamentos/editar/{id}', [departamentosController::class, 'editDepartamento'])->name('Departamentos.editar')->middleware('auth');
Route::delete('departamentos/eliminar/{id}', [departamentosController::class, 'deleteDepartamento'])->name('Departamentos.eliminar')->middleware('auth');
Route::get('departamentos/buscar', [departamentosController::class, 'searchDepartamento'])->name('Departamentos.buscar')->middleware('auth');

/* Rutas clientes jefe */
Route::get('clientes', [clientesController::class, 'index'])->name('Clientes')->middleware('auth');
Route::post('clientes/agregar', [clientesController::class, 'newClientes'])->name('Clientes.agregar')->middleware('auth');
Route::put('clientes/editar/{id}', [clientesController::class, 'editClientes'])->name('Clientes.editar')->middleware('auth');
Route::delete('clientes/eliminar/{id}', [clientesController::class, 'deleteClientes'])->name('Clientes.eliminar')->middleware('auth');
Route::get('clientes/buscar', [clientesController::class, 'searchClientes'])->name('Clientes.buscar')->middleware('auth');

/* Ruta tickets Jefe */
Route::get('tickets', [ticketsController::class, 'index'])->name('Tickets')->middleware('auth');
Route::get('tickets/actualizar/{id_ticket}/{id_auxiliar}', [ticketsController::class, 'actualizar'])->name('Tickets.actualizar')->middleware('auth');
Route::post('tickets/comentarios/adminaux/{id}', [ticketsController::class, 'enviarMensajeAdminAux'])->name('Tickets.comentario.adminaux')->middleware('auth');
Route::post('tickets/comentarios/admincli/{id}', [ticketsController::class, 'enviarMensajeAdminCli'])->name('Tickets.comentario.admincli')->middleware('auth');
Route::get('tickets/buscar', [ticketsController::class, 'searchTickets'])->name('Tickets.buscar')->middleware('auth');
Route::get('tickets/reporte/{id}', [ticketsController::class, 'generatePDF'])->name('Tickets.reporte')->middleware('auth');
Route::post('tickets/reporte', [ticketsController::class, 'generatePDFfiltro'])->name('Tickets.reporte.filtro')->middleware('auth');


/* RUTAS DE PERFIL AUXILIAR */

Route::get('auxiliar/tickets', [auxiliarController::class, 'index'])->name('aux.tickets')->middleware('auth');
Route::post('perfil/auxiliar', [auxiliarController::class, 'updatePerfil'])->name('perfil.auxiliar')->middleware('auth');
Route::get('auxiliar/tickets/buscar', [auxiliarController::class, 'searchTickets'])->name('aux.tickets.buscar')->middleware('auth');
