@extends('layouts.master')

@section('title')
    Principal
@endsection

@section('content')
<h2>Pedidos asignados:</h2>
<table class="table table-striped" style="margin-top: 10px;">
	<tbody>
    <body style='background-color:#E5FDF8'>
		@foreach($pedidos as $pedido)
		<tr>
		<td>
		<div class="row">
		        <div class="col-lg-5">
		         <h2 style="margin-top: 0px;">Pedido: {{$pedido->id}}</h2>
		        <dl class="dl-horizontal">
		        	@foreach($clientes as $cliente)
						@if($cliente->id == $pedido->id_cliente)
						  <dt style="width: initial;">Nombre usuario:</dt>
						  <dd style="margin-left: 140px;">{{$cliente->nusuario}}</dd>
						  <dt style="width: initial;">Nombre cliente:</dt>
						  <dd style="margin-left: 140px;">{{$cliente->nombre}} {{$cliente->apellido}}</dd>
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
		          @foreach($direcciones as $direccion)
					@if($direccion->id == $pedido->id_direccion)
						<h4>Sugerencias para la entrega:</h4>
					  	<p>{{$direccion->sugerencias}}</p>
				  	@endif
				  @endforeach
		          <p><a class="btn btn-success" href="entregado/{{$pedido->id}}" role="button">Entregado</a></p>
		        </div>
		 </div>
		 </td>
		 </tr>
		 @endforeach 
	</tbody>	 
 </table>
@endsection