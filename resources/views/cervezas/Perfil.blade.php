@extends('layouts.Master')

@section('title') Panel Cervezas @stop

@section('body') <br><br><br>

<section class="container">
	<section class="row"><legend>
		<h1>Cerveza <strong>{{$cerveza->Nombre}}</strong></h1></legend>
		<div class="col-md-3">
			<img src="data:image/$cerveza->imagen->Mime;base64,{{chunk_split(base64_encode($cerveza->imagen->Archivo))}}"  width="90%" />
		</div>
		<div class="col-md-5">
			<div class="row">
				<div class="col-md-4">
					<label>Origen:</label>
				</div>
				<div class="col-md-6">
					{{$cerveza->Origen}} <br> <br>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<label><strong>Presentación:</strong></label>
				</div>
				<div class="col-md-6">	
					{{$cerveza->Presentacion}}ml <br> <br>
				</div>	
			</div>

			@if (!empty($cerveza->Color))
			<div class="row">
				<div class="col-md-4">
					<label><strong>Color:</strong></label>
				</div>
				<div class="col-md-6">	
					{{$cerveza->Color}} <br> <br>
				</div>	
			</div>
			@endif
			
			@if (!empty($cerveza->Sabor))
			<div class="row">
				<div class="col-md-4">
					<label><strong>Sabor:</strong></label>
				</div>
				<div class="col-md-6">	
					{{$cerveza->Sabor}} <br> <br>
				</div>	
			</div>
			@endif

			@if (!empty($cerveza->Estilo))
			<div class="row">
				<div class="col-md-4">
					<label><strong>Estilo:</strong></label>
				</div>
				<div class="col-md-6">	
					{{$cerveza->Estilo}} <br> <br>
				</div>	
			</div>
			@endif

			@if (!empty($cerveza->Temperatura))
			<div class="row">
				<div class="col-md-4">
					<label><strong>Temperatura:</strong></label>
				</div>
				<div class="col-md-6">	
					{{$cerveza->Temperatura}}° <br> <br>
				</div>	
			</div>
			@endif
			
			@if (!empty($cerveza->Volumen_alcohol))
			<div class="row">
				<div class="col-md-4">
					<label><strong>Volumen Alc:</strong></label>
				</div>
				<div class="col-md-6">	
					{{$cerveza->Volumen_alcohol}}% <br> <br>
				</div>	
			</div>
			@endif

			@if (!empty($cerveza->Maridaje))
			<div class="row">
				<div class="col-md-4">
					<label><strong>Maridaje:</strong></label>
				</div>
				<div class="col-md-6">	
					{{$cerveza->Maridaje}}
				</div>	
			</div>
			@endif
			
		</div>
	</section>
</section>

@stop