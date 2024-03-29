<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        // Añadimos admin y grupo
        'admin',
        'grupo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //Relaciones 1:N

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
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
