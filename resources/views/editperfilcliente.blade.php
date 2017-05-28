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
        <form action="{{ route('updatecliente') }}" method='post'>
            <input type="hidden" name="id" value="{{$cliente->id}}">
            <!--General-->
            <h4>Datos de usuario</h4>
            <div class='form-group'>
                <label for='email'>Email</label>
                <input class='form-control' type='text' name='email' id='email' value='{{$cliente->email}}' required>
            </div>
            <h4>Datos personales</h4>
            <div class='form-group'>
                <label for='telefono'>Telefono</label>
                <input class='form-control' type='text' name='telefono' id='telefono' value='{{$cliente->telefono}}' required>
            </div>
            <div class='form-group'>
                <label for='nombre'>Nombre</label>
                <input class='form-control' type='text' name='nombre' id='nombre' value='{{$cliente->nombre}}' required>
            </div>
            <!-- NO TOCAR TOKEN -->
            <input type='hidden' name='_token' value='{{ Session::token() }}'>
            <!--Cliente-->


            <button type='submit' class='btn btn-info'>update</button>
        </form>
        @endforeach
        <hr class="featurette-divider">
        @foreach($direcciones as $direccion)
        <form action="{{ route('updateclientedireccion') }}" method='post'>
            <input type="hidden" name="id" value="{{$cliente->id_user}}">
            <!--General-->
            <div class='form-group'>
                <label for='email'>Sugerencias</label>
                <input class='form-control' type='text' name='sugerencias' id='sugerencias' value='{{$direccion->sugerencias}}' required>
            </div>
            <h4>Direccion del usuario</h4>
            <div class='form-group'>
                <label for='email'>Calle</label>
                <input class='form-control' type='text' name='calle' id='calle' value='{{$direccion->calle}}' required>
            </div>

            <div class='form-group'>
                <label for='telefono'>Numero puerta</label>
                <input class='form-control' type='text' name='numero' id='numero' value='{{$direccion->numero_calle}}' required>
            </div>
            <div class='form-group'>
                <label for='nombre'>Piso</label>
                <input class='form-control' type='text' name='piso' id='piso' value='{{$direccion->piso}}' required>
            </div>
            <!-- NO TOCAR TOKEN -->
            <input type='hidden' name='_token' value='{{ Session::token() }}'>
            <!--Cliente-->
            <div class='form-group'>
                <label for='email'>cp</label>
                <input class='form-control' type='text' name='cp' id='cp' value='{{$direccion->cp}}' required>
            </div>

            <button type='submit' class='btn btn-info'>update</button>
        </form>
    </div>
    @endforeach
</div>
@endsection