@extends('layouts.dashboard')

@section('title') Contact Information @endsection

@section('Add-Category') active @endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
     <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add Contact Information</li>
      <li class="breadcrumb-item active" aria-current="page">Update Contact Information</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    Update Contact Information
                </div> 
                <div class="card-body">
                   <form action="{{ route('cinformation.update',$edit_data->id) }}" method="POST">
                        @csrf
                        @method('put')
                             <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="{{ $edit_data->address }}">
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                     
                         <div class="form-group">
                            <label>Number</label>
                            <input type="text" name="number" class="form-control" value="{{ $edit_data->number }}">
                            @error('number')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>  
                          <div class="form-group">
                            <label>Number 2</label>
                            <input type="text" name="number2" class="form-control" value="{{ $edit_data->number2 }}">
                            @error('number2')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="{{ $edit_data->email }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                              </div>
                          
                        <button type="submit" class="btn btn-success" style="background-color: #5B93D3; border-color: #5B93D3; cursor: pointer">Update Contact Information</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection