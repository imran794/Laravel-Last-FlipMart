@extends('layouts.dashboard')

@section('title')
Role Management
@endsection



@section('Role Management')
active
@endsection


@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Role Management</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
           <div class="card mb-5">
               <div class="card-body">Role List</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            
                            <th class="wd-10p">Sl NO</th>
                            <th class="wd-30p">Role Name</th>
                            <th class="wd-60p">Permission</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($roles as $item)
                          <tr>
                            
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                              @foreach ($item->getPermissionNames() as $permission)
                              <li>  {{ $permission }}</li>
                              @endforeach
                            </td>
                          
                            
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
               </div>
           </div>  
           <div class="card">
               <div class="card-body">User List</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            
                            <th class="wd-5p">Sl NO</th>
                            <th class="wd-20p">Name</th>
                            <th class="wd-20p">Role</th>
                            <th class="wd-20p">Permission</th>
                            <th class="wd-20p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $item)
                          <tr>
                            
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                              @foreach ($item->getRoleNames() as $record)
                                <li>{{ $record }}</li>
                              @endforeach
                            </td> 
                            <td>
                              @foreach ($item->getAllPermissions() as $record)
                                <li>{{ $record->name}}</li>
                              @endforeach
                            </td>
                          
                           <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('permission.edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                          
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
                    Add Role
                </div> 
                <div class="card-body">
                    <form action="{{ route('role.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label>Role Name</label>
                          <input type="text" name="role_name" class="form-control" placeholder="Role Name">
                          @error('role_name')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                         <div class="form-group">
                            <label>All Permission</label>
                            @foreach ($permissions as $record)
                              <label class="ckbox">
                                <input type="checkbox" name="permission[]" value="{{ $record->name }}">
                                <span>{{ $record->name }}</span>
                              </label>
                            @endforeach
                          </div> 
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Add Role</button>
                      </form>
                </div>
            </div>  
            <div class="card">
                <div class="card-header">
                    Assign Role
                </div> 
                <div class="card-body">
                    <form action="{{ route('role.assign') }}" method="POST">
                        @csrf
                         <div class="form-group">
                            <label>Select User</label>
                            <select class="form-control" name="user_id">
                              <option value="">Select One</option>
                               @foreach ($users as $user)
                              <option value="{{ $user->id }}">{{ $user->name  }}</option>
                            @endforeach
                            </select>
                        
                          </div> 
                           <div class="form-group">
                            <label>Role Name</label>
                            <select class="form-control" name="name">
                              <option value="">Select One</option>
                               @foreach ($roles as $role)
                              <option value="{{ $role->name }}">{{ $role->name  }}</option>
                            @endforeach
                            </select>
                        
                          </div> 
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Assign Role</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection