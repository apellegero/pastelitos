@extends('layouts.master')

@section('title')
Sing up
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
<div class='row'>
    <div class='col-md-6 col-md-offset-3'>
        <div class="input-group">

    </div>
</div>
@endsection