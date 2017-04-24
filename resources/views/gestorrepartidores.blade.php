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
    		<td><form action="{{route('getid')}}" method="post" value="{{$repartidor->id}}">
        <input type="hidden" name="nusuario" value="{{$repartidor->nusuario}}">
        <input type="hidden" name="email" value="{{$repartidor->email}}">
        <input type="hidden" name="nombre" value="{{$repartidor->nombre}}">
        <input type="hidden" name="apellido" value="{{$repartidor->apellido}}">
        <input type="hidden" name="telefono" value="{{$repartidor->telefono}}">
        <input type='hidden' name='_token' value='{{ Session::token() }}'>
        <button type="submit" class="btn btn-link">{{$repartidor->nusuario}}</button>

        </form>
        </td> 
        <td>{{$repartidor->nombre}}</td><td>{{$repartidor->apellido}}</td><td>{{$repartidor->email}}</td><td>{{$repartidor->telefono}}</td>
    </tr> 
  @endforeach 
    </tbody> 
</table>
</div>
<a class="btn btn-lg btn-info" href="{{ route('nuevorepartidor')}}" role="button">Nuevo Repartidor</a>
@endsection










