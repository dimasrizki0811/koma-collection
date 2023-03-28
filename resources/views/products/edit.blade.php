@extends('layouts.app-admin')
@section('content')
    <div class="container mb-3">
        <div class="row">
            <div class="col">
                <h2>Edit Data Product</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-center">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control"
                            value="{{ old('price', $product->price) }}">
                    </div>
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" name="code" class="form-control" value="{{ old('code', $product->code) }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="images">Image</label>
                        <input type="file" name="images" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" class="form-control">
                            <option value="top">Top</option>
                            <option value="bottom">Bottom</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="text" name="stock" class="form-control" id="stock"
                            value="{{ old('stock', $product->stock) }}">
                    </div>
                    <div class="form-group">
                        <label for="berat">Berat</label>
                        <input type="number" name="berat" class="form-control" id="berat"
                            value="{{ old('berat', $product->berat) }}">
                    </div>
                    <div class="form-group">
                        <label for="size">Size</label>
                        <input type="text" name="size" class="form-control" id="sze"
                            value="{{ old('size', $product->size) }}">
                    </div>
                    <div class="form-group">
                        <label for="discount">Discount</label>
                        <select name="discount" id="discount" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="discount_price">Discount Price</label>
                        <input type="text" name="discount_price" id="discount_price" class="form-control"
                            value="{{ old('discount_price', $product->discount_price) }}">
                    </div>
                    <div class="form-group">
                        <label for="start_discount">Start Discount</label>
                        <input type="date" name="start_discount" id="start_discount" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection
