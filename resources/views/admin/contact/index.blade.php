@extends('layouts.dashboard')

@section('title') See-User-Message @endsection

@section('See-User-Message') active @endsection



@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add-Blog</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
           <div class="card">
               <div class="card-body">List Blog</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-25p">Name</th>
                            <th class="wd-25p">Email</th>
                            <th class="wd-25p">Title</th>
                            <th class="wd-25p">comment</th>
                            <th class="wd-25p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($contacts as $item)
                          <tr>
                             
                             <td>{{ $item->name }}</td>
                             <td>{{ $item->email }}</td>
                             <td>{{ Str::limit($item->title,10) }}</td>
                             <td>{{ Str::limit($item->comment,10) }}</td>
                        
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="{{ route('contact.show',$item->id) }}" class="btn btn-success btn-sm" title="View"><i class="fa fa-eye"></i></a>  
                              <a href="{{ route('contact.delete',$item->id) }}" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a>
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
        
    </div>
</div>



@endsection