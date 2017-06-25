<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    protected $table = 'Lugar_envio';
    public $timestamps = false;

    protected $fillable = ['Nombre', 'Calle', 'Numero_ext', 'Numero_int', 'CP', 'Comentarios', 'user_id'];

    public function usuario(){
    	return $this->belongsTo('App\User', 'user_id');
    }
}
