@extends('layouts.dashboard')

@section('title') All-Products @endsection

@section('Manage Products') active show-sub @endsection

@section('All Peoducts') active @endsection



@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">All  Peoducts</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
           <div class="card">
               <div class="card-body">List-Products</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-15p">Image</th>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Category</th>
                            <th class="wd-15p">Subcategory</th>
                            <th class="wd-15p">Subsubategory</th>
                            <th class="wd-15p">S.Price</th>
                            <th class="wd-15p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($products as $item)
                          <tr>
                             <td>
                               <img width="100" src="{{ asset($item->product_thambnail) }}" alt="product_thambnail">
                             </td>
                             <td>{{ $item->product_name }}</td>
                             <td>{{ $item->category_id }}</td>
                             <td>{{ $item->subcategory_id }}</td>
                            <td>{{ $item->subsubcategory_id }}</td>
                            <td>
                              @if ($item->status == 1)
                               <span class="badge badge-pill badge-success">Active</span>
                               @else
                                 <span class="badge badge-pill badge-danger">Deactive</span>
                              @endif
                          </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('product.edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>  
                                 <a href="{{ route('product.show',$item->id) }}" class="btn btn-success btn-sm" title="Show"><i class="fa fa-eye"></i></a>
                              
                              
                                  <form action="{{ route('product.destroy',$item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                  <button class="btn btn-sm btn-danger" style="cursor: pointer;"  title="delete data"><i class="fa fa-trash"></i></button>
                                </form>
                           
                                @if ($item->status == 1)
                                 <a href="{{ url('admin/categoryinactive') }}/{{ $item->id }}"  type="button" class="btn btn-danger btn-sm" title="Inactive"><i class="fa fa-arrow-down"></i></a>
                                 @else  
                                  <a href="{{ url('admin/categoryactive') }}/{{ $item->id }}"  type="button" class="btn btn-info btn-sm" title="Active"><i class="fa fa-arrow-up"></i></a>
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
    </div>
</div>



@endsection