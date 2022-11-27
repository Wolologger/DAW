<?php

use App\Http\Controllers\CompraventaController;
use App\Http\Controllers\TutorialesController;
use App\Http\Controllers\GruposController;
use App\Http\Controllers\Instrumentos;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------page
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('layouts/template');
    
})->name('home');

Auth::routes();

Route::get('/user', [App\Http\Controllers\HomeController::class, 'index'])->name('user');


Route::get('/compraventa', [App\Http\Controllers\CompraventaController::class, 'index'])->name('compraventa');
Route::get('/tutoriales', [App\Http\Controllers\TutorialesController::class, 'index'])->name('tutoriales');
Route::get('/grupos', [App\Http\Controllers\GruposController::class, 'index'])->name('grupos');

// Instrumentos
Route::get('/instrumento', [App\Http\Controllers\InstrumentosController::class, 'index'])->name('instrumento');
