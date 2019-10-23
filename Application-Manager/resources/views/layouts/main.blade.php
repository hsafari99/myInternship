@extends('layouts.html')

@section('layout')

<nav class="sticky-top navbar navbar-light text-nowrap bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/"><img style="max-height:50px" src='/img/dulcedo-logo.jpg' alt="dulcedo-logo"></a>
        @auth
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#navbar">
                Hi, {{ Auth()->user()->firstname }}!<i class="fa fa-caret-down ml-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav mr-auto">
                    @include('layouts.links')
                    <li>
                        <form id="logout" action="/logout" method="POST">
                            @csrf
                            <a href="javascript:{}" onclick="document.getElementById('logout').submit();" class="nav-link text-left text-danger">Log me out<span class="fa fa-sign-out ml-1"></span></a>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth
    </div>
</nav>
@popup

<main class="py-3">
    <div class="container">
        <h2 class="my-1 mx-auto text-center">@yield('title')</h2>
        <hr>
        <div class="justify-content-center">
            @yield('content')
        </div>
    </div>
</main>
    
@endsection