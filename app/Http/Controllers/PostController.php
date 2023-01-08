<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')
        ->select('id', 
                 'name', 
                 'category',
                 'created_at',
                 'extract', )
        ->get();


        return view('pag/post', [
            'posts' => $posts
        ]);
    }

    public function filtro(Request $request){
    {
        $fecha = $request->fecha;
        $titulo = $request->titulo;
        $categoria = $request->categoria;

        $posts = DB::table('posts')
        ->select('id', 
                 'name', 
                 'category',
                 'created_at',
                 'extract', )
        ->where('created_at', 'LIKE', '%'.$fecha.'%')
        ->where('name', 'LIKE', '%'.$titulo.'%')
        ->where('category', 'LIKE', '%'.$categoria.'%')

        ->get();


        return view('pag/post', [
            
            'posts' => $posts]);
        // return $posts;
    }

}

    // POSTS

    public function posts(User $user){
        $user_id = $user -> id;
        $posts = DB::table('posts')
        ->select('*')
        ->where('user_id', '=', $user_id) 
        ->orderBy('created_at', 'desc')
        ->get();

        if(count($posts)<=0){
            $posts = "No se ha encontrado ningún registro";
        }
        
        return view('user/posts', ['posts' => $posts]);
    }

    public function posts_details(Request $id){
        $id = $id -> id;
        $posts = DB::table('posts')
        ->select('users.name as usuario', 'posts.name as nombre_post', 'posts.category as category', 'posts.extract as extract', 'posts.body as body', 'posts.created_at as posts_created_at')
        ->join('users','posts.user_id', '=', 'users.id')
        ->where('posts.id', '=', $id) 
        ->get();

        // return $posts;
        return view('pag/posts_details', ['posts' => $posts]);
    }

    public function posts_new_view(){
        return view('user/posts_new');
    }
    public function posts_new(Request $resultado, $user_id){
        $nombre = $resultado->nombre;
        $categoria = $resultado->categoria;
        $resumen = $resultado->resumen;
        $cuerpo = $resultado->cuerpo;

        $posts = new Post;
        $posts->name = $nombre;
        $posts->slug = Str::slug($nombre);
        $posts->category = $categoria;
        $posts->extract = $resumen;
        $posts->body = $cuerpo;
        $posts->user_id = $user_id;
        $posts->category_id = 2;
        $posts->save();

        return redirect()->route('get.user.posts',[$user_id]);
    }    
    public function posts_edit_view(Request $id){
        $id = $id->id;
        $resultado = Post::get()->where('id', '=', $id);
        return view('user/posts_edit', ['resultado' => $resultado]);
    }
    public function posts_edit(Request $resultado, $id, $user_id){
        $nombre = $resultado->nombre;
        $categoria = $resultado->categoria;
        $resumen = $resultado->resumen;
        $cuerpo = $resultado->cuerpo;
        
        $posts = Post::findOrFail($id);
        $posts->name = $nombre;
        $posts->extract = $resumen;
        $posts->category = $categoria;
        $posts->body = $cuerpo;
        $posts->update();
        
        return redirect()->route('get.user.posts',[$user_id]);
    }
    public function posts_delete(Request $id, $user_id){
        $id = $id->id;
        $resultado = Post::get()->where('id', '=', $id)->where('user_id', '=', $user_id);
        $resultado ->each->delete();
        return redirect()->route('get.user.posts',[$user_id]);
    }

}
