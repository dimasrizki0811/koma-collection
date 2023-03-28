@extends('layouts.app-admin')
@section('content')
    {{-- <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Detail User</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('/storage/avatar/' . $user->avatar) }}" alt="">
                    </div>
                    <div class="col-md-6">
                        <h3>Nama : {{ $user->name }}</h3>
                        <h3>Username : {{ $user->username }}</h3>
                        <h3>Email : {{ $user->email }}</h3>
                        <h3>Phone : {{ $user->phone }}</h3>
                        <h3>Address : {{ $user->address }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-md-4">
            @if ($user->avatar)
                <img src="{{ asset('storage/avatar/' . $user->avatar) }}" class="img-thumbnail rounded mx-auto d-block">
            @else
                <img src="{{ asset('img/profile.png') }}" class="img-thumbnail rounded mx-auto d-block">
            @endif

        </div>
        <div class="col-md-8">
            <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ $user->name }}" required autocomplete="name">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                    <div class="col-md-6">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                            name="username" value="{{ old('username', $user->username) }}" required autocomplete="username">

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                    <div class="col-md-6">
                        <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror"
                            name="phone" value="{{ old('phone', $user->phone) }}" required autocomplete="phone">

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                            name="address" value="{{ old('address', $user->address) }}" required autocomplete="email">

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm"
                        class="col-md-4 col-form-label text-md-end">{{ __('Change Profile Photo') }}</label>

                    <div class="col-md-6">
                        <input id="avatar" type="file" class="form-control" name="avatar">
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update Profile') }}
                        </button>
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
