@extends('dashbord.app')
@section('content')


            <div class="container">
                <div class="d-flex justify-content-between mb20">
                    <div class="">
                        <h4 class="fw-bold text-black">Permission Matrix</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('roles.give_rolePermission')}}" method="post">
                                @csrf
                                <table class="table table-responsive-lg">
                                    <thead>
                                    <tr class="bg-light">
                                        <td><strong> </strong></td>
                                        <td><strong>Permissions</strong></td>
                                        <td><strong>Description</strong></td>
                                        @foreach ($roles as $role)
                                            <td><strong>{{ucfirst($role->name)}}</strong></td>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $n=1;
                                        @endphp
                                        @foreach ($permissions_group as $key => $permissions)
                                            <tr class="table-secondary">
                                                <td>
                                                    <strong>{{ucfirst($key)}}</strong>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                @foreach ($roles as $role)
                                                <td></td>
                                                @endforeach
                                            </tr>
                                            @foreach ($permissions as $permission)
                                                <tr>
                                                    <td  width="80px">{{$n++}}</td>
                                                    <td  width="100px">{{$permission->name}}</td>
                                                    <td width="300px"><input type="text" style="background-color: #FFEBCD;" value="{{$permission->description}}" placeholder="description" name="Description[1]" class="form-control"></td>
                                                    @foreach ($roles as $role)
                                                        <td  width="100px">
                                                            <input type="checkbox"
                                                            @foreach ($role->permissions as $perm)
                                                                @if ($perm->id == $permission->id)
                                                                checked
                                                                @endif
                                                            @endforeach
                                                            name="matrix[{{$role->id}}][]" value="{{$permission->id}}">
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <span>&nbsp;</span>
                                    <button class="btn btn-primary btn-sm" type="submit"> <i class="fa fa-save"></i> Save Change</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
