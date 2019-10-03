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
		  	<a class="navbar-brand active" href="{{ asset('home') }}">Weekend Opdracht <span class="sr-only">(current)</span></a>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    	<div class="navbar-nav">
		      		<a class="nav-item nav-link active" href="{{ asset('dashboard') }}">Dashboard <span class="sr-only">(current)</span></a>
		    	</div>
		  	</div>
		  	<ul class="navbar-nav d-none d-md-block">
	            @guest
	                <li class="nav-item">
	                    <a class="nav-link active" href="{{ route('login') }}">{{ __('Login') }}</a>
	                </li>
	                @if (Route::has('register'))
	                    <li class="nav-item">
	                        <a class="nav-link active" href="{{ route('register') }}">{{ __('Register') }}</a>
	                    </li>
	                @endif
	            @else
	                <li class="nav-item dropdown">
	                    <a id="navbarDropdown" class="nav-link dropdown-toggle active" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="position: relative; padding-left: 50px;">
	                        {{ Auth::user()->first_name }} <span class="img-fluid rounded-circle"></span>
	                    </a>

	                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
	                    	{{-- @if(Auth::user()->admin)
                            <a class="dropdown-item" href="{{ URL::to('/admin') }}">Adminpanel</a>
                            @endif --}}
	                        <a class="dropdown-item" href="">Dashboard</a>
	                        <a class="dropdown-item" href="{{ route('logout') }}"
	                           onclick="event.preventDefault();
	                                         document.getElementById('logout-form').submit();">
	                            {{ __('Logout') }}
	                        </a>

	                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                            @csrf
	                        </form>
	                    </div>
	                </li>
	            @endguest
	        </ul>
		</nav>
	</header>
@yield('content')
</body>
</html>
