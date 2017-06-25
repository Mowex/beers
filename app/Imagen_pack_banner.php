<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen_pack_banner extends Model
{
    protected $table = 'Imagen_pack_banner';
    public $timestamps = false;

    protected $fillable = ['Nombre', 'Mime', 'Tamaño', 'Archivo'];

    public function pack(){
    	return $this->hasOne('App\Pack');
    }
}
