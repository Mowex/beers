@extends('layouts.Master')

@section('title') Panel Cervezas @stop

@section('body')

<div class="container">
	<div class="row">
		<section role="tabpanel" class="menu-beer">

			<ul class="nav nav-tabs" role="tablist">
			  <li class="active" role ="presentation">
			  <a href="#seccion1" aria-controls="seccion1" 
			  data-toggle="tab" role="tab">Index</a></li>

			  <li role ="presentation">
			  <a href="#seccion2" aria-controls="seccion2" 
			  data-toggle="tab" role="tab">Agregar</a></li>

			</ul>

			<section class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="seccion1">
					<h1>Gráficas de Cervezas</h1>
					<section class="col-md-6">
						<h3>Graficas Semana</h3>	
					</section>
					<section class="col-md-6">
						<h3>Graficas Mes</h3>
					</section>
					
				</div>
						
				<div role="tabpanel" class="tab-pane" id="seccion2">
					<h1>Gráficas Packs</h1>
					<section class="col-md-6">
						<h3>Graficas Semana</h3>	
					</section>
					<section class="col-md-6">
						<h3>Graficas Mes</h3>
					</section>
				</div>
			</section>

		</section>
		
	</div>
</div>


@stop