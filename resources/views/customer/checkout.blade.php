@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="checkout shopping">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="block billing-details">
                            <h4 class="widget-title">Information Details</h4>
                            <form action="" method="" class="checkout-form">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" id="country" placeholder="Indonesia"
                                        value="Indonesia" name="country" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" placeholder="" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="no_tlp">Nomor Telepon</label>
                                    <input type="number" class="form-control" id="no_tlp" placeholder=""
                                        name="phone_number">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" placeholder="" name="address">
                                </div>
                                <div class="checkout-country-code clearfix">
                                    <div class="form-group">
                                        <label for="kecamatan">Kecamatan</label>
                                        <input type="text" class="form-control" id="kecamatan" name="kecamatan">
                                    </div>
                                    <div class="form-group">
                                        <label for="kode_pos">Kode Pos</label>
                                        <input type="text" class="form-control" id="kode_pos" name="destination">
                                    </div>
                                </div>
                                <input type="hidden" name="city_origin" value="151" id="city_origin">
                                <div class="checkout-country-code clearfix">
                                    <div class="form-group">
                                        <select class="form-control provinsi-tujuan" name="province_destination">
                                            <option value="0">-- pilih provinsi tujuan --</option>
                                            @foreach ($provinces as $province => $value)
                                                <option value="{{ $province }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control kota-tujuan" name="city_destination">
                                            <option value="">-- pilih kota tujuan --</option>
                                        </select>
                                        </section>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select class="form-control kurir" name="courier">
                                        <option value="0">-- pilih kurir --</option>
                                        <option value="jne">JNE</option>
                                        <option value="pos">POS</option>
                                        <option value="tiki">TIKI</option>
                                    </select>
                                </div>
                        </div>
                        <div class="block">
                            <div class="checkout-product-details">
                                <div class="payment">
                                    <div class="card-details">
                                        @php
                                            $total = 0;
                                            $totalQuantity = 0;
                                        @endphp
                                        @if (session('cart'))
                                            @foreach ($cart as $id => $details)
                                                @php
                                                    $userId = auth()->id();
                                                    $total += $details['price'] * $details['quantity'];
                                                    $id_product = $details['product_id'];
                                                    $totalQuantity += $details['quantity'];
                                                @endphp
                                                <input type="hidden" name="product_id" value="{{ $id_product }}">
                                                <input type="hidden" name="user_id" value="{{ $userId }}">
                                                <input type="hidden" name="name" value="{{ Auth::user()->email }}">
                                                <input type="hidden" name="quantity" value="{{ $totalQuantity }}">
                                                <input type="hidden" name="total" value="{{ $total }}">
                                            @endforeach
                                        @endif
                                        <input type="hidden" name="weight" id="weight"
                                            value="{{ $details['berat'] * $totalQuantity }}">
                                        <input type="hidden" name="status" value="unpaid">
                                        <button class="btn btn-main mt-20 btn-check">Continue to Shipping</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5" style="margin-top: 50px">
                        <div class="product-checkout-details">
                            <div class="block">
                                <h4 class="widget-title">Order Summary</h4>
                                @php
                                    $total = 0;
                                    $totalQuantity = 0;
                                @endphp
                                @if (session('cart'))
                                    @foreach ($cart as $id => $details)
                                        @php
                                            $userId = auth()->id();
                                            $total += $details['price'] * $details['quantity'];
                                            $id_product = $details['product_id'];
                                            $totalQuantity += $details['quantity'];
                                        @endphp
                                        <div class="media product-card">
                                            <a class="pull-left" href="#">
                                                <img class="media-object"
                                                    src="{{ asset('storage/product/' . $details['images']) }}"
                                                    alt="Image" />
                                            </a>
                                            <div class="media-body">
                                                <a href="{{ route('cart.remove', $id) }}" class="remove"><i
                                                        class="tf-ion-close" style="float: right"></i></a>
                                                <h4 class="media-heading">{{ $details['name'] }}</h4>
                                                <p class="price">{{ number_format($details['quantity']) }} Pcs</p>
                                                <p class="price">IDR {{ number_format($details['price']) }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="discount-code">
                                    <p>Total Quantity {{ $totalQuantity }} Pcs</p>
                                </div>
                                <div class="summary-total">
                                    <span>Total</span>
                                    <span>IDR {{ number_format($total) }}</span>
                                </div>
                                <div class="verified-icon">
                                    <img src="images/shop/logo.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="coupon-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Enter Coupon Code">
                        </div>
                        <button type="submit" class="btn btn-main">Apply Coupon</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- AJAX ONGKIR                                                                                                  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            //active select2
            $(" .provinsi-asal, .kota-asal, .provinsi-tujuan, .kota-tujuan").select2({
                theme: 'bootstrap4',
                width: 'style',
            });
            // ajax select kota asal
            $('select[name="province_origin"]').on('change', function() {
                let provindeId = $(this).val();
                if (provindeId) {
                    jQuery.ajax({
                        url: '/checkout/' + provindeId,
                        type: "GET",
                        dataType: "json",
                        success: function(response) {
                            $('select[name="city_origin"]').empty();
                            $('select[name="city_origin"]').append(
                                '<option value="">-- pilih kota asal --</option>');
                            $.each(response, function(key, value) {
                                $('select[name="city_origin"]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="city_origin"]').append(
                        '<option value="">-- pilih kota asal --</option>');
                }
            });
            //ajax select kota tujuan
            $('select[name="province_destination"]').on('change', function() {
                let provindeId = $(this).val();
                if (provindeId) {
                    jQuery.ajax({
                        url: '/checkout/' + provindeId,
                        type: "GET",
                        dataType: "json",
                        success: function(response) {
                            $('select[name="city_destination"]').empty();
                            $('select[name="city_destination"]').append(
                                '<option value="">-- pilih kota tujuan --</option>');
                            $.each(response, function(key, value) {
                                $('select[name="city_destination"]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="city_destination"]').append(
                        '<option value="">-- pilih kota tujuan --</option>');
                }
            });
            //ajax check ongkir
            let isProcessing = false;
            $('.btn-check').click(function(e) {
                e.preventDefault();

                let token = $("meta[name='csrf-token']").attr("content");
                let country = $('#country').val();
                let name = $('#name').val();
                let no_tlp = $('#no_tlp').val();
                let alamat = $('#alamat').val();
                let kecamatan = $('#kecamatan').val();
                let kode_pos = $('#kode_pos').val();
                let city_origin = $('#city_origin').val();
                let province_destination = $('select[name=province_destination]').val();
                let city_destination = $('select[name=city_destination]').val();
                let courier = $('select[name=courier]').val();
                let weight = $('#weight').val();

                if (isProcessing) {
                    return;
                }
                isProcessing = true;
                jQuery.ajax({
                    url: "/ongkir",
                    data: {
                        _token: token,
                        country: country,
                        name: name,
                        no_tlp: no_tlp,
                        alamat: alamat,
                        kecamatan: kecamatan,
                        kode_pos: kode_pos,
                        city_origin: city_origin,
                        province_destination: province_destination,
                        city_destination: city_destination,
                        courier: courier,
                        weight: weight,
                    },
                    dataType: "JSON",
                    type: "POST",
                    success: function(response) {
                        isProcessing = false;
                        if (response) {
                            $('#ongkir').empty();
                            $('.ongkir').addClass('d-block');
                            let ongkirData = [];
                            $.each(response[0]['costs'], function(key, value) {
                                ongkirData.push({
                                    code: response[0].code.toUpperCase(),
                                    service: value.service,
                                    cost: value.cost[0].value,
                                    etd: value.cost[0].etd
                                });
                                $('#ongkir').append('<li class="list-group-item">' +
                                    response[0].code.toUpperCase() + ' : <strong>' +
                                    value.service + '</strong> - Rp. ' + value.cost[
                                        0].value + ' (' + value.cost[0].etd +
                                    ' hari)</li>');
                            });
                            localStorage.setItem('ongkirData', JSON.stringify(ongkirData));
                            // Set session variables
                            sessionStorage.setItem('country', country);
                            sessionStorage.setItem('name', name);
                            sessionStorage.setItem('no_tlp', no_tlp);
                            sessionStorage.setItem('alamat', alamat);
                            sessionStorage.setItem('kecamatan', kecamatan);
                            sessionStorage.setItem('kode_pos', kode_pos);
                            sessionStorage.setItem('city_origin', city_origin);
                            sessionStorage.setItem('province_destination',
                                province_destination);
                            sessionStorage.setItem('city_destination', city_destination);
                            sessionStorage.setItem('courier', courier);
                            sessionStorage.setItem('weight', weight);

                            console.log(response);
                            window.location.href = "/confirm";
                        }
                    }
                });

            });

        });
    </script>
@endsection
