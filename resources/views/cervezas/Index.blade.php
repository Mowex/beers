@extends('layouts.Master')

@section('title') Panel Cervezas @stop

@section('head')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css">
<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $("#basicDataTable").DataTable({
    	/*"language": {
            "lengthMenu": "Mostrar _MENU_ resultados por página",
            "zeroRecords": "Sin Resultados",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay Datos disponibles",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Buscar:",
        },*/
        "order": [],
        "oLanguage": {
         "sLengthMenu": 'Mostrar '+
          '<select>'+
          '<option value="5">5</option>'+
          '<option value="10">10</option>'+
          '<option value="25">25</option>'+
          '<option value="50">50</option>'+
         '</select>'+
          ' resultados por página',
          "sZeroRecords": "Sin Resultados",
            "sInfo": "Página _PAGE_ de _PAGES_",
            "sInfoEmpty": "No hay Datos disponibles",
            "sInfoFiltered": "(filtered from _MAX_ total records)",
            "sSearch": "Buscar:",
            	"oPaginate": {
           		"sPrevious": "Anterior",
           		"sNext": "Siguiente",
         		},
       },
    });
});
</script>

<style>
	.boton{
		margin-top: 25px;
	}

	#basicDataTable{
		text-align: center;
	}
</style>

<script type="text/javascript">
$(document).on('ready', function(){
	$('#myTab a').click(function(e) {
	  e.preventDefault();
	  $(this).tab('show');
	});

/*	// store the currently selected tab in the hash value
	$("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
	  var id = $(e.target).attr("href").substr(1);
	  window.location.hash = id;
	});*/ //comentado para que no se mueva la vista al cambiar pestaña

	// on load of the page: switch to the currently selected tab
	var hash = window.location.hash;
	$('#myTab a[href="' + hash + '"]').tab('show');

	$(function() { 
    // for bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        // save the latest tab; use cookies if you like 'em better:
        localStorage.setItem('lastTab', $(this).attr('href'));
    });

    // go to the latest tab, if it exists:
    var lastTab = localStorage.getItem('lastTab');
    if (lastTab) {
        $('[href="' + lastTab + '"]').tab('show');
    }
	});
});
	
</script>
@stop

@section('body')
<div class="container">
	<div class="row">
		<section role="tabpanel" class="menu-beer">

			<ul class="nav nav-tabs" role="tablist" id="myTab">
			  <li class="active" role ="presentation">
			  <a href="#seccion1" aria-controls="seccion1" 
			  data-toggle="tab" role="tab">Index</a></li>

			  <li role ="presentation">
			  <a href="#seccion2" aria-controls="seccion2" 
			  data-toggle="tab" role="tab">Agregar</a></li>

			</ul>

			<section class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="seccion1">
					<h1>Lista de Cervezas</h1>
					
					<div class="tile-body nopadding color greensea">                  
					    <div class="table-responsive">
					      <table  class="table table-datatable table-bordered" id="basicDataTable">
					        
					        <thead>
					          <tr>
					               <th class="sort-alpha">Imagen</th>
					               <th class="sort-alpha">Nombre</th>
					               <th class="sort-alpha">Origen</th>
					               <th class="sort-alpha">Presentacion</th>
					               <th class="sort-alpha">Precio</th>
					               <th class="sort-alpha">Cantidad</th>
					               <th class="sort-alpha">Administrar</th>
					          </tr>
					        </thead>

					        <tbody>
					          @foreach ($cervezas as $cerveza)
					             <tr class="odd gradeX">
					               <td style="width: 100px;"><img src="data:image/$cerveza->imagen->Mime;base64,{{chunk_split(base64_encode($cerveza->imagen->Archivo))}}"  width="100%" /></td>
					               <td>{{$cerveza->Nombre}}</td>
					               <td>{{$cerveza->Origen}}</td>
					               <td>{{$cerveza->Presentacion}}ml</td>
					               <td>${{$cerveza->Precio}}</td>
					               <td>{{$cerveza->Cantidad}}</td>
					               <td><a href="editar/cerveza/{{base64_encode($cerveza->id)}}" class="btn btn-success">Editar</a>
					               <a href="borrar/cerveza/{{base64_encode($cerveza->id)}}" class="btn btn-danger">Eliminar</a></td>
					             </tr>
					          @endforeach	
					        </tbody>
					      </table>
					    </div>

					  </div>

				</div>
						
				<div role="tabpanel" class="tab-pane" id="seccion2">
					<h1>Agregar Cerveza</h1>
					{!!Form::open(['url' => 'agregar/cerveza','files' => true, 'method' => 'POST'])!!}
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
							{!!Field::file('Imagen')!!}
						</section>
							<div class="row">
								<div class="col-md-6 col-md-offset-5">
									<br>{!!Form::submit('Agregar al Catalogo', ['class' => 'btn btn-warning', 'id' => 'enviar'])!!}		
								</div>
							</div>							
					{!!Form::close()!!}
				</div>
			</section>

		</section>
	</div>
</div>


@stop