@extends('layouts.frontend')

@section('title')
Review
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
                <li class='active'>Review</li>
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
                <img class="card-img-top" style="border-radius: 50%;" src="{{ asset(Auth::user()->image) }}" height="100%;" width="100%;" alt="Card image cap">
                <ul class="list-group list-group-flush">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-sm btn-block ">Home</a>
                    <a href="{{ route('image') }}" class="btn btn-primary btn-sm btn-block">Update Image</a>

                    <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>

                    <a href="{{ route('my-order') }}" class="btn btn-primary btn-sm btn-block">My Order</a>
                    <a href="{{ route('my-order') }}" class="btn btn-primary btn-sm btn-block">Return Order</a>
                    <a href="{{ route('my-order') }}" class="btn btn-primary btn-sm btn-block">Cancel Order</a>

                    <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"> Log Out</a>
                </ul>
            </div>
        </div>
        <div class="col-md-8 mt-2">
            <div class="product-add-review">
                <h4 class="title">Write your own review</h4>
                <div class="review-table">
                    <form role="form" class="cnt-form" action="{{ route('reviwe.strore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $id }}">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cell-label">&nbsp;</th>
                                        <th>1 star</th>
                                        <th>2 stars</th>
                                        <th>3 stars</th>
                                        <th>4 stars</th>
                                        <th>5 stars</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="cell-label">Rating</td>
                                        <td><input type="radio" name="rating" class="radio" value="1"></td>
                                        <td><input type="radio" name="rating" class="radio" value="2"></td>
                                        <td><input type="radio" name="rating" class="radio" value="3"></td>
                                        <td><input type="radio" name="rating" class="radio" value="4"></td>
                                        <td><input type="radio" name="rating" class="radio" value="5"></td>
                                    </tr>

                                </tbody>
                            </table><!-- /.table .table-bordered -->
                        </div><!-- /.table-responsive -->
                </div><!-- /.review-table -->

                <div class="review-form">
                    <div class="form-container">


                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                    <textarea name="comment" class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                </div><!-- /.form-group -->
                            </div>
                        </div><!-- /.row -->

                        <div class="action text-right">
                            <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                        </div><!-- /.action -->

                        </form><!-- /.cnt-form -->

                    </div><!-- /.form-container -->
                </div><!-- /.review-form -->


            </div><!-- /.product-add-review -->
        </div>
    </div>
</div>


@endsection
