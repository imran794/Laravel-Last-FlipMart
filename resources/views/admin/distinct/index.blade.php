@extends('layouts.dashboard')

@section('title') Add-Shipdistrict @endsection

@section('Shiping-Area') active show-sub @endsection

@section('Add-Shipdistrict') active @endsection




@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add distinct</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
           <div class="card">
               <div class="card-body">List Distinct</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-25p">Division Name</th>
                            <th class="wd-25p">Distinct Name</th>
                            <th class="wd-25p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($distincts as $item)
                          <tr>
                             <td>{{ $item->division->division_name }}</td>
                             <td>{{ $item->district_name }}</td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('distinct.edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>

                                <a href="{{ route('distinct.destroy',$item->id) }}" class="btn btn-danger btn-sm" title="delete data"><i class="fa fa-trash"></i></a>
                    
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
               </div>
           </div>
        </div>
            <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Add distinct
                </div> 
                <div class="card-body">
                    <form action="{{ route('distinct.store') }}" method="POST">
                        @csrf
                         <div class="form-group">
                            <label>Division Name</label>
                            <select name="division_id" class="form-control">
                            <option value="">Select One</option>
                                @foreach ($divisions as $division)
                                <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                   @endforeach
                            </select>
                            @error('division_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>  
                           <div class="form-group">
                            <label>Distinct Name</label>
                            <input type="text" name="district_name" class="form-control" placeholder="Distinct Name">
                            @error('district_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>  
                        
                        <button style="background-color: #5B93D3; border-color: #5B93D3; cursor: pointer;" type="submit" class="btn btn-success">Add Distinct</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection