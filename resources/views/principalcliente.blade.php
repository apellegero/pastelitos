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
        <body style='background-image:url(../resources/img/297b89bb.png)'>
        @foreach($tiendas as $tienda)
        <div class='row'>
            <div class="col-sm-2">
                <img src="../public/uploads/avatars/{{$tienda->foto}}" style="width: 150px; height: 150px;float: left; margin-right: 25px;">
            </div>
            <div class="col-sm-4">
                <h2>{{$tienda->nombre}}</h2>
                <p>{{$tienda->sugerencias}}</p>
            </div>
            <div class="col-sm-4" style="margin-top: 25px;">
                <p><strong>Dirección: </strong>{{$tienda->calle}} {{$tienda->numero_calle}} {{$tienda->piso}}</p>
            </div>
            <div class="col-sm2"  style="margin-top: 25px;">
                <a class="btn" href="vertienda/{{$tienda->id_user}}" role="button">Ver tienda</a>
            </div>
        </div>
        <hr class="featurette-divider">
        @endforeach
        </tbody>
    </table>
</div>
@endsection










