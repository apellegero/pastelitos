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

class ClienteController extends Controller{
    /*
    public function principalcliente(){
        $tiendas = DB::table('users')->join('tienda', 'users.id', '=', 'tienda.id_user')->select('users.id', 'users.nusuario', 'users.nombre', 'users.email', 'users.telefono', 'tienda.nie')->get();
        return view('principalcliente', compact('tiendas'));
    }
    */
    public function updatecliente(Request $req){
        $this->validate($req, [
            'email' => 'required|email',
            'telefono' => 'min:9|integer'
        ]);
        $id = Auth::user()->id;

        $producto = DB::table('users')->where('users.id', '=', $id)->update(array('nombre' => $req['nombre'], 'email' => $req['email'], 'telefono' => $req['telefono']));

        return redirect()->route('perfilcliente');
    }
    public function perfilcliente(){
        return view('perfilcliente');
    }
    public function editperfilcliente(){
        $id =  Auth::user()->id;

        $clientes = DB::table('users')->join('cliente', 'users.id', '=', 'cliente.id_user')->where('cliente.id_user', '=', $id)->distinct()->get();
        $direcciones =DB::table('direccion')->join('cliente', 'direccion.id_usuario', '=', 'cliente.id_user')->where('cliente.id_user', '=', $id)->distinct()->get();

        return view('editperfilcliente',compact(['clientes', 'direcciones']));
    }
    public function updateclientedireccion(Request $req){
        $this->validate($req, [
            'piso' => 'integer',
            'numero' => 'integer',
            'cp' => 'integer'
        ]);
        $id = $req['id'];

        $producto = DB::table('direccion')->where('direccion.id_usuario', '=', $id)->update(array('sugerencias' => $req['sugerencias'], 'calle' => $req['calle'], 'piso' => $req['piso'], 'numero_calle' => $req['numero'], 'cp' => $req['cp']));
        return redirect()->route('perfilcliente');
    }
     public function mispedidos(){
            $id = Auth::user()->id;
            $pedidos = DB::table('users')->join('pedido', 'pedido.id_cliente', '=', 'users.id')->where('pedido.id_cliente', '=', $id)->distinct()->get();
            $direcciones = DB::table('pedido')->join('direccion', 'pedido.id_direccion', '=', 'direccion.id')->where('pedido.id_cliente', '=', $id)->distinct()->get();
            $lineas = DB::table('linea_producto')->distinct()->get();
            $productos = DB::table('producto')->distinct()->get();
            $tiendas = DB::table('users')->distinct()->get();
            $estados = DB::table('estado')->distinct()->get();
            $valoracion_pedidos = DB::table('valoracion_pedido')->distinct()->get();
            return view('mispedidos', compact(['pedidos','lineas', 'productos', 'estados', 'direcciones', 'tiendas' , 'valoracion_pedidos']));
        }
}