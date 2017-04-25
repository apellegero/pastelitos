@extends('layouts.master')

@section('title')
    perfil cliente
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
                <a class="btn" href="{{ route('editarperfilcliente')}}" role="button">editar perfil</a>
            </div>
        </div>
    </div>
    <hr class="featurette-divider">
@endsection