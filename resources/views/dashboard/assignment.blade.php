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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{URL::to('/dashboard')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink" style="color:#fcb1ca;"></i>
                </div>
                <div class="sidebar-brand-text mx-3" style="color:#fcb1ca;">Weekend</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading" style="color:#fcb1ca;">
                Dashboard
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            @if(Auth::user()->admin)
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{URL::to('/home')}}">
                    <i class="fas fa-cogs"></i></i>
                    <span>Home</span>
                </a>
                <a class="nav-link collapsed" href="{{URL::to('dashboard')}}/{{Auth::user()->id}}/edit">
                    <i class="fas fa-cogs"></i></i>
                    <span>Mijn Account</span>
                </a>
                <a class="nav-link collapsed" href="{{URL::to('/dashboard')}}">
                    <i class="fas fa-cogs"></i></i>
                    <span>Gebruikers</span>
                </a>
            </li>
            @endif


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #000563;">
                    <div class="container">
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
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color:#fcb1ca;" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                    @if(Auth::user()->admin)
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Opdrachten</h6>

                            <button style="float:right;" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Voeg opdracht toe<button>


                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Opdracht</th>
                                            <th>Opties</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($assignments as $assignment)
                                        <tr>
                                            <td>{{$assignment->id}}</td>
                                            <td>{{$assignment->assignment}}</td>

                                            {{-- Doesn't work yet --}}
                                            <td>
                                                {!! Form::open(['route' => ['delete', $assignment->id], 'method' => 'DELETE']) !!}
                                                    <button type="submit" class="btn btn-danger">Verwijderen</button>
                                                {!! Form::close() !!}
                                            </td>
                                            {{-- End --}}

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>

                    <!--/table-resp-->


                    @endif
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">

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


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Opdracht toevoegen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['route' => 'dashboard.store', 'method' => 'POST', 'files' => true]) !!}


        <label for="name">Opdracht</label>
        <div class="input-group mb-3">
          <input type="file" name="file">
        </div>

        <label for="name">Gebruiker</label>
        <div class="input-group mb-3">
          {!! Form::text('user_id', null, ['class' => 'form-control','autocomplete' => 'off']); !!}
        </div>


        <br>
        <button type="submit" class="btn btn-success">Aanmaken</button>
        <div class="float-md-right">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

        {!! Form::close() !!}
      </div>

    </div>
  </div>
</div>
