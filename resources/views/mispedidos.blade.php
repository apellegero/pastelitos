@extends('layouts.master')

@section('title')
    Principal
@endsection

@section('content')
<h2>Pedidos en curso:</h2>
<table class="table table-striped" style="margin-top: 10px;">
	<tbody>
		@foreach($pedidos as $pedido)
		@if($pedido->id_estado < 5)
		<tr>
		<td>
		<div class="row">
		        <div class="col-lg-3">
		          <h2 style="margin-top: 0px;">Pedido: {{$pedido->id}}</h2>
			        <ol>
			         	@foreach($lineas as $linea)
				         	@foreach($productos as $producto)
				         		@if($linea->id_pedido == $pedido->id)
					         		@if($linea->id_producto == $producto->id)
					         			<li>{{$producto->nombre}} x{{$linea->cantidad}}</li>
					         		@endif
				         		@endif
				         	@endforeach
			         	@endforeach 
			        </ol>
			      <dl class="dl-horizontal">
					  <dt style="width: initial;">Precio total:</dt>
					  <dd style="margin-left: 140px;">{{$pedido->precio_total}}€</dd>
		          </dl>
		        </div>
		        <div class="col-lg-4">
		        <dl class="dl-horizontal">
		        	@foreach($tiendas as $tienda)
						@if($tienda->id == $pedido->id_tienda)
						<dt style="width: initial;">Tienda:</dt>
						  <dd style="margin-left: 140px;">{{$tienda->nombre}}</dd>
						  <dt style="width: initial;">Email:</dt>
						  <dd style="margin-left: 140px;">{{$tienda->email}}</dd>
						  <dt style="width: initial;">Telefono:</dt>
						  <dd style="margin-left: 140px;">{{$tienda->telefono}}</dd>
				 		@endif
				 	@endforeach
				  <dt style="width: initial;">Fecha pedido:</dt>
				  <dd style="margin-left: 140px;">{{$pedido->created_at}}</dd>
				  <dt style="width: initial;">Fecha entrega:</dt>
				  <dd style="margin-left: 140px;">{{$pedido->fecha_entrega}}</dd>
				  @foreach($direcciones as $direccion)
					@if($direccion->id == $pedido->id_direccion)
					  <dt style="width: initial;">Dirección pedido:</dt>
					  <dd style="margin-left: 140px;">{{$direccion->calle}}</dd>
					  <dt style="width: initial;">Piso pedido:</dt>
					  <dd style="margin-left: 140px;">{{$direccion->piso}}</dd>
					  <dt style="width: initial;">CP pedido:</dt>
					  <dd style="margin-left: 140px;">{{$direccion->cp}}</dd>
				  	@endif
				  @endforeach
				</dl>   
		       </div>
		        <div class="col-lg-5">
				@foreach($estados as $estado)
					@if($pedido->id_estado == $estado->numero_estado)
						<h4>Estado Actual: {{$estado->nombre}}</h4>	
					@endif
				@endforeach 	
		        </div>
		 </div>
		 </td>
		 </tr>
		 @endif
		 @endforeach 
	</tbody>	 
 </table>
<h2>Historico de pedidos:</h2>
<p>Agradeciriamos que valores los pedidos para así contribuir a los demas usuarios a realizar una buena compra.</p>
<table class="table table-striped" style="margin-top: 10px;">
	<tbody>
		@foreach($pedidos as $pedido)
		@if($pedido->id_estado>4)
		<tr>
		<td>
		<div class="row">
		        <div class="col-lg-3">
		          <h2 style="margin-top: 0px;">Pedido: {{$pedido->id}}</h2>
			        <ol>
			         	@foreach($lineas as $linea)
				         	@foreach($productos as $producto)
				         		@if($linea->id_pedido == $pedido->id)
					         		@if($linea->id_producto == $producto->id)
					         			<li>{{$producto->nombre}} x{{$linea->cantidad}}</li>
					         		@endif
				         		@endif
				         	@endforeach
			         	@endforeach 
			        </ol>
			      <dl class="dl-horizontal">
					  <dt style="width: initial;">Precio total:</dt>
					  <dd style="margin-left: 140px;">{{$pedido->precio_total}}€</dd>
		          </dl>
		        </div>
		        <div class="col-lg-4">
		        <dl class="dl-horizontal">
		        	@foreach($tiendas as $tienda)
						@if($tienda->id == $pedido->id_tienda)
						<dt style="width: initial;">Tienda:</dt>
						  <dd style="margin-left: 140px;">{{$tienda->nombre}}</dd>
						  <dt style="width: initial;">Email:</dt>
						  <dd style="margin-left: 140px;">{{$tienda->email}}</dd>
						  <dt style="width: initial;">Telefono:</dt>
						  <dd style="margin-left: 140px;">{{$tienda->telefono}}</dd>
				 		@endif
				 	@endforeach
				  <dt style="width: initial;">Fecha pedido:</dt>
				  <dd style="margin-left: 140px;">{{$pedido->created_at}}</dd>
				  <dt style="width: initial;">Fecha entrega:</dt>
				  <dd style="margin-left: 140px;">{{$pedido->fecha_entrega}}</dd>
				  @foreach($direcciones as $direccion)
					@if($direccion->id == $pedido->id_direccion)
					  <dt style="width: initial;">Dirección pedido:</dt>
					  <dd style="margin-left: 140px;">{{$direccion->calle}}</dd>
					  <dt style="width: initial;">Piso pedido:</dt>
					  <dd style="margin-left: 140px;">{{$direccion->piso}}</dd>
					  <dt style="width: initial;">CP pedido:</dt>
					  <dd style="margin-left: 140px;">{{$direccion->cp}}</dd>
				  	@endif
				  @endforeach
				</dl>   
		       </div>
		        <div class="col-lg-5">
				@foreach($estados as $estado)
					@if($pedido->id_estado == $estado->numero_estado)
						<h4>Estado Actual: {{$estado->nombre}}</h4>	
						@if($pedido->id_estado == 5)
							<!-- Si estado es 5 valoracion -->
						@endif
					@endif
				@endforeach
				@foreach($tiendas as $tienda)
					@if($tienda->id == $pedido->id_tienda)
						<!--<p style="margin-top: 10px;">Aun no ha valorado el pedido.</p>-->
						<a class="btn" href="valoracionpag/{{$pedido->id}}" role="button">Valorar</a>
                	@endif
				 @endforeach
		        </div>
		 </div>
		 </td>
		 </tr>
		 @endif
		 @endforeach 
	</tbody>	 
 </table>
@endsection