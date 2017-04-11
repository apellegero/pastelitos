<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Cliente;

class UserController extends Controller
{

	public function singUp(Request $req){
		//Aquí escollim les diferents validacions del formulari
		$this->validate($req, [
			'email' => 'required|email|unique:users',
			'nusuario' => 'required|unique:users',
			'password' => 'required|min:4'
		]);
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

		//Com User pot ser Client, Repartidor, o Botiga necessitem crear els altres objectes també
		if($tipo==1){
			$cliente = new Cliente();
			$cliente->id_user = $user->id;
			$cliente->apellido = $req['apellido'];
			$cliente->fecha_nacimiento = $req['fecha_nacimiento'];

			$cliente->save();
		}
		if($tipo==2){
		//Tienda
		}
		if($tipo==3){
		//Repartidor
		}

		Auth::login($user);

		return redirect()->back();
	}

	public function singIn(Request $req){

		$this->validate($req, [
			'email' => 'required',
			'password' => 'required'
		]);

		if(Auth::attempt(['email' => $req['email'],'password' => $req['password']])){
			return redirect()->back();
		}
		redirect()->back();
	}

}