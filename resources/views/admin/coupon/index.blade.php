@extends('layouts.dashboard')

@section('title') Add-Coupon @endsection

@section('Add-Coupon') active @endsection



@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add-Coupon</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
           <div class="card">
               <div class="card-body">List Coupon</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-25p">Name</th>
                            <th class="wd-25p">Discount</th>
                            <th class="wd-25p">Validity</th>
                            <th class="wd-25p">status</th>
                            <th class="wd-25p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($coupons as $item)
                          <tr>
                             <td>{{ $item->coupon_name }}</td>
                             <td>{{ Str::limit($item->coupon_discount,10) }}%</td>
                             <td>
                                  @if ($item-> coupon_validity >= \carbon\carbon::now()->format('Y-m-d'))
                                    <span class="badge badge-success">{{ \carbon\carbon::parse($item-> coupon_validity)->diffInDays(\carbon\carbon::now()->format('Y-m-d')) }} Days Laft</span>
                                    @else
                                    <span class="badge badge-danger">Expired {{ \carbon\carbon::parse($item-> coupon_validity)->diffInDays(\carbon\carbon::now()->format('Y-m-d')) }} Days Ago</span>
                                    @endif
                             </td>
                            <td>
                              @if ($item->status == 1)
                               <span class="badge badge-pill badge-success">Active</span>
                               @else
                                 <span class="badge badge-pill badge-danger">Deactive</span>
                              @endif
                          </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('coupon.edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                              
                              
                                  <form  action="{{ route('coupon.destroy',$item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                  <button  class="btn btn-sm btn-danger" style="cursor: pointer;"   title="delete data"><i class="fa fa-trash"></i></button>
                                </form>
                           
                                @if ($item->status == 1)
                                 <a href="{{ url('admin/couponinactive') }}/{{ $item->id }}"  type="button" class="btn btn-danger btn-sm" title="Inactive"><i class="fa fa-arrow-down"></i></a>
                                 @else  
                                  <a href="{{ url('admin/couponactive') }}/{{ $item->id }}"  type="button" class="btn btn-info btn-sm" title="Active"><i class="fa fa-arrow-up"></i></a>
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
                    Add Coupon
                </div> 
                <div class="card-body">
                    <form action="{{ route('coupon.store') }}" method="POST">
                        @csrf
                     
                         <div class="form-group">
                            <label>Coupon Name</label>
                            <input type="text" name="coupon_name" class="form-control" placeholder="Coupon Name">
                            @error('coupon_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>  
                          <div class="form-group">
                            <label>Coupon Discount(%)</label>
                            <input type="text" name="coupon_discount" class="form-control" placeholder="Coupon Discount" min="1" max="99">
                            @error('coupon_discount')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>
                        
                            <div class="form-group">
                            <label>Coupon Validity</label>
                            <input type="date" name="coupon_validity" class="form-control" placeholder="Coupon Validity" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                            @error('coupon_validity')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                        
                        <button style="background-color: #5B93D3; border-color: #5B93D3; cursor: pointer;" type="submit" class="btn btn-success">Add Coupon</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection