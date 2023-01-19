<?php

use App\Http\Controllers\CompraventaController;
use App\Http\Controllers\TutorialesController;
use App\Http\Controllers\GruposController;
use App\Http\Controllers\Instrumentos;
use App\Http\Controllers\HomeController;
use App\Models\Compraventa;
use App\Models\Grupo;
use App\Models\Post;
use App\Models\Tutorial;
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

// $compraventa = DB::table('compraventas')
$compraventa = Compraventa::with('image')
->select('*')
->orderBy('updated_at', 'desc')
->take(3)
->get();

// $tutoriales = DB::table('tutorials')
$tutoriales = Tutorial::with('image')
->select('*')
->orderBy('updated_at', 'desc')
->take(3)
->get();

// $grupos = DB::table('grupos')
$grupos = Grupo::with('image')
->select('*')
->where('search', '<>', 'Ninguno')    
->orderBy('updated_at', 'desc')
->take(4)
->get();

// $posts = DB::table('posts')
$posts = Post::with('image')
->select('*')
->orderBy('updated_at', 'desc')
->take(4)
->get();


return view('layouts/template', [
    'compraventa' => $compraventa, 
    'grupos' => $grupos, 
    'posts' => $posts, 
    'tutoriales'=>$tutoriales
]);

    
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



// Mi perfil
Route::get('/user/profile', [App\Http\Controllers\UserController::class, 'profile'])->middleware(['auth','verified'])->name('get.profile');
Route::get('/user/profile/{user}', [App\Http\Controllers\UserController::class, 'profile_view'])->middleware(['auth','verified'])->name('profile_view2');
Route::post('/user/profile/{user}', [App\Http\Controllers\UserController::class, 'profile_view'])->middleware(['auth','verified'])->name('profile_view');
Route::post('/user/profile', [App\Http\Controllers\UserController::class, 'profile'])->middleware(['auth','verified'])->name('profile');

// Mi perfil - Editar
Route::post('/user/profile/edit/{user}', [App\Http\Controllers\UserController::class, 'profile_edit_view'])->name('profile_edit_view');

// Mi perfil - Nuevo Form
Route::post('/user/profile/edit/{user}/update', [App\Http\Controllers\UserController::class, 'profile_edit'])->name('profile_edit');



// Mis compraventa
Route::get('/user/compraventa/{user}', [App\Http\Controllers\CompraventaController::class, 'compraventa'])->name('get.user.compraventa');
Route::post('/user/compraventa/{user}', [App\Http\Controllers\CompraventaController::class, 'compraventa'])->name('user.compraventa');
Route::post('/user/compraventa/details/{id}', [App\Http\Controllers\CompraventaController::class, 'compraventa_details'])->name('user.compraventa.details');

// Mis compraventa - Nuevo
Route::post('/user/compraventa/new/{id}', [App\Http\Controllers\CompraventaController::class, 'compraventa_new_view'])->middleware(['auth','verified'])->name('user.compraventa.new_view');

// Mis compraventa - Nuevo Form
Route::post('/user/compraventa/new/{id}/create', [App\Http\Controllers\CompraventaController::class, 'compraventa_new'])->middleware(['auth','verified'])->name('user.compraventa.new');

// Mis compraventa - Editar
Route::post('/user/compraventa/edit/{id}', [App\Http\Controllers\CompraventaController::class, 'compraventa_edit_view'])->middleware(['auth','verified'])->name('user.compraventa.edit_view');
Route::post('/user/compraventa/edit/{id}/{userid}', [App\Http\Controllers\CompraventaController::class, 'compraventa_edit'])->middleware(['auth','verified'])->name('user.compraventa.edit');

// Mis compraventa - Borrar
Route::post('/user/compraventa/delete/{userid}/{id}', [App\Http\Controllers\CompraventaController::class, 'compraventa_delete'])->name('user.compraventa.delete');




// Mis posts
Route::get('/user/posts/{user}', [App\Http\Controllers\PostController::class, 'posts'])->name('get.user.posts');
Route::post('/user/posts/{user}', [App\Http\Controllers\PostController::class, 'posts'])->name('user.posts');
Route::post('/user/posts/details/{id}', [App\Http\Controllers\PostController::class, 'posts_details'])->name('user.posts.details');

// Mis posts - Nuevo
Route::post('/user/posts/new/{id}', [App\Http\Controllers\PostController::class, 'posts_new_view'])->name('user.posts.new_view');

