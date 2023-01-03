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

    public function profile(){
        return view('user/profile');
    }    

        // public function profile_edit(Request $id){
    public function profile_edit(){
        return view('user/profile_edit');
    }    
}

