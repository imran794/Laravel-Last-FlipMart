@extends('layouts.dashboard')

@section('title') Add-Faq @endsection

@section('Add-Faq') active @endsection



@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add Faq</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
           <div class="card">
               <div class="card-body">List Faq</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-25p">Question</th>
                            <th class="wd-25p">Answer</th>
                            <th class="wd-25p">status</th>
                            <th class="wd-25p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($faqs as $item)
                          <tr>
                             <td>{{ Str::limit($item->faq_qu,10) }}</td>
                             <td>{{ Str::limit($item->faq_ans,10) }}</td>
                            <td>
                              @if ($item->status == 1)
                               <span class="badge badge-pill badge-success">Active</span>
                               @else
                                 <span class="badge badge-pill badge-danger">Deactive</span>
                              @endif
                          </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('faq.edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                              
                              
                                  <form  action="{{ route('faq.destroy',$item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                  <button  class="btn btn-sm btn-danger" style="cursor: pointer;"   title="delete data"><i class="fa fa-trash"></i></button>
                                </form>
                           
                                @if ($item->status == 1)
                                 <a href="{{ url('admin/faqinactive') }}/{{ $item->id }}"  type="button" class="btn btn-danger btn-sm" title="Inactive"><i class="fa fa-arrow-down"></i></a>
                                 @else  
                                  <a href="{{ url('admin/faqactive') }}/{{ $item->id }}"  type="button" class="btn btn-info btn-sm" title="Active"><i class="fa fa-arrow-up"></i></a>
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
                    Add faq
                </div> 
                <div class="card-body">
                    <form action="{{ route('faq.store') }}" method="POST">
                        @csrf
                          
                             <div class="form-group">
                            <label>Faq Questions</label>
                            <textarea rows="4" name="faq_qu" class="form-control" placeholder="faq Description"></textarea>
                            @error('faq_qu')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>  
                            <div class="form-group">
                            <label>Faq Answer</label>
                            <textarea rows="12" name="faq_ans" class="form-control" placeholder="faq Answer"></textarea>
                            @error('faq_ans')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                            
                        <button style="background-color: #5B93D3; border-color: #5B93D3; cursor: pointer;" type="submit" class="btn btn-success">Add Faq</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection