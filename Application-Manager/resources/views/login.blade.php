@extends('layouts.plain')
@section('content')

<div class="row justify-content-center my-4">

    <div class="card my-4" style="max-width:450px">

        <img class="img-fluid m-2" style="max-width:inherit" src="/img/dulcedo-logo.jpg" alt="dulcedo">
        <div class="card-body">
            <form id="login" method="POST" action="/login">
            
                <div id="login-error-msg" class="badge badge-error"></div>
                <input id="email" type="email" class="form-control mb-3" name="email" placeholder="Email" required autofocus>

                <input id="password" type="password" class="form-control mt-3" name="password" placeholder="Password" required>
                <span onclick='toggle(this, "password", "password")'>
                    <i class="fa fa-eye in-input"></i>
                    <i class="fa fa-eye-slash in-input hide"></i>
                </span>

                <div class="form-group row mt-4">
                    <div class="form-check col">
                        <input type="checkbox" id="remember" class="hide" name="remember">
                        <span class="links form-check-label" onclick='toggle(this, "remember", "check")'>Remember Me @onoff</span>
                        <br>
                        <a href="">Forgot Your Password?</a>
                    </div>
                    <div class="col">
                        <span class="btn btn-block btn-primary" onclick="login('login-error-msg')">Login</span>
                    </div>  
                </div>
            </form>
        </div>
        
    </div>

</div>

@endsection