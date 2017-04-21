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
        <tr>
            <th>#</th> <th>Usuario</th> <th>Nombre</th><th>Mail</th> <th>Telefono</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tiendas as $tienda)
        <tr>
            <th scope="row"></th>

            <td><form action="{{route('perfiltienda')}}" method="post">
                    <input type="hidden" name="nusuario" value="{{$tienda->nusuario}}">
                    <input type="hidden" name="email" value="{{$tienda->email}}">
                    <input type="hidden" name="nombre" value="{{$tienda->nombre}}">
                    <input type="hidden" name="telefono" value="{{$tienda->telefono}}">

                    <input type='hidden' name='_token' value='{{ Session::token() }}'>
                    <button type="submit" class="btn btn-link">{{$tienda->nusuario}}</button>
                </form>
            </td>
            <td>{{$tienda->nombre}}</td><td>{{$tienda->email}}</td><td>{{$tienda->telefono}}</td>
            </div>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection










