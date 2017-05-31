@extends('layouts.master2')

@section('title')
Sing up
@endsection

@section('content')
    <div class='row'>
    <body style='background-color:#E5FDF8'>
    <div class='col-md-6 col-md-offset-3'>
    @foreach($pedidos as $pedido)
            <form action="{{route('valoracionnota')}}" method='post'>
                <input type='hidden' id="id_pedido" name="id_pedido" value='{{$pedido->id}}'>
                <div class='form-group'>
                    <label style="margin-top: 10px;">Nota Pedido</label>
                    <input type="number" class="form-control" name="nota" id="nota" placeholder="Del 0 al 10" max="10" min="0">
                </div>
                <div class='form-group'>
                    <label style="margin-top: 10px;">Explicacion</label>
                    <textarea class="form-control" rows="5" name='motiu' id='sugerencias' placeholder="Sería conveniente una breve explicación de su nota para los demás usuarios." required></textarea>
                </div>
                <div class='form-group'>
                    <input type='hidden' name='_token' value='{{ Session::token() }}'>
                    <button type='submit' style="margin-top: 10px;" class='btn btn-info'>Valorar</button>
                </div>
        </div>
    </div>
    @endforeach
@endsection
