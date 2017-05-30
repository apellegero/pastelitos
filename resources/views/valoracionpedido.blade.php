@extends('layouts.master')

@section('title')
Sing up
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
@foreach($productos as $producto)
<div class='row'>
    <div class='col-md-6 col-md-offset-3'>
        <div class="input-group">

            <form action="{{route('valoracionnotapedido')}}" method='post'>
                <input type='hidden' id="id" name="id" value='{{$producto->id }}' required>
                <h4>Nota del pedido(Obligatorio)</h4>
                <input type="text" class="form-control" name="nota" id="nota" required>
                <h4>Motivo(obligatorio)</h4>
                <input type="text" class="form-control" name="motiu" id="motiu">
                <input type='hidden' name='_token' value='{{ Session::token() }}'>
                <button type='submit' class='btn btn-info'>aceptar</button>
        </div>
    </div>
    @endforeach
    @endsection
