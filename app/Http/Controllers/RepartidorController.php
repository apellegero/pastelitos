<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Cliente;
use App\Tienda;
use App\Repartidor;
use integer;
use \Input as Input;

class RepartidorController extends Controller{
    	public function gestorrepartidores(){
    		$id_tienda = Auth::user()->id;
    		$repartidores = DB::table('users')->join('repartidor', 'users.id', '=', 'repartidor.id_user')->where('repartidor.id_tienda', '=', Auth::user()->id)->select('users.id', 'users.nusuario', 'users.nombre', 'users.email', 'users.telefono','repartidor.apellido')->get();
    		return view('gestorrepartidores', compact('repartidores'));
    	}
    	public function nuevorepartidor(){
    		return view('nuevorepartidor');
    	}
    	public function editarrepartidor($id){
    		$repartidores = DB::table('users')->join('repartidor', 'users.id', '=', 'repartidor.id_user')->where('repartidor.id_user', '=', $id)->distinct()->get();
    		return view('editarrepartidor', compact('repartidores'));
    	}
    	public function updaterepartidor(Request $req){
    		$id = $req['id'];
    		$producto = DB::table('users')->join('repartidor', 'users.id', '=', 'repartidor.id_user')->where('repartidor.id', '=', $id)->update(array('nombre' => $req['nombre'], 'email' => $req['email'], 'telefono' => $req['telefono'], 'apellido' => $req['apellido']));
    		return redirect()->route('gestorrepartidores');
    	}
    	public function eliminarrepartidor($id){
    		DB::table('users')->join('repartidor', 'users.id', '=', 'repartidor.id_user')->where('repartidor.id_user', '=', $id)->delete();
    		return $this->gestorrepartidores();
    	}
}