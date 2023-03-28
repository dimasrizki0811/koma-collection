@extends('layouts.app')
@section('content')
    <!-- Page Wrapper -->
    <section class="page-wrapper" style="margin-top: -40px">
        <div class="container">
            <div class="row">
                <h2 class="text-center mb-5">Checkout Page</h2>
                <div class="col-md-7">
                    <div class="block billing-details">
                        <h4 class="widget-title">Information Details</h4>
                        <form action="" method="POST" class="checkout-form">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" class="form-control" id="contact" placeholder="" name="email"
                                    value="{{ Auth::user()->email }}">
                            </div>
                            <div class="form-group">
                                <label for="shipto">Ship to</label>
                                <input type="text" class="form-control" id="shipto" name="shipto"
                                    value="{{ Auth::user()->address }}">
                            </div>
                            <p style="color: red">*Cek kembali data anda</p>

                    </div>
                    <div class="card d-none ongkir" style="margin-top: 30px">
                        <h4>Choose Shipping Method</h4>
                        <div class="card-body">
                            <ul class="list-group">

                                <div for="" id="ongkir"></div>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="product-checkout-details">
                        <div class="block">
                            <h4 class="widget-title text-center">Order Summary</h4>
                            @php
                                $total = 0;
                                $totalQuantity = 0;
                            @endphp
                            @if (session('cart'))
                                @foreach ($cart as $id => $details)
                                    @php
                                        $total += $details['price'] * $details['quantity'];
                                        $totalQuantity += $details['quantity'];
                                    @endphp
                                    <div class="product-media">
                                        <div class="media product-card">

                                            <div class="media-body">
                                                <img src="{{ asset('storage/product/' . $details['images']) }}"
                                                    alt="" class="media-object" style="float: right">
                                                <h5>
                                                    {{ $details['name'] }}
                                                </h5>
                                                <p class="price">{{ $details['quantity'] }} Pcs</p>
                                                <p class="price">IDR {{ number_format($details['price']) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="discount-code">

                            </div>
                            <ul class="summary-prices">
                                <li>
                                    <span>Subtotal:</span>
                                    <span class="price">IDR {{ number_format($total) }}</span>
                                </li>
                                <li>
                                    <span>Shipping:</span>
                                    <span id="shipping"></span>
                                </li>
                            </ul>
                            <div class="summary-total">
                                <span>Total</span>
                                <span>IDR {{ number_format($total) }}</span>
                            </div>
                        </div>
                        <button class="btn btn-main mt-20 btn-check">Continue to Payment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.page-warpper -->
    <!-- AJAX ONGKIR                                                                                                  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        let ongkirData = JSON.parse(localStorage.getItem('ongkirData'));
        if (ongkirData) {
            for (let i = 0; i < ongkirData.length; i++) {
                $('#ongkir').append('<input type="radio" onchange="get()" value="' + ongkirData[i].cost +
                    '" class="list-group-item">' +
                    ongkirData[i].code + ' : <strong>' +
                    ongkirData[i].service + '</strong> - Rp. ' + ongkirData[i].cost +
                    ' (' + ongkirData[i].etd + ' hari)');

            }
        }

        function get() {
            const shipp = document.getElementById('shipping');
            shipp.val();
        }
    </script>

@endsection
