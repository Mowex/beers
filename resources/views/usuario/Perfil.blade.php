@extends('layouts.Master')

@section('title') Perfil @stop

@section('head')
	<style>
		#enviar{
			margin:0 0 0 0;
		}
	</style>
@stop

@section('body')
<br><br><br><br>

	<section class="container">
		<section class="row">
			<div class="panel panel-default col-md-3" >
			  <div class="panel-heading">
			    <h3 class="panel-title" style="text-align: center;">Perfil</h3>
			  </div>
			  <div class="panel-body" style="text-align: center;">
			    <p><strong>{{$usuario->nombre}}</strong></p>
			    <p>Ordenes</p>
			  </div>
			</div>
			
			<div class="panel panel-default col-md-8 col-md-offset-1">
			  <div class="panel-heading">
			    <h3 class="panel-title" style="text-align: center;">Historial</h3>
			  </div>
			  <div class="panel-body">
			    <p>Orden:</p>
			  </div>
			</div>
		</section>
		
		<section class="row">
			<div class="panel panel-default col-md-3" >
			  <div class="panel-heading">
			    <h3 class="panel-title" style="text-align: center;">Información</h3>
			  </div>
			  <div class="panel-body" style="text-align: center;">
			    {!!Form::model($usuario, ['url' => ['perfil', $usuario->id],
				'Method' => 'PUT'])!!}
					{!!Field::text('nombre')!!}
					{!!Field::text('email')!!}
					{!!Form::submit('Guardar', ['class' => 'btn btn-warning', 'id' => 'enviar'])!!}	
			    {!!Form::close([])!!}
			  </div>
			</div>
		</section>

		<section class="row">
			<div class="panel panel-default col-md-3" >
			  <div class="panel-heading">
			    <h3 class="panel-title" style="text-align: center;">Direcciones Guardadas</h3>
			  </div>
			  <div class="panel-body" style="text-align: left;">
			      @foreach ($usuario->lugares as $direccion)
			    	<a href="../editar/lugar/{{base64_encode($direccion->id)}}"><p>{{$direccion->Nombre}}</p></a>
			      @endforeach
			      	<a href="{{ url('agregar/lugar') }}"><p>Agregar</p></a>
			  </div>
			</div>
		</section>

	</section>
@stop