<?php

use App\Http\Controllers\administradorController;
use App\Http\Controllers\auxiliaresController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\departamentosController;
use App\Http\Controllers\loginController;
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