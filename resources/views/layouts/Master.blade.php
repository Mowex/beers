<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<link href="netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('css/web-estilos.css') }}">
	<link rel="stylesheet" href="{{ asset('css/menu-estilo.css') }}">
	<link rel="stylesheet" href="{{ asset('css/panel-estilos.css') }}">
	
	@yield('head')
</head>
<body>
<script>
  $("#alerta").alert();
  window.setTimeout(function() { $("#alerta").alert('close'); }, 3000);
</script>
	@include('forms.Menu')
	@include('forms.Alerta')
	@yield('body')

	@include('forms.Footer')
</body>
</html>
