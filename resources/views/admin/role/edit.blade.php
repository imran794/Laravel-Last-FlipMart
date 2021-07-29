@extends('layouts.dashboard')

@section('title')
Change Permission
@endsection



@section('Role Manager')
active
@endsection


@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Change Permission</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 m-auto">
            <div class="card ">
                <div class="card-header">
                    Change Permission
                </div> 
                <div class="card-body">
                    <form action="{{ route('permission.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                         <div class="form-group">
                            <label>Change Permission ->  {{ $user->name }}</label>
                            @foreach ($permissions as $record)

                              <label class="ckbox">
                                <input  {{ ( $user->hasPermissionTo($record->name)) ? "checked" : "" }} type="checkbox" name="permission[]" value="{{ $record->name }}">
                                <span>{{ $record->name }}</span>
                              </label>
                            @endforeach
                          </div> 
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Add Role</button>
                      </form>
                </div>
            </div>  
        </div>
    </div>
</div>



@endsection