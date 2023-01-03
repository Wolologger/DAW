<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')
        ->select('id', 
                 'name', 
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
        
        $posts = DB::table('posts')
        ->select('id', 
                 'name', 
                 'extract', )
        ->where('created_at', 'LIKE', '%'.$fecha.'%')
        ->where('name', 'LIKE', '%'.$titulo.'%')

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

        return view('user/posts', ['posts' => $posts]);
    }

    public function posts_details(Request $id){
        return "patata";
    }
    public function posts_new_view(Request $id){
        return "patata";
    }
    public function posts_new(Request $id){
        return "patata";
    }    
    public function posts_edit_view(Request $id){
        return "patata";
    }
    public function posts_edit(Request $id){
        return "patata";
    }
    public function posts_delete(Request $id, $user_id){
        $id = $id->id;
        $resultado = Post::get()->where('id', '=', $id)->where('user_id', '=', $user_id);
        $resultado ->each->delete();
        return redirect()->route('get.user.posts',[$user_id]);
    }

}
