
@extends('frontend::layouts.master')
@section('content')
<div class="container">
    <div class="row pl-5 pr-5 pt-2">
        <div class="card">
            <div class="card-body pl-5">
                <h2 class="fw-bold mb-2">
                    Change Password
                </h2>
                <form action="{{route('user.changepass')}}" method="post">
                    @csrf
                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-black">Current Password</label>
                                <input type="password" name="current_password" placeholder="Current Password"  class="form-control @if($errors->get('current_password')) is-invalid @endif">
                                @if($errors->get('current_password'))
                                    <div class="text-danger" >
                                        <ul style="list-style-type: none;">
                                            @foreach($errors->get('current_password') as $message)
                                            <li>{{$message}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                 @endif
                            </div>
                            <div class="form-group">
                                <label class="text-black">New Password</label>
                                <input type="password" name="new_password" placeholder="New Password"  class="form-control @if($errors->get('new_password')) is-invalid @endif">
                                @if($errors->get('new_password'))
                                <div class="text-danger" >
                                    <ul style="list-style-type: none;">
                                        @foreach($errors->get('new_password') as $message)
                                        <li>{{$message}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="text-black">New Password Again</label>
                                <input type="password" name="new_password_confirmation" placeholder="New Password Again"  class="form-control @if($errors->get('new_password_confirmation')) is-invalid @endif">
                                @if($errors->get('new_password_confirmation'))
                                <div class="text-danger" >
                                    <ul style="list-style-type: none;">
                                        @foreach($errors->get('new_password_confirmation') as $message)
                                        <li>{{$message}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                 @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                            <input type="submit" class="btn btn-primary" value="Change Password">
                            <a href="{{route('user.profile')}}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
