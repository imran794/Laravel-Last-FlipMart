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
        <div class="col-md-8">
           <div class="card">
               <div class="card-body">List-subsubcategory</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                          
                            <th class="wd-15p">Category</th>
                            <th class="wd-15p">SubCategory</th>
                            <th class="wd-15p">subsubcategory</th>
                            <th class="wd-15p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($subsubcategories as $item)
                          <tr>
                            <td>{{ $item->category->category_name }}</td>
                            <td>{{ $item->subsubcategory->sub_category_name }}</td>
                             <td>{{ $item->sub_sub_category_name }}</td>
                          
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('subsubcategory.edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                              
                              
                                  <form action="{{ route('subsubcategory.destroy',$item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                  <button class="btn btn-sm btn-danger" style="cursor: pointer;"  title="delete data"><i class="fa fa-trash"></i></button>
                                </form>
                          
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
               </div>
           </div>
        </div>
          <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Add subsubcategory
                </div> 
                <div class="card-body">
                    <form action="{{ route('subsubcategory.store') }}" method="POST">
                        @csrf
                         <div class="form-group">
                            <label>Category Name</label>
                            <select name="category_id" class="form-control">
                              <option value="#">-Select One-</option>
                              @foreach ($categories as $category)
                                 <option value="{{ $category->id }}">{{ $category->category_name }}</option>
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
                            <input type="text" name="sub_sub_category_name" class="form-control" placeholder="SubSubCategory Name">
                            @error('sub_sub_category_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Add SubSubCategory</button>
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