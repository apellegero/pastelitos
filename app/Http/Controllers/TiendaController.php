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

	public function tienda(){
		return view('tienda');
	}

	//Xavi
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
    public function updatetienda2(Request $req){
        $id = Auth::user()->id;
        $producto = DB::table('users')->where('users.id', '=', $id)->update(array( 'password' => bcrypt($req['password'])));
        return redirect()->route('perfiltienda');
    }
    /*public function principalcliente(){
        $tiendas = DB::table('users')->join('tienda', 'users.id', '=', 'tienda.id_user')->select('users.id', 'users.nusuario', 'users.nombre', 'users.email', 'users.telefono', 'tienda.nie')->get();
		redirect()->back();
	}
    public function seleccionartienda($id){
        $id_tienda = Auth::user()->id;
        $tiendas = DB::table('users')->join('tienda', 'tienda.id_user', '=', 'users.id')->where('tienda.id_user', '=', $id)->distinct()->get();
        echo $tiendas;
        return view('tienda', compact('tiendas'));
    }
    */
}