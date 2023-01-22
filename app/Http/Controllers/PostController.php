<?php

namespace App\Http\Controllers;

use App\Models\Coments;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $posts = DB::table('posts')
        // ->select('id',
        //          'name',
        //          'category',
        //          'created_at',
        //          'extract', )
        // ->get();
        $posts = Post::with('image')->get();

        return view('pag/post', [
            'posts' => $posts
        ]);
    }

    public function filtro(Request $request){
    {
        $fecha = $request->fecha;
        $titulo = $request->titulo;
        $categoria = $request->categoria;

        // $posts = DB::table('posts')
        $posts = Post::with('image')
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
        // $posts = DB::table('posts')
        $posts = Post::with('image')
        ->select('*')
        ->where('user_id', '=', $user_id)
        ->orderBy('created_at', 'desc')
        ->get();

        if ((count($posts)) <= 0){
            // $posts = DB::table('posts')
            $posts = Post::with('image')
             ->select('id')
             ->where('name', '=', '#aZIv06H53Zy')
             ->get();;
         }

        return view('user/posts', ['posts' => $posts]);
    }

    public function posts_details(Request $id){
        $id = $id -> id;
        // $posts = DB::table('posts')
        // $posts = Post::with('image')
        // ->select(
        //     'users.name as usuario',
        //     'posts.user_id as posts_user_id',
        //     'posts.name as nombre_post',
        //     'posts.id as post_id',
        //     'posts.category as category',
        //     'posts.extract as extract',
        //     'posts.body as body',
        //     'posts.created_at as posts_created_at')
        // ->join('users','posts.user_id', '=', 'users.id')
        // ->where('posts.id', '=', $id)
        // ->get();
        $posts = Post::with('image','user')
        ->select('*')
        // ->join('users','tutorials.user_id', '=', 'users.id')
        ->where('posts.id', '=', $id)
        ->get();


        $coments = DB::table('coments')
        ->select(
            'coments.id as coment_id',
            'users.name as usuario',
            'users.id as user_id',
            'posts.id as posts_id',
            'coments.descripcion',
            'coments.updated_at')
        ->join('posts','post_id', '=', 'posts.id')
        // ->join('users','posts.user_id', '=', 'users.id')
        ->join('users','coments.user_id', '=', 'users.id')
        ->where('posts.id', '=', $id)
        ->orderBy('coments.created_at', 'desc')
        ->get();

        // return $posts;
        return view('pag/posts_details', [
            'posts' => $posts,
            'coments' => $coments,
            'idpost' => $id
        ]);
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

    public function comment_new(Request $request, $post_id){
        $post_id = $request->post_id;
        $comentario = $request->comentario;
        $user_id = auth()->user()->id;

        $comment = new Coments;
        $comment->descripcion = $comentario;
        $comment->user_id = $user_id;
        $comment->post_id = $post_id;
        $comment->save();
        // return $comment;
        return redirect()->route('posts');

    }
//     public function comment_new(Request $request, $post_id)
// {
//     $validatedData = $request->validate([
//         'comentario' => 'required|min:10|max:255',
//     ]);

//     $comentario = $validatedData['comentario'];
//     $user_id = auth()->user()->id;

//     try {
//         $comment = new Coments([
//             'descripcion' => $comentario,
//             'user_id' => $user_id,
//             'post_id' => $post_id,
//         ]);
//         $comment->save();
//     } catch (\Exception $e) {
//         return back()->withErrors(['error' => 'Error al guardar el comentario']);
//     }
//         return redirect()->route('posts');

// }



    // public function comment_edit(Request $id, $post_id){

    //     return "edit";

    // }


    public function comment_delete(Request $id){

        $id = $id->id;
        $resultado = Coments::get()->where('id', '=', $id);
         $resultado ->each->delete();
        // return $resultado;
         return redirect()->route('posts');

    }


}
