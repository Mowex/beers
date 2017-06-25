<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'catrol';
    public $timestamps = false;

    public function usuarios(){
    	return $this->hasMany('App\User');
    }
}
