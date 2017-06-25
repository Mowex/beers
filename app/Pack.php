<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    protected $table = 'Pack';
    public $timestamps = false;

    protected $fillable = ['Nombre', 'Precio', 'Cantidad', 'Cerveza_id', 'Imagen_pack_banner_id', 'Imagen_pack_perfil_id'];

    public function imagen_perfil(){
    	return $this->belongsTo('imagen_pack_perfil', 'Imagen_pack_perfil_id');
    }

    public function imagen_banner(){
    	return $this->belongsTo('imagen_pack_banner', 'Imagen_pack_banner_id');
    }

    public function cerveza(){
    	return $this->belongsTo('App\Cerveza', 'Cerveza_id');
    }
}
