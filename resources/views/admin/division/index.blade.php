@extends('layouts.dashboard')

@section('title') Add-Division @endsection

@section('Shiping-Area') active show-sub @endsection

@section('Add-Division') active @endsection




@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add Division</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
           <div class="card">
               <div class="card-body">List Division</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-25p">Division Name</th>
                            <th class="wd-25p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($divisions as $item)
                          <tr>
                             <td>{{ $item->division_name }}</td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('shipingarea.edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                              
                              
                                  <form  action="{{ route('shipingarea.destroy',$item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                  <button  class="btn btn-sm btn-danger" style="cursor: pointer;"   title="delete data"><i class="fa fa-trash"></i></button>
                                </form>
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
                    Add Division
                </div> 
                <div class="card-body">
                    <form action="{{ route('shipingarea.store') }}" method="POST">
                        @csrf
                     
                         <div class="form-group">
                            <label>Division Name</label>
                            <input type="text" name="division_name" class="form-control" placeholder="Division Name">
                            @error('division_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>  
                        
                        <button style="background-color: #5B93D3; border-color: #5B93D3; cursor: pointer;" type="submit" class="btn btn-success">Add Division</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection