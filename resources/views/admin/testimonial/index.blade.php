@extends('layouts.dashboard')

@section('title') Add-Testimonial @endsection

@section('Add-Testimonial') active @endsection



@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add Testimonial</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
           <div class="card">
               <div class="card-body">List Testimonial</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-25p">Image</th>
                            <th class="wd-25p">Title</th>
                            <th class="wd-25p">Sub Title</th>
                            <th class="wd-25p">status</th>
                            <th class="wd-25p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($testimonials as $item)
                          <tr>
                             <td>
                                 <img width="50" src="{{ asset($item->image) }}" alt="testimonial_image">
                             </td>
                             <td>{{ Str::limit($item->title,10) }}</td>
                             <td>{{ Str::limit($item->sub_title,10) }}</td>
                            <td>
                              @if ($item->status == 1)
                               <span class="badge badge-pill badge-success">Active</span>
                               @else
                                 <span class="badge badge-pill badge-danger">Deactive</span>
                              @endif
                          </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('testimonial.edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                              
                              
                                  <form  action="{{ route('testimonial.destroy',$item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                  <button  class="btn btn-sm btn-danger" style="cursor: pointer;"   title="delete data"><i class="fa fa-trash"></i></button>
                                </form>
                           
                                @if ($item->status == 1)
                                 <a href="{{ url('admin/testinactive') }}/{{ $item->id }}"  type="button" class="btn btn-danger btn-sm" title="Inactive"><i class="fa fa-arrow-down"></i></a>
                                 @else  
                                  <a href="{{ url('admin/testactive') }}/{{ $item->id }}"  type="button" class="btn btn-info btn-sm" title="Active"><i class="fa fa-arrow-up"></i></a>
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
                    Add Testimonial
                </div> 
                <div class="card-body">
                    <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                          <div class="form-group">
                            <label>Testimonial Image</label>
                            <input type="file" name="image" class="form-control dropify" placeholder="Testimonial Image">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                     
                         <div class="form-group">
                            <label>Testimonial Description</label>
                            <textarea name="des" rows="4" class="form-control" placeholder="Testimonial Description"></textarea>
                            @error('des')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                             <div class="form-group">
                            <label>Testimonial Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Testimonial Title">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>   
                          <div class="form-group">
                            <label>Testimonial Sub Title</label>
                            <input type="text" name="sub_title" class="form-control" placeholder="Testimonial Sub Title">
                            @error('sub_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                        
                        <button style="background-color: #5B93D3; border-color: #5B93D3; cursor: pointer;" type="submit" class="btn btn-success">Add Testimonial</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection