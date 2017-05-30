@extends('layouts.master')

@section('title')
    Principal
@endsection

@section('content')
<h2>Filtrar los pedidos por el estado:</h2>
<div class="row">
	<div style="margin-left: 10px;">
		<ul class="nav nav-pills" role="tablist" style="display: inline;">
				<a class="btn btn-default" href="{{ route('pagprincipal')}}" role="button" style="margin: 0px 5px;">Todos
				</a>
				<a class="btn btn-warning" href="principaltienda/0" role="button" style="margin: 0px 5px;">Pendiente
					<span class="badge">{{$pendientes}}</span>
				</a>			
				<a class="btn btn-primary" href="principaltienda/1" role="button" style="margin: 0px 5px;">Aceptado
					<span class="badge">{{$aceptados}}</span>
				</a>
				<a class="btn btn-info" href="principaltienda/2" role="button" style="margin: 0px 5px;">En Curso
					<span class="badge">{{$encursos}}</span>
				</a>
				<a class="btn btn-success" href="principaltienda/3" role="button" style="margin: 0px 5px;">Enviado
					<span class="badge">{{$enviados}}</span>
				</a>
				<!--
				<label style="margin: 0px 5px;">Repartidor:</label>
				<select class="form-control" style="margin: 0px 5px; width: 150px; display: inline;">
					<option selected="selected"></option>
				 	<option>repartidor 1</option>
				 	<option>repartidor 2</option>
				 	<option>repartidor 3</option>
				 	<option>repartidor 4</option>
				 	<option>repartidor 5</option>
				</select>
				-->
			</li>
		</ul>
	</div>
</div>
<table class="table table-striped" style="margin-top: 10px;">
	<tbody>
    <body style='background-color:#E5FDF8'>
		@foreach($pedidos as $pedido)
		<tr>
		<td>
		<div class="row">
		        <div class="col-lg-3">
		          <h4 style="margin-top: 0px;">Numero de pedido: {{$pedido->id}}</h4>
		          <div style="border-bottom-style: solid; border-bottom-color: lightgrey; border-bottom-width: 1px;">
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
			        </div>
			      <dl class="dl-horizontal" style="margin-top: 5px;">
					  <dt style="width: initial;">Precio total:</dt>
					  <dd style="margin-left: 100px;">{{$pedido->precio_total}}€</dd>
		          </dl>
		        </div>
		        <div class="col-lg-4">
		        <dl class="dl-horizontal">
		        	@foreach($clientes as $cliente)
						@if($cliente->id == $pedido->id_cliente)
						  <dt style="width: initial;">Usuario:</dt>
						  <dd style="margin-left: 140px;">{{$cliente->nusuario}}</dd>
						  <dt style="width: initial;">Nombre cliente:</dt>
						  <dd style="margin-left: 140px;">{{$cliente->nombre}}</dd>
						  <dt style="width: initial;">Email:</dt>
						  <dd style="margin-left: 140px;">{{$cliente->email}}</dd>
						  <dt style="width: initial;">Telefono:</dt>
						  <dd style="margin-left: 140px;">{{$cliente->telefono}}</dd>
				 		@endif
				 	@endforeach
				  <dt style="width: initial;">Fecha pedido:</dt>
				  <dd style="margin-left: 140px;">{{$pedido->created_at}}</dd>
				  <dt style="width: initial;">Fecha entrega:</dt>
				  <dd style="margin-left: 140px;">{{$pedido->fecha_entrega}}</dd>
				  @foreach($direcciones as $direccion)
					@if($direccion->id == $pedido->id_direccion)
					  <dt style="width: initial;">Dirección:</dt>
					  <dd style="margin-left: 140px;">{{$direccion->calle}}</dd>
					  <dt style="width: initial;">Piso:</dt>
					  <dd style="margin-left: 140px;">{{$direccion->piso}}</dd>
					  <dt style="width: initial;">CP:</dt>
					  <dd style="margin-left: 140px;">{{$direccion->cp}}</dd>
				  	@endif
				  @endforeach
				</dl>   
		       </div>
		        <div class="col-lg-5">
		        <form action='{{ route('updaterepartidorpedido') }}' method='post'>
		        <input type='hidden' name='_token' value='{{ Session::token() }}'>
		        <input type='hidden' name='pedido' id='pedido' value='{{$pedido->id}}'>
		          <label style="margin: 0px 5px;">Repartidor:</label>
						<select class="form-control" style="margin: 0px 5px; width: 150px; display: inline;"  name='nusuario' id='nusuario'>
							<option selected="selected">
								@if($pedido->id_repartidor != 0)
									@foreach($repartidores as $repartidor)
										@if($pedido->id_repartidor == $repartidor->id)
											{{$repartidor->nusuario}}
										@endif
									@endforeach
								@endif
							</option>
							@foreach($repartidores as $repartidor)
								@if($pedido->id_repartidor != $repartidor->id)
									<option>{{$repartidor->nusuario}}</option>
								@endif
							@endforeach
						</select>
						<button type='submit' class='btn btn-default'>Guardar</button>
				</form>
				<div style="margin-top: 80px;">
				@foreach($estados as $estado)
					@if($pedido->id_estado == $estado->numero_estado)
						<h4><b>Estado:</b> {{$estado->nombre}}</h4>	
						<!-- Texto de cada estado
						<p>Si selecionas seguiente estado el pedido pasara a finalizado: El pedido esta listo y enviado.</p>
						-->
					@endif
				@endforeach 	
		          <p><a class="btn btn-default" href="nextestado/{{$pedido->id}}" role="button">Suiguiente estado</a><a class="btn btn-danger" href="anular/{{$pedido->id}}" role="button" style="margin-left: 20px;">Anular</a></p>
		          </div>
		        </div>
		 </div>
		 </td>
		 </tr>
		 @endforeach 
	</tbody>	 
 </table>
@endsection