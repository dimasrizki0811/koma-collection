<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>KOMA</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Constra HTML Template v1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}" />

    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="{{ asset('plugins/themefisher-font/style.css') }}">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">

    <!-- Animate css -->
    <link rel="stylesheet" href="{{ asset('plugins/animate/animate.css') }}">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="{{ asset('plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/slick/slick-theme.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Fontaswome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/brands.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/solid.min.css') }}">

    <!-- Link eye -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- Animated -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body id="body">
    <!-- Start Top Header Bar -->
    <section class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12 col-sm-4">
                    <div class="contact-number">
                        <i class="tf-ion-ios-telephone"></i>
                        <span>081321689202</span>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-4">
                    <!-- Site Logo -->
                    <div class="logo text-center">
                        <a href="{{ url('/') }}">
                            <!-- replace logo here -->
                            <svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                                    font-size="40" font-family="AustinBold, Austin" font-weight="bold">
                                    <g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
                                        <text id="AVIATO">
                                            <tspan x="108.94" y="325">KOMA</tspan>
                                        </text>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-4">
                    <!-- Cart -->
                    <ul class="top-menu text-right list-inline">
                        <li class="dropdown cart-nav dropdown-slide">
                            <a href="#!" class="dropdown-toggle" data-toggle="modal" data-target="dropdown"><i
                                    class="fa fa-shopping-cart"></i></a>
                            <div class="dropdown-menu cart-dropdown">
                                <!-- Cart Item -->
                                <div class="media">
                                    <a class="pull-left" href="#!">
                                        <i class="fa fa-cart-plus"></i>
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">Cart Empty<a href="#!"></a>
                                        </h4>
                                    </div>
                                </div><!-- / Cart Item -->
                            </div>
                        </li><!-- / Cart -->

                        <!-- Search -->
                        <li class="dropdown search dropdown-slide">
                            <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
                                    class="fa fa-search"></i></a>
                            <ul class="dropdown-menu search-dropdown">
                                <li>
                                    <form action="post"><input type="search" class="form-control"
                                            placeholder="Search..."></form>
                                </li>
                            </ul>
                        </li><!-- / Search -->
                        <!-- Login -->

                        @if (Auth::check() && Auth::user()->isUser())
                            <li class="dropdown dropdown-slide">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                    data-hover="dropdown"><i class="fa fa-user"></i></a>
                                <ul class="dropdown-menu dropdown">
                                    <li>Welcome, {{ Auth::user()->name }}</li>
                                    <li>
                                        <a href="/logout"
                                            onclick="event.preventDefault(); document.getElementById('logout').submit()"
                                            class="nav-link"><i class="fa fa-power-off"></i> Logout</a>
                                    </li>
                                    <form action="/logout" method="POST" id="logout">@csrf</form>
                            </li>
                    </ul>
                    </li>
                @else
                    <li class="common">
                        <a href="{{ route('login') }}" title="Login"><i class="fa fa-user"></i></a>
                    </li>
                    @endif
                    <!-- / Login -->
                    </ul><!-- / .nav .navbar-nav .navbar-right -->
                </div>
            </div>
        </div>
    </section><!-- End Top Header Bar -->

    <!-- Main Menu Section -->
    <section class="menu">
        <nav class="navbar navigation">
            <div class="container">
                <div class="navbar-header">
                    <h2 class="menu-title">Main Menu</h2>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div><!-- / .navbar-header -->

                <!-- Navbar Links -->
                <div id="navbar" class="navbar-collapse collapse text-center">
                    <ul class="nav navbar-nav">

                        <!-- Home -->
                        <li class="dropdown ">
                            <a href="{{ url('/') }}">Home</a>
                        </li><!-- / Home -->

                        <!-- Sale -->
                        <li class="dropdown ">
                            <a href="{{ url('/onsale') }}">Sale</a>
                        </li>


                        <!-- Elements -->
                        <li class="dropdown dropdown-slide">
                            <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Shop
                                <span class="tf-ion-ios-arrow-down"></span></a>
                            <div class="dropdown-menu">
                                <div class="row">
                                    <!-- Basic -->
                                    <div class="col-lg-6 col-md-6 mb-sm-3">
                                        <ul>
                                            <li class="dropdown-header">Top Women</li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="shop.html">Blouse</a></li>
                                            <li><a href="checkout.html">Tunik</a></li>
                                            <li><a href="cart.html">Kemeja</a></li>
                                        </ul>
                                    </div>

                                    <!-- Layout -->
                                    <div class="col-lg-6 col-md-6 mb-sm-3">
                                        <ul>
                                            <li class="dropdown-header">Bottom</li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="product-single.html">Kulot</a></li>
                                            <li><a href="shop-sidebar.html">Basic</a></li>

                                        </ul>
                                    </div>

                                </div><!-- / .row -->
                            </div><!-- / .dropdown-menu -->
                        </li><!-- / Elements -->


                        <!-- Pages -->
                        <li class="dropdown full-width dropdown-slide">
                            <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">About
                                <span class="tf-ion-ios-arrow-down"></span></a>
                            <div class="dropdown-menu">
                                <div class="row">

                                    <!-- About -->
                                    <div class="col-sm-3 col-xs-12">
                                        <ul>
                                            <li class="dropdown-header">About</li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="contact.html">Contact Us</a></li>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="coming-soon.html">Coming Soon</a></li>
                                        </ul>
                                    </div>
                                    <!-- Find -->
                                    <div class="col-sm-3 col-xs-12">
                                        <ul>
                                            <li class="dropdown-header">Find Us</li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="contact.html">Instagram</a></li>
                                            <li><a href="about.html">Facebook Pages</a></li>
                                            <li><a href="coming-soon.html">Tiktok</a></li>
                                        </ul>
                                    </div>

                                    <!-- Service -->
                                    <div class="col-sm-3 col-xs-12">
                                        <ul>
                                            <li class="dropdown-header">Service</li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="dashboard.html">How to order</a></li>
                                            <li><a href="order.html">Shipping</a></li>
                                            <li><a href="address.html">Terms & Condition</a></li>
                                            <li><a href="faq.html">FAQ</a></li>
                                        </ul>
                                    </div>

                                    <!-- Mega Menu -->
                                    <div class="col-sm-3 col-xs-12">
                                        <a href="{{ url('shop.shop') }}">
                                            <img class="img-responsive" src="images/shop/kc.png" alt="menu image" />
                                        </a>
                                    </div>
                                </div><!-- / .row -->
                            </div><!-- / .dropdown-menu -->
                        </li><!-- / Pages -->
                    </ul><!-- / .nav .navbar-nav -->

                </div>
                <!--/.navbar-collapse -->
            </div><!-- / .container -->
        </nav>
    </section>
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Sale</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li class="active">sale</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="products section">
        <div class="container">
            <div class="row">
                @foreach ($sale as $data)
                    <div class="col-md-4">
                        <div class="product-item">
                            <div class="product-thumb">
                                <span class="bage">Sale</span>
                                <img class="img-responsive" src="{{ asset('storage/product/' . $data->images) }}"
                                    alt="product-img" />
                                <div class="preview-meta">
                                    <ul>
                                        <li>
                                            <span data-toggle="modal"
                                                data-target="#product-modal-{{ $data->id }}">
                                                <i class="tf-ion-ios-search-strong"></i>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="product-single.html">{{ $data->name }}</a></h4>
                                <s class="price">IDR {{ number_format($data->price) }}</s>
                                <p class="price">IDR {{ number_format($data->price - $data->discount_price) }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal product-modal fade" id="product-modal-{{ $data->id }}">
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
                                                    src="{{ asset('storage/product/' . $data->images) }}"
                                                    alt="product-img" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <div class="product-short-details">
                                                <h2 class="product-title">{{ $data->name }}</h2>
                                                <s class="product-price">IDR {{ number_format($data->price) }}</s>
                                                <h4 class="product-short-description">
                                                    IDR {{ number_format($data->price - $data->discount_price) }}</h4>
                                                <h6 class="product-short-description">Size : {{ $data->size }}</h6>
                                                <p class="product-short-description">
                                                    {{ $data->description }}
                                                </p>
                                                <a href="{{ route('detail.product', $data->id) }}"
                                                    class="btn btn-main">View Product
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

    <footer class="footer section text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="social-media">
                        <li>
                            <a href="https://www.facebook.com/themefisher">
                                <i class="tf-ion-social-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/themefisher">
                                <i class="tf-ion-social-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.twitter.com/themefisher">
                                <i class="tf-ion-social-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.pinterest.com/themefisher/">
                                <i class="tf-ion-social-pinterest"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="footer-menu text-uppercase">
                        <li>
                            <a href="contact.html">CONTACT</a>
                        </li>
                        <li>
                            <a href="shop.html">SHOP</a>
                        </li>
                        <li>
                            <a href="pricing.html">Pricing</a>
                        </li>
                        <li>
                            <a href="contact.html">PRIVACY POLICY</a>
                        </li>
                    </ul>
                    <p class="copyright-text">Copyright &copy;2023, Designed &amp; Developed by <a
                            href="https://komacollection.com/">KOMA Collection</a></p>
                </div>
            </div>
        </div>
    </footer>
    <a href="https://wa.me/+6281321689202?text=Hallo KOMA Collection, saya tertarik dengan produknya."
        class="floating" target="_blank">
        <i class="fab fa-whatsapp fab-icon"></i>
    </a>

    <!--
  Essential Scripts
  =====================================-->

    <!-- Main jQuery -->
    <script src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.1 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Bootstrap Touchpin -->
    <script src="{{ asset('plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>
    <!-- Instagram Feed Js -->
    <script src="{{ asset('plugins/instafeed/instafeed.min.js') }}"></script>
    <!-- Video Lightbox Plugin -->
    <script src="{{ asset('plugins/ekko-lightbox/dist/ekko-lightbox.min.js') }}"></script>
    <!-- Count Down Js -->
    <script src="{{ asset('plugins/syo-timer/build/jquery.syotimer.min.js') }}"></script>

    <!-- slick Carousel -->
    <script src="{{ asset('plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('plugins/slick/slick-animation.min.js') }}"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="{{ asset('plugins/google-map/gmap.js') }}"></script>

    <!-- Main Js File -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/jqueqy_eye.js') }}"></script>


</body>

</html>
