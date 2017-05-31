<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Cliente;
use App\Tienda;
use App\Producto;
use App\Valoracion_pedido;
use App\Pedido;
use \Input as Input;
use Image;


class ValoracionController extends Controller{

    public function valoracionpag($id){
        $pedidos = DB::table('pedido')->where('pedido.id', '=', $id)->distinct()->get();
        return view('valoracion', compact('pedidos'));
    }
    
    public function valoracionnota(Request $req){
        $this->validate($req, [
        			'nota' => 'required|integer|max:10'
        		]);
    	$nota = $req['nota'];
        $motiu = $req['motiu'];
        $id_pedidos = $req['id_pedido'];
        $id_tiendas = DB::table('pedido')->where('id', '=', $id_pedidos)->value('pedido.id_tienda');
        $valoracion = new Valoracion_pedido();
        $valoracion->nota = $nota;
        $valoracion->motivos = $motiu;
        $valoracion->id_pedido = $id_pedidos;
        $valoracion->id_tienda = $id_tiendas;
        $valoracion->save();
        $tiendas = DB::table('users')->join('tienda', 'tienda.id_user', '=', 'users.id')->join('direccion', 'direccion.id_usuario', '=', 'tienda.id_user')->distinct()->get();
        return view('principalcliente', compact('tiendas'));
    }

    public function valoracionpagpedido($id){
        $productos = DB::table('pedido')->where('pedido.id_user', '=', $id)->distinct()->get();
        return view('valoracionpedido', compact('productos'));
    }

    public function valoracionnotapedido(Request $req){
        $nota = $req['nota'];
        $motiu = $req['motiu'];
        $id = $req['id'];
        $valoracion = new Valoracion_pedido();
        $valoracion->nota = $nota;
        $valoracion->motivos = $motiu;
        $valoracion->id_pedido = $id;
        $valoracion->id_tienda = 9999999999;
        $valoracion->save();
        $tiendas = DB::table('users')->join('tienda', 'tienda.id_user', '=', 'users.id')->join('direccion', 'direccion.id_usuario', '=', 'tienda.id_user')->distinct()->get();
        return view('principalcliente', compact('tiendas'));
    }

    public function valoracionestienda($id){
        $valoraciones = DB::table('valoracion_pedido')->join('pedido', 'valoracion_pedido.id_pedido', '=', 'pedido.id')->join('users', 'pedido.id_cliente', '=', 'users.id')->join('cliente', 'users.id', '=', 'cliente.id_user')->where('valoracion_pedido.id_tienda', '=', $id)->distinct()->get();
        return view('valoracionestienda', compact('valoraciones'));
    }


  }