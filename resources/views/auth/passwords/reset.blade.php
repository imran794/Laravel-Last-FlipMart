@extends('layouts.frontend')

@section('content')
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Reset Password</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->
   <div class="col-md-12">
    <h4 class="checkout-subtitle">Reset Password</h4>
 
      <form method="POST" action="{{ route('password.update') }}">
                           @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
            <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail2" placeholder="email address"   name="email" value="{{ $email ?? old('email') }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
         <div class="form-group">
            <label class="info-title" for="exampleInputEmail2">New-Password <span>*</span></label>
            <input type="password" class="form-control unicase-form-control text-input" id="exampleInputEmail2" placeholder="New-Password" name="password" autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
         <div class="form-group">
            <label class="info-title" for="exampleInputEmail2">Confirm Password <span>*</span></label>
            <input type="password" class="form-control unicase-form-control text-input" id="exampleInputEmail2" placeholder="Confirm Password" name="password_confirmation" autocomplete="new-password">
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <button type="submit" class="btn-upper btn btn-primary ">Reset Password</button>
    </form>


</div>
<!-- Sign-in -->


</div><!-- /.row -->

</div><!-- /.sigin-in-->

</div><!-- /.container -->
</div>
    
</style>><!-- /.body-content -->
@endsection
