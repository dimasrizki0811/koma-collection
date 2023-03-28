@extends('layouts.app-admin')
@section('content')
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 text-center mb-4">
                <h2>My Profile</h2>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('/storage/avatar/' . Auth::user()->avatar) }}" alt=""
                    class="img-thumbnail rounded mx-auto d-block">
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name">Nama :</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="name">Email :</label>
                    <input type="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="name">Username :</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->username }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="name">Phone Number :</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->phone }}" readonly>
                </div>
            </div>
        </div>
    </div>
@endsection
