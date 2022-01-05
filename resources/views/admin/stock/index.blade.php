@extends('layouts.dashboard')

@section('title') Stock Management @endsection

@section('Stock Management') active @endsection




@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Stock Management</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
           <div class="card">
               <div class="card-body">List Division</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-20p">Image</th>
                            <th class="wd-20p">Product Name</th>
                            <th class="wd-20p">Product Price</th>
                            <th class="wd-15p">Product Stock</th>
                            <th class="wd-5p">Status</th>
                            <th class="wd-15p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($products as $item)
                          <tr>
                             <td>
                                 <img width="100" src="{{ asset($item->product_thambnail) }}" alt="">
                             </td>
                             <td>{{ $item->product_name }}</td>
                             <td>{{ $item->selling_price }}TK</td>
                             <td>{{ $item->product_qty }}</td>
                             <td>
                          @if ($item->status == 1)
                              <span class="badge badge-pill badge-success">Active</span>
                            @else
                            <span class="badge badge-pill badge-danger">Inactive</span>
                          @endif
                        </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ url('admin/stock/edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>

                                <a href="{{ url('admin/stock/delete',$item->id) }}" class="btn btn-danger btn-sm" title="delete"><i class="fa fa-trash"></i></a>
                            
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
        
    </div>
</div>



@endsection