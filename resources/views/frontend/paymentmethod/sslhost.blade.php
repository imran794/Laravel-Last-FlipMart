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

                <li><a href="#">SSL Host Payment</a></li>
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
                    <h4 class="mb-3"></h4>
                    <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                        <input type="hidden" value="{{ $total_amount }}" name="amount" id="total_amount" required />
                        <input type="hidden" value="{{ $data['name'] }}" name="name">
                        <input type="hidden" value="{{ $data['email'] }}" name="email">
                        <input type="hidden" value="{{ $data['phone'] }}" name="phone">
                        <input type="hidden" value="{{ $data['post_code'] }}" name="post_code">
                        <input type="hidden" value="{{ $data['notes'] }}" name="notes">
                        <input type="hidden" value="{{ $data['division_id'] }}" name="division_id">
                        <input type="hidden" value="{{ $data['district_id'] }}" name="district_id">
                        <input type="hidden" value="{{ $data['state_id'] }}" name="state_id">


                        <hr class="mb-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="same-address">

                            <label class="custom-control-label" for="same-address">Shipping address is the same as my billing
                                address</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="save-info">
                            <label class="custom-control-label" for="save-info">Save this information for next time</label>
                        </div>
                        <hr class="mb-4">
                        <button style="margin-bottom: 60px;" class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                    </form>
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.checkout-box -->
</div>
</div>





@endsection
