@extends('layouts.dashboard')

@section('title') Update-Coupon @endsection

@section('Add-Coupon') active @endsection



@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ url("coupon.index") }}">Add-Coupon</a></li>
      <li class="breadcrumb-item active" aria-current="page">Update Coupon</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
            <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    Add Coupon
                </div> 
                <div class="card-body">
                    <form action="{{ route('coupon.update',$edit_data->id) }}" method="POST">
                        @csrf
                        @method('put')
                         <div class="form-group">
                            <label>Coupon Name</label>
                            <input type="text" name="coupon_name" class="form-control" value="{{ $edit_data->coupon_name }}">
                            @error('coupon_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>  
                          <div class="form-group">
                            <label>Coupon Discount(%)</label>
                            <input type="text" name="coupon_discount" class="form-control" placeholder="Coupon Discount" min="1" max="99" value="{{ $edit_data->coupon_discount }}">
                            @error('coupon_discount')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                        
                            <div class="form-group">
                            <label>Coupon Validity</label>
                            <input type="date" name="coupon_validity" class="form-control" placeholder="Coupon Validity" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ $edit_data->coupon_validity }}">
                            @error('coupon_validity')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                        
                        <button style="background-color: #5B93D3; border-color: #5B93D3; cursor: pointer;" type="submit" class="btn btn-success">Update Coupon</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection