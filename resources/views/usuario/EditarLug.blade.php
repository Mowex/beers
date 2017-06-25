@extends('layouts.Master')

@section('title') Editar Dirección @stop

@section('head')
	<style>
		#enviar{
			margin-bottom: 10px;
		}
	</style>
@stop

@section('body')
<br>
<br>
<br>
	<section class="container">
		<section class="row">
			<h1>Agregar Dirección</h1>
			{!!Form::model($direccion, ['url' => ['editar/lugar', $direccion->id],
					 'Method' => 'PUT'])!!}
						<section class="col-md-6">
							{!!Field::text('Nombre')!!}
							{!!Field::text('Calle')!!}
							{!!Field::number('Numero_ext')!!}
							{!!Field::number('Numero_int')!!}
						</section>
						<section class="col-md-6">
							{!!Field::number('CP')!!}
							{!!Field::textarea('Comentarios', ['class' => 'descripcion'])!!}
						</section>
							<div class="row">
								<div class="col-md-6 col-md-offset-5">
									<br>{!!Form::submit('Guardar', ['class' => 'btn btn-warning', 'id' => 'enviar'])!!}		
								</div>
							</div>							
					{!!Form::close()!!}
		</section>
	</section>
@stop