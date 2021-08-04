@extends('layouts.dashboard')

@section('title') Add-Banner @endsection

@section('Add-Banner') active @endsection



@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add-Banner</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
           <div class="card">
               <div class="card-body">List Banner</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-25p">Image</th>
                            <th class="wd-25p">SubTitle</th>
                            <th class="wd-25p">Title</th>
                            <th class="wd-25p">status</th>
                            <th class="wd-25p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($banners as $item)
                          <tr>
                             <td>
                                 <img width="100" src="{{ asset($item->image) }}" alt="image">
                             </td>
                             <td>{{ $item->sub_title }}</td>
                             <td>{{ Str::limit($item->title,10) }}</td>
                            <td>
                              @if ($item->status == 1)
                               <span class="badge badge-pill badge-success">Active</span>
                               @else
                                 <span class="badge badge-pill badge-danger">Deactive</span>
                              @endif
                          </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('banner.edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                              
                              
                                  <form  action="{{ route('banner.destroy',$item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                  <button  class="btn btn-sm btn-danger" style="cursor: pointer;"   title="delete data"><i class="fa fa-trash"></i></button>
                                </form>
                           
                                @if ($item->status == 1)
                                 <a href="{{ url('admin/baninactive') }}/{{ $item->id }}"  type="button" class="btn btn-danger btn-sm" title="Inactive"><i class="fa fa-arrow-down"></i></a>
                                 @else  
                                  <a href="{{ url('admin/banactive') }}/{{ $item->id }}"  type="button" class="btn btn-info btn-sm" title="Active"><i class="fa fa-arrow-up"></i></a>
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
                    Add Brand
                </div> 
                <div class="card-body">
                    <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                          <div class="form-group">
                            <label>Banner Image</label>
                            <input type="file" name="image" class="form-control dropify" placeholder=" Banner Image">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                     
                         <div class="form-group">
                            <label>Banner Sub Title</label>
                            <input type="text" name="sub_title" class="form-control" placeholder="Banner Sub Title">
                            @error('sub_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>  
                          <div class="form-group">
                            <label>Banner Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Banner Title">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                             <div class="form-group">
                            <label>Banner Description</label>
                            <textarea rows="4" name="des" class="form-control" placeholder="Banner Description"></textarea>
                            @error('des')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                            <div class="form-group">
                                <label>Banner Btn</label>
                                <input type="text" name="btn" class="form-control" placeholder="Banner Btn">
                                @error('btn')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                              </div>
                        <button style="background-color: #5B93D3; border-color: #5B93D3; cursor: pointer;" type="submit" class="btn btn-success">Add Banner</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection