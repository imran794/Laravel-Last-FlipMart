@extends('layouts.dashboard')

@section('title') Update Category @endsection

@section('Add-Category') active @endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('subcategory.index') }}">Add Sub Category</a></li>
      <li class="breadcrumb-item active" aria-current="page">Update Sub Category</li>
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
                   <form action="{{ route('subcategory.update',$edit_data->id) }}" method="POST">
                        @csrf
                        @method('put')
                           <div class="form-group">
                            <label>Category Name</label>
                            <select name="category_id" class="form-control">
                              <option value="#">-Select One-</option>
                              @foreach ($categories as $category)
                                 <option value="{{ $category->id }}" {{   ($category->id == $edit_data->category_id) ? 'selected' : '' }} >{{ $category->category_name }}</option>
                              @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>   
                           <div class="form-group">
                            <label>Subcategory Name</label>
                            <input type="text" name="sub_category_name" class="form-control" value="{{ $edit_data->sub_category_name }}">
                            @error('sub_category_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          
                        <button type="submit" class="btn btn-success" style="background-color: #5B93D3; border-color: #5B93D3; cursor: pointer">Update Sub Category</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection