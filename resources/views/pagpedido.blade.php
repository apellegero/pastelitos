@extends('layouts.master')

@section('title')
    Pedido
@endsection

@section('content')
@foreach($leanprods as $linia)
{{$linia->id_producto}}
@endforeach
@endsection