@extends('layouts.master2')

@section('title')
    Tienda
@endsection

@section('content')
@foreach($tiendas as $tienda)
<div class="row">
	<div class="col-md-6">
        <body style='background-color:#E5FDF8'>
		<h2>{{$tienda->nombre}}</h2>
		<img src="../uploads/avatars/{{$tienda->foto}}" style="width: 150px; height: 150px;float: left; margin-right: 25px;">
		<h4>Datos Basicos:</h4>
		<ul class="list-unstyled">
  			<li>{{$tienda->nombre}}</li>
  			<!--<li>Valoración media:{{$tienda->id}}</li>-->
  			<li>{{$tienda->calle}}, {{$tienda->numero_calle}}</li>
  			<li>{{$tienda->telefono}}</li>
  			<li>{{$tienda->email}}</li>
            <li>{{$tienda->id_user}}</li>
		</ul>
		<p>{{$tienda->sugerencias}}</p>
	</div>
	<div class="col-md-6">
		<h2>Valoraciones</h2>
		<p>Consulte la opinion de los clientes que ya han realizado un pedido con esta tienda.</p>
		<a class="btn" href="../valoracionestienda/{{$tienda->id_user}}" role="button">Valoraciones Clientes</a>
	</div>
</div>
<!-- Producto -->
<table class="table table-striped" >
    <thead>
        <tr> 
            <th>#</th> 
            <th>Foto</th> 
            <th>Nombre</th> 
            <th>Descripción</th> 
            <th>Precio</th> 
            <th>Stock</th> 
            <th>Cantidad</th>
        </tr> 
    </thead>
    <tbody>
    <form action="{{route('carrito')}}"  method='post'>
    	<input type='hidden' name='_token' value='{{ Session::token() }}'>
        <input type='hidden' name='tienda' id='tienda' value='{{$tienda->id}}'>
        @endforeach
	    @foreach($productos as $producto)
	    <tr> 
	        <th scope="row"></th>
	        <td style="width: 250px;">
	            <img src="../uploads/products/{{$producto->foto}}" style="width: 100px; height: 100px;">
	        </th>
	        <td>{{$producto->nombre}}</th>
	        <td style="width: 300px;">{{$producto->descripcion}}</th>
	        <td>{{$producto->precio}}</th>
	        <td>{{$producto->stock}}</th>
	        <td>
	        	@if(Auth::user()->tipo_id==1)
	        	<input type="number" name="prod{{$producto->id}}" min="0" max="{{$producto->stock}}" value="0">
	        	@endif
	        </th>
	    </tr>
	    @endforeach 
	    @if(Auth::user()->tipo_id==1)
	    <button type='submit' class="btn btn-info" style="margin-top: 15px;">Pedir</button>
	    @endif
	</form>
    </tbody>
</table>
@endsection