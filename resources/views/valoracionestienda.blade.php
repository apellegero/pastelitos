@extends('layouts.master2')

@section('title')
    Valoraciones
@endsection

@section('content')
<div class='container' style="max-width: 730px;">
    <body style='background-color:#E5FDF8'>
	<h2>Valoraciones</h2>
    <table class="table table-striped">
        <thead>
        </thead>
        @foreach($valoraciones as $valoracion)
        <div class='row'>
            <div class="col-sm-3">
                <img src="../uploads/avatars/{{$valoracion->foto}}" style="width: 150px; height: 150px;float: left; margin-right: 25px;">
            </div>
            <div class="col-sm-4">
                <h2>{{$valoracion->nusuario}}</h2>
                <p>Nota: {{$valoracion->nota}}</p>
                <p>Comentario: {{$valoracion->motivos}}</p>
            </div>
        </div>
        <hr class="featurette-divider">
        @endforeach
        </tbody>
    </table>
</div>	
@endsection