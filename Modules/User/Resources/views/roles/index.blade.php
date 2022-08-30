@extends('dashbord.app')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-2">
            <h2 class="fw-bold text-black h4 mb-3">Roles:</h2>
            <div class="title-actions">
                <a href="{{route('roles.role_permission')}}" class="btn btn-info btn-sm"><i class=" fas fa-align-left"></i> Permission Matrix</a>
                <a href="{{route('roles.create')}}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Add new role</a>
            </div>
        </div>
        <div class="card p-1">
            <div class="card-body">
                <table class="table table-responsive-lg">
                    <thead>
                        <tr class="bg-light">
                            <th>N°</th>
                            <th>Name</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                           $p=1;
                        @endphp
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$p++}}</td>
                                <td class="title">
                                    <a href="{{route('roles.edit',['role'=>$role->id])}}">{{$role->name}}</a>
                                </td>
                                <td>{{$role->created_at->toDateString()}}</td>
                                <td width="200px">
                                <a href="{{route('roles.edit',['role'=>$role->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> edit  </a>
                                <button data-id='{{$role->id}}'  data-toggle="modal" data-target="#log_role"  type="submit" class="btn btn-danger btn-sm delete_Role"><i class="fa fa-trash-alt"></i> delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $roles->links() }}
            </div>
        </div>
    </div>
    @include('user::roles.panel_delete')
@endsection
