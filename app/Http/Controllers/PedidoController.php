<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Cliente;
use App\Tienda;
use App\Producto;
use App\Pedido;
use App\Linea_producto;
use DateTime;
use integer;
use \Input as Input;

class PedidoController extends Controller{

public function carrito(Request $request){
	$carritos = array();
	$precio_total = 0;
	//Consultar los productos de la tienda
	$productos = DB::table('users')->join('producto', 'users.id', '=', 'producto.id_tienda')->where('producto.id_tienda', '=',$request['tienda'] )->distinct()->get();
	//Crear Pedido
	$pedido = new Pedido();
	$pedido->fecha_entrega =  new DateTime();
	$pedido->precio_total = 0;
	$pedido->id_estado = 0;
	$pedido->pagado = 0;
	$pedido->id_valoracion_pedido = 0;
	$pedido->id_tienda = $request['tienda'];
	$pedido->id_cliente = Auth::user()->id;
	$pedido->save();
	//Por cada producto de la tienda lo asociaremos al pedido
	foreach($productos as $producto){
		if($request['prod'.$producto->id]!=0){
			$l_producto = new Linea_producto();
			$l_producto->id_pedido = $pedido->id;
			$l_producto->id_producto = $producto->id;
	        $l_producto->cantidad = $request['prod'.$producto->id];
			$l_producto->save();
			//Sacar cantidad del stock
			DB::table('producto')->where('producto.id', '=', $producto->id)->update(array('stock' => ($producto->stock)-($request['prod'.$producto->id])));
			//Recalcular precio
			$precio_total += $request['prod'.$producto->id]*$producto->precio;
			// $carrito = array('nombre' => $producto->nombre, 'cantidad' => $l_producto->cantidad, 'precio_unidad' => $producto->precio, 'precio_bloque' => $request['prod'.$producto->id]*$producto->precio);
			// $carritos += $carrito;
		}
	}
	//update en pedido para poner el precio final
	DB::table('pedido')->where('pedido.id', '=', $pedido->id)->update(array('precio_total' => $precio_total));
	//consultamos los datos del pedido para mostrarlos
	$leanprods = DB::table('linea_producto')->where('linea_producto.id_pedido', '=', $pedido->id)->distinct()->get();

	return view('pagpedido', compact('productos', 'leanprods', 'pedido'));
}

}