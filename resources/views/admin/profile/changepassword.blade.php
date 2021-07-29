@extends('layouts.dashboard')

@section('title')
Update Change password
@endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Update Change password</li>
    </ol>
  </nav>
@endsection



@section('content')


   <div class="container" style="padding: 50px 0;">
    <div class="row">
      <div class="col-md-4 ">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top"  style="border-radius: 50%;" src="{{ asset(Auth::user()->image) }}" height="100%;" width="100%;" alt="Card image cap">
                    <ul class="list-group list-group-flush">
                      <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-sm btn-block " >Home</a>
                      <a href="{{ route('image') }}" class="btn btn-primary btn-sm btn-block">Update Image</a>

                      <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>

                      <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"> Log Out</a>
                    </ul>
                  </div>
                </div>
                <div class="col-md-8 mt-1">
                <div class="card" >
                        <div class="card-body">
                             <form action="{{ route('password.store.ad') }}" method="POST">
                                  @csrf
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Old Password</label>
                                      <input type="password" name="old_password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Old password">
                                      @error('old_password')
                                          <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                    </div>
      
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">New Password</label>
                                      <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="New password">
                                      @error('password')
                                          <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                    </div>
      
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Confirm Password</label>
                                      <input type="password" name="password_confirmation" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Re-Type Passowrd">
                                      @error('password_confirmation')
                                          <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                    </div>
                                
                                  <div class="form-group">
                                      <button style="cursor: pointer;" type="submit" class="btn btn-danger">Change Password</button>
                                  </div>
                              </form>
                        </div>
                  </div>
                </div>
    </div>
</div>


@endsection
