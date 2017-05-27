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
        <div class='col-md-10 col-md-offset-1'>
            <div class='form-group'>
                <img src="/pastelitos/public/uploads/products/{{$producto->foto}}" style="width: 150px; height: 150px;float: left; margin-right: 25px;">
                <h2 class="featurette-heading">{{$producto->nombre}}<small style="margin-left: 5px;">{{Auth::user()->nombre}}</small></h2>
                <form action="{{route('uploadproducto')}}" method='post' enctype='multipart/form-data'>
                    <label for='foto'>Foto del producto</label>
                    <input type='file' name='foto' id='foto' value=''>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="id" value="{{$producto->id}}">
                    <button type="sumbit" class="pull-right btn btn-sm btn-info">Cambiar</button>
                </form>
            </div>
        </div>
    </div>
    <hr class="featurette-divider">
    <div class='row'>
        <div class='col-md-6 col-md-offset-3'>
           <form action="{{route('updateproducto')}}" method='post'>
           <input type="hidden" name="id" value="{{$producto->id}}">
                <div class='form-group'>
                    <label for='nombre'>Nombre</label>
                    <input class='form-control' type='text' name='nombre' id='nombre' value='{{$producto->nombre}}' required>
                </div>
                <div class='form-group'>
                    <label>Descripción</label>
                    <textarea class="form-control" rows="5" name='descripcion' id='descripcion' required>{{$producto->descripcion}}</textarea>
                </div>
                <div class='form-group'>
                    <label for='precio'>Precio</label>
                    <div class="input-group">
                    <input type="text" class="form-control" name="precio" id="precio" value='{{$producto->precio}}' required>
                    <div class="input-group-addon">€</div>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='stock'>Stock</label>
                    <input class='form-control' type='text' name='stock' id='stock' value='{{$producto->stock}}' required>
                </div>
                <input type='hidden' name='_token' value='{{ Session::token() }}'>
                <button type='submit' class='btn btn-info'>Editar</button>
            </form>
            <hr class="featurette-divider">
        </div>
    </div>
@endforeach 
@endsection