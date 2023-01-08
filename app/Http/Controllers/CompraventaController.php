<?php

namespace App\Http\Controllers;

use App\Models\Compraventa;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CompraventaController extends Controller
{
    //

        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $compraventa = DB::table('compraventas')
       // Query general
       ->select('id', 
                'type', 
                'brand', 
                'model',
                'price', 
                'state_product', 
                'state')
       ->get();

       // Query provincias
       $provincias = DB::table('compraventas')
       ->select('state')
       ->groupBy('state')
       ->get();

       // Query estado producto
       $estados = DB::table('compraventas')
       ->select('state_product')
       ->groupBy('state_product')
       ->get();

       // Query tipos
       $tipos = DB::table('compraventas')
       ->select('type')
       ->groupBy('type')
       ->get();

       // Query marcas
       $marcas = DB::table('compraventas')
       ->select('brand')
       ->groupBy('brand')
       ->get();

       // Return
        return view('pag/compraventa', [
            'compraventa' => $compraventa, 
            'provincias' => $provincias,
            'estados' => $estados,
            'tipos' => $tipos,
            'marcas' => $marcas
        ]);
    }

    public function filtro(Request $request){
        // $request = $request->name;
        $tipo = $request->tipo;
        $marca = $request->marca;
        $estado = $request->estado;
        $provincia = $request->provincia;

        $compraventa = DB::table('compraventas')
        // Query general
        ->select('id', 
                 'type', 
                 'brand', 
                 'model',
                 'price', 
                 'state_product', 
                 'state', )
        ->where('type', 'LIKE', '%'.$tipo.'%')
        // ->where('brand', 'LIKE', '%'.$marca.'%')
        ->where('brand', 'LIKE', '%'.$marca.'%')
        ->where('state_product', 'LIKE', '%'.$estado.'%')
        ->where('state', 'LIKE', '%'.$provincia.'%')
        ->get();

        $imagenes = DB::table('images')
        ->select('id',
                'imageable_id',
                'imageable_type',
                'url')
        ->where('imageable_type', '=', 'Compraventa')
        ->get();

        // return view('pag/compraventa', [
        //     'compraventa' => $compraventa,]);

        // return $compraventa;
               // Query provincias
       $provincias = DB::table('compraventas')
       ->select('state')
       ->groupBy('state')
       ->get();

       // Query estado producto
       $estados = DB::table('compraventas')
       ->select('state_product')
       ->groupBy('state_product')
       ->get();

       // Query tipos
       $tipos = DB::table('compraventas')
       ->select('type')
       ->groupBy('type')
       ->get();

       // Query marcas
       $marcas = DB::table('compraventas')
       ->select('brand')
       ->groupBy('brand')
       ->get();
       
        return view('pag/compraventa', [
            'compraventa' => $compraventa, 
            'provincias' => $provincias,
            'estados' => $estados,
            'tipos' => $tipos,
            'marcas' => $marcas,
            'imagenes' => $imagenes
        ]);
    }

        // COMPRAVENTA

        public function compraventa(User $user){
            $user_id = $user -> id;
            $compraventa = DB::table('compraventas')
            ->select('*')
            ->where('user_id', '=', $user_id) 
            ->orderBy('created_at', 'desc')
            ->get();

            if ((count($compraventa)) <= 0){
               $compraventa = DB::table('compraventas')
                ->select('id')
                ->where('brand', '=', '#aZIv06H53Zy') 
                ->get();;
            }

            return view('user/compraventa', ['compraventa' => $compraventa]);
        }
    
        public function compraventa_details(Request $id){
            $id = $id -> id;
            $compraventa = DB::table('compraventas')
            ->select('users.name as usuario','users.id as user_id', 'email','price','brand', 'model', 'type', 'descripcion', 'state_product', 'state', 'compraventas.created_at as compraventas_created_at')
            ->join('users','compraventas.user_id', '=', 'users.id')
            ->where('compraventas.id', '=', $id) 
            ->get();

            return view('pag/compraventa_details', ['compraventa' => $compraventa]);

        }
    
        public function compraventa_new_view(){
            
            return view('user/compraventa_new');
        }
    
        public function compraventa_new(Request $resultado, $user_id){
            $tipo = $resultado->tipo;
            $marca = $resultado->marca;
            $modelo = $resultado->modelo;
            $precio = (int)$resultado->precio;
            $provincia = $resultado->provincia;
            $estado = $resultado->estado;
            $descripcion = $resultado->descripcion;
            
            $compraventa = new Compraventa;
            $compraventa->type = $tipo;
            $compraventa->brand = $marca;
            $compraventa->model = $modelo;
            $compraventa->slug = $marca."-".$modelo;
            $compraventa->price = $precio;
            $compraventa->state = $provincia;
            $compraventa->state_product = $estado;
            $compraventa->descripcion = $descripcion;
            $compraventa->user_id = $user_id;
            $compraventa ->save();
    
            return redirect()->route('get.user.compraventa',[$user_id]);
        }
    
    
        public function compraventa_edit_view(Request $id){
            $id = $id->id;
            $resultado = Compraventa::get()->where('id', '=', $id);
            return view('user/compraventa_edit', ['resultado' => $resultado]);
        }
    
        public function compraventa_edit (Request $resultado, $id, $user_id){
            $tipo = $resultado->tipo;
            $marca = $resultado->marca;
            $modelo = $resultado->modelo;
            $precio = (int)$resultado->precio;
            $provincia = $resultado->provincia;
            $estado = $resultado->estado;
            $descripcion = $resultado->descripcion;
            
    
            $compraventa = Compraventa::findOrFail($id); 
            $compraventa->type = $tipo;
            $compraventa->brand = $marca;
            $compraventa->model = $modelo;
            $compraventa->price = $precio;
            $compraventa->state = $provincia;
            $compraventa->state_product = $estado;
            $compraventa->descripcion = $descripcion;
            $compraventa->update();
            return redirect()->route('get.user.compraventa',[$user_id]);
    
        }
        // public function compraventa_delete(Request $request){
        public function compraventa_delete(Request $id, $user_id){
            $id = $id->id;
            $resultado = Compraventa::get()->where('id', '=', $id)->where('user_id', '=', $user_id);
            $resultado ->each->delete();
            return redirect()->route('get.user.compraventa',[$user_id]);
        }
    

}
