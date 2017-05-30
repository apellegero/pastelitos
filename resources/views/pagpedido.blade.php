@extends('layouts.master')

@section('title')
    Pedido
@endsection

@section('content')
<div class='container' style="max-width: 730px;">
    <body style='background-color:#E5FDF8'>
	<table class="table table-striped">
	    <thead>
	        <tr> 
	            <th>#</th> 
	            <th>Nombre</th> 
	            <th>Cantidad</th> 
	            <th>Precio Unidad (€)</th>
	            <th>Precio Producto (€)</th> 
	        </tr> 
	    </thead>
	    <tbody>
	@foreach($leanprods as $linia)
		    @foreach($productos as $producto)
			    @if($producto->id == $linia->id_producto)
			    	@if($linia->cantidad>0)
				    <tr> 
				        <th scope="row"></th>
				        <td>{{$producto->nombre}}</th>
				        <td>{{$linia->cantidad}}</th>
				        <td>{{$producto->precio}}</th>
				        <td>{{$producto->precio*$linia->cantidad}}</th>
			    	</tr>
		    	 @endif
			    @endif
			@endforeach
	@endforeach
	@foreach($pedidocarrito as $pedido)
		<tr> 
			<th scope="row"></th>
			<td></th>
			<td></th>
			<td class="text-right"><strong>Coste Total:</strong></th>
			<td><strong>{{$pedido->precio_total}} €</strong></th>
		 </tr>
	@endforeach
	    </tbody>
	</table>
	@foreach($direccionUsu as $direc)
	<h4>Datos Pedido</h4>
	<form action="{{route('pago')}}" method='post'>
	@foreach($pedidocarrito as $pedido)
	<input type='hidden' name='pedido' value='{{ $pedido->id }}'> 
	@endforeach
	<input type='hidden' name='_token' value='{{ Session::token() }}'> 
		<div class='form-group'>
                    <label for='fecha_entrega'>Fecha Entrega</label>
                    <input class='form-control' type='date' name='fecha_entrega' id='fecha_entrega' >
                </div>
                <div class='form-group'>
                    <label for='calle'>Calle</label>
                    <input class='form-control' type='text' name='calle' id='calle' placeholder="C/Passeig de Sant Joan Bosco" value='{{ $direc->calle }}'>
                </div>
                <div class='form-group'>
                    <label for='numero_calle'>Numero</label>
                    <input class='form-control' style="width: 50px;" type='text' placeholder="42" name='numero_calle' id='numero_calle' value='{{ $direc->numero_calle }}'>
                </div>
                <div class='form-group'>
                    <label for='piso'>Piso</label>
                    <input class='form-control' type='text' name='piso' id='piso' placeholder="5 1ra" value='{{ $direc->piso }}'>
                </div>
                <div class='form-group'>
                    <label for='cp'>CP</label>
                    <input class='form-control' style="width: 70px;" type='text' name='cp' id='cp' placeholder="08017" value='{{ $direc->cp }}'>
                </div>
                <div class='form-group'>
                    <label>Sugerencias</label>
                    <textarea class="form-control" rows="5" name='sugerencias' id='sugerencias' placeholder="Aquí puede dar alguna instruccion para cuando el repartidor le traiga uno de los pedidos.">{{$direc->sugerencias }}</textarea>
                </div>
                <button type='submit' class='btn btn-info'>Confirmar pedido</button>
            </form>
            @endforeach
</div>
@endsection