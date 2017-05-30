@extends('layouts.master')

@section('title')
    Gestor Productos
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
<table class="table table-striped">
    <body style='background-color:#E5FDF8'>
    <thead>
        <tr> 
            <th>#</th> <th>Foto</th> <th>Nombre</th> <th>Descripción</th> <th>Precio</th> <th>Stock</th> <th>Accion</th>
        </tr> 
    </thead>
    <tbody>
    @foreach($productos as $producto)
    <tr> 
        <th scope="row"></th>
        <td style="width: 250px;">
            <img src="uploads/products/{{$producto->foto}}" style="width: 150px; height: 150px;">
        </th>
        <td>{{$producto->nombre}}</th>
        <td style="width: 300px;">{{$producto->descripcion}}</th>
        <td>{{$producto->precio}}</th>
        <td>{{$producto->stock}}</th>
        <td><a class="btn btn-info" href="editarproducto/{{$producto->id}}" role="button">Editar</a><a class="btn btn-danger" href="#" role="button" style="margin-left: 20px;">Eliminar</a></th>
    </tr>
    @endforeach 
    </tbody>
</table>
   
<a class="btn btn-lg btn-info" href="{{ route('nuevoproducto')}}" role="button">Nuevo Producto</a>

        
@endsection










