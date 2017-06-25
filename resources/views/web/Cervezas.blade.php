@extends('layouts.Master')

@section('title') Cervezas @stop

@section('head')
	<script>
/*! Main */
jQuery(document).ready(function($) {
  
    // Fixa navbar ao ultrapassa-lo
    var navbar = $('#submenu'),
    		distance = navbar.offset().top,
        $window = $(window);

    $window.scroll(function() {
        if ($window.scrollTop() >= distance) {
            navbar.removeClass('navbar-fixed-top').addClass('navbar-fixed-top');
          	$("body").css("padding-top", "70px");
        } else {
            //navbar.removeClass('navbar-fixed-top');
            $("body").css("padding-top", "0px");
        }
    });

    $("#buscar").on('keyup', function(e){
        var value = $(this).val();
        $.ajax({
		    // la URL para la petición
		    url : "{{ url('buscar') }}",
		 	headers: {'X-CSRF-TOKEN': $("#token").val()},
		    // la información a enviar
		    // (también es posible utilizar una cadena de datos)
		    data : { request : $("#buscar").val(), },
		 
		    // especifica si será una petición POST o GET
		    type : 'GET',
		 
		    // el tipo de información que se espera de respuesta
		    dataType : 'json',
		 
		    // código a ejecutar si la petición es satisfactoria;
		    // la respuesta es pasada como argumento a la función
		    success : function(json) {
		    		$("#cervezas").empty();
		    		if (json.length == 0) {
		    			$("#cervezas").append(
				    '<div class="container">'+
				    	'<div class="class="col-md-3">' +
				    		'<br><br><br><br>'+
				    		'<h1>No existen cervezas con los filtros que seleccionaste, intenta una nueva búsqueda.</h1>'+
				    			'<br><br><br><br><br>'+
				    	'</div>'+
					'</div>');
		    		}else{
		    	$.each(json, function(key, element){
		    		var liga = "cerveza/"+btoa(json[key].id)+"";
		    		var variable = $("#Archivo"+json[key].id).attr('src');
                   $("#cervezas").append(
				    '<div class="col-md-3">'+
				    	'<a href="'+liga+'" id="liga'+json[key].id+'">'+
						'<img src="'+variable+'" width="60%" /></a>'+
						'<p class="p-price ng-binding ng-scope">'+json[key].Precio+' '+ 
		      			'<small class="millilitres ng-binding">'+json[key].Presentacion+
		      			'ml</small></p>'+
		      			'<p class="p-title ng-binding">'+json[key].Nombre+'</p>'+
		      			'<a href="#" class="agregar btn btn-success" id="'+json[key].id+'"value="'+json[key].id+'">Agregar al carrito</a>'+
					'</div>');
                }); //fin each
		      }// fin else
		      	$(".agregar").on("click", function(e){
		            e.preventDefault();
		            var id = this.id;
		           $.ajax({ 
		            url: "{{url('cervezas')}}",
		            headers: {'X-CSRF-TOKEN': $("#token").val()},
		            type: 'POST',
		            datatype: 'json',
		            data: {Product_id: id}
		           });//fin ajax carrito
		        });//fin click boton agregar

		    }, //fin success
		    // código a ejecutar si la petición falla;
		    // son pasados como argumentos a la función
		    // el objeto de la petición en crudo y código de estatus de la petición
		    error : function(xhr, status, p) {
		        console.log('Disculpe, existió un problema '+status+' '+p);
		    },
		 
		    // código a ejecutar sin importar si la petición falló o no
		    complete : function(xhr, status) {
		       //alert('Petición realizada');
		    }
		});
    }); 
    			$(".agregar").on("click", function(e){
		            e.preventDefault();
		            var id = this.id;
		           $.ajax({ 
		            url: "{{url('cervezas')}}",
		            headers: {'X-CSRF-TOKEN': $("#token").val()},
		            type: 'POST',
		            datatype: 'json',
		            data: {Product_id: id}
		           });//fin ajax carrito
		        });//fin click boton agregar   
});


	</script>
@stop

@section('body')
<input type="hidden" name="token" value="{{ csrf_token() }}" id="token">
@include('forms.Submenu')

@foreach ($cervezas as $cerveza)
<input type="hidden" name="cerveza_id" value="{{ $cerveza->id }}" id="{{$incremento++}}">
<img id="Archivo{{$cerveza->id}}" src="data:image/$cerveza->imagen->Mime;base64,{{chunk_split(base64_encode($cerveza->imagen->Archivo))}}"
 class="foto" style="display: none;" />
@endforeach

<div class="container-fluid" id="body-beers">
<!--	<div class="row-fluid">
		<div class="col-md-3" id="novedades">
			<legend>Pack</legend>
			<img src={{ asset('img/sidebar/icon-bottle-blue_x6.png') }}>
			<p>Elige tus 12 cervezas artesanales favoritas</p>
			<legend>Crea</legend>
			<img src={{ asset('img/sidebar/icon-box-blue_x2.png') }} >
			<p>Combínalas como tú quieras y mételas en tu Paquet-Embriagues</p>
			<legend>Recibe</legend>
			<img src={{ asset('img/sidebar/icon-zepelin-blue.png') }}>
			<p>Tendrás la mejor cerveza para disfrutar con quién tú quieras</p>
		</div>
	-->	
		<section id="cervezas">
		@foreach ($cervezas as $cerveza)
			<div class="col-md-3" id="cerveza">
				<a href="cerveza/{{base64_encode($cerveza->id)}}" id="liga{{$cerveza->id}}"><img src="data:image/$cerveza->imagen->Mime;base64,{{chunk_split(base64_encode($cerveza->imagen->Archivo))}}"  width="60%" /></a>
				<p class="p-price ng-binding ng-scope">	{{$cerveza->Precio}} 
      			<small class="millilitres ng-binding">{{$cerveza->Presentacion}}ml</small></p>
      			<p class="p-title ng-binding">{{$cerveza->Nombre}}</p>
      			<a href="#" class="agregar btn btn-success" id="{{$cerveza->id}}"
                value="{{$cerveza->id}}">Agregar al carrito</a>
			</div>
		@endforeach		
		</section>
	</div>
</div>

	

@stop