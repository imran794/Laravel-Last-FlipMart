@extends('layouts.frontend')

@section('title')
Blog Page
@endsection

@section('content')


<!-- ============================== breadcrumb : start =================================== -->
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>

                <li><a href="#">Blog</a></li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<!-- ============================== breadcrumb : end =================================== -->


<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="blog-page">
                <div class="col-md-9">
                    @foreach ($blogs as $blog)
                    <div class="blog-post  wow fadeInUp" style="margin-bottom: 30px;">
                        <a href="{{ route('blog.details',$blog->slug) }}"><img class="img-responsive" src="{{ asset($blog->image) }}" alt=""></a>
                        <h1><a href="{{ route('blog.details',$blog->slug) }}">{{ $blog->title }}</a></h1>
                        <span class="author">{{ $blog->user->name }}</span>
                        <span class="review">6 Comments</span>
                        <span class="date-time">{{ $blog->created_at->format('M d Y') }}</span>
                        <p>{{ $blog->des }}</p>
                        <a href="{{ route('blog.details',$blog->slug) }}" class="btn btn-upper btn-primary read-more">{{ $blog->btn }}</a>
                    </div>
                    @endforeach
                    <div class="clearfix blog-pagination filters-container  wow fadeInUp" style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">

                        <div class="text-right">
                            <div class="pagination-container">
                                <ul class="list-inline list-unstyled">
                                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li class="active"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul><!-- /.list-inline -->
                            </div><!-- /.pagination-container -->
                        </div><!-- /.text-right -->
                    </div><!-- /.filters-container -->
                </div>
                <div class="col-md-3 sidebar">
                    <div class="sidebar-module-container">
                        <div class="home-banner outer-top-n outer-bottom-xs">
                            <img src="{{ asset('frontend_assets/assets/images/banners/LHS-banner.jpg') }}" alt="Image">
                        </div>
                        <!-- ==============================================CATEGORY============================================== -->
                        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                            <h3 class="section-title">Category</h3>
                            <div class="sidebar-widget-body m-t-10">
                                <div class="accordion">
                                    @foreach ($categories as $category)
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="#collapseOne{{ $category->id }}" data-toggle="collapse" class="accordion-toggle collapsed">
                                                {{ $category->category_name }}
                                            </a>
                                        </div><!-- /.accordion-heading -->
                                        <div class="accordion-body collapse" id="collapseOne{{  $category->id }}" style="height: 0px;">
                                            @php
                                            $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderby('sub_category_name','ASC')->get();
                                            @endphp
                                            <div class="accordion-inner">
                                                <ul>
                                                    @foreach ($subcategories as $subcategory)
                                                    <li><a href="#">{{ $subcategory->sub_category_name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div><!-- /.accordion-inner -->
                                        </div><!-- /.accordion-body -->
                                    </div><!-- /.accordion-group -->
                                    @endforeach

                                </div><!-- /.accordion -->
                            </div><!-- /.sidebar-widget-body -->
                        </div><!-- /.sidebar-widget -->
                        <!-- ============================================== CATEGORY : END ============================================== -->
                      {{--   <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                            <h3 class="section-title">tab widget</h3>
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#popular" data-toggle="tab">popular post</a></li>
                                <li><a href="#recent" data-toggle="tab">recent post</a></li>
                            </ul>
                            <div class="tab-content" style="padding-left:0">
                                <div class="tab-pane active m-t-20" id="popular">
                                    <div class="blog-post inner-bottom-30 ">
                                        <img class="img-responsive" src="{{ asset('frontend_assets/assets/images/blog-post/blog_big_01.jpg') }}" alt="">
                                        <h4><a href="blog-details.html">Simple Blog Post</a></h4>
                                        <span class="review">6 Comments</span>
                                        <span class="date-time">12/06/16</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>

                                    </div>
                                    <div class="blog-post">
                                        <img class="img-responsive" src="assets/images/blog-post/blog_big_02.jpg" alt="">
                                        <h4><a href="blog-details.html">Simple Blog Post</a></h4>
                                        <span class="review">6 Comments</span>
                                        <span class="date-time">23/06/16</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>

                                    </div>
                                </div>

                                <div class="tab-pane m-t-20" id="recent">
                                    <div class="blog-post inner-bottom-30">
                                        <img class="img-responsive" src="assets/images/blog-post/blog_big_03.jpg" alt="">
                                        <h4><a href="blog-details.html">Simple Blog Post</a></h4>
                                        <span class="review">6 Comments</span>
                                        <span class="date-time">5/06/16</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>

                                    </div>
                                    <div class="blog-post">
                                        <img class="img-responsive" src="assets/images/blog-post/blog_big_01.jpg" alt="">
                                        <h4><a href="blog-details.html">Simple Blog Post</a></h4>
                                        <span class="review">6 Comments</span>
                                        <span class="date-time">10/07/16</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>

                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <!-- ============================================== PRODUCT TAGS ============================================== -->
                            @include('frontend/inc/tags')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
