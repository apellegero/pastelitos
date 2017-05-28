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
    <div class='row'>
        <div class='col-md-6 col-md-offset-3'>
            <form action='{{ route('insertproducto') }}' method='post'>
                <!--General-->
                <h4>Nuevo producto</h4>
                <div class='form-group'>
                    <label for='nombre'>Nombre</label>
                    <input class='form-control' type='text' name='nombre' id='nombre' value='{{ Request::old('nombre')}}' required>
                </div>
                <!--
                <label style="margin: 0px 5px;">Categoria:</label>
                <select class="form-control" style="margin: 0px 5px; width: 150px; display: inline;">
                    <option selected="selected"></option>
                    <option>none</option>
                </select>
                -->
                <div class='form-group'>
                    <label>Descripción</label>
                    <textarea class="form-control" rows="5" name='descripcion' id='descripcion' value='{{ Request::old('descripcion') }}' required></textarea>
                </div>
                <div class='form-group'>
                    <label for='precio'>Precio</label>
                    <div class="input-group">
                    <input type="text" class="form-control" name="precio" id="precio" value='{{ Request::old('precio') }}' required>
                    <div class="input-group-addon">€</div>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='stock'>Stock</label>
                    <input class='form-control' type='text' name='stock' id='stock' value='{{ Request::old('stock') }}' required>
                </div>
                <input type='hidden' name='_token' value='{{ Session::token() }}'>
                <button type='submit' class='btn btn-info'>Crear</button>
            </form>
            <hr class="featurette-divider">
        </div>
    </div>
@endsection