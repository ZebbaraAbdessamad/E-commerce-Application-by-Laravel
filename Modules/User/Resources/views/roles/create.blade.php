@extends('dashbord.app')
@section('content')
<div class="row">
    <form action="{{route('roles.store')}}" method="POST">
        @csrf
        <div class="col-10 offset-1">
            <h2 class="fw-bold text-black h4 mb-3">{{!empty($role->id) ? __('Edit: ').$role->name : __("Add new Role :")}}</h2>
            <div class="card border-left-primary">
                <div class="card-body"style="padding:20px;">
                    <h3 class="h6 fw-bolder">Role Content </h3>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" value="{{old('role_name',$role->name ?? '')}}"  name="role_name" class="form-control @if($errors->get('role_name')) is-invalid @endif">
                        @if($errors->get('role_name'))
                            <div class="text-danger" >
                                <ul style="list-style-type: none;">
                                    @foreach($errors->get('role_name') as $message)
                                    <li>{{$message}}</li>
                                    @endforeach
                                </ul>
                            </div>
                         @endif
                        <input type="hidden" value="{{$role->id}}"  name="hidden_id">
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
