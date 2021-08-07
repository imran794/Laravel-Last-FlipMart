@extends('layouts.dashboard')

@section('title') Update Category @endsection

@section('Add-Category') active @endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Add Category</a></li>
      <li class="breadcrumb-item active" aria-current="page">Update Category</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    Update Category
                </div> 
                <div class="card-body">
                   <form action="{{ route('category.update',$edit_data->id) }}" method="POST">
                        @csrf
                        @method('put')
                            <div class="form-group">
                            <label>Category Icon</label>
                            <input type="text" name="category_icon" class="form-control" value="{{ $edit_data->category_icon }}">
                            @error('category_icon')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>   
                           <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="category_name" class="form-control" value="{{ $edit_data->category_name }}">
                            @error('category_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          
                        <button type="submit" class="btn btn-success" style="background-color: #5B93D3; border-color: #5B93D3; cursor: pointer">Update Category</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection