@extends('layouts.dashboard')

@section('title') Update Banner @endsection

@section('Add-Banner') active @endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('banner.index') }}">Add Banner</a></li>
      <li class="breadcrumb-item active" aria-current="page">Update Banner</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    Update Banner
                </div> 
                <div class="card-body">
                   <form action="{{ route('banner.update',$edit_data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_image" value="{{ $edit_data->image }}">
                        @method('put')
                            <div class="form-group">
                          <label>Banner Image</label>
                          <input type="file" name="image" class="form-control dropify">
                          @error('image')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                            <div style="padding-top: 15px;" class="">
                         <img width="250" src="{{ asset($edit_data->image) }}" alt="image">
                          </div>
                        </div>
                         <div class="form-group">
                            <label>Banner Sub Title</label>
                            <input type="text" name="sub_title" class="form-control" value="{{ $edit_data->sub_title }}">
                            @error('sub_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>  
                          <div class="form-group">
                            <label>Banner Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $edit_data->title }}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                             <div class="form-group">
                            <label>Banner Description</label>
                            <textarea rows="4" name="des" class="form-control">{{ $edit_data->des }}</textarea>
                            @error('des')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                            <div class="form-group">
                                <label>Banner Btn</label>
                                <input type="text" name="btn" class="form-control" value="{{ $edit_data->btn }}">
                                @error('btn')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                              </div>
                          
                        <button type="submit" class="btn btn-success" style="background-color: #5B93D3; border-color: #5B93D3; cursor: pointer">Update Banner</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection