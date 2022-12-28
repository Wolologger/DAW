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

        $tipos = DB::table('tutorials')
        ->select('type')
        ->groupBy('type')
        ->get();


        return view('pag/tutoriales', [
            'tutoriales' => $tutoriales,
            'tipos' => $tipos,

        ]);

    }

    public function filtro(Request $request){
    {
        $tipo = $request->tipo;
        $titulo = $request->titulo;

        $tutoriales = DB::table('tutorials')
        ->select('id', 
                 'name', 
                 'type',
                 'extract', )
        ->where('type', 'LIKE', '%'.$tipo.'%')
        ->where('name', 'LIKE', '%'.$titulo.'%')
        ->get();
        // return view('pag/tutoriales');

        $tipos = DB::table('tutorials')
        ->select('type')
        ->groupBy('type')
        ->get();

        // return $tutoriales;
        return view('pag/tutoriales', [
            'tutoriales' => $tutoriales,
            'tipos' => $tipos,

        ]);

    }
}


}
