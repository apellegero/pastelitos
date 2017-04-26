@extends('layouts.master')

@section('title')
    Principal
@endsection

@section('content')
<h2>Filtrar pedidos por:</h2>
<div class="row">
	<div>
		<ul class="nav nav-pills" role="tablist" style="display: inline;">
			<label style="margin: 0px 5px;">Estado:</label>
				<a class="btn btn-warning" href="{{ route('singuppage')}}" role="button" style="margin: 0px 5px;">Pendiente
					<span class="badge">0</span>
				</a>
				<a class="btn btn-primary" href="{{ route('singuppage')}}" role="button" style="margin: 0px 5px;">Aceptado
					<span class="badge">0</span>
				</a>
				<a class="btn btn-info" href="{{ route('singuppage')}}" role="button" style="margin: 0px 5px;">En Curso
					<span class="badge">0</span>
				</a>
				<a class="btn btn-success" href="{{ route('singuppage')}}" role="button" style="margin: 0px 5px;">Enviado
					<span class="badge">0</span>
				</a>
				<label style="margin: 0px 5px;">Repartidor:</label>
				<select class="form-control" style="margin: 0px 5px; width: 150px; display: inline;">
					<option selected="selected"></option>
				 	<option>repartidor 1</option>
				 	<option>repartidor 2</option>
				 	<option>repartidor 3</option>
				 	<option>repartidor 4</option>
				 	<option>repartidor 5</option>
				</select>
			</li>
		</ul>
	</div>
</div>

<hr class="featurette-divider">
<table class="table table-striped">
<!--Datos-->
<div class="row" style="border-bottom:1px solid #eee">
        <div class="col-lg-3" style="border-right:1px solid #eee">
          <h2 style="margin-top: 0px;">Pedido: 432522</h2>
         <ol>
         	<li>pro1</li>
         	<li>pro2</li>
         </ol>
          <p>Precio total:</p>
        </div>
        <div class="col-lg-4" style="border-right:1px solid #eee">
        <dl class="dl-horizontal">
		  <dt style="width: initial;">Nombre usuario:</dt>
		  <dd style="margin-left: 140px;">nusuario</dd>
		  <dt style="width: initial;">Nombre cliente:</dt>
		  <dd style="margin-left: 140px;">nombre</dd>
		  <dt style="width: initial;">Fecha pedido:</dt>
		  <dd style="margin-left: 140px;">12/10/2017</dd>
		  <dt style="width: initial;">Fecha entrega:</dt>
		  <dd style="margin-left: 140px;">12/11/2017</dd>
		  <dt style="width: initial;">Dirección:</dt>
		  <dd style="margin-left: 140px;">C/hhuywuqe</dd>
		  <dt style="width: initial;">CP:</dt>
		  <dd style="margin-left: 140px;">08034</dd>
		</dl>   
       </div>
        <div class="col-lg-5">
        <form action='{{ route('singup') }}' method='post'>
          <label style="margin: 0px 5px;">Repartidor:</label>
				<select class="form-control" style="margin: 0px 5px; width: 150px; display: inline;">
					<option selected="selected"></option>
				 	<option>repartidor 1</option>
				 	<option>repartidor 2</option>
				 	<option>repartidor 3</option>
				 	<option>repartidor 4</option>
				 	<option>repartidor 5</option>
				</select>
				<button type='submit' class='btn btn-info'>Guardar</button>
		</form>
		<h4>Estado Actual: En curso</h4>		
          <p>Si selecionas seguiente estado el pedido pasara a finalizado: El pedido esta listo y enviado.</p>
          <p><a class="btn btn-info" href="#" role="button">Suiguiente estado</a><a class="btn btn-danger" href="#" role="button" style="margin-left: 20px;">Anular</a></p>
        </div>
 </div>
<!--Datos-->
 </table>

@endsection