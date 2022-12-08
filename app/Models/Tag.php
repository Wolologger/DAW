<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    public function posts(){
        return $this->belongsToMany(Post::class);
    }

    public function tutoriales(){
        return $this->hasMany(Tutorial::class);
    }

    public function grupos(){
        return $this->hasMany(Grupo::class);
    }

    public function compraventa(){
        return $this->hasMany(Compraventa::class);
    }
}
