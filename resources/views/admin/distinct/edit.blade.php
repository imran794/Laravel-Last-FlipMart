@extends('layouts.dashboard')

@section('title') Update-Shipdistrict @endsection

@section('Shiping-Area') active show-sub @endsection

@section('Update-Shipdistrict') active @endsection




@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('shipdistrict.index') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Update distinct</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
            <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    Update distinct
                </div> 
                <div class="card-body">
                    <form action="{{ route('distinct.update',$edit_data->id) }}" method="POST">
                        @csrf
                         <div class="form-group">
                            <label>Division Name</label>
                            <select name="division_id" class="form-control">
                            <option value="">Select One</option>
                                @foreach ($divisions as $division)
                                <option value="{{ $division->id }}" {{ $division->id == $edit_data->division_id ? 'selected': '' }}>{{ $division->division_name }}</option>
                                   @endforeach
                            </select>
                            @error('division_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>  
                           <div class="form-group">
                            <label>Distinct Name</label>
                            <input type="text" name="district_name" class="form-control" value="{{ $edit_data->district_name }}">
                            @error('district_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>  
                        
                        <button style="background-color: #5B93D3; border-color: #5B93D3; cursor: pointer;" type="submit" class="btn btn-success">Update Distinct</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection