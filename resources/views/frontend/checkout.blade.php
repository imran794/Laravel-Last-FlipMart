@extends('layouts.frontend')

@section('title')
Checkout Page
@endsection

@section('content')


<!-- ============================== breadcrumb : start =================================== -->
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>

                <li><a href="#">Checkout Page</a></li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<!-- ============================== breadcrumb : end =================================== -->

<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel-group checkout-steps" id="accordion">
                        <!-- checkout-step-01  -->
                        <div class="panel panel-default checkout-step-01">
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <!-- panel-body  -->
                                <div class="panel-body">
                                    <div class="row">
                                        <!-- already-registered-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <h4 class="checkout-subtitle">Shipping Adderss</h4>
                                            <form class="register-form" role="form" action="{{ route('checkout.store') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                                    <input type="text" name="name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="{{ Auth::user()->name }}">
                                                    @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Shipping Email <span>*</span></label>
                                                    <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="{{ Auth::user()->email }}">
                                                    @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Number <span>*</span></label>
                                                    <input type="text" name="phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="{{ Auth::user()->phone }}">
                                                    @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Post Code <span>*</span></label>
                                                    <input type="text" name="post_code" class="form-control unicase-form-control text-input" id="exampleInputEmail1" data-validation="required">
                                                    @error('post_code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                        </div>
                                        <!-- already-registered-login -->
                                        <!-- already-registered-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <h4 class="checkout-subtitle"></h4>
                                            <form class="register-form" role="form">
                                                 <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Division Name <span>*</span></label>
                                                    <input type="text" name="division_name" class="form-control unicase-form-control text-input" id="exampleInputEmail1">
                                                    @error('division_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div> 
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">District Name <span>*</span></label>
                                                    <input type="text" name="district_name" class="form-control unicase-form-control text-input" id="exampleInputEmail1">
                                                    @error('division_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div> 
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">State Name <span>*</span></label>
                                                    <input type="text" name="state_name" class="form-control unicase-form-control text-input" id="exampleInputEmail1">
                                                    @error('state_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Messages <span>*</span></label>
                                                    <textarea rows="4" class="form-control" name="notes" data-validation="required"></textarea>
                                                    @error('notes')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                        
                                       
                                        </div>


                                    </div>
                                </div>
                                <!-- panel-body  -->

                            </div><!-- row -->
                        </div>
                        <!-- checkout-step-01  -->

                    </div><!-- /.checkout-steps -->
                </div>
                <div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Your Shopping List</h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">
                                        @foreach ($carts as $item)
                                        <li>
                                            <Strong>Image:</Strong>
                                            <img src="{{ asset($item->options->image) }}" alt="" style="height: 50px; width:50px;">
                                            <Strong>Qty:</Strong>
                                            {{ $item->qty }}
                                            <Strong>Color:</Strong>
                                            {{ $item->options->color }}
                                            <Strong>Size:</Strong>
                                            {{ $item->options->size }}
                                        </li>
                                        @endforeach
                                        @if (Session::has('coupon'))
                                        <li>Subtotal:<Strong> ${{ $cartstotal }}</Strong></li>
                                        <li>Coupon Name:<Strong> {{ Session::get('coupon')['coupon_name'] }}</Strong></li>
                                        <li>Discount Amount:<Strong> ${{ Session::get('coupon')['discount_amount'] }}({{ session()->get('coupon')['coupon_discount'] }}%)</Strong></li>
                                        <li>GrandTotal Total:<Strong> ${{ Session::get('coupon')['total_amount'] }}</Strong></li>
                                        @else
                                        <li>Subtotal:<Strong>${{ $cartstotal }}</Strong></li>
                                        <li>GrandTotal:<Strong>${{ $cartstotal }}</Strong></li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- checkout-progress-sidebar -->
                </div>
                   <div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">SELECT PAYMENT METHOD</h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">
                                     <hr>
                                        <li>
                                            <input type="radio" name="payment_method" value="stripe">
                                            <label for="">Stripe</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="payment_method" value="sslHost">
                                            <label for="">SSL HostedPayment</label>
                                        </li>

                                        <li>
                                            <input type="radio" name="payment_method" value="sslEasy">
                                            <label for="">SSL EasyPayment</label>
                                        </li> 

                                         <li>
                                            <input type="radio" name="payment_method" value="handcash">
                                            <label for="">Hand Cash</label>
                                        </li>
                                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button pull-right">Payment Step</button>
                                    </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- checkout-progress-sidebar -->
                </div>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
    </div>
</div>




   {{--  <script src="{{asset('backend')}}/lib/jquery-2.2.4.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="division_id"]').on('change', function(){
            var division_id = $(this).val();
            if(division_id) {
                $.ajax({
                    url: "{{  url('/user/district/get/ajax') }}/"+division_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        console.log('dasf');
                       let d =$('select[name="district_id"]').empty();
                          $.each(data, function(key, value){

                              $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');

                          });

                    },

                });
            } else {
                alert('danger');
            }

        });

    });

    </script>
 --}}



@endsection
