@extends('layouts.master')

@section('title')
   Editar Repartidores
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
            
                <!--General
                 1- conseguir pasar informacion de la pagina de gestor a la de editar perfil,
                -->
                <h3>Editar Repartidor</h3>
                <h4>Nombre usuario</h4>
                <div class='form-group {{ $errors->has('email') ? 'has-error' : ''}}'>                
                    <label for='email'>Email</label>
                    <input class='form-control' type='text' name='email' id='email' value='{{ Request::old('email') }}'>
                </div>
                <div class='form-group'>
                <input type="hidden" name="telefono">
                    <label for='telefono'>Telefono</label>
                    <input class='form-control' type='text' name='telefono' id='telefono' value='{{ Request::old('telefono') }}' >
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