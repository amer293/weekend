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
        <script src="https://kit.fontawesome.com/4dc9c50ec2.js"></script>
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
            <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
        </head>
        <body id="page-top">
            <script src="https://cdn.tiny.cloud/1/l0hwhlo0x1rlaw5krbmgxgkwum7wa6tom7725mh5beoqvep2/tinymce/5/tinymce.min.js">
            </script>

            <!-- Page Wrapper -->
            <div id="wrapper">
                <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{URL::to('/dashboard')}}">
                        <div class="sidebar-brand-icon rotate-n-15">
                            <i class="fas fa-laugh-wink"></i>
                        </div>
                        <div class="sidebar-brand-text mx-3">Weekend</div>
                    </a>
                    <hr class="sidebar-divider">
                    <div class="sidebar-heading">
                        Dashboard
                    </div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{URL::to('/dashboard')}}">
                            <i class="fas fa-cogs"></i></i>
                            <span>Dashboard</span>
                        </a>
                        @if(Auth::user()->admin)
                        <a class="nav-link collapsed"
                            href="{{ route('dashboard.edit', ['id' => Auth::user()->id]) }}">
                            <i class="fas fa-cogs"></i>
                            <span>Mijn Account</span>
                            
                        </a>
                        <a class="nav-link collapsed"
                            href="{{ route('ShowAssignments') }}">
                            <i class="fas fa-cogs"></i>
                            <span>Opdrachten</span>
                        </a>
                        
                        @endif
                    </li>
                </ul>
                <div id="content-wrapper" class="d-flex flex-column">
                    <div id="content">
                        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                            <div class="container">
                                <a class="navbar-brand" href="{{ url('/home') }}">
                                    {{ config('app.name', 'Weekend') }}
                                </a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto">
                                    </ul>
                                    <ul class="navbar-nav ml-auto">
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
                                                
                                                <a class="dropdown-item" href="{{URL::to('/dashboard')}}">
                                                    Dashboard
                                                </a>
                                                @if(Auth::user()->admin)
                                                <a class="dropdown-item"
                                                    href="{{URL::to('dashboard')}}/{{Auth::user()->id}}/edit">Opdracht toewijzen
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
                        <div class="container">
                            <br>
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row no-gutters">
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$user->first_name}} {{$user->last_name}}
                                            </h5>
                                            <p class="card-text">Email: {{$user->email}}</p>
                                            
                                            <p class="card-text">
                                                {!! Form::open(['route' => ['dashboard.destroy', $user->id], 'method' => 'DELETE']) !!}
                                                <button type="submit" class="btn btn-danger">DELETE ACCOUNT</button>
                                                {!! Form::close() !!}
                                                
                                            </p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Gebruiker Aanpassen</h6>
                                </div>
                                <div class="card-body">
                                    {!! Form::open(['route' => ['dashboard.update', $user->id], 'method' => 'PUT', 'files' => true])
                                    !!}
                                    <br>
                                    {!! Form::text('first_name', $user->first_name, ['class' => 'form-control', 'placeholder' =>
                                    'Voornaam','autocomplete' => 'off']); !!}
                                    <br>
                                    {!! Form::text('last_name', $user->last_name, ['class' => 'form-control', 'placeholder' =>
                                    'Achternaam','autocomplete' => 'off']); !!}
                                    <br>
                                    {!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' =>
                                    'email','autocomplete' => 'off']); !!}
                                    <br>
                                    <input type="password" name="password" class="form-control" placeholder="Wachtwoord">
                            
                    
                                    <br>
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Gebruik Informatie</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-check">
                                                {!! Form::checkbox('admin', 1,$user->admin, ['class' =>
                                                'form-check-input']);
                                                !!}
                                                {!! Form::label('admin', 'Admin') !!}
                                                <br>
                                                {!! Form::checkbox('recruiter', 1,$user->recruiter, ['class' =>
                                                'form-check-input']);
                                                !!}
                                                {!! Form::label('recruiter', 'recruiter') !!}
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Edit</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Weekend 2019</span>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </body>
    </html>