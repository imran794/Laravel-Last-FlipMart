@extends('layouts.frontend')

@section('title')
Index
@endsection

@section('content')


<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

          



                @include('frontend/inc/category')

                @include('frontend/inc/hotdeals')

                @include('frontend/inc/special')

                @include('frontend/inc/tags')


                @include('frontend/inc/deals')

                @include('frontend/inc/new')

                @include('frontend/inc/test')



                <div style="padding-top:30px ;" class="home-banner outer-top-n">
                    <img src="{{ asset('frontend_assets') }}/assets/images/banners/LHS-banner.jpg" alt="Image">
                </div>



            </div><!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->

                @include('frontend/inc/header')

                <!-- ========================================= SECTION – HERO : END ========================================= -->

                <!-- ============================================== INFO BOXES ============================================== -->
                <div class="info-boxes wow fadeInUp">
                    <div class="info-boxes-inner">
                        <div class="row">
                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">

                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">money back</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">30 Days Money Back Guarantee</h6>
                                </div>
                            </div><!-- .col -->

                            <div class="hidden-md col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">

                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">free shipping</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Shipping on orders over $99</h6>
                                </div>
                            </div><!-- .col -->

                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">

                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">Special Sale</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Extra $5 off on all items </h6>
                                </div>
                            </div><!-- .col -->
                        </div><!-- /.row -->
                    </div><!-- /.info-boxes-inner -->

                </div><!-- /.info-boxes -->
                <!-- ============================================== INFO BOXES : END ============================================== -->
                <!-- ============================================== SCROLL TABS ============================================== -->
                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">New Products</h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
                            @foreach ($categories as $category)
                            <li><a data-transition-type="backSlide" href="#category{{ $category->id }}" data-toggle="tab">{{ $category->category_name }}</a></li>
                            @endforeach
                        </ul><!-- /.nav-tabs -->
                    </div>

                    <div class="tab-content outer-top-xs">
                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                                    @foreach ($products as $product)

                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}"><img src="{{ asset($product->product_thambnail) }}" alt="product_thambnail"></a>
                                                    </div><!-- /.image -->
                                                    @php
                                                    $amount = $product->selling_price - $product->discount_price;
                                                    $discount = ( $amount/$product->selling_price) * 100;
                                                    @endphp

                                                    <div class="">
                                                        @if ($product->discount_price == NULL)
                                                        <span class="tag sale">new</span>
                                                        @else
                                                        <span class="tag new">{{ round($discount) }}%</span>
                                                        @endif

                                                    </div>
                                                </div><!-- /.product-image -->


                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="">{{ $product->product_name }}</a></h3>
                                                   @if ( $productreview = App\Models\Rating::where('product_id',$product->id)->first())
                                                    @php

                                                    $productreview = App\Models\Rating::with('user')->where('product_id',$product->id)->where('status','approve')->latest()->get();
                                                    $rating = App\Models\Rating::where('product_id',$product->id)->avg('rating');
                                                    $avgrating = number_format($rating,1);

                                                    @endphp
                                                   @for($i=1; $i<= 5; $i++) <span>
                                                <i style="color: red;" class="glyphicon glyphicon-star{{ ($i <= $avgrating)? '' : '-empty' }}"></i>

                                                </span>
                                                @endfor
                                                  ({{ count($productreview) }})
                                                       
                                                   @else
                                                  <span class="text-danger">No Review</span>
                                                       
                                                   @endif
                                                    <div class="description"></div>

                                                    <div class="product-price">
                                                        @if($product->discount_price == NULL)
                                                        <span class="price">${{ $product->selling_price }}</span>

                                                        @else
                                                        <span class="price">${{ $product->discount_price }}</span>
                                                        <span class="price-before-discount">${{ $product->selling_price }}</span>
                                                        @endif
                                                    </div><!-- /.product-price -->

                                                </div><!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button class="btn btn-primary icon"  type="button" data-toggle="modal" data-target="#cartModal" id="{{ $product->id }}" onclick="productView(this.id)">
                                                                    
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </button>
                                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                                                            </li>

                                                       
                                                                 <button class="btn btn-primary icon"  type="button" data-toggle="modal" id="{{ $product->id }}" onclick="addtowishlist(this.id)">
                                                                    
                                                                    <i class="icon fa fa-heart"></i>
                                                                </button>
                                                        

                                                            <li class="lnk">
                                                                <a class="add-to-cart" href="detail.html" title="Compare">
                                                                    <i class="fa fa-signal" aria-hidden="true"></i>
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
                            </div><!-- /.product-slider -->
                        </div><!-- /.tab-pane -->
                        @foreach ($categories as $category)
                        <div class="tab-pane" id="category{{ $category->id }}">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                                    @php
                                    $catwiseProducts = App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get();
                                    @endphp

                                    @foreach ($catwiseProducts as $catwiseProduct)


                                    <div class="item item-carousel">
                                        <div class="products">

                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href=""><img src="{{ asset($catwiseProduct->product_thambnail) }}" alt=""></a>
                                                    </div><!-- /.image -->
                                                    
                                                         @php
                                                            $amount = $product->selling_price - $product->discount_price;
                                                            $discount = ( $amount/$product->selling_price) * 100;
                                                         @endphp
                                                     <div class="">
                                                        @if ($catwiseProduct->discount_price == NULL)
                                                        <span class="tag sale">new</span>
                                                        @else
                                                        <span class="tag new">{{ round($discount) }}%</span>
                                                        @endif

                                                    </div>
                                                </div><!-- /.product-image -->


                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="">{{ $catwiseProduct->product_name }}</a></h3>
                                                      @if ( $productreview = App\Models\Rating::where('product_id',$product->id)->first())
                                                    @php

                                                    $productreview = App\Models\Rating::where('product_id',$product->id)->where('status','approve')->latest()->get();
                                                    $rating = App\Models\Rating::where('product_id',$product->id)->avg('rating');
                                                    $avgrating = number_format($rating,1);

                                                    @endphp
                                                   @for($i=1; $i<= 5; $i++) <span>
                                                <i style="color: red;" class="glyphicon glyphicon-star{{ ($i <= $avgrating)? '' : '-empty' }}"></i>

                                                </span>
                                                @endfor
                                                  ({{ count($productreview) }})
                                                       
                                                   @else
                                                  <span class="text-danger">No Review</span>
                                                       
                                                   @endif
                                                    <div class="description"></div>
                                               

                                                    <div class="product-price">
                                                        @if($catwiseProduct->discount_price == NULL)
                                                           <span class="price">${{ $catwiseProduct->selling_price }}</span>
                                                       
                                                        @else
                                                        <span class="price">${{ $catwiseProduct->discount_price }}</span>
                                                        <span class="price-before-discount">${{ $catwiseProduct->selling_price }}</span>
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
                                                                    <i class="fa fa-signal" aria-hidden="true"></i>
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
                            </div><!-- /.product-slider -->
                        </div><!-- /.tab-pane -->
                        @endforeach
                    </div><!-- /.tab-content -->
                </div><!-- /.scroll-tabs -->
                <!-- ============================================== SCROLL TABS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                            <div class="wide-banner cnt-strip">
                                <div class="image">
                                    <img class="img-responsive" src="{{ asset('frontend_assets/assets/images/banners/home-banner1.jpg') }}" alt="">
                                </div>

                            </div><!-- /.wide-banner -->
                        </div><!-- /.col -->
                        <div class="col-md-5 col-sm-5">
                            <div class="wide-banner cnt-strip">
                                <div class="image">
                                    <img class="img-responsive" src="{{ asset('frontend_assets/assets/images/banners/home-banner2.jpg') }}" alt="">
                                </div>

                            </div><!-- /.wide-banner -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.wide-banners -->

                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                @include('frontend/inc/featuredproduct')
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="wide-banner cnt-strip">
                                    <img class="img-responsive" src="{{ asset('frontend_assets/assets/images/banners/home-banner.jpg') }}" alt="">
                                <div class="image">
                                </div>
                                <div class="strip strip-text">
                                    <div class="strip-inner">
                                        <h2 class="text-right">New Mens Fashion<br>
                                            <span class="shopping-needs">Save up to 40% off</span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="new-label">
                                    <div class="text">NEW</div>
                                </div><!-- /.new-label -->
                            </div><!-- /.wide-banner -->
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.wide-banners -->
                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== BEST SELLER ============================================== -->

                <div class="best-deal wow fadeInUp outer-bottom-xs">
                    <h3 class="section-title">Best seller</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                            <div class="item">
                                <div class="products best-product">
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <a href="#">
                                                                <img src="assets/images/products/p20.jpg" alt="">
                                                            </a>
                                                        </div><!-- /.image -->



                                                    </div><!-- /.product-image -->
                                                </div><!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price">
                                                            <span class="price">
                                                                $450.99 </span>

                                                        </div><!-- /.product-price -->

                                                    </div>
                                                </div><!-- /.col -->
                                            </div><!-- /.product-micro-row -->
                                        </div><!-- /.product-micro -->

                                    </div>
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <a href="#">
                                                                <img src="assets/images/products/p21.jpg" alt="">
                                                            </a>
                                                        </div><!-- /.image -->


                                                    </div><!-- /.product-image -->
                                                </div><!-- /.col -->
                                                <div class="col2 col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price">
                                                            <span class="price">
                                                                $450.99 </span>

                                                        </div><!-- /.product-price -->

                                                    </div>
                                                </div><!-- /.col -->
                                            </div><!-- /.product-micro-row -->
                                        </div><!-- /.product-micro -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.sidebar-widget-body -->
                </div><!-- /.sidebar-widget -->
                <!-- ============================================== BEST SELLER : END ============================================== -->




                @include('frontend/inc/blog')
                @include('frontend/inc/arrivals')



            </div><!-- /.homebanner-holder -->

        </div><!-- /.row -->

        @include('frontend/inc/brands')

    </div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->

@endsection
