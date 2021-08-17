@extends('layouts.dashboard')

@section('title') Update-State @endsection

@section('Shiping-Area') active show-sub @endsection

@section('Add-State') active @endsection




@section('breadcrumb')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('state.index') }}">Add State</a></li>
      <li class="breadcrumb-item active" aria-current="page">Update State</li>
    </ol>
  </nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
            <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    State Update
                </div> 
                <div class="card-body">
                    <form action="{{ route('state.update',$edit_data->id) }}" method="POST">
                        @csrf
                         <div class="form-group">
                            <label>Division Name</label>
                            <select name="division_id" class="form-control">
                            <option value="">Select One</option>
                                @foreach ($divisions as $division)
                                <option value="{{ $division->id }}" {{ $division->id == $edit_data-> division_id ? 'selected': ''  }}>{{ $division->division_name }}</option>
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
                            <input type="text" name="state_name" class="form-control" value="{{ $edit_data->state_name }}">
                            @error('state_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                          </div>  
                        
                        <button style="background-color: #5B93D3; border-color: #5B93D3; cursor: pointer;" type="submit" class="btn btn-success">Update State</button>
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