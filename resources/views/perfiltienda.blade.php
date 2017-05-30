@extends('layouts.master')

@section('title')
    perfil tienda
@endsection

@section('content')

@if(count($errors) > 0)
    <div class"row">
        <div class='col-md-6 col-md-offset-3'>
            <body style='background-color:#E5FDF8'>
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
    <body style='background-color:#E5FDF8'>
    <div class="col-sm-3">
        <img src="../public/uploads/avatars/{{Auth::user()->foto}}" style="width: 150px; height: 150px;float: left; margin-right: 25px;">
    </div>
    <div class="col-sm-3">
        <h2 class="featurette-heading">{{Auth::user()->nombre}}</h2>
        <small style="margin-left: 5px;">{{Auth::user()->nusuario}}</small>
    </div>
    <div class="col-sm-3">
        <input type='hidden' name='_token' value='{{ Session::token() }}'>

        <h4 style="margin-top: 10px; margin-left: 5px;">Telefono: {{Auth::user()->telefono}}</h4>
        <h4 style="margin-top: 10px; margin-left: 5px;">Email: {{Auth::user()->email}}</h4>

    </div>
    <div class="col-sm3">

        <a class="btn" href="{{ route('editperfiltienda')}}" role="button">Editar perfil</a>


    </div>


</div>
    <hr class="featurette-divider">
@endsection