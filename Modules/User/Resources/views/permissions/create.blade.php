@extends('dashbord.app')
@section('content')
<div class="row">
    <form action="{{route('permissions.store')}}" method="POST">
        @csrf
        <div class="col-10 offset-1">
            <h2 class="fw-bold text-black h4 mb-3">{{!empty($permission->id) ? __('Edit: ').$permission->name : __("Add new Permission :")}}</h2>
            <div class="card border-left-primary">
                <div class="card-body"style="padding:20px;">
                    <h3 class="h6 fw-bolder">permission Content </h3>
                    <div class="form-group">
                        <input type="hidden" value="{{$permission->id}}"  name="permission_id">
                        <label>Name</label>
                        <input type="text" value="{{old('permission_name',$permission->name ?? '')}}"  name="permission_name" class="form-control @if($errors->get('permission_name')) is-invalid @endif">
                        @if($errors->get('permission_name'))
                            <div class="text-danger" >
                                <ul style="list-style-type: none;">
                                    @foreach($errors->get('permission_name') as $message)
                                    <li>{{$message}}</li>
                                    @endforeach
                                </ul>
                            </div>
                         @endif
                         <label>Description</label>
                        <input type="text" value="{{old('permission_description',$permission->description ?? '')}}"  name="permission_description" class="form-control @if($errors->get('permission_description')) is-invalid @endif">
                        @if($errors->get('permission_description'))
                            <div class="text-danger" >
                                <ul style="list-style-type: none;">
                                    @foreach($errors->get('permission_description') as $message)
                                    <li>{{$message}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <span>&nbsp;</span>
                <button class="btn btn-primary btn-sm" type="submit"> <i class="fa fa-save"></i>  Save Change</button>
            </div>
        </div>
    </form>
</div>
@endsection
