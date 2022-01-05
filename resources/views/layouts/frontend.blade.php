<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    @yield('meta')
    <title>@yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/assets/css/bootstrap.min.css">
    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/assets/css/main.css">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/assets/css/blue.css">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/assets/css/owl.transitions.css">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/assets/css/rateit.css">
    <link rel="stylesheet" type="text/css" href="{{asset('backend')}}/lib/toastr/toastr.css">
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/assets/css/bootstrap-select.min.css">
    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontend_assets') }}/assets/css/font-awesome.css">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        .search-area {
            position: relative;
        }

        #suggestProduct {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background: #fff;
            z-index: 999;
            border-radius: 4px;
            margin-top: 2px;
        }

    </style>
</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1">
        <!-- ============================================== TOP MENU ============================================== -->
        <div class="top-bar animate-dropdown">
            <div class="container">
                <div class="header-top-inner">
                    <div class="cnt-account">
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="icon fa fa-user"></i>My Account</a></li>
                            <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                            <li><a href="{{ route('cart') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                            <li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li>
                            <li>
                                @auth
                                <a href="{{ route('user.dashboard') }}"><i class="icon fa fa-lock"></i>My Profile</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                @else
                                <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Login/Register</a>
                                @endauth
                            </li>
                        </ul>
                    </div><!-- /.cnt-account -->
                    <div class="cnt-block">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a href="{{ route('order.track') }}" class="dropdown-toggle" data-hover="dropdown" data-toggle="modal" data-target="#exampleModal"><span class="value">Order Track </span><b class="caret"></b></a>
                            </li>
                            <li class="dropdown dropdown-small">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">
                                        @if (session()->get('language') == 'bangla') ভাষা পরিবর্তন করুন @else Language @endif </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    @if (Session::get('language') == 'bangla');
                                    <li><a href="{{ route('english.language') }}">English</a></li>
                                    @else
                                    <li><a href="{{ route('bangla.language') }}">Bangla</a></li>
                                    @endif
                                </ul>
                            </li>
                        </ul><!-- /.list-unstyled -->
                    </div><!-- /.cnt-cart -->
                    <div class="clearfix"></div>
                </div><!-- /.header-top-inner -->
            </div><!-- /.container -->
        </div><!-- /.header-top -->
        <!-- ============================================== TOP MENU : END ============================================== -->
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                        <!-- ============================================================= LOGO ============================================================= -->
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('frontend_assets') }}/assets/images/logo.png" alt="">
                            </a>
                        </div><!-- /.logo -->
                        <!-- ============================================================= LOGO : END ============================================================= -->
                    </div><!-- /.logo-holder -->
                    <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                        <!-- /.contact-row -->
                        <!-- ============================================================= SEARCH AREA ============================================================= -->
                        <div class="search-area">
                            <form action="{{ route('search.product') }}" method="GET">
                                @csrf
                                <div class="control-group">
                                    <input name="search" id="search" class="search-field" onfocus="showsearchresult()" onblur="hidesearchresult()" placeholder="Search here..." />
                                    <button type="submit" class="search-button"></button>
                                </div>
                            </form>
                            <div id="suggestProduct">
                            </div>
                        </div><!-- /.search-area -->
                        <!-- ========================== SEARCH AREA : END =================== -->
                    </div>
                    <!-- /.top-search-holder --

                
            <!-      ==================== SHOPPING CART DROPDOWN ============== -->
                    <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                        <div class="dropdown dropdown-cart">
                            <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                                <div class="items-cart-inner">
                                    <div class="basket">
                                        <i class="glyphicon glyphicon-shopping-cart"></i>
                                    </div>
                                    <div class="basket-item-count"><span class="count" id="cartcount"></span></div>
                                    <div class="total-price-basket">
                                        <span class="lbl">cart -</span>
                                        <span class="total-price">
                                            <span class="sign">$</span><span class="value" id="cartsubtotal"></span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div id="minicart">
                                    </div>
                                    <div class="clearfix cart-total">
                                        <div class="pull-right">
                                            <span class="text">Sub Total :</span><span class='price' id="cartsubtotal"></span>
                                        </div>
                                        <div class="clearfix"></div>
                                        <a href="{{ route('checkout') }}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                    </div><!-- /.cart-total-->
                                </li>
                            </ul><!-- /.dropdown-menu-->
                        </div><!-- /.dropdown-cart -->
                        <!-- =========================== SHOPPING CART DROPDOWN : END============================ -->
                    </div><!-- /.top-cart-row -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.main-header -->
        <!-- ============================================== NAVBAR ============================================== -->
        <div class="header-nav animate-dropdown">
            <div class="container">
                <div class="yamm navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="nav-bg-class">
                        <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                            <div class="nav-outer">
                                <ul class="nav navbar-nav">
                                    <li class="active dropdown yamm-fw">
                                        <a href="{{ url('/') }}" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Home</a>
                                    </li>
                                    @php
                                    $categories = App\Models\Category::orderBy('category_name','ASC')->get();
                                    @endphp
                                    @foreach ($categories as $category)
                                    <li class="dropdown yamm mega-menu">
                                        <a href="{{ url('category/pase',$category->slug) }}" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{ $category->category_name }}</a>
                                        <ul class="dropdown-menu container">
                                            <li>
                                                <div class="yamm-content">
                                                    <div class="row">
                                                        @php
                                                        $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderby('sub_category_name','ASC')->get();
                                                        @endphp
                                                        @foreach ($subcategories as $subcategory)
                                                        <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                            <h2 class="title">{{ $subcategory->sub_category_name }}</h2>
                                                            <ul class="links">
                                                                @php
                                                                $subsucategories = App\Models\Subsubcategory::where('subcategory_id',$subcategory->id)->orderBy('sub_sub_category_name','ASC')->get();
                                                                @endphp
                                                                @foreach ($subsucategories as $subsucategory)
                                                                <li><a href="{{ url('subsubcategory/product/'.$subsucategory->id.'/'.$subsucategory->subsubcategory_slug) }}">{{ $subsucategory->sub_sub_category_name }}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </div><!-- /.col -->
                                                        @endforeach
                                                        <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                            <img class="img-responsive" src="assets/images/banners/top-menu-banner.jpg" alt="">
                                                        </div><!-- /.yamm-content -->
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    @endforeach
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Pages</a>
                                        <ul class="dropdown-menu pages">
                                            <li>
                                                <div class="yamm-content">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-menu">
                                                            <ul class="links">
                                                                <li><a href="{{ url('/') }}">Home</a></li>
                                                                <li><a href="{{ route('shop') }}">Shop</a></li>
                                                                <li><a href="{{ route('blog.page') }}">Blog</a></li>
                                                                <li><a href="blog-details.html">Blog Detail</a></li>
                                                                <li><a href="{{ route('contact.us') }}">Contact</a></li>
                                                                <li><a href="{{ route('faq.page') }}">FAQ</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown  navbar-right special-menu">
                                        <a href="#">Todays offer</a>
                                    </li>
                                </ul><!-- /.navbar-nav -->
                                <div class="clearfix"></div>
                            </div><!-- /.nav-outer -->
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.nav-bg-class -->
                </div><!-- /.navbar-default -->
            </div><!-- /.container-class -->
        </div><!-- /.header-nav -->
        <!-- ===================================== NAVBAR : END ===================================== -->
    </header>
    @yield('content')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('order.track') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Invoice No</label>
                            <input type="text" name="invoice_no" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="invoice no">
                        </div>
                        <button type="submit" class="btn btn-primary">Track Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ================================================= FOOTER ===================================== -->
    <footer id="footer" class="footer color-bg" style="margin-top: 60px;">
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="module-heading">
                            <h4 class="module-title">Contact Us</h4>
                        </div><!-- /.module-heading -->
                        <div class="module-body">
                            <ul class="toggle-footer" style="">
                                <li class="media">
                                    <div class="pull-left">
                                        <span class="icon fa-stack fa-lg">
                                            <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <p>ThemesGround, 789 Main rd, Anytown, CA 12345 USA</p>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="pull-left">
                                        <span class="icon fa-stack fa-lg">
                                            <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <p>+(888) 123-4567<br>+(888) 456-7890</p>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="pull-left">
                                        <span class="icon fa-stack fa-lg">
                                            <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <span><a href="#">flipmart@themesground.com</a></span>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- /.module-body -->
                    </div><!-- /.col -->
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="module-heading">
                            <h4 class="module-title">Customer Service</h4>
                        </div><!-- /.module-heading -->
                        <div class="module-body">
                            <ul class='list-unstyled'>
                                <li class="first"><a href="#" title="Contact us">My Account</a></li>
                                <li><a href="#" title="About us">Order History</a></li>
                                <li><a href="#" title="faq">FAQ</a></li>
                                <li><a href="#" title="Popular Searches">Specials</a></li>
                                <li class="last"><a href="#" title="Where is my order?">Help Center</a></li>
                            </ul>
                        </div><!-- /.module-body -->
                    </div><!-- /.col -->
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="module-heading">
                            <h4 class="module-title">Corporation</h4>
                        </div><!-- /.module-heading -->
                        <div class="module-body">
                            <ul class='list-unstyled'>
                                <li class="first"><a title="Your Account" href="#">About us</a></li>
                                <li><a title="Information" href="#">Customer Service</a></li>
                                <li><a title="Addresses" href="#">Company</a></li>
                                <li><a title="Addresses" href="#">Investor Relations</a></li>
                                <li class="last"><a title="Orders History" href="#">Advanced Search</a></li>
                            </ul>
                        </div><!-- /.module-body -->
                    </div><!-- /.col -->
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="module-heading">
                            <h4 class="module-title">Why Choose Us</h4>
                        </div><!-- /.module-heading -->
                        <div class="module-body">
                            <ul class='list-unstyled'>
                                <li class="first"><a href="#" title="About us">Shopping Guide</a></li>
                                <li><a href="#" title="Blog">Blog</a></li>
                                <li><a href="#" title="Company">Company</a></li>
                                <li><a href="#" title="Investor Relations">Investor Relations</a></li>
                                <li class=" last"><a href="contact-us.html" title="Suppliers">Contact Us</a></li>
                            </ul>
                        </div><!-- /.module-body -->
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-bar">
            <div class="container">
                <div class="col-xs-12 col-sm-6 no-padding social">
                    <ul class="link">
                        <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
                        <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>
                        <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a></li>
                        <li class="rss pull-left"><a target="_blank" rel="nofollow" href="#" title="RSS"></a></li>
                        <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#" title="PInterest"></a></li>
                        <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#" title="Linkedin"></a></li>
                        <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#" title="Youtube"></a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 no-padding">
                    <div class="clearfix payment-methods">
                        <ul>
                            <li><img src="{{ asset('frontend_assets') }}/assets/images/payments/1.png" alt=""></li>
                            <li><img src="{{ asset('frontend_assets') }}/assets/images/payments/2.png" alt=""></li>
                            <li><img src="{{ asset('frontend_assets') }}/assets/images/payments/3.png" alt=""></li>
                            <li><img src="{{ asset('frontend_assets') }}/assets/images/payments/4.png" alt=""></li>
                            <li><img src="{{ asset('frontend_assets') }}/assets/images/payments/5.png" alt=""></li>
                        </ul>
                    </div><!-- /.payment-methods -->
                </div>
            </div>
        </div>
    </footer>
    <!-- ============================ FOOTER : END===================== -->
    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> <span id="pname"></span> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModel">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width:16rem;">
                                <img src="" class="card-img-top" id="pimage" alt="" style="height: 200px;">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item">Price: <strong class="text-danger">$<span id="pprice"></span> </strong>
                                    <del id="oldprice"></del>
                                </li>
                                <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
                                <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
                                <li class="list-group-item">Brand: <strong id="pbrand"></strong> </li>
                                <li class="list-group-item">Stock: <span class="badge badge-pill badge-success" id="aviable" style="background:green; color:white;"></span>
                                    <span class="badge badge-pill badge-danger" id="stockout" style="background:red; color:white;"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" id="colorArea">
                                <label for="color">Select Color</label>
                                <select class="form-control" id="color" name="color">
                                </select>
                            </div>
                            <div class="form-group" id="sizeArea">
                                <label for="size">Select Size</label>
                                <select class="form-control" id="size" name="size">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="qty">Quantity</label>
                                <input type="number" class="form-control" id="qty" value="1" min="1">
                            </div>
                            <input type="hidden" id="product_id">
                            <button type="submit" class="btn btn-danger" onclick="addToCart()">Add To Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
    </div>
    <!-- For demo purposes – can be removed on production : End -->
    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="{{ asset('frontend_assets') }}/assets/js/jquery-1.11.1.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/assets/js/owl.carousel.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/assets/js/echo.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/assets/js/jquery.easing-1.3.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/assets/js/bootstrap-slider.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="{{ asset('frontend_assets') }}/assets/js/lightbox.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/assets/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/assets/js/sweetalert2@8.js"></script>
    <script type="text/javascript" src="{{ asset('common') }}/jquery.form-validator.min.js"></script>
    <script>
        $.validate({
            lang: 'en'
        });

    </script>
    <script type="text/javascript" src="{{ asset('backend') }}/lib/toastr/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
        var type = "{{Session::get('alert-type','info')}}"
        switch (type) {
            case 'info':
                toastr.info(" {{Session::get('message')}} ");
                break;

            case 'success':
                toastr.success(" {{Session::get('message')}} ");
                break;

            case 'warning':
                toastr.warning(" {{Session::get('message')}} ");
                break;

            case 'error':
                toastr.error(" {{Session::get('message')}} ");
                break;
        }
        @endif

    </script>
    <script src="{{ asset('frontend_assets') }}/assets/js/wow.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/assets/js/scripts.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // product view with model start



        function productView(id) {
            $.ajax({
                type: 'GET',
                url: '/product/view/model/' + id,
                dataType: 'json',
                success: function(data) {
                    $('#pname').text(data.product.product_name);
                    $('#pprice').text(data.product.selling_price);
                    $('#pcode').text(data.product.product_code);
                    $('#pcategory').text(data.product.category.category_name);
                    $('#pbrand').text(data.product.brand.brand_name);
                    $('#pimage').attr('src', '/' + data.product.product_thambnail);
                    $('#product_id').val(id);
                    $('#qty').val(1);



                    // product color

                    $('select[name="color"]').empty();
                    $.each(data.product_color, function(key, value) {
                        $('select[name= "color"]').append('<option value="' + value + '">' + value + '</option>')

                        if (data.product_color == "") {
                            $('#colorArea').hide();

                        } else {
                            $('#colorArea').show();
                        }
                    });

                    // sizes
                    $('select[name="size"]').empty();
                    $.each(data.product_size, function(key, value) {
                        $('select[name= "size"]').append('<option value="' + value + '">' + value + '</option>')

                        if (data.product_size == "") {
                            $('#sizeArea').hide();

                        } else {
                            $('#sizeArea').show();

                        }
                    });


                    // product price

                    if (data.product.discount_price == null) {
                        $('#pprice').text('');
                        $('#oldprice').text('');
                        $('#pprice').text(data.product.selling_price);
                    } else {
                        $('#pprice').text(data.product.discount_price);
                        $('#oldprice').text(data.product.selling_price);

                    }

                    // stock

                    if (data.product.product_qty > 0) {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#aviable').text('aviable');
                    } else {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#stockout').text('stockout');


                    }


                }

            });
        }
        // product view with model end


        // add to cart  start

        function addToCart() {
            var name = $('#pname').text();
            var id = $('#product_id').val();
            var color = $('#color option:selected').text();
            var size = $('#size option:selected').text();
            var qty = $('#qty').val();

            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    name: name,
                    color: color,
                    size: size,
                    qty: qty
                },
                url: '/cart/data/store/' + id,
                success: function(data) {
                    minicart();
                    $('#closeModel').click();
                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                    console.log(data);
                }

            });

        }




        // add to cart  end

    </script>
    @yield('shortby')
    <script>
        function minicart() {
            $.ajax({
                type: 'GET',
                datatype: 'json',
                url: '/mini/cart/add',
                success: function(response) {
                    $('span[id="cartsubtotal"]').text(response.cartstotal);
                    $('#cartcount').text(response.cartsqty);
                    var minicart = '';
                    $.each(response.carts, function(key, value) {
                        minicart += `<div class="cart-item product-summary">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <div class="image">
                                                    <a href="detail.html"><img src="/${value.options.image}" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="col-xs-7">

                                                <h3 class="name"><a href="index8a95.html?page-detail">${value.name}</a></h3>
                                                <div class="price">${value.price}$ * ${value.qty}</div>
                                            </div>
                                            <div class="col-xs-1 action">
                                                <button type="submit" id="${value.rowId}" onclick="minicartRemove(this.id)"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div><!-- /.cart-item -->
                                    <div class="clearfix"></div> <hr>`


                    })
                    $('#minicart').html(minicart);
                }

            })
        }
        minicart();


        function minicartRemove(rowId) {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '/minicart/remove/' + rowId,
                success: function(data) {
                    minicart();
                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                    console: log(data);
                }

            });
        }

    </script>
    <script>
        function addtowishlist(product_id) {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: "{{ url('/add/to/wishlist/') }}/" + product_id,
                success: function(data) {
                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                    console.log(data)
                }


            })
        }

    </script>
    <script>
        function wishlist() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/get/wishlist/product') }}",
                dataType: 'json',
                success: function(response) {
                    var rows = ""
                    $.each(response, function(key, value) {
                        rows += `<tr>
                    <td class="col-md-2"><img src="/${value.product.product_thambnail}" alt="imga"></td>
                    <td class="col-md-7">
                        <div class="product-name"><a href="#">${value.product.product_name}</a></div>

                        <div class="price">
                        ${value.product.discount_price == null
                            ? `$${value.product.selling_price}`
                            :
                            `$${value.product.discount_price} <span>$${value.product.selling_price}</span>`
                        }
                        </div>
                    </td>
                    <td class="col-md-2">
                        <button class="btn-upper btn btn-primary" type="button" title="Add Cart" data-toggle="modal" data-target="#cartModal" id="${value.product_id}" onclick="productView(this.id)">Add to cart</button>
                    </td>
                    <td class="col-md-1 close-btn">
                        <button type="submit" class="" id="${value.id}" onclick="wishlistRemove(this.id)" ><i class="fa fa-times"></i></button>
                    </td>
                </tr>`

                    });

                    $('#wishlist').html(rows);

                }
            })
        }
        wishlist();

        function wishlistRemove(id) {
            $.ajax({
                type: 'GET',
                url: "{{ url('/wishlist/remove/') }}/" + id,
                dataType: 'json',
                success: function(data) {
                    wishlist();
                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                }
            });
        }

    </script>


    {{-- cart page --}}


    <script>
        function cart() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/get/cart/product') }}",
                dataType: 'json',
                success: function(response) {
                    var rows = ""
                    $.each(response.carts, function(key, value) {
                        rows += `<tr>
     <td class="col-md-2"><img src="/${value.options.image}" alt="imga" style="height:60px; width:60px;"></td>
     <td class="col-md-2">
      <div class="product-name"><strong>${value.name}</strong></div>

      <strong>
                        $${value.price}
      </strong>
     </td>

                    <td class="col-md-2">

                        <strong>${value.options.color}</strong>
     </td>
                    <td class="col-md-2">
                        ${value.options.size == null
                            ? `<span >......</span>`
                            :
                            `<strong>${value.options.size}</strong>`
                        }

                    </td>

                    <td class="col-md-2">
                        ${value.qty > 1
                        ? ` <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)">-</button>`
                        : ` <button type="submit" class="btn btn-success btn-sm" disabled>-</button>`
                        }

                        <input type="text" value="${value.qty}" min="1" max="100" disabled style="width:25px;">
                        <button type="submit" id="${value.rowId}" onclick="cartIncrement(this.id)" class="btn btn-danger btn-sm">+</button>
                    </td>

                    <td class="col-md-1">
                        <strong>$${value.subtotal}</strong>
                    </td>

     <td class="col-md-1 close-btn">
      <button type="submit" class="" id="${value.rowId}" onclick="CartRemove(this.id)" ><i class="fa fa-times"></i></button>
     </td>
    </tr>`

                    });

                    $('#cartPage').html(rows);

                }
            })
        }
        cart();

    </script>



    {{-- cart page --}}


    {{-- cart remove --}}
    <script>
        function CartRemove(id) {
            $.ajax({
                type: 'GET',
                url: "{{ url('/Cart/remove/') }}/" + id,
                dataType: 'json',
                success: function(data) {
                    couponcalculation();
                    cart();
                    minicart();
                    $('#couponField').show()
                    $('#coupon_name').val('')
                    // start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    // end message
                }
            });
        }
        CartRemove();

    </script>



    <script>
        function cartDecrement(id) {
            $.ajax({
                type: 'GET',
                url: "{{ url('/Cart/decrement/') }}/" + id,
                dataType: 'json',
                success: function(data) {
                    couponcalculation();
                    cart();
                    minicart();

                    // start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    // end message
                }
            });
        }

    </script>



    <script>
        function cartIncrement(id) {
            $.ajax({
                type: 'GET',
                url: "{{ url('/cart/increment/') }}/" + id,
                dataType: 'json',
                success: function(data) {
                    couponcalculation();
                    cart();
                    minicart();

                    // start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    // end message
                }
            });
        }

    </script>


    {{-- coupon apply --}}


    <script>
        function applycoupon() {
            var coupon_name = $('#coupon_name').val();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    coupon_name: coupon_name
                },
                url: "{{ url('/coupon/apply') }}",
                success: function(data) {
                    couponcalculation();
                    if (data.validity == true) {
                        $('#couponField').hide();
                    }
                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        coupon_name = $('#coupon_name').val(' ')
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                    console.log(data)
                }

            })
        }

    </script>






    <script>
        function couponcalculation() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "{{ url('/coupon/calculation') }}",
                success: function(data) {
                    if (data.total) {
                        $('#couponculfiled').html(`
                 <tr>
                                    <th>
                                        <div class="cart-sub-total">
                                            Subtotal<span class="inner-left-md">$${data.total}</span>
                                        </div> 
                                        <div class="cart-grand-total">
                                            Grand Total<span class="inner-left-md">$${data.total}</span>
                                        </div>
                                    </th>
                                </tr>
                                `);

                    } else {
                        $('#couponculfiled').html(` 
                    <tr>
                                    <th>
                                        <div class="cart-sub-total">
                                            Subtotal<span class="inner-left-md">$${data.subtotal}</span>
                                        </div> 
                                        <div class="cart-sub-total">
                                            Coupon <span class="inner-left-md">${data.coupon_name} 
                                            <button type="submit" onclick="couponRemove()"><i class="fa fa-times"></i></button>
                                            </span>
                                        </div>
                                         <div class="cart-sub-total">
                                            Discount Amount<span class="inner-left-md">$${data.discount_amount}</span>
                                        </div>
                                        <div class="cart-grand-total">
                                            Grand Total<span class="inner-left-md">$${data.total_amount}</span>
                                        </div>
                                    </th>
                                </tr>
                                `)

                    }
                }

            })
        }

        couponcalculation();

    </script>



    <script>
        //remove coupon
        function couponRemove() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/coupon/remove') }}",
                dataType: 'json',
                success: function(data) {
                    couponcalculation();
                    $('#couponField').show();
                    $('#coupon_name').val('');
                    //  start message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    //  end message
                }
            });
        }

    </script>


    <script>
        var obj = {};
        obj.cus_name = $('#customer_name').val();
        obj.cus_phone = $('#mobile').val();
        obj.cus_email = $('#email').val();
        obj.cus_addr1 = $('#address').val();
        obj.amount = $('#total_amount').val();
        obj.post_code = $('#post_code').val();
        obj.notes = $('#notes').val();
        obj.division_id = $('#division_id').val();
        obj.district_id = $('#district_id').val();
        obj.state_id = $('#state_id').val();

        $('#sslczPayBtn').prop('postdata', obj);

        (function(window, document) {
            var loader = function() {
                var script = document.createElement("script"),
                    tag = document.getElementsByTagName("script")[0];
                // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);

    </script>


    <script>
        (function(window, document) {
            var loader = function() {
                var script = document.createElement("script"),
                    tag = document.getElementsByTagName("script")[0];
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);

    </script>



    <script>
        $("body").on("keyup", "#search", function() {
            let searchData = $("#search").val();
            if (searchData.length > 0) {
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/find-products') }}",
                    data: {
                        search: searchData
                    },
                    success: function(result) {
                        $('#suggestProduct').html(result)
                    }
                });
            }

            if (searchData.length < 1) $('#suggestProduct').html("");
        })

    </script>



    <script>
        function showsearchresult() {
            $("#suggestProduct").slideDown();
        }


        function hidesearchresult() {
            $("#suggestProduct").slideUp();
        }

    </script>


</body>

</html>
