@extends('layouts.frontend')

@section('title')
{{ $product->product_name }}
@endsection

@section('content')


<!-- ============================== breadcrumb : start =================================== -->
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li><a href="#">{{ $product->category_name }}</a></li>
                <li class='active'>adv</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<!-- ============================== breadcrumb : end =================================== -->

<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row single-product'>
            <div class='col-md-3 sidebar'>
                <div class="sidebar-module-container">
                    <div class="home-banner outer-top-n">
                        <img src="{{ asset('frontend_assets') }}/assets/images/banners/LHS-banner.jpg" alt="Image">
                    </div>

                    @include('frontend/inc/hotdeals')
      

                    @include('frontend/inc/test')
                </div>
            </div><!-- /.sidebar -->
            <div class='col-md-9'>
                <div class="detail-block">
                    <div class="row  wow fadeInUp">
                        <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                            <div class="product-item-holder size-big single-product-gallery small-gallery">

                                <div id="owl-single-product">
                                    @foreach ($product->get_latest_multiple as $image)
                                    <div class="single-product-gallery-item" id="slide{{ $image->id }}">
                                        <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($image->mulitple_images) }}">
                                            <img class="img-responsive" alt="" src="{{ asset($image->mulitple_images) }}" data-echo="{{ asset($image->mulitple_images) }}" />
                                        </a>
                                    </div><!-- /.single-product-gallery-item -->
                                    @endforeach
                                </div><!-- /.single-product-slider -->
                                <div class="single-product-gallery-thumbs gallery-thumbs">

                                    <div id="owl-single-product-thumbnails">
                                        @foreach ($product->get_latest_multiple as $image)
                                        <div class="item">
                                            <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="{{ $image->id }}" href="#slide{{ $image->id }}">
                                                <img class="img-responsive" width="85" alt="" src="{{ asset($image->mulitple_images) }}" data-echo="{{ asset($image->mulitple_images) }}" />
                                            </a>
                                        </div>
                                        @endforeach
                                    </div><!-- /#owl-single-product-thumbnails -->
                                </div><!-- /.gallery-thumbs -->

                            </div><!-- /.single-product-gallery -->
                        </div><!-- /.gallery-holder -->
                        <div class='col-sm-6 col-md-7 product-info-block'>
                            <div class="product-info">
                                <h1 class="name" id="pname">{{ $product->product_name }}</h1>

                                <div class="rating-reviews m-t-20">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            @for($i=1; $i<= 5; $i++) <span>
                                                <i style="color: red;" class="glyphicon glyphicon-star{{ ($i <= $avgrating)? '' : '-empty' }}"></i>

                                                </span>
                                                @endfor
                                                <h3>5 / {{ $avgrating }}</h3>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="reviews">
                                                <a href="#" class="lnk">({{ count($productreview) }} Review)</a>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.rating-reviews -->

                                <div class="stock-container info-container m-t-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="stock-box">
                                                <span class="label">Availability :</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="stock-box">
                                                @if ($product->product_qty >= 1)
                                                <span class="value">{{ $product->product_qty }}</span>
                                                @else
                                                <span class="value">Out OF Stock</span>
                                                @endif

                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.stock-container -->
                                <div class="description-container m-t-20">
                                    {!! $product->short_des !!}
                                </div><!-- /.description-container -->
                                <div class="price-container info-container m-t-20">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="price-box">
                                                @if($product->discount_price == NULL)
                                                <span class="price">${{ $product->selling_price }}</span>
                                                @else
                                                <span class="price">${{ $product->discount_price }}</span>
                                                <span class="price-strike">${{ $product->selling_price }}</span>
                                                @endif


                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="favorite-button m-t-10">
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
                                                    <i class="fa fa-signal"></i>
                                                </a>
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="t" title="E-mail" href="#">
                                                    <i class="fa fa-envelope"></i>
                                                </a>
                                            </div>
                                        </div>

                                    </div><!-- /.row -->
                                </div><!-- /.price-container -->
                                <div class="row mt-3">


                                    <div class="col-sm-6">
                                        @if ($product->product_color == null)
                                        @else
                                        <div class="form-group">
                                            <label for="color">Select Color</label>
                                            <select class="form-control" id="color">
                                                <option value="">Chose Color</option>
                                                @foreach ($product_color as $color)
                                                <option value="{{ $color }}">{{ ucwords($color) }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="col-sm-6">
                                        @if ($product->product_size == null)
                                        @else
                                        <div class="form-group">
                                            <label for="size">Select Size</label>
                                            <select class="form-control" id="size">
                                                <option value="">Chose Size</option>
                                                @foreach ($product_size as $size)
                                                <option value="{{ $size }}">{{ ucwords($size) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
                                    </div>

                                </div><!-- /.row -->

                                <div class="quantity-container info-container">
                                    <div class="row">

                                        <div class="col-sm-2">
                                            <span class="label">Qty :</span>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="cart-quantity">
                                                <div class="quant-input">
                                                    <div class="arrows">
                                                        <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                        <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                                    </div>
                                                    <input type="text" value="1" min="1">
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" id="product_id" value="{{ $product->id }}">

                                        <div class="col-sm-7">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs" onclick="addToCart()"></i> ADD TO CART</button>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.quantity-container -->
                            </div><!-- /.product-info -->
                        </div><!-- /.col-sm-7 -->
                    </div><!-- /.row -->
                </div>
                <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                    <div class="row">
                        <div class="col-sm-3">
                            <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                <li><a data-toggle="tab" href="#review">REVIEW</a></li>

                            </ul><!-- /.nav-tabs #product-tabs -->
                        </div>
                        <div class="col-sm-9">
                            <div class="tab-content">
                                <div id="description" class="tab-pane in active">
                                    <div class="product-tab">
                                        <p class="text">{!! $product->long_des !!}</p>
                                    </div>
                                </div><!-- /.tab-pane -->

                                <div id="review" class="tab-pane">
                                    <div class="product-tab">

                                        @foreach ($productreview as $review)
                                        <div class="product-reviews">
                                            <h4 class="title">{{ $review->user->name }}</h4>

                                            <div class="reviews">
                                                <div class="review">
                                                    <div class="review-title"><span class="summary">
                                                            @for($i=1; $i<= 5; $i++) <span>
                                                                <i style="color: red;" class="glyphicon glyphicon-star{{ ($i <= $review->rating)? '' : '-empty' }}"></i>

                                                        </span>
                                                        @endfor

                                                        </span><span class="date"><i class="fa fa-calendar"></i><span>{{ $review->created_at->diffForHumans() }}</span></span></div>
                                                    <div class="text">{{ $review->comment }}</div>
                                                </div>

                                            </div><!-- /.reviews -->

                                        </div><!-- /.product-reviews -->
                                        @endforeach
                                    </div><!-- /.product-tab -->
                                </div><!-- /.tab-pane -->
                            </div><!-- /.tab-content -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.product-tabs -->

                <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">Raleted products</h3>
                    <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

                        @foreach ($raleted_products as $raletedproduct)

                        <div class="item item-carousel">
                            <div class="products">

                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            <a href="detail.html"><img src="{{ asset($raletedproduct->product_thambnail) }}" alt="product_thambnail"></a>
                                        </div><!-- /.image -->
                                        @php
                                        $amount = $raletedproduct->selling_price - $raletedproduct->discount_price;
                                        $discount = ( $amount/$raletedproduct->selling_price) * 100;
                                        @endphp
                                        <div class="">
                                            @if ($raletedproduct->discount_price == NULL)
                                            <span class="tag sale">new</span>
                                            @else
                                            <span class="tag new">{{ round($discount) }}%</span>
                                            @endif

                                        </div>
                                    </div><!-- /.product-image -->


                                    <div class="product-info text-left">
                                        <h3 class="name"><a href="detail.html">{{ $raletedproduct->product_name }}</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>

                                        <div class="product-price">
                                            @if($raletedproduct->discount_price == NULL)
                                            <span class="price">${{ $raletedproduct->selling_price }}</span>

                                            @else
                                            <span class="price">${{ $raletedproduct->discount_price }}</span>
                                            <span class="price-before-discount">${{ $raletedproduct->selling_price }}</span>
                                            @endif



                                        </div><!-- /.product-price -->

                                    </div><!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                                                </li>

                                                <li class="lnk wishlist">
                                                    <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                        <i class="icon fa fa-heart"></i>
                                                    </a>
                                                </li>

                                                <li class="lnk">
                                                    <a class="add-to-cart" href="detail.html" title="Compare">
                                                        <i class="fa fa-signal"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div><!-- /.action -->
                                    </div><!-- /.cart -->
                                </div><!-- /.product -->

                            </div><!-- /.products -->
                        </div><!-- /.item -->
                        @endforeach
                    </div><!-- /.home-owl-carousel -->
                </section><!-- /.section -->
                <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
            </div><!-- /.col -->
            <div class="clearfix"></div>
        </div><!-- /.row -->





        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend/inc/brands')
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.container -->
</div><!-- /.body-content -->

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0&appId=928078087921212&autoLogAppEvents=1" nonce="5dOJGjDy"></script>

@endsection
