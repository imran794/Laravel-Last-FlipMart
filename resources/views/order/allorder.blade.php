@extends('layouts.frontend')

@section('title')
All Order
@endsection


@section('content')

<!--==========================================
                pricing_banner part start
   ============================================-->

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>All Order</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->





<!--==========================================
                pricing_banner part end
   ============================================-->

<div class="container" style="padding: 50px 0;">
    <div class="row">
        <div class="col-md-4 ">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" style="border-radius: 50%;" src="{{ asset(Auth::user()->image) }}" height="100%;" width="100%;" alt="Card image cap">
                <ul class="list-group list-group-flush">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-sm btn-block ">Home</a>
                    <a href="{{ route('image') }}" class="btn btn-primary btn-sm btn-block">Update Image</a>

                    <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>

                    <a href="{{ route('my-order') }}" class="btn btn-primary btn-sm btn-block">My Order</a>
                       <a href="{{ route('return-order-submit') }}" class="btn btn-primary btn-sm btn-block">Return Order</a>
                      <a href="{{ route('cancel-order') }}" class="btn btn-primary btn-sm btn-block">Cancel Order</a>

                    <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"> Log Out</a>
                </ul>
            </div>
        </div>
        <div class="col-md-8 mt-2">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr style="background: #E9EBEC;">
                            <td class="col-md-1">
                                <label for="">Date</label>
                            </td>
                            <td class="col-md-3">
                                <label for="">Total</label>
                            </td>

                            <td class="col-md-2">
                                <label for="">Payment</label>
                            </td>

                            <td class="col-md-2">
                                <label for="">Invoice</label>
                            </td>

                            <td class="col-md-2">
                                <label for="">Order </label>
                            </td>

                            <td class="col-md-1">
                                <label for="">Action</label>
                            </td>

                        </tr>

                        @foreach ($orders as $order)


                        <tr>
                            <td class="col-md-1">
                                <strong>{{ $order->order_date }}</strong>
                            </td>
                            <td class="col-md-3">
                                <strong>৳{{ $order->amount }}</strong>
                            </td>

                            <td class="col-md-2">
                                <strong>{{ $order->payment_method }}</strong>
                            </td>

                            <td class="col-md-2">
                                <strong>{{ $order->invoice_no }}</strong>
                            </td>

                            <td class="col-md-2">
                                <span class="badge badge-pill badge-warning" style="background: #418DB9; text:white;">{{ ucwords($order->status) }}</span>
                            </td>

                            <td class="col-md-1">
                                <a href="{{ url('user/order-view/'.$order->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>

                                <a href="{{ url('user/invoice-download/'.$order->id) }}" style="margin-top: 5px;" class="btn btn-sm btn-danger "><i class="fa fa-download" style="color:white;"></i> Invoice</a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
