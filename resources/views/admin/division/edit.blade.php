@extends('layouts.dashboard')

@section('title') Update-Division @endsection

@section('Shiping-Area') active show-sub @endsection

@section('Update-Division') active @endsection




@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ url('shipingarea.index') }}">Add Division</a></li>
      <li class="breadcrumb-item active" aria-current="page">Update Division</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
            <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    Update Division
                </div> 
                <div class="card-body">
                    <form action="{{ route('shipingarea.update', $edit_data->id) }}" method="POST">
                        @csrf
                       @method('put')
                         <div class="form-group">
                            <label>Division Name</label>
                            <input type="text" name="division_name" class="form-control" value="{{ $edit_data->division_name }}">
                            @error('division_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>  
                        
                        <button style="background-color: #5B93D3; border-color: #5B93D3; cursor: pointer;" type="submit" class="btn btn-success">Update Division</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection