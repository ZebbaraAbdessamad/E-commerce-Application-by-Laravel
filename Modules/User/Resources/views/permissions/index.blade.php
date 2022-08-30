@extends('dashbord.app')
@section('content')
    <div class="container-fluid">
        <h2 class="fw-bold text-black h4 mb-3">Permissions</h2>
        <div class="d-flex justify-content-between mb-2">
            <div class="col-left">
                <div class="title-actions">
                    <a href="{{route('permissions.create')}}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Add new permission</a>
                </div>
            </div>
            <div class="col-left">
                <form action="{{route('permissions.index')}}" method="GET" class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
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
                            <th>Name</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                           $p=1;
                        @endphp
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{$p++}}</td>
                                <td class="title">
                                    <a href="{{route('permissions.edit',['permission'=>$permission->id])}}">{{$permission->name}}</a>
                                </td>
                                <td>{{$permission->created_at->toDateString()}}</td>
                                <td width="200px">
                                <a href="{{route('permissions.edit',['permission'=>$permission->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> edit  </a>
                                <button data-id='{{$permission->id}}'  data-toggle="modal" data-target="#log_permission"  type="submit" class="btn btn-danger btn-sm delete_permission"><i class="fa fa-trash-alt"></i> delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $permissions->links() }}
            </div>
        </div>
    </div>
    @include('user::permissions.panel_delete')
@endsection
