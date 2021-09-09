@extends('layouts.frontend')

@section('title')
SSL Host Payment
@endsection

@section('content')


<!-- ============================== breadcrumb : start =================================== -->
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>

                <li><a href="#">SSL Easy Payment</a></li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->



<!-- ============================== breadcrumb : end =================================== -->

<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
          
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">{{ $cartsqty }}</span>
            </h4>
            <ul class="list-group mb-3">
                @foreach ($carts as $cart)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{ $cart->name }}</h6>
                        <small class="text-muted">{{ $cart->options->color }}</small>
                    </div>
                    <span class="text-muted">{{ $cart->price }} * {{ $cart->qty }}</span>
                </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (BDT)</span>
                    <strong>{{ $total_amount }} TK</strong>
                </li>
            </ul>
        </div>
      <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form method="POST" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="firstName">Full name</label>
                        <input type="text" value="{{ $data['name'] }}" disabled  name="customer_name" class="form-control" id="customer_name" placeholder=""
                               value="John Doe" required>
                        <div class="invalid-feedback">
                         
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="mobile">Mobile</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+88</span>
                        </div>
                        <input type="text" name="customer_mobile" value="{{ $data['phone'] }}" disabled class="form-control" id="mobile" placeholder="Mobile"
                               value="01711xxxxxx" required>
                        <div class="invalid-feedback" style="width: 100%;">
                         
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                    <input type="email" value="{{ $data['email'] }}" disabled name="customer_email" class="form-control" id="email"
                           placeholder="you@example.com" value="you@example.com" required>
                    <div class="invalid-feedback">
                     
                    </div>
                </div>
                <hr class="mb-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="same-address">
                     <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                        <input type="hidden" value="{{ $total_amount }}" name="amount" id="total_amount" required/>
                        <input type="hidden"  id="post_code" value="{{ $data['post_code'] }}">
                         <input type="hidden" id="notes" value="{{ $data['notes'] }}">
                        <input type="hidden" id="division_id" value="{{ $data['division_id'] }}">
                        <input type="hidden" id="district_id" value="{{ $data['district_id'] }}">
                        <input type="hidden" id="state_id" value="{{ $data['state_id'] }}">
                    <label class="custom-control-label" for="same-address">Shipping address is the same as my billing
                        address</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="save-info">
                    <label class="custom-control-label" for="save-info">Save this information for next time</label>
                </div>
                <hr class="mb-4">
                <button style="margin-bottom: 50px;" class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata="your javascript arrays or objects which requires in backend"
                        order="If you already have the transaction generated for current order"
                        endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                </button>
            </form>
        </div>
    </div>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
    </div>
</div>





@endsection
