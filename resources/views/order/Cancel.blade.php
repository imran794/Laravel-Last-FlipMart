@extends('layouts.dashboard')

@section('title') Cancel Order @endsection

@section('orders') active show-sub @endsection

@section('Cancel Order') active @endsection



@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cancel Order</li>
    </ol>
</nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">Cancel Order</div>
                <div class="card-header">
                    <div class="card pd-20 pd-sm-40">
                        <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                                <thead>
                                    <tr>

                                        <th class="wd-15p">Date</th>
                                        <th class="wd-15p">Invoice No</th>
                                        <th class="wd-15p">Amount</th>
                                        <th class="wd-15p">Trans Id</th>
                                        <th class="wd-15p">status</th>
                                        <th class="wd-15p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item)
                                    <tr>
                                        <td>{{ $item->order_date }}</td>
                                        <td>{{ $item->invoice_no }}</td>
                                        <td>{{ $item->amount }}TK</td>
                                        <td>{{ $item->transaction_id }}</td>
                                        <td><span class="badge badge-pill badge-primary">{{ $item->status }}</span></td>
                                        <td>

                                            <a href="{{ url('admin/orders/delete/'.$item->id) }}" class="btn btn-sm btn-danger" id="delete" title="delete data"><i class="fa fa-trash"></i></a>

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
    </div>
</div>



@endsection
