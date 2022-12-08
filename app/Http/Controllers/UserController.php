<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;

class UserController extends Controller
{
    //


    
    public function index(){
        $user=User::get();
        // return $user;
        // return view('user/delete');
    }

    public function destroy(User $user){
        $user -> delete();
        return redirect()->route('home');
    }
}
