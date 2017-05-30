@extends('layouts.master')

@section('title')
    Inicio
@endsection

@section('content')
	<div class="content">
        <div class="jumbotron" style="text-align: center; background-image:url(../resources/img/297b89bb.png)">
            <div class="container">
                <h1>Pastelitos</h1>
                <p class="lead">Celebres lo que celebres hazlo con nosotros pidiendo tu repostería favorita a domicilio</p>
                <p><a class="btn btn-lg btn-info" href="{{ route('singuppage')}}" role="button">Empieza hoy</a></p>
            </div>
        </div>
        <div class="container" style='max-width: 80%'>
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-8">
              <h2 class="featurette-heading">Variedad</h2>
              <p class="lead">Un pastel? Un postre? De celebracion? Solo una merienda? No importa, aquí encontraras todo lo que desees. Dulce o salado.</p>
            </div>
            <div class="col-md-2" style="text-align: center;">
                <img alt="100%x180" data-src="holder.js/100%x180" style="height: 180px; width: 260px; display: initial;" src="../resources/img/foto_portada_1.jpg" data-holder-rendered="true">
            </div>
            <div class="col-md-1"></div>
        </div>
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-8 col-md-push-4">
              <h2 class="featurette-heading">Disponibilidad a domicilio</h2>
              <p class="lead">Con total seguridad tus pedidos llegaran a tu casa. Miles de usuarios lo avalan.</p>
            </div>
            <div class="col-md-2 col-md-pull-8" style="text-align: center;">
                <img alt="100%x180" data-src="holder.js/100%x180" style="height: 180px; width: 260px; display: initial;" src="../resources/img/foto_portada_2.jpg" data-holder-rendered="true">
            </div>
            <div class="col-md-1"></div>
        </div>
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-8">
              <h2 class="featurette-heading">Conoce que comes</h2>
              <p class="lead">Los productos de las pastelerías contienen una descripcion con los productos utilizados. Así si tiene alguna alergia o intolerancia puede encontrar el perfecto postre.</p>
            </div>
            <div class="col-md-2" style="text-align: center;">
                <img alt="100%x180" data-src="holder.js/100%x180" style="height: 180px; width: 260px; display: initial;" src="../resources/img/ingredientes-pasteleria.jpg" data-holder-rendered="true">
            </div>
            <div class="col-md-1"></div>
        </div>
        <hr class="featurette-divider">
        </div>
    </div>
@endsection

