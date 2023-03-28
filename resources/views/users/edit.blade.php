@extends('layouts.app-admin')
@section('content')
    <div class="container mb-3">
        <div class="row">
            <div class="col">
                <h2>Edit Data Users</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control"
                            value="{{ old('username', $user->username) }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
                    </div>
                    <div class="form-group">
                        <label for="images">Image</label>
                        <input type="file" name="avatar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control"
                            value="{{ old('address', $user->address) }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection
