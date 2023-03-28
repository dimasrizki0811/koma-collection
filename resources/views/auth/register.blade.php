@extends('layouts.app')
@section('content')
    <section class="signin-page account">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="block text-center">
                        {{-- <a class="logo" href="index.html">
                            <img src="images/logo.png" alt="">
                        </a> --}}
                        <h2 class="text-center">Create Your Account</h2>
                        <form class="text-left clearfix" action="{{ route('register') }}" method="POST"> @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Full Name" autofocus>
                                @error('name')
                                    <div class="text-danger bg-light" style="font-size: 12px; font-weight: bold;">
                                        *{{ $message }}*
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username">
                                @error('username')
                                    <div class="text-danger bg-light" style="font-size: 12px; font-weight: bold;">
                                        *{{ $message }}*
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="level" class="form-control" value="user">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                                @error('email')
                                    <div class="text-danger bg-light" style="font-size: 12px; font-weight: bold;">
                                        *{{ $message }}*
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    autocomplete="current-password" required="" id="id_password">
                                <i class="far fa-eye" id="togglePassword"
                                    style="cursor: pointer; float: right; margin-top: -30px; margin-right: 20px;"></i>
                                @error('password')
                                    <div class="text-danger bg-light" style="font-size: 12px; font-weight: bold;">
                                        *{{ $message }}*
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="password_confirmation" id="password-field" type="password"
                                    placeholder="Confrm Password">
                                {{-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"
                                    style="float: right; margin-top: -27px; font-size: 17px; margin-left: 40px"></span> --}}
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-main text-center">Sign In</button>
                            </div>
                        </form>
                        <p class="mt-20">Already hava an account ?<a href="{{ route('login') }}"> Login</a></p>
                        <p><a href="forget-password.html"> Forgot your password?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
