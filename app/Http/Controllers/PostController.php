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
        return view('pag/post', ['posts' => $posts]);
    }
}
