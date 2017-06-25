<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $table = 'Ventas';
    public $timestamps = false;

    protected $fillable = ['user_id', 'Fecha'];

    public function usuario(){
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function cervezas(){
    	return $this->belongsToMany('App\Cerveza', 'Ventas_id', 'Cerveza_id')->withPivot('id', 'Cantidad', 'Total');
    }
}
