@extends('layouts.dashboard')

@section('title') Add-Sub-Category @endsection

@section('Categories') active show-sub @endsection

@section('Add-Sub-Category') active @endsection



@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add-sub-Category</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
           <div class="card">
               <div class="card-body">List-subcategory</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                          
                            <th class="wd-15p">Category</th>
                              <th class="wd-15p">Subcategory</th>
                            <th class="wd-15p">status</th>
                            <th class="wd-15p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($subcategories as $item)
                          <tr>
                            <td>{{ $item->category->category_name }}</td>
                             <td>{{ $item->sub_category_name }}</td>
                            
                            <td>
                              @if ($item->status == 1)
                               <span class="badge badge-pill badge-success">Active</span>
                               @else
                                 <span class="badge badge-pill badge-danger">Deactive</span>
                              @endif
                          </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('subcategory.edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                              
                              
                                  <form action="{{ route('subcategory.destroy',$item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                  <button class="btn btn-sm btn-danger" style="cursor: pointer;"  title="delete data"><i class="fa fa-trash"></i></button>
                                </form>
                           
                                @if ($item->status == 1)
                                 <a href="{{ url('admin/subinactive') }}/{{ $item->id }}"  type="button" class="btn btn-danger btn-sm" title="Inactive"><i class="fa fa-arrow-down"></i></a>
                                 @else  
                                  <a href="{{ url('admin/subactive') }}/{{ $item->id }}"  type="button" class="btn btn-info btn-sm" title="Active"><i class="fa fa-arrow-up"></i></a>
                                   @endif 
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
                    Add Subcategory
                </div> 
                <div class="card-body">
                    <form action="{{ route('subcategory.store') }}" method="POST">
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
                            <label>Subcategory Name</label>
                            <input type="text" name="sub_category_name" class="form-control" placeholder="SubCategory Name">
                            @error('sub_category_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                          
                        <button type="submit" class="btn btn-success" style="cursor: pointer">Add Subcategory</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection