@extends('layouts.app')
@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Shop</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{ url('/customer') }}">Home</a></li>
                            <li class="active">shop</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="products section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="widget">
                        <h4 class="widget-title">Short By</h4>
                        <form method="get" action="{{ url('/shop') }}">
                            <select class="form-control" name="category">
                                <option value="top" {{ $category == 'top' ? 'selected' : '' }}>Top</option>
                                <option value="bottom" {{ $category == 'bottom' ? 'selected' : '' }}>Bottom</option>
                            </select>
                            <button class="btn btn-main" type="submit">Filter</button>
                        </form>
                    </div>
                    {{-- <div class="widget product-category">
                        <h4 class="widget-title">Categories</h4>
                        <div class="panel-group commonAccordion" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                            href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Shoes
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                    aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="#!">Brand & Twist</a></li>
                                            <li><a href="#!">Shoe Color</a></li>
                                            <li><a href="#!">Shoe Color</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                            href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Duty Wear
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="#!">Brand & Twist</a></li>
                                            <li><a href="#!">Shoe Color</a></li>
                                            <li><a href="#!">Shoe Color</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                            href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            WorkOut Shoes
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="#!">Brand & Twist</a></li>
                                            <li><a href="#!">Shoe Color</a></li>
                                            <li><a href="#!">Gladian Shoes</a></li>
                                            <li><a href="#!">Swis Shoes</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> --}}
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="product-item">
                                <div class="product-thumb">
                                    @foreach ($products as $item)
                                        <img class="img-responsive" src="{{ asset('storage/product/' . $item->images) }}"
                                            alt="product-img" />
                                        <div class="preview-meta">
                                            <ul>
                                                <li>
                                                    <span data-toggle="modal"
                                                        data-target="#product-modal-{{ $item->id }}">
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
                                    <h4><a href="product-single.html">{{ $item->name }}</a></h4>
                                    <p class="price">IDR <s>{{ number_format($item->price) }}</s></p>
                                    <?php
                                    $normal = $item->price;
                                    $discount = $item->discount_price;
                                    $final = $normal - $discount;
                                    ?>
                                    <p class="price">IDR {{ number_format($final) }}</p>
                                </div>
                            </div>
                        </div>


                        <!-- Modal -->
                        <div class="modal product-modal fade" id="product-modal-{{ $item->id }}">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="tf-ion-close"></i>
                            </button>
                            <div class="modal-dialog " role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-8 col-sm-6 col-xs-12">
                                                <div class="modal-image">
                                                    <img class="img-responsive"
                                                        src="{{ asset('storage/product/' . $item->images) }}"
                                                        alt="product-img" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <div class="product-short-details">
                                                    <h2 class="product-title">{{ $item->name }}</h2>
                                                    <s class="product-price">IDR {{ number_format($item->price) }}</s>
                                                    <h4 class="product-short-description">
                                                        IDR
                                                        {{ number_format($item->price - $item->discount_price) }}
                                                    </h4>
                                                    <h6 class="product-short-description">Size : {{ $item->size }}</h6>
                                                    <p class="product-short-description">
                                                        {{ $item->description }}
                                                    </p>
                                                    <a href="{{ route('detail.product', $item->id) }}"
                                                        class="btn btn-main">View
                                                        Product
                                                        Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.modal -->
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
