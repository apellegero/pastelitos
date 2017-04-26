@extends('layouts.master')

@section('title')
editar cliente
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
    <div class='col-md-10 col-md-offset-1'>
        <div class='form-group'>
            <img src="uploads/avatars/{{Auth::user()->foto}}" style="width: 150px; height: 150px;float: left; margin-right: 25px;">
            <h2 class="featurette-heading">{{Auth::user()->nombre}}<small style="margin-left: 5px;">{{Auth::user()->nusuario}}</small></h2>
            <form action='{{ route('upload') }}' method='post' enctype='multipart/form-data'>
            <label for='foto'>Foto del cliente</label>
            <input type='file' name='foto' id='foto' value=''>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button type="sumbit" class="pull-right btn btn-sm btn-info">Cambiar</button>
            </form>
        </div>
    </div>
</div>
<hr class="featurette-divider">
@foreach($clientes as $cliente)
<div class='row'>
    <div class='col-md-6 col-md-offset-3'>

        <form action="{{route('updatecliente')}}" method='post'>
            <input type="hidden" name="id" value="{{$cliente->id}}">
            <!--General-->
            <h4>Datos de usuario</h4>
            <div class='form-group'>
                <label for='email'>Email</label>
                <input class='form-control' type='text' name='email' id='email' value='{{$cliente->email}}'>
            </div>

            <h4>Datos personales</h4>
            <div class='form-group'>
                <label for='telefono'>Telefono</label>
                <input class='form-control' type='text' name='telefono' id='telefono'  value='{{$cliente->telefono}}'>
            </div>
            <div class='form-group'>
                <label for='nombre'>Nombre</label>
                <input class='form-control' type='text' name='nombre' id='nombre'  value='{{$cliente->nombre}}'>
            </div>
            <!-- NO TOCAR TOKEN -->
            <input type='hidden' name='_token' value='{{ Session::token() }}'>
            <!--Cliente-->

            <div class='form-group'>
                <label for='apellido'>Apellido</label>
                <input class='form-control' type='text' name='apellido' id='apellido'  value='{{$cliente->apellido}}'>
            </div>
            <input type='hidden' name='_token' value='{{ Session::token() }}'>
            <button type='submit' class='btn btn-info'>Editar</button>
            <hr class="featurette-divider">
    </div>
    @endforeach
</div>
@endsection