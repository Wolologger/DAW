<?php

use App\Http\Controllers\CompraventaController;
use App\Http\Controllers\TutorialesController;
use App\Http\Controllers\GruposController;
use App\Http\Controllers\Instrumentos;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// cambiar esto
use Illuminate\Support\Facades\DB;



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

$compraventa = DB::table('compraventas')
->select('*')
->orderBy('created_at', 'desc')
->take(3)
->get();

$tutoriales = DB::table('tutorials')
->select('*')
->orderBy('created_at', 'desc')
->take(3)
->get();

$grupos = DB::table('grupos')
->select('*')
->where('search', '<>', 'Ninguno')    
->orderBy('created_at', 'desc')
->take(4)
->get();

$posts = DB::table('posts')
->select('*')
->orderBy('created_at', 'desc')
->take(4)
->get();

return view('layouts/template', ['compraventa' => $compraventa, 'grupos' => $grupos, 'posts' => $posts, 'tutoriales'=>$tutoriales]);

    
})->name('home');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home2');


Auth::routes(['verify' => true]);

Route::get('/user', [App\Http\Controllers\HomeController::class, 'user'])->middleware(['auth','verified'])->name('user');

// Pags principales
Route::get('/compraventa', [App\Http\Controllers\CompraventaController::class, 'index'])->name('compraventa');
Route::get('/tutoriales', [App\Http\Controllers\TutorialesController::class, 'index'])->name('tutoriales');
Route::get('/grupos', [App\Http\Controllers\GruposController::class, 'index'])->name('grupos');
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts');

// Filtros
Route::post('/compraventa', [App\Http\Controllers\CompraventaController::class, 'filtro'])->name('compraventa_filtro');
Route::post('/grupos', [App\Http\Controllers\GruposController::class, 'filtro'])->name('grupos_filtro');
Route::post('/tutoriales', [App\Http\Controllers\TutorialesController::class, 'filtro'])->name('tutoriales_filtro');
Route::post('/posts', [App\Http\Controllers\PostController::class, 'filtro'])->name('posts_filtro');


// Mis compraventa
Route::get('/user/compraventa/{user}', [App\Http\Controllers\UserController::class, 'compraventa'])->name('get.user.compraventa');
Route::post('/user/compraventa/{user}', [App\Http\Controllers\UserController::class, 'compraventa'])->name('user.compraventa');
Route::post('/user/compraventa/details/{id}', [App\Http\Controllers\UserController::class, 'compraventa_details'])->name('user.compraventa.details');

// Mis compraventa - Nuevo
Route::post('/user/compraventa/new/{id}', [App\Http\Controllers\UserController::class, 'compraventa_new_view'])->name('user.compraventa.new_view');

// Mis compraventa - Editar
Route::post('/user/compraventa/edit/{id}', [App\Http\Controllers\UserController::class, 'compraventa_edit_view'])->name('user.compraventa.edit_view');
Route::post('/user/compraventa/edit/{id}/{userid}', [App\Http\Controllers\UserController::class, 'compraventa_edit'])->name('user.compraventa.edit');

// Mis compraventa - Borrar
Route::post('/user/compraventa/delete/{userid}/{id}', [App\Http\Controllers\UserController::class, 'compraventa_delete'])->name('user.compraventa.delete');

// Mis compraventa - Nuevo Form
Route::post('/user/compraventa/new/{id}/nuevo', [App\Http\Controllers\UserController::class, 'compraventa_new'])->name('user.compraventa.new');

// Mis posts


// Mis grupos 

// Mis grupos - Nuevo
// Mis grupos - Editar
// Mis grupos - Borrar


// Mis posts 

// Mis posts - Nuevo
// Mis posts - Editar
// Mis posts - Borrar


// Borrar usuarios
Route::post('/user/delete/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

