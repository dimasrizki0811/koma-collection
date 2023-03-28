@extends('layouts.app')
@section('content')
    <div class="hero-slider">
        <div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/slider-4.png)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 text-center">
                        <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
                        <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br>
                            is hidden in details.</h1>
                        <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                            href="{{ url('/shop') }}">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/slider-5.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 text-left">
                        <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
                        <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br>
                            is hidden in details.</h1>
                        <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                            href="{{ url('/shop') }}">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/slider-6.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 text-right">
                        <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
                        <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br>
                            is hidden in details.</h1>
                        <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                            href="{{ url('/shop') }}">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="product section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title text-center">
                        <h2>Discount 30%</h2>
                    </div>
                </div>
                @if (isset($firstData))
                    @foreach ($firstData->take(3) as $data)
                        <div class="col-md-4">
                            <div class="category-box">
                                <a href="#!">
                                    <img src="{{ asset('/storage/product/' . $data->images) }}" alt="" />
                                </a>
                            </div>
                            <div class="content text-center">
                                <h3>{{ $data->name }}</h3>
                                <s>IDR {{ number_format($data->price) }}</s>
                                <p>IDR {{ number_format($data->price - $data->discount_price) }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="col-md-12">
                    <div class="title text-center">
                        <a href="{{ url('/on_sale') }}" class="btn btn-main text-center" style="width: 200px">See
                            More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="products section bg-gray">
        <div class="container">
            <div class="row">
                <div class="title text-center">
                    <h2>Best Seller</h2>
                </div>
            </div>
            <div class="row">

                <div class="col-md-4">
                    <div class="product-item">
                        <div class="product-thumb">
                            <span class="bage">Sale</span>
                            <img class="img-responsive" src="images/shop/products/product-1.jpg" alt="product-img" />
                            <div class="preview-meta">
                                <ul>
                                    <li>
                                        <span data-toggle="modal" data-target="#product-modal">
                                            <i class="tf-ion-ios-search-strong"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="tf-ion-ios-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-single.html">Reef Boardsport</a></h4>
                            <p class="price">Rp. 75.000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img class="img-responsive" src="images/shop/products/product-2.jpg" alt="product-img" />
                            <div class="preview-meta">
                                <ul>
                                    <li>
                                        <span data-toggle="modal" data-target="#product-modal">
                                            <i class="tf-ion-ios-search-strong"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="#"><i class="tf-ion-ios-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-single.html">Rainbow Shoes</a></h4>
                            <p class="price">Rp. 75.000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img class="img-responsive" src="images/shop/products/product-3.jpg" alt="product-img" />
                            <div class="preview-meta">
                                <ul>
                                    <li>
                                        <span data-toggle="modal" data-target="#product-modal">
                                            <i class="tf-ion-ios-search-strong"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="#"><i class="tf-ion-ios-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-single.html">Strayhorn SP</a></h4>
                            <p class="price">Rp. 75.000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img class="img-responsive" src="images/shop/products/product-4.jpg" alt="product-img" />
                            <div class="preview-meta">
                                <ul>
                                    <li>
                                        <span data-toggle="modal" data-target="#product-modal">
                                            <i class="tf-ion-ios-search-strong"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="#"><i class="tf-ion-ios-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-single.html">Bradley Mid</a></h4>
                            <p class="price">Rp. 75.000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img class="img-responsive" src="images/shop/products/product-5.jpg" alt="product-img" />
                            <div class="preview-meta">
                                <ul>
                                    <li>
                                        <span data-toggle="modal" data-target="#product-modal">
                                            <i class="tf-ion-ios-search-strong"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="#"><i class="tf-ion-ios-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-single.html">Rainbow Shoes</a></h4>
                            <p class="price">Rp. 75.000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img class="img-responsive" src="images/shop/products/product-6.jpg" alt="product-img" />
                            <div class="preview-meta">
                                <ul>
                                    <li>
                                        <span data-toggle="modal" data-target="#product-modal">
                                            <i class="tf-ion-ios-search-strong"></i>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="#"><i class="tf-ion-ios-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-single.html">Rainbow Shoes</a></h4>
                            <p class="price">Rp. 75.000</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="title text-center">
                        <a href="" class="btn btn-main text-center" style="width: 200px">See More</a>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal product-modal fade" id="product-modal">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="tf-ion-close"></i>
                    </button>
                    <div class="modal-dialog " role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <div class="modal-image">
                                            <img class="img-responsive" src="images/shop/products/modal-product.jpg"
                                                alt="product-img" />
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="product-short-details">
                                            <h2 class="product-title">GM Pendant, Basalt Grey</h2>
                                            <p class="product-price">$200</p>
                                            <p class="product-short-description">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem iusto
                                                nihil
                                                cum. Illo laborum numquam rem aut officia dicta cumque.
                                            </p>
                                            <a href="cart.html" class="btn btn-main">Add To Cart</a>
                                            <a href="product-single.html" class="btn btn-transparent">View Product
                                                Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.modal -->

            </div>
        </div>
    </section>

    <div class="hero-slider" style="width: 100%">
        <div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/slider-2.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 text-center">
                        <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                            href="{{ url('/shop') }}">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/slider-8.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 text-left">
                        <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                            href="{{ url('/shop') }}">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/slider-1.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 text-center">
                        <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                            href="{{ url('/shop') }}">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Call To Action ==================================== -->

    <hr style="border: 1px solid rgb(234, 231, 231)">
    <section class="products section bg-gray">
        <div class="container-fluid">
            <div class="row">
                <div class="title text-center">
                    <h2>FOLLOW US ON INSTAGRAM</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img class="img-responsive" src="images/shop/category/category-1.jpg" alt="product-img" />
                            <div class="preview-meta">
                                <ul>
                                    <li>
                                        <a href="#!"><i class="tf-ion-social-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img class="img-responsive" src="images/shop/category/category-2.jpg" alt="product-img" />
                            <div class="preview-meta">
                                <ul>
                                    <li>
                                        <a href="#!"><i class="tf-ion-social-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img class="img-responsive" src="images/shop/category/category-3.jpg" alt="product-img" />
                            <div class="preview-meta">
                                <ul>
                                    <li>
                                        <a href="#!"><i class="tf-ion-social-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img class="img-responsive" src="images/shop/category/category-6.jpg" alt="product-img" />
                            <div class="preview-meta">
                                <ul>
                                    <li>
                                        <a href="#!"><i class="tf-ion-social-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="side">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/slider/slider-10.jpg') }}" alt="" width="100%">
            </div>
            <div class="col-md-6 text-center">
                <div class="title" style="padding-top: 50px">
                    <h1>SUBSCRIBE TO NEWSLETTER</h1>
                    <p style="color: #FEFCF3; font-size: 16px">KLAIM GRATIS ONGKIR PERTAMAMU.</p>
                </div>
                <div class="col-lg-6 col-md-offset-3">
                    <div class="input-group subscription-form text-center" style="width: 278px">
                        <input type="text" class="form-control" placeholder="Enter Your Email Address">
                    </div>
                    <div class="input-group subscription-form">
                        <span class="input-group-btn">
                            <button class="btn btn-main" type="button">Subscribe
                                Now!</button>
                        </span>
                    </div>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->

        </div>
        </div>
    </section>
@endsection
