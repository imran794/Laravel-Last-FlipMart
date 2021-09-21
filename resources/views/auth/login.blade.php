@extends('layouts.frontend')

@section('content')
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Login</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->
<div class="col-md-6 col-sm-6 sign-in">
    @error('banned')
        <h3 class="text-danger">{{ $message }}</h3>
    @enderror
    <h4 class="">Sign in</h4>
    <div class="social-sign-in outer-top-xs">
        <a href="{{ route('login.facebook') }}" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
        <a href="{{ route('login.google') }}" class="twitter-sign-in"><i class="fa fa-google"></i> Sign In with google</a>
    </div>
    <form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
            <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="email" value="{{ old('email') }}" placeholder="email address" >
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
            <input type="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="password" name="password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="radio outer-xs">
            <label>
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" {{ old('remember') ? 'checked' : '' }} >Remember me!
            </label>
            <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your Password?</a>
        </div>
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
    </form>
</div>
<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
    <h4 class="checkout-subtitle">Create a new account</h4>
    <form class="register-form outer-top-xs" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
             <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
            <input type="text" name="name" value="{{ old('name') }}"class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="name">

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
            <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
            <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail2" placeholder="email address"  name="email" value="{{ old('email') }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
       
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
            <input type="text" name="phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="phone number" >
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
            <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
            <input type="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Re-Type Password" name="password_confirmation">
        </div>
        <button style="margin-bottom: 20px;" type="submit" class="btn-upper btn btn-primary mt-5">Register</button>
    </form>


</div>
<!-- create a new account -->
</div><!-- /.row -->

</div><!-- /.sigin-in-->

</div><!-- /.container -->
</div><!-- /.body-content -->
@endsection
