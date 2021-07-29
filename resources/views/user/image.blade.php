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

                      <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"> Log Out</a>
                    </ul>
                  </div>
                </div>
                <div class="col-md-8 mt-1">
                  <div class="card" >
                        <div class="card-body">
                          <form action="{{ route('image.update') }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  <input type="hidden" name="old_image" value="{{ Auth::user()->image }}">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">IMAGE</label>
                                      <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                      @error('image')
                                          <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                    </div>
                                   
                                  <div class="form-group">
                                      <button type="submit" style="cursor: pointer;" class="btn btn-danger">Upload Image</button>
                                  </div>
                              </form>
                        </div>
                  </div>
                </div>
    </div>
</div>


@endsection
