@extends('layouts.dashboard')

@section('title') Update Brand @endsection

@section('Add-Brand') active @endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('brand.index') }}">Add Brand</a></li>
      <li class="breadcrumb-item active" aria-current="page">Update Brand</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    Update Brand
                </div> 
                <div class="card-body">
                   <form action="{{ route('brand.update',$edit_data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_image" value="{{ $edit_data->brand_image }}">
                        @method('put')
                        <div class="form-group">
                          <label>Brand Image</label>
                          <input type="file" name="brand_image" class="form-control dropify">
                          @error('brand_image')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                            <div style="padding-top: 15px;" class="">
                         <img width="150" src="{{ asset($edit_data->brand_image) }}" alt="brand_image">
                          </div>
                        </div>
                          <div class="form-group">
                          <label>Brand Name</label>
                          <input type="text" name="brand_name" class="form-control" value="{{ $edit_data->brand_name }}">
                          @error('brand_name')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                          
                        <button type="submit" class="btn btn-success" style="background-color: #5B93D3; border-color: #5B93D3; cursor: pointer">Update Brand</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection