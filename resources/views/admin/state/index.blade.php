@extends('layouts.dashboard')

@section('title') Add-State @endsection

@section('Shiping-Area') active show-sub @endsection

@section('Add-State') active @endsection




@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add distinct</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
           <div class="card">
               <div class="card-body">List Distinct</div>
               <div class="card-header">
                <div class="card pd-20 pd-sm-40">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-25p">Division Name</th>
                            <th class="wd-25p">Distinct Name</th>
                            <th class="wd-25p">State Name</th>
                            <th class="wd-25p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($Steates as $item)
                          <tr>
                             <td>{{ $item->division->division_name }}</td>
                             <td>{{ $item->district->district_name }}</td>
                             <td>{{ $item->state_name }}</td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('state.edit',$item->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>

                                <a href="{{ route('state.destroy',$item->id) }}" class="btn btn-danger btn-sm" title="delete data"><i class="fa fa-trash"></i></a>
                    
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
                    Add distinct
                </div> 
                <div class="card-body">
                    <form action="{{ route('state.store') }}" method="POST">
                        @csrf
                         <div class="form-group">
                            <label>Division Name</label>
                            <select name="division_id" class="form-control">
                            <option value="">Select One</option>
                                @foreach ($divisions as $division)
                                <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                   @endforeach
                            </select>
                            @error('division_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div> 
                           <div class="form-group">
                            <label>District Name</label>
                            <select name="district_id" class="form-control">
                            <option value="">Select One</option>
                            </select>
                            @error('district_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>  
                           <div class="form-group">
                            <label>State Name</label>
                            <input type="text" name="state_name" class="form-control" placeholder="State Name">
                            @error('state_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>  
                        
                        <button style="background-color: #5B93D3; border-color: #5B93D3; cursor: pointer;" type="submit" class="btn btn-success">Add State</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="{{asset('backend')}}/lib/jquery-2.2.4.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="division_id"]').on('change', function(){
            var division_id = $(this).val();
            if(division_id) {
                $.ajax({
                    url: "{{  url('/admin/district-get/ajax') }}/"+division_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="district_id"]').empty();
                          $.each(data, function(key, value){

                              $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');

                          });

                    },

                });
            } else {
                alert('danger');
            }

        });

    });

    </script>


@endsection