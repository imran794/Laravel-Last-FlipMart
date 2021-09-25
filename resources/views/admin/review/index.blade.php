@extends('layouts.dashboard')

@section('title') Review @endsection

@section('Review') active @endsection



@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Review</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
           <div class="card">
               <div class="card-body">List Faq</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                        <th class="wd-30p">Product Image</th>
                        <th class="wd-25p">Customer Name</th>
                        <th class="wd-25p">Comment</th>
                        <th class="wd-10p">Rating</th>
                        <th class="wd-25p">status</th>
                        <th class="wd-35p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($productreviews as $item)
                          <tr>
                            <td>
                                <img width="50" src="{{ asset($item->product->product_thambnail) }}" alt="">
                            </td>
                            <td>{{ $item->user->name }}</td>
                            <td>
                                <textarea name="">{{ $item->comment }}</textarea>
                            </td>
                            <td>{{ $item->rating }}


                            @for ($i =1 ; $i <= 5 ; $i++)
                            <span style="color: red; font-size:15px;" class="glyphicon glyphicon-star{{ ($i <= $item->rating) ? '' : '-empty' }}"></span>
                        @endfor</td>
                           <td>
                            <span class="badg badge-pill badge-success">{{ $item->status }}</span>
                        </td>
                        <td>
                             @if ($item->status == 'pending')
                              <a href="{{ url('admin/review/approve/'.$item->id) }}" class="btn btn-sm btn-primary">Approve Now</a>
                            @endif
                          <a href="{{ url('admin/review/delete/'.$item->id) }}" class="btn btn-sm btn-danger" id="delete" title="delete data"><i class="fa fa-trash"></i></a>
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