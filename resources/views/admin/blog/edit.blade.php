@extends('layouts.dashboard')

@section('title') Update Blog @endsection

@section('Add-Blog') active @endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Add  Blog</a></li>
      <li class="breadcrumb-item active" aria-current="page">Update Blog</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    Update blog
                </div> 
                <div class="card-body">
                   <form action="{{ route('blog.update',$edit_data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_image" value="{{ $edit_data->image }}">
                        @method('put')
                        <div class="form-group">
                          <label>Blog Image</label>
                          <input type="file" name="image" class="form-control dropify">
                          @error('image')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                            <div style="padding-top: 15px;" class="">
                         <img width="150" src="{{ asset($edit_data->image) }}" alt="image">
                          </div>
                        </div>
                         <div class="form-group">
                            <label>Blog Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $edit_data->title }}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                         <div class="form-group">
                            <label>Blog Description</label>
                            <textarea name="des" class="form-control">{{ $edit_data->des }}</textarea>
                            @error('des')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                            <div class="form-group">
                            <label>Blog Title</label>
                            <input type="text" name="btn" class="form-control" value="{{ $edit_data->btn }}">
                            @error('btn')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                          
                        <button type="submit" class="btn btn-success" style="background-color: #5B93D3; border-color: #5B93D3; cursor: pointer">Update Blog</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection