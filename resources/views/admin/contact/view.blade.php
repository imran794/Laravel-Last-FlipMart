@extends('layouts.dashboard')

@section('title') View Message @endsection

@section('See-User-Message') active @endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('contact.index') }}">See-User-Message</a></li>
      <li class="breadcrumb-item active" aria-current="page">View-Message </li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    View-Message
                </div> 
                <div class="card-body">
                   
                            <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $edit_data->name }}">
                          </div>     
                           <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $edit_data->email }}">
                   
                          </div>    
                            <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $edit_data->title }}">
                        
                          </div>   
                           <div class="form-group">
                            <label>Comment</label>
                            <textarea rows="8" class="form-control">{{ $edit_data->comment }}</textarea>
                          </div>
                          
          
                </div>
            </div>
        </div>
    </div>
</div>



@endsection