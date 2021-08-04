@extends('layouts.dashboard')

@section('title') Add Products @endsection

@section('Manage Products') active show-sub @endsection

@section('Add Products') active @endsection



@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add-Product</li>
    </ol>
  </nav>
@endsection

@section('content')

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
              <h6 class="card-body-title">Add product</h6>
              <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row row-sm">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Select Brand: <span class="tx-danger">*</span></label>
                            <select class="form-control select2-show-search" data-placeholder="Select One" name="brand_id">
                              <option label="Choose one"></option>
                              @foreach ($brands as $brand)
                              <option value="{{ $brand->id }}">{{ ucwords($brand->brand_name) }}</option>
                              @endforeach
                            </select>
                            @error('brand_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Select Category: <span class="tx-danger">*</span></label>
                            <select class="form-control select2-show-search" data-placeholder="Select One" name="category_id">
                              <option label="Choose one"></option>
                              @foreach ($categories as $cat)
                              <option value="{{ $cat->id }}">{{ ucwords($cat->category_name) }}</option>
                              @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Select Sub-Category: <span class="tx-danger">*</span></label>
                            <select class="form-control select2-show-search" data-placeholder="Select One" name="subcategory_id">
                              <option label="Choose one"></option>
                            </select>
                            @error('subcategory_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">Select Sub-SubCategory: <span class="tx-danger">*</span></label>
                            <select class="form-control select2-show-search" data-placeholder="Select One" name="subsubcategory_id">
                            </select>
                            @error('subsubcategory_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                    </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_name" value="{{ old('product_name') }}" placeholder="Enter Product Name">
                        @error('product_name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_code" value="{{ old('product_code') }}" placeholder="Enter Product Code">
                        @error('product_code')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_qty" value="{{ old('product_qty') }}" placeholder="Enter Product Quantity">
                        @error('product_qty')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Tags: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_tags" value="{{ old('product_tags') }}" placeholder="Product Tags" data-role="tagsinput">
                        @error('product_tags')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_size" value="{{ old('product_size') }}" placeholder="Product Size" data-role="tagsinput">
                        @error('product_size')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_color" value="{{ old('product_color') }}" placeholder="Enter Product Color" data-role="tagsinput">
                        @error('product_color')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="selling_price" value="{{ old('selling_price') }}" placeholder="Selling Price">
                        @error('selling_price')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Discount Price: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="discount_price" value="{{ old('discount_price') }}" placeholder="Discount Price">
                        @error('discount_price')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Main Thambnail: <span class="tx-danger">*</span></label>
                        <input class="form-control dropify" type="file" name="product_thambnail" value="{{ old('product_thambnail') }}">
                        @error('product_thambnail')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
              </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Multiple Image: <span class="tx-danger">*</span></label>
                        <input class="form-control dropify" type="file" name="mulitple_images[]" value="{{ old('mulitple_images') }}" multiple>
                        @error('mulitple_images')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Short Description: <span class="tx-danger">*</span></label>
                        <textarea name="short_des" id="summernote2">{{ old('short_des') }}</textarea>
                        @error('short_des')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>
                      <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Long Description: <span class="tx-danger">*</span></label>
                        <textarea name="long_des" id="summernote">{{ old('long_des') }}</textarea>
                        @error('long_des')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>

                 
                  <div class="col-md-4">
                  <label class="ckbox">
                    <input type="checkbox" name="hot_deals" value="1"><span>Hot Deals</span>
                  </label>
                  </div>

                  <div class="col-md-4">
                    <label class="ckbox">
                      <input type="checkbox" name="featured" value="1"><span>Featured</span>
                    </label>
                    </div>

                    <div class="col-md-4">
                        <label class="ckbox">
                          <input type="checkbox" name="special_offer" value="1"><span>Special Offer</span>
                        </label>
                    </div>

                    <div class="col-md-4">
                        <label class="ckbox">
                          <input type="checkbox" name="special_deals" value="1"><span>Special Deals</span>
                        </label>
                    </div>

                  <div class="form-layout-footer mt-3">
                  <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Add Products</button>
                </div><!-- form-layout-footer -->
            </form>
            </div>
            </div><!-- row -->


    </div>

    <script src="{{asset('backend')}}/lib/jquery-2.2.4.min.js"></script>

     <script type="text/javascript">
         $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });


      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/admin/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){

                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.sub_category_name + '</option>');

                          });

                    },

                });
            } else {
                alert('danger');
            }

        });

    }

    );


         $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/admin/sub/subcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subsubcategory_id"]').empty();
                          $.each(data, function(key, value){

                              $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.sub_sub_category_name + '</option>');

                          });

                    },

                });
            } else {
                alert('danger');
            }

        });


    </script>


     



    @endsection
