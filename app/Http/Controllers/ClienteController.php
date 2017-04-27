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
        $id = Auth::user()->id;
        echo $req;
        $producto = DB::table('users')->where('users.id', '=', $id)->update(array('nombre' => $req['nombre'], 'email' => $req['email'], 'telefono' => $req['telefono']));
        echo $producto;
        return redirect()->route('perfilcliente');
    }
    public function perfilcliente(){
        return view('perfilcliente');
    }
    public function editperfilcliente(){
        $id =  Auth::user()->id;
        $clientes = DB::table('users')->join('cliente', 'users.id', '=', 'cliente.id_user')->where('cliente.id_user', '=', $id)->distinct()->get();
        return view('editperfilcliente',compact('clientes'));
    }
}