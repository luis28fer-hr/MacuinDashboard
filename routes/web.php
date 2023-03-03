<?php

use App\Http\Controllers\administradorController;
use App\Http\Controllers\auxiliaresController;
use App\Http\Controllers\clientesController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\departamentosController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ticketsController;
use Illuminate\Support\Facades\Route;


/* Route::get('/', function () {
    return view('Administrador/Dashboard');
}); */

/* Rutas login */

Route::get('/', [loginController::class, 'index'])->name('login');
Route::post('login', [loginController::class, 'validar'])->name('validar');
Route::get('salir', [loginController::class, 'logOut'])->name('logOut');


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
