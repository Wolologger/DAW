<?php

namespace App\Http\Controllers;

use App\Models\Compraventa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $compraventa = DB::table('compraventas')
        ->select('*')
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();

        $tutoriales = DB::table('tutorials')
        ->select('*')
        ->orderBy('created_at', 'desc')
        ->get();

        $grupos = DB::table('grupos')
        ->select('*')
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->get();

        $posts = DB::table('post')
        ->select('*')
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->get();

        return view('layouts/template', ['compraventa' => $compraventa, 'grupos' => $grupos, 'posts' => $posts, 'tutoriales'=>$tutoriales]);

    //    return view('template');

    }

    public function user()
    {
       return view('user');

    }
    
}
