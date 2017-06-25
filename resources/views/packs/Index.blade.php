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
					<h1>Lista de Packs</h1>
					<div class="tile-body nopadding color greensea">                  
					    <div class="table-responsive">
					      <table  class="table table-datatable table-bordered" id="basicDataTable">
					        
					        <thead>
					          <tr>
					               <th class="sort-alpha">Imagen</th>
					               <th class="sort-alpha">Nombre</th>
					               <th class="sort-alpha">Origen</th>
					               <th class="sort-alpha">Color</th>
					               <th class="sort-alpha">Estilo</th>
					          </tr>
					        </thead>

					        <tbody>
					          
					             <tr class="odd gradeX">
					               <td></td>
					               <td></td>
					               <td></td>
					               <td></td>
					               <td></td>
					             </tr>
					        
					        </tbody>
					      </table>
					    </div>

					  </div>

				</div>
						
				<div role="tabpanel" class="tab-pane" id="seccion2">
					<h1>Agregar Pack</h1>
					{!!Form::open(['url' => 'agregar/cerveza', 'method' => 'POST'])!!}
						<section class="col-md-6">
							{!!Field::text('Nombre')!!}
							{!!Field::file('Imagen_banner')!!}
						</section>
						<section class="col-md-6">
							{!!Field::number('Precio')!!}
							{!!Field::file('Imagen_principal')!!}
						</section>
							<div class="row">
								<div class="col-md-6 col-md-offset-5">
									<br>{!!Form::submit('Agregar al Catalogo', ['class' => 'btn btn-warning'])!!}		
								</div>
							</div>							
					{!!Form::close()!!}
				</div>
			</section>

		</section>
	</div>
</div>


@stop