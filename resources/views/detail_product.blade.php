@extends('layouts.app')
@section('content')
    <section class="single-product">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/customer') }}">Home</a></li>
                        <li><a href="{{ url('/shop') }}">Shop</a></li>
                        <li class="active">Single Product</li>
                    </ol>
                </div>
                {{-- <div class="col-md-6">
                    <ol class="product-pagination text-right">
                        <li><a href="blog-left-sidebar.html"><i class="tf-ion-ios-arrow-left"></i> Next </a></li>
                        <li><a href="blog-left-sidebar.html">Preview <i class="tf-ion-ios-arrow-right"></i></a></li>
                    </ol>
                </div> --}}
            </div>
            <div class="row mt-20">
                <div class="col-md-5">
                    <div class="single-product-slider">
                        <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
                            <div class='carousel-outer'>
                                <!-- me art lab slider -->
                                <div class='carousel-inner '>
                                    <div class='item active'>
                                        <img src='{{ asset('storage/product/' . $product->images) }}' alt=''
                                            data-zoom-image="{{ asset('storage/product/' . $product->images) }}" />
                                    </div>
                                    <div class='item'>
                                        <img src='{{ asset('storage/product/' . $product->images) }}' alt=''
                                            data-zoom-image="images/shop/single-products/product-2.jpg" />
                                    </div>

                                </div>

                                <!-- sag sol -->
                                <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
                                    <i class="tf-ion-ios-arrow-left"></i>
                                </a>
                                <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
                                    <i class="tf-ion-ios-arrow-right"></i>
                                </a>
                            </div>

                            <!-- thumb -->
                            <ol class='carousel-indicators mCustomScrollbar meartlab'>
                                <li data-target='#carousel-custom' data-slide-to='0' class='active'>
                                    <img src="{{ asset('storage/product/' . $product->images) }}" alt='' />
                                </li>
                                <li data-target='#carousel-custom' data-slide-to='1'>
                                    <img src="{{ asset('storage/product/' . $product->images) }}" alt='' />
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-details">
                        <h2>{{ $product->name }}</h2>
                        @if ($product->discount == 1)
                            <h3 class="product-price">IDR {{ number_format($product->price - $product->discount_price) }}
                            </h3>
                        @else
                            <h3 class="product-price">IDR {{ number_format($product->price) }}</h3>
                        @endif
                        <p class="product-description mt-20">
                            {{ $product->description }}</p>
                        <div class="color-swatches">
                            <span>color:</span>
                            <ul>
                                <li>
                                    <a href="#" class="swatch-olive" title="Olive" data-color="olive"></a>
                                </li>
                                <li>
                                    <a href="#!" class="swatch-black" title="Black" data-color="black"></a>
                                </li>
                                <li>
                                    <a href="#!" class="swatch-bw" title="Broken White" data-color="brokenwhite"></a>
                                </li>
                                <li>
                                    <a href="#!" class="swatch-salem" title="Salem" data-color="salem"></a>
                                </li>
                                <li>
                                    <a href="#!" class="swatch-teracotta" title="Teracotta" data-color="teracotta"></a>
                                </li>
                                <li>
                                    <a href="#!" class="swatch-wardah" title="Wardah" data-color="wardah"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-size">
                            <span>Size:</span>
                            <select class="form-control">
                                <option value="all_size">All Size</option>
                            </select>
                        </div>
                        {{-- <div class="product-quantity">
                            <span>Quantity:</span>
                            <div class="product-quantity-slider">
                                <input id="product-quantity" type="text" value="0" name="product-quantity">
                            </div>
                        </div> --}}
                        <div class="product-category">
                            <span>Categories:</span>
                            <ul>
                                <li>{{ strtoupper($product->category) }}</li>
                            </ul>
                        </div>
                        <a href="{{ url('/add-to-cart', $product->id) }}" class="btn btn-main mt-20">Add To Cart</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="tabCommon mt-20">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#details" aria-expanded="true">Details</a>
                            </li>
                            <li class=""><a data-toggle="tab" href="#reviews" aria-expanded="false">Reviews
                                    (3)</a></li>
                        </ul>
                        <div class="tab-content patternbg">
                            <div id="details" class="tab-pane fade active in">
                                <h4>Product Description</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                    mollit anim id est laborum. Sed ut per spici</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis delectus quidem
                                    repudiandae veniam distinctio repellendus magni pariatur molestiae asperiores animi, eos
                                    quod iusto hic doloremque iste a, nisi iure at unde molestias enim fugit, nulla
                                    voluptatibus. Deserunt voluptate tempora aut illum harum, deleniti laborum animi neque,
                                    praesentium explicabo, debitis ipsa?</p>
                            </div>
                            <div id="reviews" class="tab-pane fade">
                                <div class="post-comments">
                                    <ul class="media-list comments-list m-bot-50 clearlist">
                                        <!-- Comment Item start-->
                                        <li class="media">

                                            <a class="pull-left" href="#!">
                                                <img class="media-object comment-avatar" src="images/blog/avater-1.jpg"
                                                    alt="" width="50" height="50" />
                                            </a>

                                            <div class="media-body">
                                                <div class="comment-info">
                                                    <h4 class="comment-author">
                                                        <a href="#!">Jonathon Andrew</a>

                                                    </h4>
                                                    <time datetime="2013-04-06T13:53">July 02, 2015, at 11:34</time>
                                                    <a class="comment-button" href="#!"><i
                                                            class="tf-ion-chatbubbles"></i>Reply</a>
                                                </div>

                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at
                                                    magna ut ante eleifend eleifend.Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit. Quod laborum minima, reprehenderit laboriosam officiis
                                                    praesentium? Impedit minus provident assumenda quae.
                                                </p>
                                            </div>

                                        </li>
                                        <!-- End Comment Item -->

                                        <!-- Comment Item start-->
                                        <li class="media">

                                            <a class="pull-left" href="#!">
                                                <img class="media-object comment-avatar" src="images/blog/avater-4.jpg"
                                                    alt="" width="50" height="50" />
                                            </a>

                                            <div class="media-body">

                                                <div class="comment-info">
                                                    <div class="comment-author">
                                                        <a href="#!">Jonathon Andrew</a>
                                                    </div>
                                                    <time datetime="2013-04-06T13:53">July 02, 2015, at 11:34</time>
                                                    <a class="comment-button" href="#!"><i
                                                            class="tf-ion-chatbubbles"></i>Reply</a>
                                                </div>

                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at
                                                    magna ut ante eleifend eleifend. Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit. Magni natus, nostrum iste non delectus atque ab a
                                                    accusantium optio, dolor!
                                                </p>

                                            </div>

                                        </li>
                                        <!-- End Comment Item -->

                                        <!-- Comment Item start-->
                                        <li class="media">

                                            <a class="pull-left" href="#!">
                                                <img class="media-object comment-avatar" src="images/blog/avater-1.jpg"
                                                    alt="" width="50" height="50">
                                            </a>

                                            <div class="media-body">

                                                <div class="comment-info">
                                                    <div class="comment-author">
                                                        <a href="#!">Jonathon Andrew</a>
                                                    </div>
                                                    <time datetime="2013-04-06T13:53">July 02, 2015, at 11:34</time>
                                                    <a class="comment-button" href="#!"><i
                                                            class="tf-ion-chatbubbles"></i>Reply</a>
                                                </div>

                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at
                                                    magna ut ante eleifend eleifend.
                                                </p>

                                            </div>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="products related-products section">
        <div class="container">
            <div class="row">
                <div class="title text-center">
                    <h2>Related Products</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img class="img-responsive" src="{{ asset('storage/product/' . $product->images) }}"
                                alt="product-img" />
                            <div class="preview-meta">
                                <ul>
                                    <li>
                                        <span data-toggle="modal" data-target="#product-modal">
                                            <i class="tf-ion-ios-search"></i>
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
                            <h4><a href="product-single.html">{{ $product->name }}</a></h4>
                            <p class="price">IDR {{ number_format($product->price) }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
