<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Cliente;
use App\Tienda;
use App\Producto;
use App\Valoracion_pedido;
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
        $direcciones =DB::table('direccion')->join('tienda', 'direccion.id_usuario', '=', 'tienda.id_user')->where('tienda.id_user', '=', $id)->distinct()->get();

        return view('editperfiltienda',compact(['tiendas', 'direcciones']));
    }
    public function updatetienda(Request $req){
        $this->validate($req, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'telefono' => 'min:9|integer'
        ]);
        $id = $req['id'];
        echo $req;
        $producto = DB::table('users')->where('users.id', '=', $id)->update(array('nombre' => $req['nombre'], 'email' => $req['email'], 'telefono' => $req['telefono']));
        return redirect()->route('perfiltienda');
    }
    public function updatetiendadireccion(Request $req){
        $this->validate($req, [
            'piso' => 'integer',
            'numero' => 'integer',
            'cp' => 'integer'
        ]);
        $id = $req['id'];
        echo $req;
        $producto = DB::table('direccion')->where('direccion.id_usuario', '=', $id)->update(array('sugerencias' => $req['sugerencias'], 'calle' => $req['calle'], 'piso' => $req['piso'], 'numero_calle' => $req['numero'], 'cp' => $req['cp']));
        return redirect()->route('perfiltienda');
    }
}