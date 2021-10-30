@extends('layout')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('title')
    Register
@endsection

{{-- -------------- Start Body Content --}}
@section('content')

    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome</h3>
                <div class="text-center ">
                    <span class="small d-block">Alredy hav an account? <a href="{{ url('login') }}"
                            class="text-white">Login</a></span>
                </div>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <form action="{{ url('register') }}" method="POST">
                        @csrf
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Register</h3>
                            <div class="row register-form">
                                @include('errors')
                                <div class="form-group col-6">
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name *"
                                        value="{{ old('first_name') }}" />
                                </div>
                                <div class="form-group col-6">
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name *"
                                        value="{{ old('last_name') }}" />
                                </div>
                                <div class="form-group my-3">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email *"
                                        value="{{ old('email') }}" />
                                </div>
                                <div class="form-group col-6">
                                    <input type="password" name="password" class="form-control" placeholder="Password *"
                                        value="" />
                                </div>
                                <div class="form-group col-6">
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Confirm Password *" value="" />
                                </div>
                                <div class="form-group mt-4">
                                    <div class="maxl">
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="male" checked>
                                            <span> Male </span>
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="female">
                                            <span>Female </span>
                                        </label>
                                    </div>
                                </div>


                                
                                
                                <input type="submit" class="btnRegister" value="Register" />

                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    </div>

@endsection
{{-- -------------- End Body Content --}}
