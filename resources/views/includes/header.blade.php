<nav>
	<a href='{{url("/")}}'><img src="{{ asset('img/home.png') }}"></a>
@auth
	<a href='{{url("/account")}}'><img src="{{ asset('img/user.png') }}"></a>
	<a href='{{url("/logout")}}'><img src="{{ asset('img/logout.png') }}"></a>
@endauth

@guest
	<a href='{{url("/login")}}'><img src="{{ asset('img/login.png') }}"></a>
@endguest		
</nav>