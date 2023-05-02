@extends('layouts.app')
@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Wishlist</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li class="active">wishlist</li>
                            @if (session('success'))
                                <div class="alert alert-success text-center">
                                    <strong>{{ session('success') }}</strong>
                                </div>
                            @endif
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="page-wrapper">
        <div class="cart shopping">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="block">
                            <div class="product-list">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="">Images | Item Name</th>
                                            <th class="">Quantity</th>
                                            <th class="">Item Price</th>
                                            <th class="">Weight</th>
                                            <th class="">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($wishlists as $details)
                                            <tr class="">
                                                <td class="">
                                                    <div class="product-info">
                                                        <img width="80"
                                                            src="{{ asset('storage/product/' . $details->images) }}"
                                                            alt="" />
                                                        <a href="#!">{{ $details->name }}</a>
                                                    </div>
                                                </td>
                                                <td class="">
                                                    {{ $details->quantity }}
                                                    Pcs
                                                </td>
                                                <td class="">IDR {{ number_format($details->price) }}</td>
                                                <td class="">{{ $details->berat }} Gram</td>
                                                <td class="">
                                                    <a href="{{ route('wishlist.destroy', $details->id) }}"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="event.preventDefault();
                                                                     if(confirm('Anda yakin ingin menghapus wishlist ini?')){
                                                                       document.getElementById('delete-form-{{ $details->id }}').submit();
                                                                     }">
                                                        <i class="fa fa-trash"></i>
                                                    </a>

                                                    <!-- Form untuk method DELETE -->
                                                    <form id="delete-form-{{ $details->id }}"
                                                        action="{{ route('wishlist.destroy', $details->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>
                                                <h4>Total</h4>
                                            </td>
                                            <td>{{ $sumTotal['quantity'] }} Pcs</td>
                                            <td>
                                                IDR {{ number_format($sumTotal['price']) }}
                                            </td>
                                            <td>{{ number_format($sumTotal['berat']) }} Gram</td>
                                        </tr>
                                    </tfoot>
                                </table>
                                @if ($wishlists !== null && count($wishlists) > 0)
                                    <!-- Tampilkan tombol checkout -->
                                    <a href="{{ url('/cart') }}" class="btn btn-main pull-right">View Cart
                                    </a>
                                @else
                                    <a href="{{ url('/on_sale') }}" class="btn btn-main pull-right">Shop Now</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
