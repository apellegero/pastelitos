<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Cliente;
use App\Tienda;
use App\Producto;
use integer;
use \Input as Input;

class ProductoController extends Controller{

	public function insert(Request $req){
		$producto = new Producto();
		$producto->id_tienda = Auth::user()->id;
		$producto->nombre = $req['nombre'];
		$producto->foto = 'default.jpg';
		$producto->id_categoria= 0;//$req['categoria'];
		$producto->descripcion = $req['descripcion'];
		$producto->stock = $req['stock'];
		$producto->precio = $req['precio'];
		$producto->save();

		return redirect()->route('gestorproductos');
	}

	public function update(Request $req){
		$id = $req['id'];
		$producto = DB::table('producto')->where('producto.id', '=', $id)->update(array('nombre' => $req['nombre'], 'descripcion' => $req['descripcion'], 'stock' => $req['stock'], 'precio' => $req['precio']));
		return redirect()->route('gestorproductos');
	}

	public function delete($id){
		//precio = -1
	}
	//desde el usuario propietario de la tienda
	public function allproductostienda(){
		$id_tienda = Auth::user()->id;
		$productos = DB::table('users')->join('producto', 'users.id', '=', 'producto.id_tienda')->where('producto.id_tienda', '=', Auth::user()->id)->distinct()->get();	
		return view('gestorproductos', compact('productos'));
	}

	public function gestorproductos(){
		$id_tienda = Auth::user()->id;
		$productos = DB::table('users')->join('producto', 'users.id', '=', 'producto.id_tienda')->where('producto.id_tienda', '=', Auth::user()->id)->distinct()->get();	
		return view('gestorproductos', compact('productos'));
	}
	public function editarproducto($id){
		$productos = DB::table('producto')->where('producto.id', '=', $id)->distinct()->get();
		return view('editarproducto', compact('productos'));
	}
	public function nuevoproducto(){
		return view('nuevoproducto');
	}
}