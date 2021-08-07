@extends('layouts.dashboard')

@section('title') Update Faq @endsection

@section('Add-faq') active @endsection

@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('faq.index') }}">Add Faq</a></li>
      <li class="breadcrumb-item active" aria-current="page">Update Faq</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    Update Faq
                </div> 
                <div class="card-body">
                   <form action="{{ route('faq.update',$edit_data->id) }}" method="POST">
                        @csrf
                        @method('put')
                            <div class="form-group">
                            <label>Faq Questions</label>
                            <textarea rows="4" name="faq_qu" class="form-control">{{ $edit_data->faq_qu }}</textarea>
                            @error('faq_qu')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>  
                            <div class="form-group">
                            <label>Faq Answer</label>
                            <textarea rows="12" name="faq_ans" class="form-control">{{ $edit_data->faq_ans }}</textarea>
                            @error('faq_ans')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                          
                        <button type="submit" class="btn btn-success" style="background-color: #5B93D3; border-color: #5B93D3; cursor: pointer">Update Faq</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection