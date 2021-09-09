@extends('layouts.frontend')

@section('title')
 User Profile
@endsection


@section('content')

<!--==========================================
                pricing_banner part start
   ============================================-->

 <div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Profile</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->





    <!--==========================================
                pricing_banner part end
   ============================================-->

   <div class="container" style="padding: 50px 0;">
    <div class="row">
      <div class="col-md-4 ">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top"  style="border-radius: 50%;" src="{{ asset(Auth::user()->image) }}" height="100%;" width="100%;" alt="Card image cap">
                    <ul class="list-group list-group-flush">
                      <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-sm btn-block " >Home</a>
                      <a href="{{ route('image') }}" class="btn btn-primary btn-sm btn-block">Update Image</a>

                      <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>

                      <a href="{{ route('my-order') }}" class="btn btn-primary btn-sm btn-block">My Order</a>

                      <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"> Log Out</a>
                    </ul>
                  </div>
                </div>
                <div class="col-md-8 mt-1">
                  <div class="card" >
                        <div class="card-body">
                            <form action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ Auth::user()->name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ Auth::user()->email }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                  </div>
    
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ Auth::user()->phone }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                  </div>
                                <div class="form-group">
                                    <button type="submit" style="cursor: pointer;" class="btn btn-danger">Update Profile</button>
                                </div>
                            </form>
                        </div>
                  </div>
                </div>
    </div>
</div>


@endsection
