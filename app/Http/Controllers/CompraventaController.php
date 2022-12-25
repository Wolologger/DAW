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
       // $compraventa = Compraventa::all();
       $compraventa = DB::table('compraventas')
       ->select('id', 
                'type', 
                'brand', 
                'model',
                'price', 
                'state_product', 
                'state', 
                'status')
       ->get();
        return view('pag/compraventa', ['compraventa' => $compraventa]);
    }
}
