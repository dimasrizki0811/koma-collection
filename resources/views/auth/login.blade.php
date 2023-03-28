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
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h2 class="text-center">LOGIN</h2>
                        <form class="text-left clearfix" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" name="email"
                                    :value="old('email')" autofocus value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password"
                                    autocomplete="current-password" required id="id_password">
                                <i class="far fa-eye" id="togglePassword"
                                    style="cursor: pointer; float: right; margin-top: -30px; margin-right: 20px;"></i>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-main text-center">Login</button>
                            </div>
                        </form>
                        <p class="mt-20">New in this site ?<a href="{{ route('register') }}"> Create New Account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
