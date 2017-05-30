@extends('layouts.master')

@section('title')
    Sing up tienda
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
                <h4>Datos tienda</h4>
                <input type='hidden' name='_token' value='{{ Session::token() }}'>
                <!--tienda-->
                <div class='form-group'>
                    <label for='nombre'>Nombre</label>
                    <input class='form-control' type='text' name='nombre' id='nombre' value='{{ Request::old('nombre') }}' required>
                </div>
                <div class='form-group'>
                    <label for='telefono'>Telefono</label>
                    <input class='form-control' type='text' name='telefono' id='telefono' value='{{ Request::old('telefono') }}' required>
                </div>
                <input type='hidden' name='tipo' id='tipo' value='2'>
                <div class='form-group'>
                    <label for='nie'>Nie</label>
                    <input class='form-control' type='text' name='nie' id='nie' value='{{ Request::old('nie') }}' required>
                </div>
                <div class='form-group'>
                    <label>Descripción</label>
                    <textarea class="form-control" rows="5" name='sugerencias' id='sugerencias' placeholder="Escribe aquí una descripción para que los clientes la vean." value='{{ Request::old('sugerencias') }}' required></textarea>
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
                <button type='submit' class='btn btn-info'>Sing Up</button>
            </form>
            <hr class="featurette-divider">
        </div>
    </div>
@endsection