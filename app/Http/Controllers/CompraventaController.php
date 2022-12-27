<?php

namespace App\Http\Controllers;

use App\Models\Compraventa;
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
                'state', 
                'status')
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
                 'state', 
                 'status')
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

}
