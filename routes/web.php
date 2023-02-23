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
Route::post('newAuxiliar', [auxiliaresController::class, 'newAuxiliares'])->name('newauxiliares')->middleware('auth');
Route::put('editAuxiliar/{id}', [auxiliaresController::class, 'editAuxiliares'])->name('editauxiliares')->middleware('auth');
Route::delete('deleteAuxiliar/{id}', [auxiliaresController::class, 'deleteAuxiliares'])->name('deleteauxiliares')->middleware('auth');


Route::get('departamentos', [departamentosController::class, 'index'])->name('Departamentos')->middleware('auth');
