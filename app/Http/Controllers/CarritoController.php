<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cerveza;
use App\Ventas;
use Carbon\Carbon;

class CarritoController extends Controller
{
    public function show(){
    	$cart = \Cart::content();
    	$total = \Cart::total();
    	return view('carrito.Car', compact('cart', 'total'));
    }

    public function add(Request $request){
    	if($request->ajax()){
	    	$data = $request->all();
	    	
	    	$product_id = $data['Product_id'];
	        $product = Cerveza::find($product_id);
	        \Cart::add(['id' => $product_id, 'name' => $product->Nombre, 'qty' => 1,
	        	'price' => $product->Precio]);
	      	$cart = \Cart::content();
 	   }
    }

    public function increment(Request $request){

    	$data = $request->all();
      	if ($data['increment'] == 1) {
        $rowId = \Cart::search(array('id' => $data['Product_id']));
        $item = \Cart::get($rowId[0]);

        \Cart::update($rowId[0], $item->qty + 1);
    	}
    	
    	$data = [
    		'item' => $item,
    		'total' => \Cart::total()
    	];
    	return $data;
  	}

  	public function decrease(Request $request){

  		$data = $request->all();
    	if ($data['decrease'] == 1) {
        $rowId = \Cart::search(array('id' => $data['Product_id']));
        $item = \Cart::get($rowId[0]);

        \Cart::update($rowId[0], $item->qty - 1);
    	}
    	$data = [
    		'item' => $item,
    		'total' => \Cart::total()
    	];
   		return $data; 	    	
  	}

  	public function remove(Request $request){
  		$data = $request->all();
  		$rowId = \Cart::search(array('id' => $data['Product_id']));
      	\Cart::remove($rowId[0]);
      	$total = \Cart::total();
      	return $total;
  	}

  	public function destroy(Request $request){
  		\Cart::destroy();
  	}

    public function comprar(){
      /*$venta = new Venta();
      $venta->fecha = \Carbon::now();*/
      return view('carrito.Confirmacion');
    }
}
