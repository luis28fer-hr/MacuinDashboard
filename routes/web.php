<?php

use App\Http\Controllers\auxiliaresController;
use App\Http\Controllers\dashboardController;
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

Route::get('auxiliares', [auxiliaresController::class, 'index'])->name('Auxiliares');