// Mis posts - Nuevo Form
Route::post('/user/posts/new/{id}/nuevo', [App\Http\Controllers\PostController::class, 'posts_new'])->name('user.posts.new');

// Mis posts - Editar
Route::post('/user/posts/edit/{id}', [App\Http\Controllers\PostController::class, 'posts_edit_view'])->name('user.posts.edit_view');
Route::post('/user/posts/edit/{id}/{userid}', [App\Http\Controllers\PostController::class, 'posts_edit'])->name('user.posts.edit');

// Mis posts - Borrar
Route::post('/user/posts/delete/{userid}/{id}', [App\Http\Controllers\PostController::class, 'posts_delete'])->name('user.posts.delete');

// Mis posts_Comentarios
// Mis posts_Comentarios - Nuevo
// Route::post('/user/posts/comment/{id}/new', [App\Http\Controllers\PostController::class, 'comment_new'])->name('user.comment.new');
Route::post('/user/posts/comment/{id}/new', [App\Http\Controllers\PostController::class, 'comment_new'])->name('user.comment.new');
// Mis posts_Comentarios - Editar
Route::post('/user/posts/comment/{id}/edit', [App\Http\Controllers\PostController::class, 'comment_edit'])->name('user.comment.edit');

// Mis posts_Comentarios - Borrar
Route::post('/user/posts/comment/{id}/delete', [App\Http\Controllers\PostController::class, 'comment_delete'])->name('user.comment.delete');




// Mis grupos 
Route::get('/user/grupos/{user}', [App\Http\Controllers\GruposController::class, 'grupos'])->name('get.user.grupos');
Route::post('/user/grupos/{user}', [App\Http\Controllers\GruposController::class, 'grupos'])->name('user.grupos');
Route::post('/user/grupos/details/{id}', [App\Http\Controllers\GruposController::class, 'grupos_details'])->name('user.grupos.details');

// Mis grupos - Nuevo
Route::post('/user/grupos/new/{id}', [App\Http\Controllers\GruposController::class, 'grupos_new_view'])->name('user.grupos.new_view');

// Mis grupos - Nuevo Form
Route::post('/user/grupos/new/{id}/nuevo', [App\Http\Controllers\GruposController::class, 'grupos_new'])->name('user.grupos.new');

// Mis grupos - Editar
Route::post('/user/grupos/edit/{id}', [App\Http\Controllers\GruposController::class, 'grupos_edit_view'])->name('user.grupos.edit_view');
Route::post('/user/grupos/edit/{id}/{userid}', [App\Http\Controllers\GruposController::class, 'grupos_edit'])->name('user.grupos.edit');

// Mis grupos - Borrar
Route::post('/user/grupos/delete/{userid}/{id}', [App\Http\Controllers\GruposController::class, 'grupos_delete'])->name('user.grupos.delete');





// Mis tutoriales 
Route::get('/user/tutoriales/{user}', [App\Http\Controllers\TutorialesController::class, 'tutoriales'])->name('get.user.tutoriales');
Route::post('/user/tutoriales/{user}', [App\Http\Controllers\TutorialesController::class, 'tutoriales'])->name('user.tutoriales');
Route::post('/user/tutoriales/details/{id}', [App\Http\Controllers\TutorialesController::class, 'tutoriales_details'])->name('user.tutoriales.details');

// Mis tutoriales - Nuevo
Route::post('/user/tutoriales/new/{id}', [App\Http\Controllers\TutorialesController::class, 'tutoriales_new_view'])->name('user.tutoriales.new_view');

// Mis tutoriales - Nuevo Form
Route::post('/user/tutoriales/new/{id}/nuevo', [App\Http\Controllers\TutorialesController::class, 'tutoriales_new'])->name('user.tutoriales.new');

// Mis tutoriales - Editar
Route::post('/user/tutoriales/edit/{id}', [App\Http\Controllers\TutorialesController::class, 'tutoriales_edit_view'])->name('user.tutoriales.edit_view');
Route::post('/user/tutoriales/edit/{id}/{userid}', [App\Http\Controllers\TutorialesController::class, 'tutoriales_edit'])->name('user.tutoriales.edit');

// Mis tutoriales - Borrar
Route::post('/user/tutoriales/delete/{userid}/{id}', [App\Http\Controllers\TutorialesController::class, 'tutoriales_delete'])->name('user.tutoriales.delete');




// Borrar usuarios
Route::post('/user/delete/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

