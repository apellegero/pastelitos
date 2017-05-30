<?php

namespace App\Http\Controllers;

use Validator;
use Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Cliente;
use App\Tienda;
use App\Repartidor;
use App\Direccion;
use App\Pedido;
use integer;
use \Input as Input;

class UserController extends Controller{

	public function singUp(Request $req){
		//Aquí escollim les diferents validacions del formulari
        $validator = Validator::make($req->all(), [
			'email' => 'required|email|unique:users',
			'nusuario' => 'required|unique:users',
			'password' => 'required|min:4',
            'telefono' => 'min:9|integer',
            'numero_calle' => 'integer'
		]);
        if($validator->fails()){
            return Redirect::back()->withInput()->withErrors($validator);
        }else {
            //Recollim les dades directament del formulari
            $email = $req['email'];
            $nusuario = $req['nusuario'];
            $password = bcrypt($req['password']);
            $telefono = $req['telefono'];
            $nombre = $req['nombre'];
            $tipo = $req['tipo'];

            //Creem l'objecte User i les desem
            $user = new User();
            $user->email = $email;
            $user->nusuario = $nusuario;
            $user->password = $password;
            $user->telefono = $telefono;
            $user->nombre = $nombre;
            $user->tipo_id = $tipo;
            $user->save();

            //direccion
            if ($tipo != 3) {
                $direccion = new Direccion();
                $direccion->id_usuario = $user->id;
                $direccion->id_pais = 0;
                $direccion->id_poblacion = 0;
                $direccion->id_distrito = 0;
                $direccion->cp = $req['cp'];
                $direccion->calle = $req['calle'];
                $direccion->numero_calle = $req['numero_calle'];
                $direccion->piso = $req['piso'];
                $direccion->sugerencias = $req['sugerencias'];
                $direccion->save();
            }

            //Com User pot ser Client, Repartidor, o Botiga necessitem crear els altres objectes també
            if ($tipo == 1) {
                $cliente = new Cliente();
                $cliente->id_user = $user->id;
                $cliente->apellido = $req['apellido'];
                $cliente->fecha_nacimiento = $req['fecha_nacimiento'];
                $cliente->save();
            }
            if ($tipo == 2) {
                //Tienda
                $tienda = new Tienda();
                $tienda->id_user = $user->id;
                $tienda->nie = $req['nie'];
                $tienda->save();
            }
            if ($tipo == 3) {
                //Repartidor
                $repartidor = new Repartidor();
                $repartidor->id_user = $user->id;
                $repartidor->id_tienda = Auth::user()->id;
                $repartidor->apellido = $req['apellido'];
                $repartidor->save();
                return redirect()->route('gestorrepartidores');
            }
            Auth::login($user);
            return redirect()->route('pagprincipal');
        }
	}

    public function singIn(Request $req){

		$this->validate($req, [
			'email' => 'required',
			'password' => 'required'
		]);
		if(Auth::attempt(['email' => $req['email'],'password' => $req['password']])){
			return redirect()->route('pagprincipal');
		}
		redirect()->back();
	}

	public function logout(){
		Auth::logout();
		return view('index');
	}

	public function getPagSingUp(){
		return view('singup');
	}
	public function getPagSingUpTienda(){
		return view('singuptienda');
	}
	public function getPagPrincipal(){
		//por tipo de usuario
		if(Auth::check()){
			if(Auth::user()->tipo_id==1){
                $tiendas = DB::table('users')->join('tienda', 'tienda.id_user', '=', 'users.id')->join('direccion', 'direccion.id_usuario', '=', 'tienda.id_user')->distinct()->get();
                return view('principalcliente', compact('tiendas'));
            }
            if (Auth::user()->tipo_id == 2) {
 				$id_tienda = DB::table('tienda')->where('tienda.id_user', '=', Auth::user()->id)->value('id_user');
                $pendientes = DB::table('users')->join('pedido', 'pedido.id_tienda', '=', 'users.id')->where('pedido.id_tienda', '=',$id_tienda)->where('pedido.id_estado', '=', '0')->count();
                $aceptados = DB::table('users')->join('pedido', 'pedido.id_tienda', '=', 'users.id')->where('pedido.id_tienda', '=',$id_tienda)->where('pedido.id_estado', '=', '1')->count();
                $encursos = DB::table('users')->join('pedido', 'pedido.id_tienda', '=', 'users.id')->where('pedido.id_tienda', '=',$id_tienda)->where('pedido.id_estado', '=', '2')->count();
                $enviados = DB::table('users')->join('pedido', 'pedido.id_tienda', '=', 'users.id')->where('pedido.id_tienda', '=',$id_tienda)->where('pedido.id_estado', '=', '3')->count();
                $pedidos = DB::table('users')->join('pedido', 'pedido.id_tienda', '=', 'users.id')->where('pedido.id_tienda', '=', $id_tienda) ->whereIn('id_estado', [0, 1, 2, 3])->distinct()->get();
                $direcciones = DB::table('pedido')->join('direccion', 'pedido.id_direccion', '=', 'direccion.id')->where('pedido.id_tienda', '=', $id_tienda)->distinct()->get();
                $lineas = DB::table('linea_producto')->distinct()->get();
                $productos = DB::table('producto')->where('id_tienda', '=', $id_tienda)->distinct()->get();
                $clientes = DB::table('users')->distinct()->get();
                $estados = DB::table('estado')->distinct()->get();
                $repartidores = DB::table('users')->join('repartidor', 'repartidor.id_user', '=', 'users.id')->where('repartidor.id_tienda', '=', $id_tienda)->distinct()->get();
        		return view('principaltienda', compact(['pendientes','aceptados','encursos','enviados','pedidos','lineas', 'productos', 'estados', 'direcciones', 'clientes', 'repartidores']));
            }
            if (Auth::user()->tipo_id == 3) {
            	$id_repartidor = DB::table('repartidor')->where('repartidor.id_user', '=', Auth::user()->id)->value('repartidor.id');
                $pedidos = DB::table('repartidor')->join('pedido', 'pedido.id_repartidor', '=', 'repartidor.id')->where('pedido.id_repartidor', '=', $id_repartidor)->whereIn('id_estado', [4])->distinct()->get();
                $direcciones = DB::table('pedido')->join('direccion', 'pedido.id_direccion', '=', 'direccion.id')->where('pedido.id_repartidor', '=', $id_repartidor)->distinct()->get();
                $clientes = DB::table('users')->join('cliente', 'cliente.id_user', '=', 'users.id')->distinct()->get();
                return view('principalrepartidor', compact(['pedidos', 'direcciones', 'clientes']));
            }
        }
        return view('index');
    }
    public function getPagindex(){
        return view('index');
    }

	public function uploadperfil(Request $req){
    		$this->validate($req, [
    			'email' => 'required|email|unique:users',
    			'nusuario' => 'required|unique:users',
    			'password' => 'required|min:4'
            ]);
                $tiendas = DB::table('users')->join('tienda', 'tienda.id_user', '=', 'users.id')->join('direccion', 'direccion.id_usuario', '=', 'tienda.id_user')->distinct()->get();

                return view('principalcliente', compact(['tiendas']));

            if (Auth::user()->tipo_id == 2) {
                return view('perfiltienda');
            }
            if (Auth::user()->tipo_id == 3) {
                return view('gestorrepartidores');
            }

        return view('index');
    }
}