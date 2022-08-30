@extends('frontend::layouts.master')
@section('content')
        <div class="container">
            <div class="row pl-5 pr-5">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('user.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> <i class="fa fa-user input-icon"></i> User name</label>
                                        <input type="text" name="user_name" value="{{old('user_name', $user->user_name ?? '')}}"  class="form-control @if($errors->get('user_name')) is-invalid @endif">
                                        <input type="hidden" name="id_user" value="{{$user->id}}">
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
                                    <div class="form-group">
                                        <label> <i class="fa fa-user input-icon"></i> Gender</label>
                                        <div class="flex-b">
                                            Mr <input type="radio"  name="gender" @if (  $user->gender != null && $user->gender==1 )   checked   @endif value="{{old('gender', 1 ?? '')}}" class="mr-4 ml-4">
                                            Ms <input type="radio" name="gender"  @if ( $user->gender != null &&  $user->gender==0 )   checked   @endif value="{{old('gender', 0 ?? '')}}" class="mr-4 ml-4">
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
                                    <div class="form-group">
                                        <label> <i class="fa fa-envelope input-icon"></i> E-mail</label>
                                        <input type="email" name="email" value="{{old('email', $user->email ?? '')}}" disabled  class="form-control @if($errors->get('email')) is-invalid @endif">
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><i class="fa fa-user input-icon"></i> First name</label>
                                                <input type="text" value="{{old('first_name', $user->name ?? '')}}" name="first_name"   class="form-control @if($errors->get('first_name')) is-invalid @endif">
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><i class="fa fa-user input-icon"></i> Last name</label>
                                                <input type="text" value="{{old('last_name', $user->last_name ?? '')}}" name="last_name"   class="form-control @if($errors->get('last_name')) is-invalid @endif">
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
                                    <div class="form-group">
                                        <label><i class="fa fa-phone input-icon"></i> Phone Number</label>
                                        <input type="text" value="{{old('phone', $user->tele ?? '')}}" name="phone"   class="form-control @if($errors->get('phone')) is-invalid @endif">
                                        @if($errors->get('phone'))
                                            <div class="text-danger" >
                                                <ul style="list-style-type: none;">
                                                    @foreach($errors->get('phone') as $message)
                                                    <li>{{$message}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
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
                                    <div class="form-group">
                                        <label>About Yourself</label>
                                        <textarea name="biography" rows="5" class="form-control @if($errors->get('biography')) is-invalid @endif">
                                            {{old('biography', $user->biography ?? '')}}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> <i class="fa fa-location-arrow input-icon"></i> Address</label>
                                        <input type="text" value="{{old('address', $user->address ?? '')}}" name="address"   class="form-control @if($errors->get('address')) is-invalid @endif">
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
                                    <div class="form-group">
                                        <label><i class="fa fa-street-view input-icon"></i> City</label>
                                        <input type="text" value="{{old('city', $user->city ?? '')}}" name="city"   class="form-control @if($errors->get('city')) is-invalid @endif">
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
                                    <div class="form-group">
                                        <label><i class="fa fa-map-signs input-icon"></i> Country</label>
                                        <input type="text" value="{{old('country', $user->country ?? '')}}" name="country"   class="form-control @if($errors->get('country')) is-invalid @endif">
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
                                    <div class="form-group">
                                        <label><i class="fa fa-map-pin input-icon"></i> Postale Code</label>
                                        <input type="text" value="{{old('code_post', $user->code_post ?? '')}}" name="code_post"   class="form-control @if($errors->get('code_post')) is-invalid @endif">
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
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div>
                                            <img src="@if($user->image){{asset('images/User/'.$user->image)}} @else{{asset('images/auth/avatar.png')}}@endif" class="img-thumbnail" style="width:200px;height: 200px;"></img>
                                            <br>
                                            <input type="file" name="image_prof" id="file" class="inputfile"/>
                                            <label for="file" required style="margin-left:26px;  margin-top: 20px; width: 150px;"> <i class=" fas fa-upload"></i> Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="text-right">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
