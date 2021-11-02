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
           
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->

                @include('frontend/inc/header')

                <!-- ========================================= SECTION – HERO : END ============================== -->

                <!-- ============================================== INFO BOXES   =================================== -->
                <div class="info-boxes wow fadeInUp">
                   @include('frontend/inc/money_back')
                </div><!-- /.info-boxes -->
                

                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                   @include('frontend/inc/product')
                </div><!-- /.scroll-tabs -->
                <!-- ============================================== SCROLL TABS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
               @include('frontend/inc/two_banner')
                </div><!-- /.wide-banners -->

                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                @include('frontend/inc/featuredproduct')
             
                <!-- =============================== FEATURED PRODUCTS : END ================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                      @include('frontend/inc/mens_fashion')
                </div><!-- /.wide-banners -->
                <!-- ================================= WIDE PRODUCTS : END =============================== -->
                <!-- ======================= BEST SELLER ============================== -->

                <div class="best-deal wow fadeInUp outer-bottom-xs">
                   @include('frontend/inc/best_seller')
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
