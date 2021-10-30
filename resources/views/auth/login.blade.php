@extends('layout')

@section('links')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('title')
    Login
@endsection

@section('content')
<div class="container login-container">
    <div class="row justify-content-center">
        <div class="col-md-6 login-form-1">
            <h3>Login for Form 1</h3>
            <form method="POST" action="{{url('login')}}">
                @csrf
                @include('errors')
                <div class="form-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Your Email *" value="{{ old('email') }}" />
                </div>
                <div class="form-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Your Password *" value="" />
                </div>
                <div class="form-group mb-3">
                    <input type="submit" class="btnSubmit" value="Login" />
                </div>
                <div class="form-group">
                    <a href="#" class="ForgetPwd">Forget Password?</a>
                </div>
            </form>
            <p class="small text-center">Don't have an account? <a href="{{url('register')}}">Sign up</a></p>
        </div>
        
    </div>
</div>
@endsection

@section('js')

@endsection
