<?php

namespace App\Http\Controllers;

use App\Models\Compraventa;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class UserController extends Controller
{
    //


    
    public function index(){
        $user=User::get();
        $compraventa=Compraventa::get();
        // return $user;
        // return view('user/delete');
    }

    public function destroy(User $user){
        $user -> delete();
        return redirect()->route('home');
    }

    public function compraventa(User $user){
        $user_id = $user -> id;
        $compraventa = DB::table('compraventas')
        ->select('*')
        ->where('user_id', '=', $user_id) 
        ->orderBy('created_at', 'desc')
        ->get();

        return view('user/compraventa', ['compraventa' => $compraventa]);
    }

    public function compraventa_new_view(User $user){

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

        // return view('user/compraventa_edit');
        return view('user/compraventa_edit', ['resultado' => $resultado]);

        return $resultado;
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
        // $resultado->update([
        //     'type'=> $tipo,
        //     'brand' => $marca,
        //     'model' => $modelo,
        //     'price' => $precio,
        //     'state' => $provincia,
        //     'state_product' => $estado,
        //     'descripcion' => $descripcion
        // ]);;

        // return $user_id;
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
