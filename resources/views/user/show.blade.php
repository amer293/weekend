<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <script src="https://kit.fontawesome.com/4dc9c50ec2.js"></script>
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #000563;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{URL::to('/home')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Weekend</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Dashboard
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            @if(Auth::user()->admin)
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{URL::to('/home')}}">
                    <i class="fas fa-cogs"></i></i>
                    <span>Home</span>
                </a>
                <a class="nav-link collapsed" href="{{URL::to('/dashboard')}}">
                    <i class="fas fa-cogs"></i></i>
                    <span>Gebruikers</span>
                </a>
                <a class="nav-link collapsed" href="{{URL::to('dashboard')}}/{{Auth::user()->id}}/edit">

                    <i class="fas fa-cogs"></i></i>
                    <span>Mijn Account</span>
                </a>
                <a class="nav-link collapsed"
                href="{{ route('dashboard.edit', ['id' => Auth::user()->id]) }}">
                <i class="fas fa-cogs"></i>
                <span>Opdrachten</span>
            </a>

        </li>
        @endif
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{URL::to('/home')}}">
                <i class="fas fa-cogs"></i></i>
                <span>Home</span>
            </a>
            <a class="nav-link collapsed"
            href="{{-- {{ route('dashboard', ['id' => Auth::user()->id]) }} --}}{{URL::to('/dashboard')}}">
            <i class="fas fa-cogs"></i>
            <span>Mijn Opdrachten</span>
        </a>

    </li>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #000563;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'FakeLook') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <span
                        class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                        @if(Auth::user()->admin)

                        <a class="dropdown-item"
                        href="{{URL::to('dashboard')}}/{{Auth::user()->id}}/edit">

                        Mijn Account
                    </a>

                    @endif
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                style="display: none;">
                @csrf
            </form>
        </div>
    </li>
    @endguest
</ul>
</div>
</div>
</nav>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container">
    <br>
    <div class="container">
        <header class="jumbotron my-4">
            <h1 class="display-3">{{$assignment->title}}</h1><br>
            {{ $assignment->body }}
        </header>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; FakeLook 2019</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->



<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>
