@extends('layouts.app-admin')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <a href="{{ url('/add_product') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
            style="float: right"><i class="fas fa-download fa-sm text-white-50"></i> Add Product</a>
        <a href="{{ url('/product') }}">
            <h1 class="h3 mb-2 text-gray-800">Product Discount</h1>
        </a>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Product Discount</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataProduct" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Disc Price</th>
                                <th>Start Date</th>
                                <th>Image</th>
                                <th>Action</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Disc Price</th>
                                <th>Start Date</th>
                                <th>Image</th>
                                <th>Action</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->code }}</td>
                                    <td>{{ $product->discounted_price }}</td>
                                    <td>{{ $product->start_discount }}</td>
                                    <td><img src="{{ asset('/storage/product/' . $product->images) }}" width="100"
                                            alt="{{ $product->name }}"></td>
                                    <td>
                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning"><i
                                                class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
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
