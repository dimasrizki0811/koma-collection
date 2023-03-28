@extends('layouts.app-admin')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <a href="{{ url('/add_user') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
            style="float: right"><i class="fas fa-plus fa-sm text-white-50"></i> Add User</a>
        <h1 class="h3 mb-2 text-gray-800">Users</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataProduct" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Images</th>
                                <th>Action</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Images</th>
                                <th>Action</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td><img src="{{ asset('/storage/avatar/' . $user->avatar) }}" width="100"
                                            alt="{{ $user->name }}"></td>
                                    <td>
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning"><i
                                                class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('user.show', $user->id) }}" class="btn btn-info"><i
                                                class="fa fa-search"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataProduct').DataTable();
        });
    </script>
@endsection
