<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow mx-1">
                    <div class="d-flex">
                        <a class="nav-link" href="{{route('orders.index')}}"  role="button">
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">@if(!empty($total)) +{{$total}} @endif</span>
                           <i class="fas fa-bell fa-fw"></i>
                       </a>
                       <i class="mt-4">orders</i>
                    </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{__(Auth::user()->name)}} {{__(Auth::user()->last_name)}}</span>
                        <img style="width: 40px; height: 40px;" class="img-profile rounded-circle"src="@if(isset(Auth::user()->image)) {{asset('images/User/'.Auth::user()->image)}} @else  {{asset('images/auth/avatar.png')}} @endif">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{route('profile.index')}}">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400 "></i>
                            Profile
                        </a>
                        <a class="dropdown-item changePassword"  data-toggle="modal" data-id='{{ Auth::user()->id }}' data-target="#modal_password">
                            <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                            Change password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        {{__('Logout')}}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        </form>
                    </div>
                </li>

            </ul>
        </nav>

        @include('user::profile.modal_password')
