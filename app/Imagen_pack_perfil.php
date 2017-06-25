<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen_pack_perfil extends Model
{
    protected $table = 'Imagen_pack_perfil';
    public $timestamps = false;

    protected $fillable = ['Nombre', 'Mime', 'Tamaño', 'Archivo'];

    public function pack(){
    	retunr $this->hasOne('App\Pack');
    }
}
