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
              <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-2" style="text-align: center;">
                <img alt="100%x180" data-src="holder.js/100%x180" style="height: 180px; width: 180px; display: initial;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTczIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MyAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MTgwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTViNjM4M2I1MGYgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNWI2MzgzYjUwZiI+PHJlY3Qgd2lkdGg9IjE3MyIgaGVpZ2h0PSIxODAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI2MC41NjI1IiB5PSI5NC40NDM3NSI+MTczeDE4MDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
            </div>
            <div class="col-md-1"></div>
        </div>
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-1"></div>
            <div class="col-md-8 col-md-push-3">
              <h2 class="featurette-heading">disponibilidad. <span class="text-muted">See for yourself.</span></h2>
              <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-2 col-md-pull-8" style="text-align: center;">
                <img alt="100%x180" data-src="holder.js/100%x180" style="height: 180px; width: 180px; display: initial;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTczIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MyAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MTgwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTViNjM4M2I1MGYgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNWI2MzgzYjUwZiI+PHJlY3Qgd2lkdGg9IjE3MyIgaGVpZ2h0PSIxODAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI2MC41NjI1IiB5PSI5NC40NDM3NSI+MTczeDE4MDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
            </div>
            <div class="col-md-1"></div>
        </div>
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-1"></div>
            <div class="col-md-8">
              <h2 class="featurette-heading">Conoce que comes <span class="text-muted">ingredientes.</span></h2>
              <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-2" style="text-align: center;">
                <img alt="100%x180" data-src="holder.js/100%x180" style="height: 180px; width: 180px; display: initial;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTczIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MyAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MTgwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTViNjM4M2I1MGYgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNWI2MzgzYjUwZiI+PHJlY3Qgd2lkdGg9IjE3MyIgaGVpZ2h0PSIxODAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI2MC41NjI1IiB5PSI5NC40NDM3NSI+MTczeDE4MDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
            </div>
            <div class="col-md-1"></div>
        </div>
        <hr class="featurette-divider">
        </div>
    </div>
@endsection

