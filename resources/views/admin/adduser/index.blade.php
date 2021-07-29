@extends('layouts.dashboard')

@section('title')
Add-User
@endsection


@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add User</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
           <div class="card mb-5">
               <div class="card-body">User List</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            
                            <th class="wd-25p">Sl NO</th>
                            <th class="wd-25p">Name</th>
                            <th class="wd-25p">Email</th>
                {{--             <th class="wd-25p">Role</th> --}}
                            <th class="wd-25p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $item)
                          <tr>
                            
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                    {{--         <td>{{ $item->user->name }}</td> --}}
                                <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('user.delete',$item->id) }}" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a>
                          
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
            <div class="card mb-5">
                <div class="card-header">
                    Add User
                </div> 
                <div class="card-body">
                      <form method="POST" action="{{ route('user.store') }}">
                        @csrf
                          <div class="form-group">
                          <label>Name</label>
                          <input type="text" name="name" class="form-control" placeholder="Name">
                          @error('name')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>   
                          <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" placeholder="Email">
                          @error('email')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div> 
                         <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password">
                          @error('password')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                         <div class="form-group">
                          <label>Re-type Password</label>
                          <input type="password" name="password_confirmation" class="form-control" placeholder="Re-type Password">
                          @error('password_confirmation')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                             <div class="form-group">
                            <label>Role Name</label>
                            <select class="form-control" name="roled_id">
                              <option value="">Select One</option>
                               @foreach ($roles as $role)
                              <option value="{{ $role->id }}">{{ $role->name  }}</option>
                               @endforeach
                              @error('roled_id')
                              <small class="text-danger">{{ $message }}</small>
                            @enderror
                            </select>
                        
                          </div>
                   
                      <button type="submit" class="btn btn-success" style="cursor: pointer">Create User</button>
                    </form>
                </div>
            </div>  
        </div>
    </div>
</div>



@endsection