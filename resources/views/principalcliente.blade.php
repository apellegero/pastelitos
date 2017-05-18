@extends('layouts.master')

@section('title')
 pagina perfil tienda
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
<div>
    <div coolspan="2">
    <table class="table table-striped">
        <thead>
       
        </thead>
        <tbody>
        @foreach($tiendas as $tienda)

    <div class='row'>
            <div class="col-sm-3">
                <img src="../public/uploads/avatars/{{$tienda->foto}}" style="width: 150px; height: 150px;float: left; margin-right: 25px;">
            </div>
            <div class="col-sm-6">
                <h2 class="featurette-heading">{{$tienda->nombre}}<small style="margin-left: 5px;">{{$tienda->nusuario}}</small></h2>
                <input type='hidden' name='_token' value='{{ Session::token() }}'>
                <h5>descripcion y direccion</h5>
            </div>
            <div class="col-sm3">

                <a class="btn" href="seleccionartienda/{{$tienda->id}}" role="button">Seleccionar tienda</a>
                <a class="btn" href="{{route('valoracion')}}" role="button">valoracion</a>
            </div>


    </div>
        <hr class="featurette-divider">
        @endforeach
        </tbody>
    </table>
</div>
@endsection










