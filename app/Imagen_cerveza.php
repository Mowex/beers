<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen_cerveza extends Model
{
    protected $table = 'Imagen_cerveza';
    public $timestamps = false;

    protected $fillable = ['Nombre', 'Mime', 'Tamaño', 'Archivo'];

    public function cerveza(){
    	return $this->hasOne('App\Cerveza');
    }
}
