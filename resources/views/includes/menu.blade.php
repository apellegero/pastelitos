<header>
<nav class="navbar navbar-default" style='background-color: white'>
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      @if(Auth::check())
          <a href="{{route('pagprincipal')}}" class="navbar-brand" style='padding-top: 7px;padding-right: 7px;'> <img alt="Brand" height="35" src="\pastelitos\resources\img\cupcake.png" width="35"> </a>
          <a class="navbar-brand" href="{{route('pagprincipal')}}">Pastelitos</a>
      @else
          <a href="{{route('indexpage')}}" class="navbar-brand" style='padding-top: 7px;padding-right: 7px;'> <img alt="Brand" height="35" src="\pastelitos\resources\img\cupcake.png" width="35"> </a>
          <a class="navbar-brand" href="{{route('indexpage')}}">Pastelitos</a>
      @endif
    </div>
      <ul class="nav navbar-nav navbar-right"><!-- Crear per dintre de sesio y fore -->
        @if(Auth::check())
        <form class="navbar-form" action='{{ route('logout') }}' method='get'>
             @if(Auth::user()->tipo_id==2)
              <!--Tienda -->
              <a class="btn" href="{{ route('gestorproductos')}}" role="button">productos</a>
              <!-- <a class="btn" href="#" role="button">historico pedidos</a> -->
              <a class="btn" href="{{route('gestorrepartidores')}}" role="button">repartidores</a>
              <a class="btn" href="vertienda/{{Auth::user()->id}}" role="button">vista del cliente</a>
              <a class="btn" href="{{ route('perfiltienda')}}" role="button">perfil</a>
            @endif
            @if(Auth::user()->tipo_id==1)
              <!--Cliente -->
              <a class="btn" href="{{ route('mispedidos')}}"" role="button">mis pedidos</a>
              <a class="btn" href="{{ route('perfilcliente')}}" role="button">perfil cliente</a>
            @endif
            <input type='hidden' name='_token' value='{{ Session::token() }}'>
            <button type="submit" class="btn btn-default btn-sm">
              <span class="glyphicon glyphicon-off"></span> Off 
            </button>
        </form>
        <!--glyphicon glyphicon-off-->
        @else
        <form class="navbar-form" action='{{ route('singin') }}' method='post'>
            <input type='hidden' name='_token' value='{{ csrf_token() }}'>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
              <input type="text" placeholder="Email" class="form-control"  name='email' id='email' value='{{ Request::old('email') }}'>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
              <input type="password" placeholder="Password" class="form-control" name='password' id='password'>
            </div>
            <button type="submit" class="btn btn-info">Sign in</button>
            <a class="btn btn-default" href="{{ route('singuppage')}}" role="button">Sing Up</a>
        </form>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>