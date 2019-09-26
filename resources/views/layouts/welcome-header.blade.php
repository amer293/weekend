<!DOCTYPE html>
<html>
<head>
	<title>Weekend Opdracht</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/sfj0qkbtf1uatbaq8ng8miqlkvptidebmmbmq7l1luyksvb2/tinymce/5/tinymce.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="header-color" style="background-color: #ffffff !important;">
	<header>
		<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #000563;">
		  	<a class="navbar-brand" href="{{ asset('/') }}">WP</a>
		  	<div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
		        <ul class="navbar-nav ml-auto">
		        	@guest
			            <li class="nav-item">
			                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
			            </li>
			            @if (Route::has('register'))
				            <li class="nav-item">
				                <a class="nav-link" href="{{ route('register') }}">{{ __('Registreer') }}</a>
				            </li>
				        @endif
			        @endguest
		        </ul>
		    </div>
		</nav>
	</header>
@yield('content')
</body>
</html>
