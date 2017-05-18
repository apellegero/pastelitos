@extends('layouts.master')

@section('title')
perfil tienda
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
            <form class='col-md-6 col-md-offset-3'>

                </form>
        </div>
    </div>
</div>
<hr class="featurette-divider">
@endsection