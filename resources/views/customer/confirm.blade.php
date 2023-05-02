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
                        <form action="{{ route('store.checkout') }}" method="POST" class="checkout-form">
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
                                    value="{{ $orders['alamat'] . ' , Kec.' . $orders['kecamatan'] . ' Kota ' . $city->name . ', ' . $province->name . ' ' . $orders['kode_pos'] }}">
                            </div>
                            <p style="color: red">*Cek kembali data anda</p>

                    </div>
                    <div class="card d-none ongkir" style="margin-top: 30px">
                        <h4>Choose Shipping Method</h4>
                        <div class="card-body">
                            @foreach ($ongkir as $ship)
                                <div class="input-group">
                                    <input type="radio" aria-label="..." name="expedisi"
                                        value="{{ $ship['cost'][0]['value'] }}" id="ongkir">
                                    {{ Str::upper($orders['courier']) }} {{ $ship['service'] }} |
                                    {{ $ship['cost'][0]['value'] }}
                                </div>
                            @endforeach
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

                                                <input type="hidden" name="id_produk[]" value="{{ $id }}">

                                                <h5>
                                                    <span id="productName">{{ $details['name'] }}</span> <input
                                                        type="hidden" name="nama_produk[{{ $id }}]"
                                                        value="{{ $details['name'] }}">
                                                </h5>
                                                <p class="price" id="productQuantity">{{ $details['quantity'] }} Pcs</p>
                                                <input type="hidden" name="jumlah[{{ $id }}]"
                                                    value="{{ $details['quantity'] }}">
                                                <p class="price" id="productPrice">IDR
                                                    {{ number_format($details['price']) }}</p>
                                                <input type="hidden" name="harga[{{ $id }}]"
                                                    value="{{ $details['price'] }}">
                                                <input type="hidden" name="size[{{ $id }}]"
                                                    value="{{ $details['size'] }}">

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <input type="hidden" name="name" id="name" value="{{ Auth::user()->name }}">
                            <input type="hidden" name="email" id="email" value="{{ Auth::user()->email }}">
                            <input type="hidden" name="phone" id="phone" value="{{ Auth::user()->phone }}">
                            <input type="hidden" name="address" id="address" value="{{ Auth::user()->address }}">
                            <div class="discount-code">
                                <span>Total quantity : {{ $totalQuantity }} Pcs</span>
                            </div>
                            <ul class="summary-prices">
                                <li>
                                    <span>Subtotal:</span>
                                    <span class="price" id="subtotal">IDR {{ number_format($total) }}</span> <input
                                        type="hidden" name="subtotal" value="{{ $total }}">
                                </li>
                                <input type="hidden" name="shipping" value="JNE">
                                <input type="hidden" name="code" value="YES">
                                <li>
                                    <span>Shipping:</span>
                                    <span id="shippingCost">0</span>
                                    <input type="hidden" name="shipping_cost" id="shippingCostInput" value="10000">

                                </li>
                            </ul>
                            <div class="summary-total">
                                <span for="total">Total</span>
                                <span id="totalPrice">0</span>
                                <input type="hidden" name="totalPrice" id="totalPrice">
                            </div>
                        </div>
                        <input type="hidden" name="status" value="open">
                        <button class="btn btn-main mt-20 btn-check" id="submitBtn">Continue to Payment</button>
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
        document.getElementById("ongkir").addEventListener("click", ongkir);

        function ongkir() {
            let hargaOngkir = document.getElementById('ongkir').value;
            document.getElementById('shippingCost').innerHTML = hargaOngkir;
        }
        // mengambil data shipping dan memasukan kedalam form //
        function get() {
            let selectedCost = $('input[name="shipping_cost"]:checked').data('cost');
            $('#shippingCost').text('IDR. ' + selectedCost);
            $('#shippingCostInput').val(selectedCost);
        }

        // hitung total harga //
        function calculateTotal() {
            let subtotal = <?php echo $total; ?>;
            let shippingCost = parseFloat($('input[name="shipping"]:checked').val());
            let total = subtotal + shippingCost;
            $('#subtotal').text('IDR ' + subtotal.toLocaleString('id-ID'));
            $('#shippingCost').text('IDR ' + shippingCost.toLocaleString('id-ID'));
            $('#totalPrice').text('IDR ' + total.toLocaleString('id-ID'));
        }
    </script>

@endsection
