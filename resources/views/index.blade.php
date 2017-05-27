@extends('layouts.master')

@section('title')
    Inicio
@endsection

@section('content')
	<div class="content">
        <div class="jumbotron" style="text-align: center">
            <div class="container">
                <h1>Pastelitos</h1>
                <p class="lead">Celebres lo que celebres hazlo con nosotros pidiendo tu repostería favorita a domicilio</p>
                <p><a class="btn btn-lg btn-info" href="{{ route('singuppage')}}" role="button">Empieza hoy</a></p>
            </div>
        </div>
        <div class="container" style='max-width: 80%'>
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-1"></div>
            <div class="col-md-8">
              <h2 class="featurette-heading">Variedad. <span class="text-muted">It'll blow your mind.</span></h2>
              <p class="lead">Un pastel? Un postre? Solo una merienda? No importa, aquí encontraras todo lo que desees. Dulce o salado.</p>
            </div>
            <div class="col-md-2" style="text-align: center;">
                <img alt="100%x180" data-src="holder.js/100%x180" style="height: 180px; width: 180px; display: initial;" src="../resources/img/gran-variedad-de-pasteles.jpg" data-holder-rendered="true">
            </div>
            <div class="col-md-1"></div>
        </div>
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-1"></div>
            <div class="col-md-8 col-md-push-3">
              <h2 class="featurette-heading">disponibilidad. <span class="text-muted">See for yourself.</span></h2>
              <p class="lead">Con total seguridad la tienda a la cual compras, llegara a tu casa en las próximas horas. Miles de usuarios nos avalan.</p>
            </div>
            <div class="col-md-2 col-md-pull-8" style="text-align: center;">
                <img alt="100%x180" data-src="holder.js/100%x180" style="height: 180px; width: 180px; display: initial;" src="../resources/img/repartidorindex.jpg" data-holder-rendered="true">
            </div>
            <div class="col-md-1"></div>
        </div>
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-1"></div>
            <div class="col-md-8">
              <h2 class="featurette-heading">Conoce que comes <span class="text-muted">ingredientes.</span></h2>
              <p class="lead">Nuestras pastelerías disfrutan de enorgullecerse a ellas mismas al poder decir que disfrutan de los ingredientes más frescos que puedan conseguir.</p>
            </div>
            <div class="col-md-2" style="text-align: center;">
                <img alt="100%x180" data-src="holder.js/100%x180" style="height: 180px; width: 180px; display: initial;" src="../resources/img/ingredientes-pasteleria.jpg" data-holder-rendered="true">
            </div>
            <div class="col-md-1"></div>
        </div>
        <hr class="featurette-divider">
        </div>
    </div>
@endsection

