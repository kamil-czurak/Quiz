<!doctype html>
<html>
  <head>
     @include('includes.head')
  </head>

  <body>
		<a href='{{url("/")}}' class='btn_home'><img src="{{ asset('img/home.png') }}"></a>
    	@yield('content')
  </body>
</html> 