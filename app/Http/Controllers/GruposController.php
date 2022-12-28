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
        ->where('search', '<>', 'Ninguno')
        ->get();

        // Query musicos
        $musicos = DB::table('grupos')
        ->select('search')
        ->where('search', '<>', 'Ninguno')
        ->groupBy('search')
        ->get();

        // Query nombres
        $nombres = DB::table('grupos')
        ->select('name')
        ->groupBy('name')
        ->get();

        // Query provincias
        $provincias = DB::table('grupos')
        ->select('state')
        ->groupBy('state')
        ->get();

        return view('pag/grupos', [
            'grupos' => $grupos,
            'musicos' => $musicos,
            'nombres' => $nombres,
            'provincias' => $provincias
        ]);


    }

    public function filtro(Request $request){
        // $request = $request->name;
        $musico = $request->musico;
        $nombre = $request->nombre;
        $provincia = $request->provincia;

        // Query general
        $grupos = DB::table('grupos')
        ->select('id', 
                 'name', 
                 'body', 
                 'contact',
                 'state', 
                 'search',)
        ->where('search', '<>', 'Ninguno')
        ->where('search', 'LIKE', '%'.$musico.'%')
        ->where('name', 'LIKE', '%'.$nombre.'%')
        ->where('state', 'LIKE', '%'.$provincia.'%')
        ->get();

        // $imagenes = DB::table('images')
        // ->select('id',
        //         'imageable_id',
        //         'imageable_type',
        //         'url')
        // ->where('imageable_type', '=', 'Compraventa')
        // ->get();


          // Query musicos
          $musicos = DB::table('grupos')
          ->select('search')
          ->where('search', '<>', 'Ninguno')
          ->groupBy('search')
          ->get();
  
          // Query nombres
          $nombres = DB::table('grupos')
          ->select('name')
          ->groupBy('name')
          ->get();
  
          // Query provincias
          $provincias = DB::table('grupos')
          ->select('state')
          ->groupBy('state')
          ->get();
  
          return view('pag/grupos', [
              'grupos' => $grupos,
              'musicos' => $musicos,
              'nombres' => $nombres,
              'provincias' => $provincias
          ]);

        // return $request;
    }
}
