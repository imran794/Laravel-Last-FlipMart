@extends('layouts.frontend')

@section('title')
404 Page
@endsection

@section('content')


<!-- ============================== breadcrumb : start =================================== -->
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>

                <li><a href="#">404 Page</a></li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<!-- ============================== breadcrumb : end =================================== -->


   <div class="body-content">
        <div class="container">
            <div class="row">
               <h3>404 Not Found</h3>
            </div>
        </div>
    </div>



@endsection