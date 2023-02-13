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


Route::post('dashboard', [dashboardController::class, 'index'])->name('Dashboard');
Route::get('dashboard', [dashboardController::class, 'Dashboard'])->name('Principal');

Route::get('auxiliares', [auxiliaresController::class, 'index'])->name('Auxiliares');
