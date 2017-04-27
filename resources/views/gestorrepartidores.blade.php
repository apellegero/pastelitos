@extends('layouts.master')

@section('title')
    Gestor Repartidores
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
<p>Para editar los datos de un repartidor haz click sobre el nombre del usuario</p>
<div>
<table class="table table-striped">
 	<thead>
 		<tr> 
	 		<th>#</th> <th>Usuario</th> <th>Nombre</th> <th>Apellido</th> <th>Mail</th> <th>Telefono</th>
 		</tr> 
 	</thead>
 	<tbody>
  @foreach($repartidores as $repartidor)
 	 	<tr> 
 			<th scope="row"></th>
    		<td>
        <a class="btn btn-link" href="editarrepartidor/{{$repartidor->id}}" role="button">{{$repartidor->nusuario}}</a>
        </td> 
        <td>{{$repartidor->nombre}}</td><td>{{$repartidor->apellido}}</td><td>{{$repartidor->email}}</td><td>{{$repartidor->telefono}}</td>
    </tr> 
  @endforeach 
    </tbody> 
</table>
</div>
<a class="btn btn-lg btn-info" href="{{ route('nuevorepartidor')}}" role="button">Nuevo Repartidor</a>
@endsection










