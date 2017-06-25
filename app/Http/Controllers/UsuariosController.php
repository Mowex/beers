<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LugarCreateRequest;
use App\Http\Requests\LugarEditRequest;
use App\User;
use App\Lugar;
use Illuminate\Support\Facades\Redirect;

class UsuariosController extends Controller
{
    public function show($Id){
    	$id = base64_decode($Id);
    	$usuario = User::find($id);
    	return view('usuario.Perfil', compact('usuario'));
    }

    public function storePersonal(Request $request, $id){
    	$usuario = User::find($id);
    	$usuario->update($request->all());
    	return redirect::back();
    }

    public function createLugar(){
    	return view('usuario.Lugar');
    }

    public function storeLugar(LugarCreateRequest $request){
    	$data = $request->all();
    	$data['user_id'] = \Auth::user()->id;
    	$direccion = Lugar::create($data);
    	return redirect::action('UsuariosController@show',
    	 [base64_encode(\Auth::user()->id)]);
    	//route('perfil', base64_decode(\Auth::user()->id));
    }

    public function editLugar($Id){
    	$id = base64_decode($Id);
    	$direccion = Lugar::find($id);
    	return view('usuario.EditarLug', compact('direccion'));
    }

    public function updateLugar(LugarEditRequest $request, $id){
    	$data = $request->all();
    	$direccion = Lugar::find($id);
    	$direccion->update($data);
    	return redirect::action('UsuariosController@show',
    	 [base64_encode(\Auth::user()->id)]);
    }
}
