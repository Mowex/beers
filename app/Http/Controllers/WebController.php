<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cerveza;

class WebController extends Controller
{
    public function index(){
    	return view('web.Home');
    }

    public function cervezas(){
    	$cervezas = Cerveza::all();
        $incremento = 1;
    	return view('web.Cervezas', compact('cervezas', 'incremento'));
    }

    public function pack(){
    	return view('web.Pack');
    }

    public function buscar(Request $request){
        if($request->ajax()){
            $termino = $request->all();

            $cervezas = Cerveza::Busqueda($termino['request'])->get();
            $cervezas->toArray();
            $json =  json_encode($cervezas);
            
            return $json;
        }
    }
}
