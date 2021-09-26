@extends('layouts.dashboard')

@section('title') Stock Management @endsection

@section('Stock Management') active @endsection




@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Stock Management</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
          <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    Update Stock Management
                </div> 
                <div class="card-body">
                   <form action="{{ route('stock.update',$products->id) }}" method="POST">
                        @csrf
                          <div class="form-group">
                          <label>Product Name</label>
                          <input type="text" name="product_name" class="form-control" value="{{ $products->product_name }}">
                          @error('product_name')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                           <div class="form-group">
                          <label>Product Code</label>
                          <input type="text" name="product_code" class="form-control" value="{{ $products->product_code }}">
                          @error('product_code')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                           <div class="form-group">
                          <label>Product Qty</label>
                          <input type="text" name="product_qty" class="form-control" value="{{ $products->product_qty }}">
                          @error('product_qty')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                          
                        <button type="submit" class="btn btn-success" style="background-color: #5B93D3; border-color: #5B93D3; cursor: pointer">Update Stock</button>
                      </form>
                </div>
            </div>
        </div>
        
    </div>
</div>



@endsection
















  {{--  --}}