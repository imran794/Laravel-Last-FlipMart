@extends('layouts.frontend')

@section('title')
Wishlist
@endsection

@section('content')


<!-- ============================== breadcrumb : start =================================== -->
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>

                <li><a href="#">Wishlist</a></li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<!-- ============================== breadcrumb : end =================================== -->

<div class="body-content">
    <div class="container">
        <div class="my-wishlist-page">
            <div class="row">
                <div class="col-md-12 my-wishlist">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="4" class="heading-title">My Wishlist</th>
                                </tr>
                            </thead>
                            <tbody id="wishlist">


                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.row -->

        </div><!-- /.sigin-in-->
        @include('frontend/inc/brands')
    </div>
</div>



@endsection
