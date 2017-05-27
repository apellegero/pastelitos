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
            <div class="col-sm-3">
                <h2 class="featurette-heading">{{$tienda->nombre}}</h2>
                <small style="margin-left: 5px;">{{$tienda->sugerencias}}</small>
            </div>
            <div class="col-sm-3">
                <input type='hidden' name='_token' value='{{ Session::token() }}'>
                <small style="margin-left: 5px;">{{$tienda->calle}}</small>
                <small style="margin-left: 5px;">{{$tienda->numero_calle}}</small>
                <small style="margin-left: 5px;">{{$tienda->piso}}</small>
            </div>
            <div class="col-sm3">
                <a class="btn" href="valoracionpag/{{$tienda->id_user}}" role="button">acceder a valoracion</a>
                <a class="btn" href="vertienda/{{$tienda->id_user}}" role="button">Ver existencias</a>


            </div>


        </div>
        <hr class="featurette-divider">
        @endforeach
        </tbody>
    </table>
</div>
@endsection










