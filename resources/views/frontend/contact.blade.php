@extends('layouts.frontend')

@section('title')
Contact Us
@endsection

@section('content')


<!-- ============================== breadcrumb : start =================================== -->
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>

                <li><a href="#">Contact</a></li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<!-- ============================== breadcrumb : end =================================== -->


    <div class="body-content">
        <div class="container">
            <div class="contact-page">
                <div class="row">

                    <div class="col-md-12 contact-map outer-bottom-vs">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.0080692193424!2d80.29172299999996!3d13.098675000000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a526f446a1c3187%3A0x298011b0b0d14d47!2sTransvelo!5e0!3m2!1sen!2sin!4v1412844527190" width="600" height="450" style="border:0"></iframe>
                    </div>
                    <div class="col-md-9 contact-form">
                        <div class="col-md-12 contact-title">
                            <h4>Contact Form</h4>
                        </div>
                        <form action="{{ route('contact.store') }}" method="POST">    
                        @csrf      
                        <div class="col-md-4 ">
                
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputName">Your Name <span>*</span></label>
                                    <input type="text" name="name" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="Your Name">
                                </div>
                      
                        </div>
                        <div class="col-md-4">
                      
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                    <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email Address">
                                </div>
                          
                        </div>
                        <div class="col-md-4">
                        
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputTitle">Title <span>*</span></label>
                                    <input type="text" name="title" class="form-control unicase-form-control text-input" id="exampleInputTitle" placeholder="Title">
                                </div>
                         
                        </div>
                        <div class="col-md-12">
                       
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label>
                                    <textarea name="comment" class="form-control unicase-form-control" id="exampleInputComments" placeholder="Your Comments"></textarea>
                                </div>
                       
                        </div>
                        <div class="col-md-12 outer-bottom-small m-t-20">
                            <button type="submit" class="btn-upper btn btn-primary">Send Message</button>
                        </div>
                            </form>
                    </div>
                    @if ($cinformations)
                        
                   
                    <div class="col-md-3 contact-info">
                        <div class="contact-title">
                            <h4>Information</h4>
                        </div>
                        <div class="clearfix address">
                            <span class="contact-i"><i class="fa fa-map-marker"></i></span>
                            <span class="contact-span">{{ $cinformations->address }}</span>
                        </div>
                        <div class="clearfix phone-no">
                            <span class="contact-i"><i class="fa fa-mobile"></i></span>
                            <span class="contact-span">+{{ $cinformations->number }}<br>+{{ $cinformations->number2 }}</span>
                        </div>
                        <div class="clearfix email">
                            <span class="contact-i"><i class="fa fa-envelope"></i></span>
                            <span class="contact-span"><a href="#">{{ $cinformations->email }}</a></span>
                        </div>
                    </div>
                     @else
                        
                    @endif
                </div><!-- /.contact-page -->
            </div><!-- /.row -->






@include('frontend/inc/brands')


@endsection