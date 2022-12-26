<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GruposController extends Controller
{
    //
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $grupos = DB::table('grupos')
        ->select('id', 
                 'name', 
                 'body', 
                 'contact',
                 'state', 
                 'search',)
        ->get();
        return view('pag/grupos', ['grupos' => $grupos]);
    }
}
