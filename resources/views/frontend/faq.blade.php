@extends('layouts.frontend')

@section('title')
Faq Page
@endsection

@section('content')


<!-- ============================== breadcrumb : start =================================== -->
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>

                <li><a href="#">Faq</a></li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<!-- ============================== breadcrumb : end =================================== -->

    <div class="body-content">
        <div class="container">
            <div class="checkout-box faq-page">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="heading-title">Frequently Asked Questions</h2>
                        <span class="title-tag">Last Updated on November 02, 2014</span>
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            @foreach ($faqs as $faq)
                                
                          
                            <div class="panel panel-default checkout-step-01">

                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                                            <span>1</span>{{ $faq->faq_qu }}
                                        </a>
                                    </h4>
                                </div>
                                <!-- panel-heading -->

                                <div id="collapseOne" class="panel-collapse collapse in">

                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        {{ $faq->faq_ans }}
                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                            </div>
                            <!-- checkout-step-01  -->
                            @endforeach

                        </div><!-- /.checkout-steps -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->


                 @include('frontend/inc/brands')


@endsection