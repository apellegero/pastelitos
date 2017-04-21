<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Cliente;
use App\Tienda;
use integer;
use \Input as Input;
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
            $tienda = new Tienda();
            $tienda->id_user = $user->id;
            $tienda->nie = $req['nie'];
            $tienda->save();
        }
        if($tipo==3){
            //Repartidor
        }
        Auth::login($user);
        return redirect()->route('pagprincipal');
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
        if(auth::check()) {
            if (Auth::user()->tipo_id == 1) {
                $tiendas = DB::table('users')->join('tienda', 'users.id', '=', 'tienda.id_user')->select('users.id', 'users.nusuario', 'users.nombre', 'users.email', 'users.telefono', 'tienda.nie')->get();

                return view('principalcliente', compact('tiendas'));
            }
            if (Auth::user()->tipo_id == 2) {
                return view('perfiltienda');
            }
            if (Auth::user()->tipo_id == 3) {
                return view('welcome');
            }
        }
        return view('index');
    }
    public function getPagindex(){
        return view('index');
    }
    public function perfilcliente(){
        return view('perfilcliente');
    }
    public function editarperfilcliente(){
        return view('editperfilcliente');
    }
    public function perfiltienda(){
        return view('perfiltienda');
    }
    public function editarperfiltienda(){
        return view('editperfiltienda');
    }
    public function uploadperfil(){

    }
    public function principalcliente()
    {
        $tiendas = DB::table('users')->join('tienda', 'users.id', '=', 'tienda.id_user')->select('users.id', 'users.nusuario', 'users.nombre', 'users.email', 'users.telefono', 'tienda.nie')->get();

        return view('principalcliente', compact('tiendas'));
    }
}