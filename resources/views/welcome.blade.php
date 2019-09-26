@extends('layouts.welcome-header')

@section('content')

<div class="container">
    <header class="jumbotron my-4">
        <h1 class="display-3">Weekend Project</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login</a>
        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Registreer</a>
    </header>
</div>

@stop
