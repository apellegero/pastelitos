@extends('layouts.master')

@section('title')
    Perfil
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
            <img src="/uploads/avatars/{{$tienda->foto}}">
            <form action='{{ route('upload') }}' method='post' enctype='multipart/form-data'>
                    <div class='fotodiv'>
                        <div class='form-group'>
                            <label for='foto'>Foto</label>
                            <input type='file' name='foto' id='foto' value=''>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="sumbit" class="pull-right btn btn-sm btn-info">
                        </div>
                    </div>
            </form>
            <hr class="featurette-divider">
        </div>
    </div>
@endsection