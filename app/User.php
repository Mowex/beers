<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'nombre', 'email', 'password', 'Rol_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function lugares(){
        return $this->hasMany('App\lugar');
    }

    public function rol(){
        return $this->belongsTo('App\Rol', 'Rol_id');
    }

    public function ventas(){
        return $this->hasMany('App\Ventas');
    }
}
