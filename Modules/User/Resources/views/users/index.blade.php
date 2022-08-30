@extends('dashbord.app')
@section('content')
    <div class="container-fluid">
        <h2 class="fw-bold text-black h4 mb-3">Users</h2>
        <div class="d-flex justify-content-between mb-2">
            <div class="col-left">
                <div class="title-actions">
                    <a href="{{route('users.create')}}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Add new user</a>
                </div>
            </div>
            <div class="col-left">
                <form action="{{route('users.index')}}" method="GET" class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                    <input type="text" value="{{Request()->name}}" name="name_search" placeholder="{{__('Search by name')}}" class="form-control" required />
                    <button type="submit"  class="btn btn-info btn-sm ml-3 w-75"><i class="fas fa-search"></i>  {{__('Search')}}</button>
                </form>
            </div>
        </div>
        <div class="card p-1">
            <div class="card-body">
                    <table class="table table-responsive-lg">
                        <thead>
                            <tr class="bg-light">
                                <th>N°</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>E-mail</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Orders</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $p=1;
                            @endphp
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$p++}}</td>
                                    <td class="title">
                                        <a href="{{route('users.edit',['user'=>$user->id])}}">{{$user->name}}</a>
                                    </td>
                                    <td>{{$user->last_name}}</td>
                                    <td width="200px">{{$user->email}}</td>
                                    <td>
                                        @if($user->status =='blocked')
                                                <span class="badge badge-danger" > {{__('blocked')}}</span>
                                        @elseif($user->status =='publish')
                                                <span class="badge badge-success" >{{__('publish')}}</span>
                                        @endif
                                    </td>
                                    <td width="100px">
                                        @foreach ($user->roles as $role )
                                            @if($role->name =='admin')
                                                <span class="badge badge-warning" >{{$role->name}}</span>
                                            @else
                                                <span class="badge badge-secondary" >{{$role->name}}</span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @php
                                        $n=0;
                                        @endphp
                                        @foreach ($user->commands as $command )
                                            @php
                                            $n++;
                                            @endphp
                                        @endforeach
                                        {{$n}}
                                    </td>
                                    <td width="200px">
                                        <a href="{{route('users.edit',['user'=>$user->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>   </a>
                                        <button  data-toggle="modal" data-target="#delete_users_modal" data-id='{{$user->id}}'  type="submit" class="btn btn-danger btn-sm delete_users_panel"><i class="fa fa-trash-alt"></i> </button>
                                        <a class="btn btn-secondary btn-sm changePassword2" data-toggle="modal" data-target="#modal_password_users" data-id='{{$user->id}}'><i class="fa fa-lock"></i> {{__('Password')}}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
            </div>
        </div>
    </div>
    @include('user::users.panel_delete')
    @include('user::users.modal_password')
@endsection
