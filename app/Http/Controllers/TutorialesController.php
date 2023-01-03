<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use App\Models\User;
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
        
                return view('user/tutoriales', ['tutoriales' => $tutorial]);
            }
        
            public function tutoriales_details(Request $id){
                return "patata";
            }
            public function tutoriales_new_view(Request $id){
                return "patata";
            }
            public function tutoriales_new(Request $id){
                return "patata";
            }    
            public function tutoriales_edit_view(Request $id){
                return "patata";
            }
            public function tutoriales_edit(Request $id){
                return "patata";
            }
            public function tutoriales_delete(Request $id, $user_id){
                $id = $id->id;
                $resultado = Tutorial::get()->where('id', '=', $id)->where('user_id', '=', $user_id);
                $resultado ->each->delete();
                return redirect()->route('get.user.tutoriales',[$user_id]);
            }    



}
