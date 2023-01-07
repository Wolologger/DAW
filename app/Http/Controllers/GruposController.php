<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
                 'gender',
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

        // Query género musical
        $generos = DB::table('grupos')
        ->select('gender')
        ->groupBy('gender')
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
            'generos' => $generos,
            'provincias' => $provincias
        ]);


    }

    public function filtro(Request $request){
        // $request = $request->name;
        $musico = $request->musico;
        $nombre = $request->nombre;
        $provincia = $request->provincia;
        $genero = $request->genero;

        // Query general
        $grupos = DB::table('grupos')
        ->select('id', 
                 'name', 
                 'body', 
                 'contact',
                 'state', 
                 'gender',
                 'search',)
        ->where('search', '<>', 'Ninguno')
        ->where('search', 'LIKE', '%'.$musico.'%')
        ->where('gender', 'LIKE', '%'.$genero.'%')
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

          // Query género musical
          $generos = DB::table('grupos')
          ->select('gender')
          ->groupBy('gender')
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
              'generos' => $generos,
              'provincias' => $provincias
          ]);

        // return $request;
    }
            // GRUPOS

            public function grupos(User $user){
                $user_id = $user -> id;
                $grupos = DB::table('grupos')
                ->select('*')
                ->where('user_id', '=', $user_id) 
                ->orderBy('created_at', 'desc')
                ->get();
        
                return view('user/grupos', ['grupos' => $grupos]);
            }
        
            public function grupos_details(Request $id){
                return "patata";
            }
            public function grupos_new_view(){
                return view('user/grupos_new');
            }
            public function grupos_new(Request $resultado, $user_id){
                $nombre = $resultado->nombre;
                $genero = $resultado->genero;
                $musico = $resultado->musico;
                $provincia = $resultado->provincia;
                $contacto = $resultado->contacto;
                $descripcion = $resultado->descripcion;
                
                $grupo = new Grupo;
                $grupo->name = $nombre;
                $grupo->slug = Str::slug($nombre);
                $grupo->contact = $contacto; 
                $grupo->gender = $genero;
                $grupo->state = $provincia;
                $grupo->search = $musico;
                $grupo->body = $descripcion;
                $grupo->user_id = $user_id;
                $grupo->save();
                return redirect()->route('get.user.grupos',[$user_id]);
            }    
            public function grupos_edit_view(Request $id){
                $id = $id->id;
                $resultado = Grupo::get()->where('id', '=', $id);
                return view('user/grupos_edit', ['resultado' => $resultado]);
            }

            public function grupos_edit(Request $resultado, $id, $user_id){
                $nombre = $resultado->nombre;
                $genero = $resultado->genero;
                $musico = $resultado->musico;
                $provincia = $resultado->provincia;
                $contacto = $resultado->contacto;
                $descripcion = $resultado->descripcion;
                
        
                $grupo = Grupo::findOrFail($id); 
                $grupo->name = $nombre;
                $grupo->contact = $contacto; 
                $grupo->gender = $genero;
                $grupo->state = $provincia;
                $grupo->search = $musico;
                $grupo->body = $descripcion;
                $grupo->update();
                return redirect()->route('get.user.grupos',[$user_id]);
            }
            public function grupos_delete(Request $id, $user_id){
                $id = $id->id;
                $resultado = Grupo::get()->where('id', '=', $id)->where('user_id', '=', $user_id);
                $resultado ->each->delete();
                return redirect()->route('get.user.grupos',[$user_id]);
            }
}
