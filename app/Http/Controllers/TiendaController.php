<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Cliente;
use App\Tienda;
use App\Producto;
use App\Pedido;
use App\Valoracion_pedido;
use integer;
use \Input as Input;

class TiendaController extends Controller{
    //Principal Tienda
    public function cargardatospedidos($estado){
                $id_tienda = DB::table('tienda')->where('tienda.id_user', '=', Auth::user()->id)->value('id_user');
                $pendientes = DB::table('users')->join('pedido', 'pedido.id_tienda', '=', 'users.id')->where('pedido.id_tienda', '=',$id_tienda)->where('pedido.id_estado', '=', '0')->count();
                $aceptados = DB::table('users')->join('pedido', 'pedido.id_tienda', '=', 'users.id')->where('pedido.id_tienda', '=',$id_tienda)->where('pedido.id_estado', '=', '1')->count();
                $encursos = DB::table('users')->join('pedido', 'pedido.id_tienda', '=', 'users.id')->where('pedido.id_tienda', '=',$id_tienda)->where('pedido.id_estado', '=', '2')->count();
                $enviados = DB::table('users')->join('pedido', 'pedido.id_tienda', '=', 'users.id')->where('pedido.id_tienda', '=',$id_tienda)->where('pedido.id_estado', '=', '3')->count();
                $pedidos = DB::table('users')->join('pedido', 'pedido.id_tienda', '=', 'users.id')->where('pedido.id_tienda', '=', $id_tienda)->where('pedido.id_estado', '=', $estado)->distinct()->get();
                $direcciones = DB::table('pedido')->join('direccion', 'pedido.id_direccion', '=', 'direccion.id')->where('pedido.id_tienda', '=', $id_tienda)->distinct()->get();
                $lineas = DB::table('linea_producto')->distinct()->get();
                $productos = DB::table('producto')->where('id_tienda', '=', $id_tienda)->distinct()->get();
                $clientes = DB::table('users')->distinct()->get();
                $estados = DB::table('estado')->distinct()->get();
                $repartidores = DB::table('users')->join('repartidor', 'repartidor.id_user', '=', 'users.id')->where('repartidor.id_tienda', '=', $id_tienda)->distinct()->get();
       return view('principaltienda', compact(['pendientes','aceptados','encursos','enviados','pedidos','lineas', 'productos', 'estados', 'direcciones', 'clientes', 'repartidores']));
    }

	public function vertienda($id){
        $tiendas = DB::table('users')->join('tienda', 'tienda.id_user', '=', 'users.id')->join('direccion', 'direccion.id_usuario', '=', 'tienda.id_user')->where('direccion.id_usuario', '=', $id)->distinct()->get();
       $valoraciones = DB::table('users')->join('tienda', 'tienda.id_user', '=', 'users.id')->where('tienda.id', '=', $id)->distinct()->get();
       $productos = DB::table('users')->join('producto', 'users.id', '=', 'producto.id_tienda')->where('producto.id_tienda', '=', $id)->distinct()->get();
        return view('vertienda', compact(['tiendas', 'productos', 'valoraciones']));

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
            'email' => 'required|email',
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