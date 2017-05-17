@extends('layouts.master')

@section('title')
    Pago
@endsection

@section('content')
<div class='container' style="max-width: 730px;">
	<h2>Datos Bancarios</h2>
	<form action="{{route('pagar')}}" method='post'>
	@foreach($pedidos as $pedido)
		<input type='hidden' name='pedido' value='{{ $pedido->id }}'>
	@endforeach
	<input type='hidden' name='_token' value='{{ Session::token() }}'>
        <div class='form-group'>
            <label for='cuenta'>Numero de cuenta bancaria</label>
            <input class='form-control' type='text' name='cuenta' id='cuenta' placeholder="0000 0000 0000 0000">
        </div>
        <div class='form-group'>
            <label for='titular'>Nombre titular</label>
            <input class='form-control' type='text' placeholder="Nombre Apellido" name='titular' id='titular'>
        </div>
        <div class='form-group'>
            <label for='caducidad'>Fecha caducidad</label>
            <input class='form-control' type='text' name='caducidad' id='caducidad' placeholder="MM/YY">
        </div>
        <button type='submit' class='btn btn-info'>Confirmar pago</button>
    </form>
</div>	
@endsection