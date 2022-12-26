<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class TutorialesController extends Controller
{
    //
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tutoriales = DB::table('tutorials')
        ->select('id', 
                 'name', 
                 'type',
                 'extract', )
        ->get();
        // return view('pag/tutoriales');
        return view('pag/tutoriales', ['tutoriales' => $tutoriales]);

    }
}
