@extends('layouts.Master')

@section('title') Panel Cervezas @stop

@section('body') <br><br><br>
<section class="container">
	<section class="row">
		<div role="tabpanel" class="tab-pane" id="seccion2">
					<h1>Editar Cerveza</h1>
					{!!Form::model($cerveza, ['url' => ['admin/editar/cerveza', $cerveza->id],
						'files' => true, 'Method' => 'PUT'])!!}
						<section class="col-md-6">
							{!!Field::text('Nombre')!!}
							{!!Field::text('Origen')!!}
							{!!Field::text('Presentacion')!!}
							{!!Field::text('Color')!!}
							{!!Field::text('Sabor')!!}
							{!!Field::textarea('Maridaje', ['class' => 'descripcion'])!!}
						</section>
						<section class="col-md-6">
							{!!Field::text('Estilo')!!}
							{!!Field::text('Temperatura')!!}
							{!!Field::number('Volumen_alcohol')!!}
							{!!Field::number('Precio', ['step' => 'any'])!!}
							{!!Field::number('Cantidad')!!}
							<div class="row">
								<div class="form-group col-md-9">
									{!!Field::file('Imagen')!!}
								</div>
							
							
								<div class="form-group col-md-offset-9">
									<img src="data:image/$cerveza->imagen->Mime;base64,{{chunk_split(base64_encode($cerveza->imagen->Archivo))}}"  width="100%" />
								</div>
							</div>
						</section>
							<div class="row">
								<div class="col-md-6 col-md-offset-5">
									<br>{!!Form::submit('Actualizar Cerveza', ['class' => 'btn btn-warning', 'id' => 'enviar'])!!}		
								</div>
							</div>							
					{!!Form::close()!!}
				</div>
				<br><br><br>	
	</section>
</section>
@stop