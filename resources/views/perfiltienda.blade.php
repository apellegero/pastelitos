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
        <h2>{{Auth::user()->nombre}}</h2>
        <p>{{Auth::user()->nusuario}}</p>
    </div>
    <div class="col-sm-3" style="margin-top: 25px;">
        <input type='hidden' name='_token' value='{{ Session::token() }}'>

        <p><strong>Telefono: </strong>{{Auth::user()->telefono}}</p>
        <p><strong>Email: </strong>{{Auth::user()->email}}</p>

    </div>
    <div class="col-sm3" style="margin-top: 25px;">

        <a class="btn" href="{{ route('editperfiltienda')}}" role="button">Editar perfil</a>


    </div>


</div>
    <hr class="featurette-divider">
@endsection