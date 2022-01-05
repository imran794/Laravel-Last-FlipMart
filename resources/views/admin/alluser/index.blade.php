@extends('layouts.dashboard')

@section('title') User List @endsection



@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">User List</li>
    </ol>
</nav>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @php
                $online_user = 0;
                @endphp

                @foreach ($users as $user)
                    @php
                   if ($user->userIsOnline()) {
                      $online_user =  $online_user + 1;
                   }
                    @endphp
                @endforeach


                <div class="card-body">Total User {{ count($users) }} And Active User  <span class="badge badge-pill badge-success">{{ $online_user }} </span></div>
                <div class="card-header">
                    <div class="card pd-20 pd-sm-40">
                        <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-10p">Image</th>
                                        <th class="wd-10p">Name</th>
                                        <th class="wd-10p">Email</th>
                                        <th class="wd-10p">Phone</th>
                                        <th class="wd-10p">Online/Offline</th>
                                        <th class="wd-10p">Account</th>
                                        <th class="wd-10p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                    <tr>
                                        <td>
                                            <img style="border-radius: 50%;" width="50" src="{{ asset($item->image) }}" alt="">
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>
                                         @if ($item->userIsOnline())
                                    <span class="badge badge-pill badge-success">Active Now</span>
                                        @else
                                             <span class="badge badge-pill badge-danger">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>
                                          @endif
                                        </td>
                                        <td>
                                            @if ($item->isban == 0)
                                             <span class="badge badge-pill badge-primary">Unbanned</span>
                                            @else
                                              <span class="badge badge-pill badge-danger">Banned</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->isban == 0)
                                                 <a href="{{ url('admin/user/banned/'.$item->id) }}" class="btn btn-sm btn-danger" title="view data"> <i class="fa fa-arrow-down"></i> Banned</a>
                                            </div>
                                            @else
                                              <a href="{{ url('admin/user/unbanned/'.$item->id) }}" class="btn btn-sm btn-primary" title="view data"> <i class="fa fa-arrow-up"></i> Unbanned</a>
                                                
                                            @endif
                                           
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
