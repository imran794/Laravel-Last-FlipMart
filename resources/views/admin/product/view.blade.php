@extends('layouts.dashboard')

@section('title') View-Products @endsection

@section('Manage Products') active show-sub @endsection

@section('All Peoducts') active @endsection



@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">View Product</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="sl-pagebody">
    <div class="sl-page-title">
        <div class="card pd-20 pd-sm-40">
            <h3 class="card-body-title"> view Product</h3>
            <div class="form-layout">
              
                    <input type="hidden" name="id" value="{{ $edit_data->id }}" >
                  
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Brand Name: <span class="tx-danger">*</span></label>

                                <select class="form-control select2" placeholder="Brand Name" name="brand_id">
                                    <option label="Choose Category"></option>
                                   @foreach ($brands as $brand)    
                                <option value="{{ $brand->id }}" {{ $brand->id == $edit_data->brand_id ? 'selected': '' }}>{{ $brand->brand_name }}</option>
                                @endforeach
                                </select>
                                @error('brand_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">category Name: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" placeholder="Category Name" name="category_id">
                                    <option label="Choose Category"></option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $edit_data->category_id ? 'selected': '' }}>{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Sub Category Name: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" placeholder="Category Name" name="subcategory_id">
                                    <option label="Choose SubCategory"></option>
                           

                                </select>
                                @error('subcategory_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Sub Sub Category Name: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" placeholder="Sub Sub Category Name" name="subsubcategory_id">
                                    <option label="Choose Sub Sub Category"></option>
                          

                                </select>
                                @error('subsubcategory_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_name" value="{{ $edit_data->product_name }}">
                                @error('product_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Price: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="price" value="{{ $edit_data->selling_price }}">
                                @error('price')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Discount Price: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="discount_price"  value="{{ $edit_data->discount_price }}">
                                @error('discount_price')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_code"  value="{{ $edit_data->product_code }}">
                                @error('product_code')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product QTY: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_qty"  value="{{ $edit_data->product_qty }}">
                                @error('product_qty')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Tag: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" disabled name="product_tag"  value="{{ $edit_data->product_tags }}" data-role="tagsinput">
                                @error('product_tag')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" disabled name="product_size" value="{{ $edit_data->product_size }}" data-role="tagsinput">
                                @error('product_size')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                         <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="product_color" value="{{ $edit_data->product_color }}" placeholder="Enter Product Color" data-role="tagsinput">
                        @error('product_color')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>
                     
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Short Description: <span class="tx-danger">*</span></label>
                                <textarea name="short_des" id="summernote">{{ $edit_data->short_des }}</textarea>
                                @error('short_des')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Long Description: <span class="tx-danger">*</span></label>
                                <textarea name="long_des" id="summernote2">{{ $edit_data->long_des }}</textarea>
                                @error('long_des')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="ckbox">
                                <input type="checkbox" name="hot_deals" value="1" {{ $edit_data->hot_deals == 1 ? 'checked': '' }}><span>Hot Deals</span>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label class="ckbox">
                                <input type="checkbox" name="featured" value="1" {{ $edit_data->featured == 1 ? 'checked': '' }}><span>Featured</span>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label class="ckbox">
                                <input type="checkbox" name="special_offer" value="1" {{ $edit_data->special_offer == 1 ? 'checked': '' }}><span>special_offer</span>
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label class="ckbox">
                                <input type="checkbox" name="special_deals" value="1" {{ $edit_data->special_deals == 1 ? 'checked': '' }}><span>special_deals</span>
                            </label>
                        </div>

                    </div><!-- row -->
                    <div class="form-layout-footer">
                   
                </form>
            </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
    </div><!-- card -->
</div>
</div><!-- d-flex -->

    
  <form action="{{ route('thumpnil.image.update') }}" method="POST" enctype="multipart/form-data">
     @csrf
      <input type="hidden" name="old_image" value="{{ $edit_data->product_thambnail }}">
      <input type="hidden" name="id" value="{{ $edit_data->id }}">
    <div class="row row-sm" style="margin-top: 50px;">
      <div class="col-md-4">
        <div class="card">
          <img width="80" class="card-img-top"  src="{{ asset($edit_data->product_thambnail) }}" alt="product_thambnail">
          <div class="card-body">
            <p class="card-text">
              <div class="form-group">
              </div>
            </p>
          </div>
        </div>
      </div>
      </div>
 
    </form>


    
       <form action="{{ route('update.multiple.image') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <br>
            <br>
            <h4>Product Multiple Image</h4>
            <div class="row row-sm" style="margin-top:10px;">

              @foreach ($multiple_images as $img)
                  <div class="col-md-3">
                    <div class="card m-auto" >
                      <img width="80" class="card-img-top" src="{{ asset($img->mulitple_images) }}" alt="mulitple_images">
                      <div class="card-body">
                        <h5 class="card-title">
                          <a href="{{ url('admin/product/multi/delete/'.$img->id) }}" class="btn btn-sm btn-danger" id="delete" title="delete data"><i class="fa fa-trash"></i></a>
                        </h5>
                        <p class="card-text">
                        
                        </p>
                      </div>
                    </div>
                  </div>
                    @endforeach
            </div>

            <div class="form-layout-footer pt-3">
          
          </form>



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
