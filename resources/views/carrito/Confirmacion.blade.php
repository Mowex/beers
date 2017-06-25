@extends('layouts.Master')
@section('title') Confirmacion Compra @stop

@section('body')
    <br><br><br><br><br><br><br><br>    
     <h1 style="text-align: center; font-size: 50px">En hora Buena Haz Realizado tu primer pedido :D <br><br>
     Para mas detalles revisa la sección <br> "Mis Pedidos" <br>
     en tu <a href="{{ url ('perfil', base64_encode(Auth::user()->id) ) }}">perfil</a> de usuario</h1>
    <br><br><br><br><br><br><br>
@stop