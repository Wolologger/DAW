<?php

namespace App\Http\Controllers;

use App\Models\Compraventa;
use App\Models\Grupo;
use App\Models\Post;
use App\Models\Tutorial;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

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

    public function profile(Request $request){
        $user_id = $request->id;

        $count_compraventa = Compraventa::all()->where('user_id', '=', $user_id)->count();
        $count_posts = Post::all()->where('user_id', '=', $user_id)->count();
        $count_grupos = Grupo::all()->where('user_id', '=', $user_id)->count();
        $count_tutoriales = Tutorial::all()->where('user_id', '=', $user_id)->count();
    
        // return $count_posts;
        return view('user/profile', [
             'count_compraventa' => $count_compraventa,
             'count_posts' => $count_posts,
             'count_grupos' => $count_grupos,
             'count_tutoriales' => $count_tutoriales
        ]);
    }    

        // public function profile_edit(Request $id){
    public function profile_edit_view(){

        return view('user/profile_edit');
    }    

    public function profile_edit(Request $request, $user_id)
    {
        $email = $request->email;
        $nombre = $request->nombre;

        $profile = User::findOrFail($user_id); ;
        $profile->name = $nombre;
        $profile->email = $email;
        $profile->update();

        $count_compraventa = Compraventa::all()->where('user_id', '=', $user_id)->count();
        $count_posts = Post::all()->where('user_id', '=', $user_id)->count();
        $count_grupos = Grupo::all()->where('user_id', '=', $user_id)->count();
        $count_tutoriales = Tutorial::all()->where('user_id', '=', $user_id)->count();

        return redirect()->route('get.profile', [
            'count_compraventa' => $count_compraventa,
            'count_posts' => $count_posts,
            'count_grupos' => $count_grupos,
            'count_tutoriales' => $count_tutoriales
        ]);

    }   
    public function profile_view(Request $id){
        $user_id = $id->user_id;
        $request = User::get()->where('id', '=', $user_id);
        // $car = Car::findOrFail($request->id);
        $count_compraventa = Compraventa::all()->where('user_id', '=', $user_id)->count();
        $count_posts = Post::all()->where('user_id', '=', $user_id)->count();
        $count_grupos = Grupo::all()->where('user_id', '=', $user_id)->count();
        $count_tutoriales = Tutorial::all()->where('user_id', '=', $user_id)->count();
        // return $request;
        // return $request;
        return view('pag/profile_view', [
            'request' => $request,
            'count_compraventa' => $count_compraventa,
            'count_posts' => $count_posts,
            'count_grupos' => $count_grupos,
            'count_tutoriales' => $count_tutoriales       
        ]);

        // return "patata";
    }

}

