@extends('layouts.master')

@section('nuevorepartidor')
    Gestor Repartidores
@endsection

@section('content')
@if(count($errors) > 0)
    <div class"row">
        <div class='col-md-6 col-md-offset-3'>
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
  <div class='row'>
        <div class='col-md-6 col-md-offset-3'>
            <form action='{{ route('singup') }}' method='post'>
                <!--General-->
                <h3>Nuevo Repartidor</h3>
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
                <!--Repartidor-->
                <input type='hidden' name='tipo' id='tipo' value='3'>
                <div class='form-group'>
                    <label for='apellido'>Apellido</label>
                    <input class='form-control' type='text' name='apellido' id='apellido' value='{{ Request::old('apellido') }}'>
                </div>
                <button type='submit' class='btn btn-info'>Sing Up</button>
            </form>
            <hr class="featurette-divider">
        </div>
    </div>
@endsection