@extends('dashbord.app')
@section('content')

<div class="container-fluid">
    <div class="row">
        <form action="{{route('users.store')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-9">
                    <div class="row card border-left-primary m-1">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label> <i class="fa fa-user input-icon"></i> User name</label>
                                            <input type="text" name="user_name" value="{{old('user_name', $user->user_name ?? '')}}"  class="form-control @if($errors->get('user_name')) is-invalid @endif">
                                            <input type="hidden" name="user_id" value="{{$user->id}}">
                                            @if($errors->get('user_name'))
                                                <div class="text-danger" >
                                                    <ul style="list-style-type: none;">
                                                        @foreach($errors->get('user_name') as $message)
                                                        <li>{{$message}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label> <i class="fa fa-user input-icon"></i> Gender</label>
                                            <div class="flex-b">
                                                Mr <input type="radio"  name="gender" @if($user->gender!=null && $user->gender==1 )   checked   @endif value="{{old('gender', 1 ?? '')}}" class="mr-4 ml-4">
                                                Ms <input type="radio" name="gender"  @if( !empty($user->id) && $user->gender==0 )   checked   @endif value="{{old('gender', 0 ?? '')}}" class="mr-4 ml-4">
                                            </div>
                                            @if($errors->get('gender'))
                                                <div class="text-danger" >
                                                    <ul style="list-style-type: none;">
                                                        @foreach($errors->get('gender') as $message)
                                                        <li>{{$message}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label><i class="fas fa-user"></i> {{__('First name')}}</label>
                                                <input type="text" required name="first_name"  value="{{old('first_name',$user->name) ?? '' }}" placeholder="{{__('your name')}}" class="form-control @if($errors->get('first_name')) is-invalid @endif">
                                                @if($errors->get('first_name'))
                                                <div class="text-danger" >
                                                    <ul style="list-style-type: none;">
                                                        @foreach($errors->get('first_name') as $message)
                                                        <li>{{$message}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label><i class="fas fa-user"></i> {{__('last name')}}</label>
                                            <input type="text" required  name="last_name" value="{{old('last_name',$user->last_name) ?? '' }}" class="form-control @if($errors->get('last_name')) is-invalid @endif"  >
                                            @if($errors->get('last_name'))
                                                <div class="text-danger" >
                                                    <ul style="list-style-type: none;">
                                                        @foreach($errors->get('last_name') as $message)
                                                        <li>{{$message}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label><i class="fas fa-envelope"></i> {{__('E-mail')}}</label>
                                            <input type="email" @if(!empty($user->id)) disabled @endif name="email" value="{{old('email',$user->email) ?? ''}}" placeholder="{{__('your email')}}" class="form-control @if($errors->get('email')) has-invalid @endif">
                                            @if($errors->get('email'))
                                            <div class="text-danger" >
                                                <ul style="list-style-type: none;">
                                                    @foreach($errors->get('email') as $message)
                                                    <li>{{$message}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label><i class="fas fa-phone-alt"></i> {{__('phone number')}}</label>
                                            <input type="number" required name="tele" value="{{old('tele',$user->tele) ?? ''}}" class="form-control @if($errors->get('tele'))  is-invalid @endif">
                                            @if($errors->get('tele'))
                                            <div class="text-danger" >
                                                <ul style="list-style-type: none;">
                                                    @foreach($errors->get('tele') as $message)
                                                    <li>{{$message}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label> <i class="fa fa-location-arrow input-icon"></i> Address</label>
                                            <input type="text" required value="{{old('address', $user->address ?? '')}}" name="address"   class="form-control @if($errors->get('address')) is-invalid @endif">
                                            @if($errors->get('address'))
                                                <div class="text-danger" >
                                                    <ul style="list-style-type: none;">
                                                        @foreach($errors->get('address') as $message)
                                                        <li>{{$message}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label> <i class="fa fa-birthday-cake input-icon"></i> Birthday</label>
                                            <input type="date" value="@if(isset($user->birthday)){{old('birthday',date('Y-m-d',strtotime($user->birthday)))}}@else{{old('birthday')}}@endif" name="birthday" class="form-control @if($errors->get('birthday')) is-invalid @endif">
                                            @if($errors->get('birthday'))
                                                <div class="text-danger" >
                                                    <ul style="list-style-type: none;">
                                                        @foreach($errors->get('birthday') as $message)
                                                        <li>{{$message}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><i class="fa fa-map-signs input-icon"></i> {{__('country')}}</label>
                                            <input type="text" required name="country" value="{{old('country',$user->country) ?? ''}}" class="form-control @if($errors->get('country')) is-invalid @endif"  >
                                            @if($errors->get('country'))
                                            <div class="text-danger" >
                                                <ul style="list-style-type: none;">
                                                    @foreach($errors->get('country') as $message)
                                                    <li>{{$message}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><i class="fa fa-map-pin input-icon"></i> {{__('postal code ')}}</label>
                                            <input type="text" required name="code_post" value="{{old('code_post',$user->code_post) ?? ''}}" class="form-control @if($errors->get('code_post')) is-invalid @endif">
                                            @if($errors->get('code_post'))
                                                <div class="text-danger" >
                                                    <ul style="list-style-type: none;">
                                                        @foreach($errors->get('code_post') as $message)
                                                        <li>{{$message}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><i class="fa fa-street-view input-icon"></i> {{__('city')}}</label>
                                            <input type="text" required name="city" value="{{old('city',$user->city) ?? ''}}" class="form-control @if($errors->get('city')) is-invalid @endif">
                                            @if($errors->get('city'))
                                            <div class="text-danger" >
                                                <ul style="list-style-type: none;">
                                                    @foreach($errors->get('city') as $message)
                                                    <li>{{$message}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><i class=" fas fa-id-card"></i> {{__('biography')}}</label>
                                            <textarea  class="form-control @if($errors->get('biography')) is-invalid @endif" name="biography" id="" cols="30" rows="3">{{old('biography',$user->biography) ?? ''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="row card m-1">
                        <div class="form-group">
                            <label class="ml-3 fw-bold text-black pt-1 pb-1"> {{__('image')}}</label>
                            <div class="text-center">
                                <img src="@if($user->image){{asset('images/User/'.$user->image)}} @else{{asset('images/auth/avatar.png')}}@endif" class="img-thumbnail" style="width:11rem;height: 11rem;"></img>
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-8 mx-auto">
                            <input type="file" name="image" id="file" class="inputfile"/>
                            <label for="file"   class=" @if($errors->get('image')) is-invalid @endif"> <i class="fas fa-upload"></i> Choose file</label>
                        </div>
                    </div>
                    <div class="row card m-1 p-3">
                        <div class="form-group">
                            <label class="fw-bold text-black pt-1 pb-1">Role</label>
                            <select  name="role_name" required class="form-control custom-select @if($errors->get('role_name')) is-invalid @endif">
                                <option value="">{{ __('-- select --')}}</option>
                                @foreach ($roles as $role )
                                    <option
                                        @foreach ($user->roles as $Rol)
                                            @if ($Rol->id==$role->id)
                                            selected
                                            @endif
                                        @endforeach value="{{$role->id}}">
                                        {{$role->name}}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->get('role_name'))
                                <div class="text-danger" >
                                    <ul style="list-style-type: none;">
                                        @foreach($errors->get('role_name') as $message)
                                        <li>{{$message}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <hr>
                            <label class="fw-bold text-black">Status</label>
                            <br>
                            <span class="text-success"> publish</span>  <input type="radio"  name="status" @if (  $user->status != null && $user->status=='publish' )   checked   @endif value="{{old('status', 'publish' ?? '')}}" class="ml-4">
                            <br>
                            <span class="text-danger"> blocked</span>  <input type="radio" name="status"  @if ( $user->status != null &&  $user->status=='blocked' )   checked   @endif value="{{old('status', 'blocked' ?? '')}}" class=" ml-4">
                            @if($errors->get('status'))
                                <div class="text-danger" >
                                    <ul style="list-style-type: none;">
                                        @foreach($errors->get('status') as $message)
                                        <li>{{$message}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <hr>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary btn-sm" type="submit">
                                <i class="fa fa-check"></i> submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
