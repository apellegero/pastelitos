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
 @foreach($repartidores as $repartidor)
  <div class='row'>
        <div class='col-md-6 col-md-offset-3'>
            <form action='{{ route('updaterepartidor') }}' method='post'>
                <input type="hidden" name="id" value="{{$repartidor->id}}" required>
                <h3>Editar Repartidor</h3>
                <h4>Nombre usuario</h4>
                <div class='form-group {{ $errors->has('email') ? 'has-error' : ''}}'>          
                    <label for='email'>Email</label>
                    <input class='form-control' type='text' name='email' id='email' value='{{$repartidor->email}}' required>
                </div>
                <div class='form-group'>
                <input type="hidden" name="telefono">
                    <label for='telefono'>Telefono</label>
                    <input class='form-control' type='text' name='telefono' id='telefono' value='{{$repartidor->telefono}}' required>
                </div>
                 <div class='form-group'>
                    <label for='nombre'>Nombre</label>
                    <input class='form-control' type='text' name='nombre' id='nombre' value='{{$repartidor->nombre }}' required>
                </div>
                <input type='hidden' name='_token' value='{{ Session::token() }}'>
                <input type='hidden' name='tipo' id='tipo' value='3'>
                <div class='form-group'>
                    <label for='apellido'>Apellido</label>
                    <input class='form-control' type='text' name='apellido' id='apellido' value='{{$repartidor->apellido}}' required>
                </div>
                <button type='submit' class='btn btn-info'>Editar</button>
                <a class='btn btn-danger' href="eliminarrepartidor/{{$repartidor->id}}" role="button">Eliminar</a>
            </form>
            <hr class="featurette-divider">
        </div>
    </div>
    @endforeach
@endsection