<?php
use App\User;

Route::get('/', function () {
/*
	User::create([
		'nombre' => 'Victor Zapata',
		'email' => 'mowex@hotmail.com',
		'password' => bcrypt('ultralisk'),
		'Rol_id' => 1
		]);
*/
    return redirect('home');
});

Route::group(['middleware' => ['web']], function () {
    Route::get('home', 'WebController@index');
    Route::get('cervezas', 'WebController@cervezas');
    Route::get('paquet-embriagues', 'WebController@pack');
    Route::get('buscar', 'WebController@buscar');

    Route::post('cervezas', 'CarritoController@add');
    Route::get('carrito', 'CarritoController@show');
    Route::get('increment', 'CarritoController@increment');
    Route::get('decrease', 'CarritoController@decrease');
    Route::get('remove', 'CarritoController@remove');
    Route::get('destroy', 'CarritoController@destroy');
    Route::get('comprar', 'CarritoController@comprar');

    Route::get('perfil/{id}', 'UsuariosController@show');
    Route::post('perfil/{id}', 'UsuariosController@storePersonal');
    Route::get('agregar/lugar', 'UsuariosController@createLugar');
    Route::post('agregar/lugar', 'UsuariosController@storeLugar');
    Route::get('editar/lugar/{id}', 'UsuariosController@editLugar');
    Route::post('editar/lugar/{id}', 'UsuariosController@updateLugar');

    //Route::post('buscar', 'WebController@buscar');

    Route::get('admin/cervezas', 'CervezasController@index');
    Route::post('agregar/cerveza', 'CervezasController@store');
    Route::get('admin/editar/cerveza/{id}', 'CervezasController@edit');
    Route::post('admin/editar/cerveza/{id}', 'CervezasController@update');
    Route::get('admin/borrar/cerveza/{id}', 'CervezasController@destroy');
    Route::get('cerveza/{id}', 'CervezasController@show');

    Route::get('admin/packs', 'PacksController@index');

    Route::get('admin/reportes', 'ReportesController@index');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    //Route::get('/home', 'HomeController@index');
});
