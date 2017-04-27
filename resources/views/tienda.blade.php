@extends('layouts.master')

@section('title')
    Tienda
@endsection

@section('content')
<div class="row">
	<div class="col-md-6">
		<h4>Botiga</h4>
		<img src="uploads/avatars/{{Auth::user()->foto}}" style="width: 150px; height: 150px;float: left; margin-right: 25px;">
		<p>Dades basicas</p>
	</div>
	<div class="col-md-6">
		<h4>Carrito</h4>
		<ul>
		  <li>producto....cantidad...precio</li>
		</ul>
	</div>
</div>
<!--
<table class="table table-striped">
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
</table>-->
@endsection