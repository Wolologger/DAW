<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use App\Models\User;
use Illuminate\Support\Str;
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

            // TUTORIALES

            public function tutoriales(User $user){
                $user_id = $user -> id;
                $tutorial = DB::table('tutorials')
                ->select('*')
                ->where('user_id', '=', $user_id) 
                ->orderBy('created_at', 'desc')
                ->get();
        
                if(count($tutorial)<=0){
                    $tutorial = "No se ha encontrado ningún registro";
                }

                return view('user/tutoriales', ['tutoriales' => $tutorial]);
            }
        
            public function tutoriales_details(Request $id){
                $id = $id -> id;
                $tutoriales = DB::table('tutorials')
                ->select('users.name as usuario','type', 'tutorials.id as tutorial_id','tutorials.name as tutorial_name', 'extract', 'body', 'tutorials.created_at')
                ->join('users','tutorials.user_id', '=', 'users.id')
                ->where('tutorials.id', '=', $id) 
                ->get();
        
                return view('pag/tutoriales_details', ['tutoriales' => $tutoriales]);           
            }

            public function tutoriales_new_view(){
                return view('user/tutoriales_new');
            }
            public function tutoriales_new(Request $resultado, $user_id){
                $nombre = $resultado->nombre;
                $tipo = $resultado->tipo;
                $resumen = $resultado->resumen;
                $cuerpo = $resultado->cuerpo;

                $tutorial = new Tutorial;
                $tutorial->name = $nombre;
                $tutorial->slug = Str::slug($nombre);
                $tutorial->type = $tipo;
                $tutorial->extract = $resumen;
                $tutorial->body = $cuerpo;
                $tutorial->user_id = $user_id;
                $tutorial->save();

                return redirect()->route('get.user.tutoriales',[$user_id]);
            }    
            public function tutoriales_edit_view(Request $id){
                $id = $id->id;
                $resultado = Tutorial::get()->where('id', '=', $id);
                return view('user/tutoriales_edit', ['resultado' => $resultado]);
            }
            public function tutoriales_edit(Request $resultado, $id, $user_id){
                $nombre = $resultado->nombre;
                $tipo = $resultado->tipo;
                $resumen = $resultado->resumen;
                $cuerpo = $resultado->cuerpo;

                $tutorial= Tutorial::findOrFail($id);
                $tutorial->name = $nombre;
                $tutorial->type = $tipo;
                $tutorial->extract = $resumen;
                $tutorial->body = $cuerpo;
                $tutorial->update();
                // return $resultado;
                return redirect()->route('get.user.tutoriales',[$user_id]);
            }
            public function tutoriales_delete(Request $id, $user_id){
                $id = $id->id;
                $resultado = Tutorial::get()->where('id', '=', $id)->where('user_id', '=', $user_id);
                $resultado ->each->delete();
                return redirect()->route('get.user.tutoriales',[$user_id]);
            }    



}
