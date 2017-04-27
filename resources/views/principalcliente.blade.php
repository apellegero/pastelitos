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
            <th>#</th> <th>Foto</th> <th>Nombre</th><th>Mail</th> <th>Telefono</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tiendas as $tienda)
        <tr>
            <th scope="row"></th>
            <td>
            <img src="uploads/avatars/{{$tienda->foto}}" style="width: 50px; height: 50px;float: left; margin-right: 25px;">
            </td>
            <td>
                <a class="btn btn-link" href="vertienda/{{$tienda->id_user}}" role="button">{{$tienda->nombre}}</a>
            </td>
            <td>{{$tienda->email}}</td>
            <td>{{$tienda->telefono}}</td>
            </div>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection










