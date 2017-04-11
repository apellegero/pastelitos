@extends('layouts.master')

@section('title')
    Inicio pastelitos
@endsection

@section('content')
@if(count($errors) > 0)
    <div class"row">
        <div class='col-md-4 col-md-offset-4'>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
    <div class='row'>
        <div class='col-md-6'>
            <form action='{{ route('singup') }}' method='post'>
                <h3>Sing up</h3>
                <!--General-->
                <h4>Datos usuario</h4>
                <div class='form-group {{ $errors->has('email') ? 'has-error' : ''}}'>
                    <label for='email'>Email</label>
                    <input class='form-control' type='text' name='email' id='email' value='{{ Request::old('email') }}'>
                </div>
                <div class='form-group {{ $errors->has('nusuario') ? 'has-error' : ''}}'>
                    <label for='nusuario'>Nombre Usuario</label>
                    <input class='form-control' type='text' name='nusuario' id='nusuario' value='{{ Request::old('nusuario') }}'>
                </div>
                <div class='form-group {{ $errors->has('password') ? 'has-error' : ''}}'>
                    <label for='email'>Contraseña</label>
                    <input class='form-control' type='password' name='password' id='password' value='{{ Request::old('password') }}'>
                </div>
                <h4>Datos personales</h4>
                <div class='form-group'>
                    <label for='telefono'>Telefono</label>
                    <input class='form-control' type='text' name='telefono' id='telefono' value='{{ Request::old('telefono') }}'>
                </div>
                 <div class='form-group'>
                    <label for='nombre'>Nombre</label>
                    <input class='form-control' type='text' name='nombre' id='nombre' value='{{ Request::old('nombre') }}'>
                </div>
                <input type='hidden' name='_token' value='{{ Session::token() }}'>
                <!--Cliente-->
                <input type='hidden' name='tipo' id='tipo' value='1'>
                <div class='form-group'>
                    <label for='apellido'>Apellido</label>
                    <input class='form-control' type='text' name='apellido' id='apellido' value='{{ Request::old('apellido') }}'>
                </div>
                <div class='form-group'>
                    <label for='fecha_nacimiento'>Fecha Nacimiento</label>
                    <input class='form-control' type='date' name='fecha_nacimiento' id='fecha_nacimiento' value='{{ Request::old('fecha_nacimiento') }}'>
                </div>
                <button type='submit' class='btn btn-primary'>Registrarse</button>
            </form>
        </div>
        <div class='col-md-6'>
            <form action='{{ route('singin') }}' method='post'>
                <h3>Sign in</h3>
                <div class='form-group {{ $errors->has('email') ? 'has-error' : ''}}'>
                    <label for='email'>Email</label>
                    <input class='form-control' type='text' name='email' id='email' value='{{ Request::old('email') }}'>
                </div>
                <div class='form-group {{ $errors->has('password') ? 'has-error' : ''}}'>
                    <label for='email'>Contraseña</label>
                    <input class='form-control' type='password' name='password' id='password'>
                </div>
                <button type='submit' class='btn btn-primary'>Entrar</button>
            </form>
        </div>
    </div>
@endsection