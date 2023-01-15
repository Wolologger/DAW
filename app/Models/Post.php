<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;



    // relacion N:1
    public function user(){
        return $this->belongsto(User::class);
    }
    
    public function category(){
        return $this->belongsto(Category::class);
    }

    public function coments(){
        return $this->belongsto(Coments::class);
    }

    // relacion n:m
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }


    // relacion polimorfica 1:1
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }


}

