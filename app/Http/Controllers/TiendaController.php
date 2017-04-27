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

class TiendaController extends Controller{

	public function vertienda($id){
        $tiendas = DB::table('users')->join('tienda', 'tienda.id_user', '=', 'users.id')->join('direccion', 'direccion.id_usuario', '=', 'tienda.id_user')->where('direccion.id_usuario', '=', $id)->distinct()->get();
        $productos = DB::table('users')->join('producto', 'users.id', '=', 'producto.id_tienda')->where('producto.id_tienda', '=', $id)->distinct()->get();
        return view('vertienda', compact(['tiendas', 'productos']));
	}
	public function perfiltienda(){
        return view('perfiltienda');
    }
    public function editperfiltienda(){
        $id =  Auth::user()->id;
        $tiendas = DB::table('users')->join('tienda', 'users.id', '=', 'tienda.id_user')->where('tienda.id_user', '=', $id)->distinct()->get();
        return view('editperfiltienda',compact('tiendas'));
    }
    public function updatetienda(Request $req){
        $id = $req['id'];
        echo $req;
        $producto = DB::table('users')->where('users.id', '=', $id)->update(array('nombre' => $req['nombre'], 'email' => $req['email'], 'telefono' => $req['telefono']));
        return redirect()->route('perfiltienda');
    }
}