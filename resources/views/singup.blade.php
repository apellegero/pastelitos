@extends('layouts.master')

@section('title')
    Sing up
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
                <h4>Datos usuario</h4>
                <div class='form-group {{ $errors->has('email') ? 'has-error' : ''}}'>
                    <label for='email'>Email</label>
                    <input class='form-control' type='text' name='email' id='email' placeholder="ejemplo@gmail.com" value='{{ Request::old('email') }}' required>
                </div>
                <div class='form-group {{ $errors->has('nusuario') ? 'has-error' : ''}}'>
                    <label for='nusuario'>Nombre Usuario</label>
                    <input class='form-control' type='text' name='nusuario' id='nusuario' placeholder="nombre usuario" value='{{ Request::old('nusuario') }}' required>
                </div>
                <div class='form-group {{ $errors->has('password') ? 'has-error' : ''}}'>
                    <label for='email'>Contraseña</label>
                    <input class='form-control' type='password' name='password' id='password' placeholder="*********" value='{{ Request::old('password') }}' required>
                </div>
                <h4>Datos personales</h4>
                <div class='form-group'>
                    <label for='telefono'>Telefono</label>
                    <input class='form-control' type='text' name='telefono' id='telefono' placeholder="932876798" value='{{ Request::old('telefono') }}' required>
                </div>
                 <div class='form-group'>
                    <label for='nombre'>Nombre</label>
                    <input class='form-control' type='text' name='nombre' id='nombre' placeholder="Joan" value='{{ Request::old('nombre') }}' required>
                </div>
                <input type='hidden' name='_token' value='{{ Session::token() }}'>
                <!--Cliente-->
                <input type='hidden' name='tipo' id='tipo' value='1'>
                <div class='form-group'>
                    <label for='apellido'>Apellido</label>
                    <input class='form-control' type='text' name='apellido' id='apellido' placeholder="Gonzalez" value='{{ Request::old('apellido') }}' required>
                </div>
                <div class='form-group'>
                    <label for='fecha_nacimiento'>Fecha Nacimiento</label>
                    <input class='form-control' type='date' name='fecha_nacimiento' id='fecha_nacimiento' value='{{ Request::old('fecha_nacimiento') }}' required>
                </div>
                <h4>Dirección</h4>
                <div class='form-group'>
                    <label for='calle'>Calle</label>
                    <input class='form-control' type='text' name='calle' id='calle' placeholder="C/Passeig de Sant Joan Bosco" value='{{ Request::old('calle') }}' required>
                </div>
                <div class='form-group'>
                    <label for='numero_calle'>Numero</label>
                    <input class='form-control' style="width: 50px;" type='text' placeholder="42" name='numero_calle' id='numero_calle' value='{{ Request::old('numero_calle') }}' required>
                </div>
                <div class='form-group'>
                    <label for='piso'>Piso</label>
                    <input class='form-control' type='text' name='piso' id='piso' placeholder="5 1ra" value='{{ Request::old('piso') }}' required>
                </div>
                <div class='form-group'>
                    <label for='cp'>CP</label>
                    <input class='form-control' style="width: 70px;" type='text' name='cp' id='cp' placeholder="08017" value='{{ Request::old('cp') }}' required>
                </div>
                <div class='form-group'>
                    <label>Sugerencias</label>
                    <textarea class="form-control" rows="5" name='sugerencias' id='sugerencias' placeholder="Aquí puede dar alguna instruccion para cuando el repartidor le traiga uno de los pedidos." value='{{ Request::old('sugerencias') }}' required></textarea>
                </div>
                <button type='submit' class='btn btn-info'>Sing Up</button>
            </form>
            <hr class="featurette-divider">
        </div>
    </div>
@endsection