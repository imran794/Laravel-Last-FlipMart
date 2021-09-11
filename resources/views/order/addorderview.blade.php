@extends('layouts.dashboard')

@section('title') Order View @endsection

@section('orders') active show-sub @endsection

@section('Orders') active @endsection



@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Order View</li>
    </ol>
</nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
           <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item active text-center">Shipping Information</li>
                    <li class="list-group-item">
                        <strong>Name:</strong> {{ $order->name }}
                    </li>
                    <li class="list-group-item">
                        <strong>Phone:</strong>
                        {{ $order->phone }}
                    </li>
                    <li class="list-group-item">
                        <strong>Email:</strong>
                        {{ $order->email }}
                    </li>
                    <li class="list-group-item">
                        <strong>Division:</strong>
                        {{ $order->division->division_name }}
                    </li>
                    <li class="list-group-item">
                        <strong>District:</strong>
                        {{ $order->district->district_name }}
                    </li>
                    <li class="list-group-item">
                        <strong>State:</strong>
                        {{ $order->state->state_name }}
                    </li>

                        <li class="list-group-item">
                            <strong>Post Code:</strong>
                            {{ $order->post_code }}
                        </li>
                    <li class="list-group-item">
                        <strong>Order Date:</strong>
                        {{ $order->order_date }}
                    </li>
                </ul>
            </div>

            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item active text-center">Order Information</li>
                    <li class="list-group-item">
                        <strong>Name:</strong> {{ $order->name }}
                    </li>
                    <li class="list-group-item">
                        <strong>Phone:</strong>
                        {{ $order->phone }}
                    </li>
                    <li class="list-group-item">
                        <strong>Payment By:</strong>
                        {{ $order->payment_type }}
                    </li>
                    <li class="list-group-item">
                        <strong>TNX Id:</strong>
                        {{ $order->transaction_id }}
                    </li>

                        <li class="list-group-item">
                            <strong>Invoice No:</strong>
                            {{ $order->invoice_no }}
                        </li>
                    <li class="list-group-item">
                        <strong>Order Total:</strong>
                        {{ $order->amount }}Tk
                    </li>

                    <li class="list-group-item">
                        <strong>Order Status:</strong>
                        <span class="badge badge-pill badge-primary">{{ $order->status }}</span>
                    </li>

                    <li class="list-group-item">
                        @if ($order->status == 'Pending')
                        <a href="{{ url('admin/penddingToconfirm') }}/{{ $order->id }}" class="btn btn-block btn-success" id="confirm">Confirm Order</a>  
                          <a href="{{ url('admin/pendingTocancel/'.$order->id) }}" class="btn btn-block btn-danger" id="cancel">Cancel Order</a>
                        @elseif($order->status == 'Confirm')
                            <a href="{{ url('admin/confirmtoprocessing') }}/{{ $order->id }}" class="btn btn-block btn-success" id="processing">Processing Order</a> 

                        @elseif($order->status == 'Processing')
                            <a href="{{ url('admin/processToPicked') }}/{{ $order->id }}" class="btn btn-block btn-success" id="order">Picked Order</a>  
                       @elseif($order->status == 'picked')
                            <a href="{{ url('admin/PickedtoShipped') }}/{{ $order->id }}" class="btn btn-block btn-success" id="order">Shipped Order</a> 
                     @elseif($order->status == 'Shipped')
                            <a href="{{ url('admin/ShippedTodelivery') }}/{{ $order->id }}" class="btn btn-block btn-success" id="order">Delevery Order</a>  
                        @endif


                    
                    </li>

                </ul>
            </div>
          </div>

          <div class="row mt-3">
              <div class="col-md-12 m-auto">
                <div class="table-responsive">
                    <table class="table">
                    <tbody>
                            <tr style="background: #E9EBEC;">
                                <td class="col-md-1">
                                    <label for="">Image</label>
                                </td>
                                <td class="col-md-3">
                                <label for="">Poduct Name</label>
                                </td>

                                <td class="col-md-3">
                                    <label for="">Poduct Code</label>
                                </td>

                                <td class="col-md-2">
                                    <label for="">Color</label>
                                </td>

                                <td class="col-md-2">
                                    <label for="">Size</label>
                                </td>

                                <td class="col-md-2">
                                    <label for="">Quantity</label>
                                </td>

                                <td class="col-md-1">
                                    <label for="">Price</label>
                                </td>

                            </tr>

                         @foreach ($orderItems as $item)
                            <tr>
                                <td class="col-md-1"><img src="{{ asset($item->product->product_thambnail) }}" height="50px;" width="50px;" alt="imga"></td>
                                <td class="col-md-3">
                                    <div class="product-name"><strong>{{ $item->product->product_name }}</strong>
                                    </div>
                                </td>

                                <td class="col-md-2">
                                <strong>{{ $item->product->product_code }}</strong>
                                </td>

                                <td class="col-md-2">
                                    <strong>{{ $item->color }}</strong>
                                    </td>

                                <td class="col-md-2">
                                <strong>{{ $item->size }}</strong>
                                </td>

                                <td class="col-md-2">
                                <strong>{{ $item->qty }}</strong>
                                </td>

                                <td class="col-md-1">
                                <strong>৳{{ $item->price }} ({{ $item->price * $item->qty }})</strong>

                                </td>
                            </tr>
                         @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
          </div>
    </div>
</div>



@endsection
