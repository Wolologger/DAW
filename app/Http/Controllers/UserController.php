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

    public function compraventa_edit(Compraventa $compraventa_id){
        // $compraventa_id=User::get();
        // return redirect()->route('user/compraventa');
        return $compraventa_id=Compraventa::get();

    }
    public function compraventa_delete(Request $compraventa){
        $id = $compraventa->id;
        $user_id =  DB::table('compraventas')
        ->select('user_id')
        ->where('id', '=', $id) 
        ->orderBy('created_at', 'desc')
        ->get()
        ->first();
        $resultado = Compraventa::get()->where('id', '=', $id);
        // $resultado -> delete();
        // return $user_id;
        return $resultado;
        // // return redirect()->route('user');
        // return redirect()->route('user/compraventa/'.$user_id);
    }
}
