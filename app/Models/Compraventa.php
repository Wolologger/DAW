<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compraventa extends Model
{
    use HasFactory;

        // relacion N:1
        public function user(){
            return $this->belongsto(User::class);
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
