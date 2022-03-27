@extends('layouts.dashboard')

@section('title') Add-Sub-Sub-Category @endsection

@section('Categories') active show-sub @endsection

@section('Add-Sub-Sub-Category') active @endsection



@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('subcategory.index') }}">Sub-Category</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add-Sub-Sub-Category</li>
    </ol>
  </nav>
@endsection

@section('content')

<div class="container">
    <div class="row">
          <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    Add subsubcategory
                </div> 
                <div class="card-body">
                    <form action="{{ route('subsubcategory.update',$edit_data->id) }}" method="POST">
                          @csrf
                        @method('put')
                         <div class="form-group">
                            <label>Category Name</label>
                            <select name="category_id" class="form-control">
                              <option value="#">-Select One-</option>
                              @foreach ($categories as $category)
                                 <option value="{{ $category->id }}" {{   ($category->id == $edit_data->category_id) ? 'selected' : '' }} >{{ $category->category_name }}</option>
                              @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>  
                           <div class="form-group">
                            <label>Sub Category Name</label>
                            <select name="subcategory_id" class="form-control">
                              <option value="#">-Select One-</option>
                            </select>
                            @error('subcategory_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>   
                           <div class="form-group">
                            <label>subsubcategory Name</label>
                            <input type="text" name="sub_sub_category_name" class="form-control" value="{{ $edit_data->sub_sub_category_name }}">
                            @error('sub_sub_category_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Update SubSubCategory</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
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

    </script>



@endsection