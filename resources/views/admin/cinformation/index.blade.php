@extends('layouts.dashboard')

@section('title') Contact-Information-Add @endsection

@section('Contact-Information-Add') active @endsection



@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add Contact Information</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
           <div class="card">
               <div class="card-body">List Contact Information</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-25p">Address</th>
                            <th class="wd-25p">Nunber</th>
                            <th class="wd-25p">Email</th>
                            <th class="wd-25p">Status</th>
                            <th class="wd-25p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($cinformations as $item)
                          <tr>
                             <td>{{ Str::limit($item->address,10) }}</td>
                             <td>{{ $item->number }}</td>
                             <td>{{ $item->email }}</td>
                            <td>
                              @if ($item->status == 1)
                               <span class="badge badge-pill badge-success">Active</span>
                               @else
                                 <span class="badge badge-pill badge-danger">Deactive</span>
                              @endif
                          </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('cinformation.edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                              
                              
                                  <form  action="{{ route('cinformation.destroy',$item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                  <button  class="btn btn-sm btn-danger" style="cursor: pointer;"   title="delete data"><i class="fa fa-trash"></i></button>
                                </form>
                                 @if ($item->status == 1)
                                 <a href="{{ url('admin/inforinactive') }}/{{ $item->id }}"  type="button" class="btn btn-danger btn-sm" title="Inactive"><i class="fa fa-arrow-down"></i></a>
                                 @else  
                                  <a href="{{ url('admin/inforactive') }}/{{ $item->id }}"  type="button" class="btn btn-info btn-sm" title="Active"><i class="fa fa-arrow-up"></i></a>
                                   @endif 
                            
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
                    Add Contact Information
                </div> 
                <div class="card-body">
                    <form action="{{ route('cinformation.store') }}" method="POST">
                        @csrf
                          <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Address">
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                     
                         <div class="form-group">
                            <label>Number</label>
                            <input type="text" name="number" class="form-control" placeholder="Number">
                            @error('number')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>  
                          <div class="form-group">
                            <label>Number 2</label>
                            <input type="text" name="number2" class="form-control" placeholder="Number 2">
                            @error('number2')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                              </div>
                        <button style="background-color: #5B93D3; border-color: #5B93D3; cursor: pointer;" type="submit" class="btn btn-success">Add Contact Information</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection