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
use App\Direccion;
use App\Datos_bancarios;
use DateTime;
use integer;
use \Input as Input;

class PedidoController extends Controller{

	public function carrito(Request $request){
		$carritos = array();
		$precio_total = 0;
		//Consultar los productos de la tienda
		//$myTienda = DB::table('tienda')->where('tienda.id', '=',$request['tienda'] )->value('id_user');
		$productos = DB::table('tienda')->join('producto', 'tienda.id_user', '=', 'producto.id_tienda')->where('producto.id_tienda', '=',$request['tienda'])->distinct()->get();
		//Crear Pedido
		$pedido = new Pedido();
		$pedido->fecha_entrega =  new DateTime();
		$pedido->precio_total = 0;
		$pedido->id_estado = 0;
		$pedido->id_direccion = 0;
		$pedido->pagado = 0;
		$pedido->id_valoracion_pedido = 0;
		$pedido->id_tienda = $request['tienda'];
		$pedido->id_cliente = Auth::user()->id;
		$pedido->save();
		//Por cada producto de la tienda lo asociaremos al pedido
		foreach($productos as $pro){
			//echo $request['prod'.$producto->id];
			if(isset($request['prod'.$pro->id])){
				$l_producto = new Linea_producto();
				$l_producto->id_pedido = $pedido->id;
				$l_producto->id_producto = $pro->id;
		        $l_producto->cantidad = $request['prod'.$pro->id];
				$l_producto->save();
				//Sacar cantidad del stock
				DB::table('producto')->where('producto.id', '=', $pro->id)->update(array('stock' => ($pro->stock)-($request['prod'.$pro->id])));
				//Recalcular precio
				$precio_total += ($request['prod'.$pro->id])*($pro->precio);
			}
		}
		//update en pedido para poner el precio final
		DB::table('pedido')->where('pedido.id', '=', $pedido->id)->update(array('precio_total' => $precio_total));
		//consultamos los datos del pedido para mostrarlos
		$leanprods = DB::table('linea_producto')->where('linea_producto.id_pedido', '=', $pedido->id)->distinct()->get();
		$pedidocarrito = DB::table('pedido')->where('pedido.id', '=', $pedido->id)->distinct()->get();
		$direccionUsu = DB::table('direccion')->where('direccion.id_usuario', '=', Auth::user()->id)->distinct()->get();
		return view('pagpedido', compact('productos', 'leanprods', 'pedidocarrito', 'direccionUsu'));
	}
	public function pago(Request $request){
		//Carga la pagina de pago + guarda datos del pedido
		$direccion = new Direccion();
		$direccion->id_usuario = 0;
		$direccion->id_pais = 0;
		$direccion->id_poblacion = 0;
		$direccion->id_distrito = 0;
		$direccion->cp = $request['cp'];
		$direccion->calle = $request['calle'];
		$direccion->numero_calle = $request['numero_calle'];
		$direccion->piso = $request['piso'];
		$direccion->sugerencias = $request['sugerencias'];
		$direccion->save();
		DB::table('pedido')->where('pedido.id', '=', $request['pedido'])->update(array('id_direccion' => $direccion->id));
		$pedidos=DB::table('pedido')->where('pedido.id', '=', $request['pedido'])->distinct()->get();
		return view('pagpago', compact('pedidos'));
	}
	public function pagar(Request $request){
		//Guardar dato bancario y vincularlo al pedido
		$datos = new Datos_bancarios();
		$datos->numero_cuenta = $request['cuenta'];
		$datos->nombre_titular = $request['titular'];
		$datos->fecha_caducidad = $request['caducidad'];
		$datos->save();
		DB::table('pedido')->where('pedido.id', '=', $request['pedido'])->update(array('pagado' => $datos->id));
		return view('pagoconfirmado');
	}

	public function updaterepartidorpedido(Request $request){
		$id_repartidor = DB::table('users')->join('repartidor', 'repartidor.id_user', '=', 'users.id')->where('nusuario', '=', $request['nusuario'])->value('repartidor.id');
		DB::table('pedido')->where('pedido.id', '=', $request['pedido'])->update(array('id_repartidor' => $id_repartidor));
		return redirect()->back();
	}

	public function nextestado($id){
		$estado = DB::table('pedido')->where('pedido.id', '=', $id)->value('id_estado');
		if($estado==0){DB::table('pedido')->where('pedido.id', '=', $id)->update(array('id_estado' => 1));}
		if($estado==1){DB::table('pedido')->where('pedido.id', '=', $id)->update(array('id_estado' => 2));}
		if($estado==2){DB::table('pedido')->where('pedido.id', '=', $id)->update(array('id_estado' => 3));}
		if($estado==3){DB::table('pedido')->where('pedido.id', '=', $id)->update(array('id_estado' => 4));}
		if($estado==4){DB::table('pedido')->where('pedido.id', '=', $id)->update(array('id_estado' => 5));}
		return redirect()->back();
	}

	public function anular($id){
		DB::table('pedido')->where('pedido.id', '=', $id)->update(array('id_estado' => 6));
		return redirect()->back();
	}

}