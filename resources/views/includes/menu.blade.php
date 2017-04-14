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
        <form class="navbar-form">
            <a class="btn btn-default" href="#" role="button">pag a</a>
            <a class="btn btn-default" href="#" role="button">pag b</a>
            <a class="btn btn-default" href="#" role="button">pag c</a>
        </form>
        @else
        <form class="navbar-form" action='{{ route('singin') }}' method='post'>
          <input type='hidden' name='_token' value='{{ Session::token() }}'>
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