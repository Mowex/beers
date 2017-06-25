<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cerveza extends Model
{
    use SoftDeletes;
    
    protected $table = 'Cerveza';
    public $timestamps = false;
    protected $dates = ['deleted_at'];

    protected $fillable = ['Nombre', 'Origen', 'Presentacion', 'Color', 'Volumen_alcohol', 'Sabor', 'Estilo', 'Temperatura', 'Maridaje', 'Precio', 'Cantidad', 'Imagen_cerveza_id'];

    public function packs(){
    	return $this->hasMany('App\Pack');
    }

    public function imagen(){
    	return $this->belongsTo('App\Imagen_cerveza', 'Imagen_cerveza_id');
    }

    public function ventas(){
    	return $this->belongsToMany('App\Ventas', 'Ventas_id', 'Cerveza_id')->withPivot('id', 'Cantidad', 'Total');
    }

    //query scopes

    public function scopeBusqueda($query, $term){
        $query->where("Nombre", "LIKE", "%$term%");
    }
}
