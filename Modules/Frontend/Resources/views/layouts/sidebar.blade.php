
    <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark " style="min-height: 100vh;">
        <div class="px-3 pt-2 text-white">
            <div class="text-center mt-3">
                <img src="@if(isset(Auth::user()->image)) {{asset('images/User/'.Auth::user()->image)}} @else  {{asset('images/auth/avatar.png')}} @endif" alt="hugenerd" width="100" height="100" class="rounded-circle mb-3">
                <br>
                <span class="badge badge-info">customer</span>
                <br>
                <span>
                    {{Auth::user()->name }}  {{Auth::user()->last_name }}
                </span>
                <br>
                <span class="text-warning" style="font-size: 10px;"> Member Since {{Auth::user()->created_at->toDateString()}}</span>
                <hr class="text-white">
            </div>
            <div class="nav-item mt-3">
                <a href="{{route('user.profile')}}" class="nav-link text-white" style="padding:0px; width:160px;">
                    <i  @if(isset($menu) && $menu=='profile') style="color: rgb(95, 95, 243)"  @endif class="fs-4 bi-person"></i> <span  @if(isset($menu) && $menu=='profile') style="color: rgb(95, 95, 243)"  @endif class="ms-1 d-none d-sm-inline">Profile</span>
                </a>
            </div>
            <div class="nav-item mt-3">
                <a href="{{route('user.commands')}}" class="nav-link active-menu text-white" style="padding:0px; width:160px;">
                    <i  @if(isset($menu) && $menu=='commands_show') style="color: rgb(95, 95, 243)"  @endif class="fs-4 bi-grid"></i> <span  @if(isset($menu) && $menu=='commands_show') style="color: rgb(95, 95, 243)"  @endif class="ms-1 d-none d-sm-inline">My orders</span>
                </a>
            </div>
            <div class="nav-item mt-3">
                <a href="{{route('user.change_password')}}" class="nav-link text-white" style="padding:0px; width:160px;">
                    <i  @if(isset($menu) && $menu=='password') style="color: rgb(95, 95, 243)"  @endif class="fas fa-lock fa-sm fa-fw mr-2"></i> <span  @if(isset($menu) && $menu=='password') style="color: rgb(95, 95, 243)"  @endif class="ms-1 d-none d-sm-inline">Change password</span>
                </a>
            </div>
            <hr>
            <div class="nav-item mt-3">
                <a  style="padding:0px; width:160px;" class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i> {{__('Logout')}}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="nav-item mt-3">
                <a href="{{route('frontend.home')}}" class="nav-link text-white" style="padding:0px; width:160px;">
                    <i class="fas fa-long-arrow-alt-left text-success"></i> <span class="ms-1 d-none d-sm-inline">Back to Homepage</span>
                </a>
            </div>
        </div>
    </div>
