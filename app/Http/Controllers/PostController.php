<?php

namespace App\Http\Controllers;
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

}
