@extends('layouts.Master')

@section('title') Carrito @stop

@section('head')
   <script>
       $(document).on("ready", function(){
        $(".cart_quantity_up").on("click", function(e){
           var id = this.id;
           $.ajax({ 
            url: "{{url('increment')}}",
            headers: {'X-CSRF-TOKEN': $("#token").val()},
            type: 'GET',
            datatype: 'json',
            data: {increment: 1, Product_id: id},

            success : function(json) {
            $("#cant"+id).val(json.item.qty);
            $("#subtotal"+id).text("$"+json.item.subtotal);
            $("#total").text("$"+json.total);
            }

           });
        });

        $(".cart_quantity_down").on("click", function(e){
           var id = this.id;
           $.ajax({ 
            url: "{{url('decrease')}}",
            headers: {'X-CSRF-TOKEN': $("#token").val()},
            type: 'GET',
            datatype: 'json',
            data: {decrease: 1, Product_id: id},

            success : function(json) {
            $("#cant"+id).val(json.item.qty);
            $("#subtotal"+id).text("$"+json.item.subtotal);
            $("#total").text("$"+json.total);
            }

           });
        });

         $(".cart_quantity_delete").on("click", function(e){
           var id = this.id;
           $.ajax({ 
            url: "{{url('remove')}}",
            headers: {'X-CSRF-TOKEN': $("#token").val()},
            type: 'GET',
            datatype: 'json',
            data: {Product_id: id},

            success : function(json) {
                if(json == 0){
                    $("#table").remove();
                    $("#comprar").remove();
                    $("#vaciar").remove();
                    $("#total").remove();
                    var html = '<br>'+
                    '<h1 style="text-align: center; font-size: 70px">'+
                    'Actualmente tu carrito esta vacio :(</h1>'+
                    '<br><br><br><br><br><br><br><br><br>';
                    $(".contenido").append(html);
                    
                }else{
                    $("#item"+id).remove();
                    $("#total").text("$"+json);
                }

            }

           });
        });

         $(".cart_destroy").on("click", function(e){
           var id = this.id;
           $.ajax({ 
            url: "{{url('destroy')}}",
            headers: {'X-CSRF-TOKEN': $("#token").val()},
            type: 'GET',
            datatype: 'json',
            data: {Product_id: id},

            success : function(json) {
               $("#table").remove();
               $("#comprar").remove();
               $("#ultimo").remove();
               $("#total").remove();
               //$(".container").load("{{url('carrito')}}");
               var html = '<br><br><br>'+
                '<h1 style="text-align: center; font-size: 70px">'+
                'Actualmente tu carrito esta vacio :(</h1>'+
                '<br><br><br><br><br><br><br><br><br>';
               $(".contenido").append(html);
            }

           });
        });

    });
   </script>
@stop

@section('body')
    <input type="hidden" name="token" id= "token" value="{{ csrf_token() }}">
    <input type="hidden" name="token" id= "token" value="{{ csrf_token() }}">
    <section id="cart_items">
    <div class="container contenido"> <br><br><br>
        @if(count($cart)) <br><br><br>
        <div class="table-responsive cart_info">
            <table class="table table-striped" id="table">
                <thead>
                    <tr class="cart_menu">
                        
                        <td class="description">Producto</td>
                        <td class="price">Precio</td>
                        <td class="quantity">Cantidad</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                    <tr id="item{{$item->id}}">
                        
                        <td class="cart_description">
                            <h4>{{$item->name}}</h4>
                        </td>
                        <td class="cart_price">
                            <p>${{$item->price}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_down btn btn-success"
                                 id="{{$item->id}}" 
                                href="#"> - </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{$item->qty}}" id="cant{{$item->id}}" autocomplete="off" size="2" style="height: 34px">
                                <a class="cart_quantity_up btn btn-success"
                                 id="{{$item->id}}" 
                                href="#"> + </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price" id="subtotal{{$item->id}}">${{$item->subtotal}}</p>
                        </td>

                        <td class="cart_delete">
                            <a class="cart_quantity_delete btn btn-danger" href="#" id="{{$item->id}}"><i class="fa fa-times"></i>Quitar</a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                <br><br><br><br><br><br><br><br>    
                <h1 style="text-align: center; font-size: 70px">Actualmente tu carrito esta vacio :(</h1>
                <br><br><br><br><br><br><br><br><br>
                @endif
                </tbody>
            </table>
        </div>
        @if(count($cart))
        <div class="container">
            <div class="row">
                   <h4><strong><p class="cart_total_price" id="total">Total a pagar: ${{$total}}</p></strong></h4><br>
                    <a href="{{ url('comprar') }}" id="comprar" class="btn btn-success">Comprar</a>
            </div>
        </div><br>
        <div class="container" id="ultimo">
            <div id="total" class="row">
                <a class="cart_destroy btn btn-danger" id="vaciar" href="#">Vaciar Carrito</a><br><br>
            </div>
        </div>
        @endif
        
    </div>
</section> <!--/#cart_items-->
@stop