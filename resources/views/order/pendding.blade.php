@extends('layouts.dashboard')

@section('title') Pendding-Order @endsection

@section('orders') active show-sub @endsection

@section('Pendding Order') active @endsection



@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pendding Order</li>
    </ol>
</nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">Pendding Order</div>
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
                                        <td>{{ $item->amount }}</td>
                                        <td>{{ $item->transaction_id }}</td>
                                        <td> {{ $item->status}}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('subcategory.edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>


                                                <form action="{{ route('subcategory.destroy',$item->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-danger" style="cursor: pointer;" title="delete data"><i class="fa fa-trash"></i></button>
                                                </form>

                                                @if ($item->status == 1)
                                                <a href="{{ url('admin/subinactive') }}/{{ $item->id }}" type="button" class="btn btn-danger btn-sm" title="Inactive"><i class="fa fa-arrow-down"></i></a>
                                                @else
                                                <a href="{{ url('admin/subactive') }}/{{ $item->id }}" type="button" class="btn btn-info btn-sm" title="Active"><i class="fa fa-arrow-up"></i></a>
                                                @endif
                                            </div>
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
