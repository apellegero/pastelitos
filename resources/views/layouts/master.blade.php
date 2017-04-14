<!DOCTYPE html>
<html>
    <head>
        <title>
            @yield('title')
            <link rel="icon" href=".{{asset('favicon.ico')}}">
        </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/myCss.css')}}">
    </head>
    <body>
    	@include('includes.menu')
      <div class='container'>
            @yield('content')
      </div>
    </body>
    <div id="footer">
        @include('includes.footer')
    </div>
</div>
</html>
