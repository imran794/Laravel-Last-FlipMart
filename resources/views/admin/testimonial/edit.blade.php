@extends('layouts.dashboard')

@section('title') Update Testimonial @endsection

@section('Add-Testimonial') active @endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('testimonial.index') }}">Add Testimonial</a></li>
      <li class="breadcrumb-item active" aria-current="page">Update Testimonial</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    Update testimonial
                </div> 
                <div class="card-body">
                   <form action="{{ route('testimonial.update',$edit_data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_image" value="{{ $edit_data->image }}">
                        @method('put')
                        <div class="form-group">
                          <label>Testimonial Image</label>
                          <input type="file" name="image" class="form-control dropify">
                          @error('image')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                            <div style="padding-top: 15px;" class="">
                         <img width="150" src="{{ asset($edit_data->image) }}" alt="image">
                          </div>
                        </div>
                         
                         <div class="form-group">
                            <label>Testimonial Description</label>
                            <textarea name="des" rows="4" class="form-control">{{  $edit_data->des  }}</textarea>
                            @error('des')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                             <div class="form-group">
                            <label>Testimonial Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $edit_data->title }}" >
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>   
                          <div class="form-group">
                            <label>Testimonial Sub Title</label>
                            <input type="text" name="sub_title" class="form-control" value="{{ $edit_data->sub_title }}">
                            @error('sub_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                          
                        <button type="submit" class="btn btn-success" style="background-color: #5B93D3; border-color: #5B93D3; cursor: pointer">Update Testimonial</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection