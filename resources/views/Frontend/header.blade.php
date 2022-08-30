<header class="header-v4">
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar bg-primary">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar text-white">
                    contact@artisanat.com
                </div>
                <div class="right-top-bar flex-w h-full">
                    @auth
                        @if (Auth::user()->hasrole('admin'))
                            <li style="z-index:2;" class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="flex-c-m trans-04 p-lr-25 text-white"><i class="fa fa-user mr-2"></i>  {{__(Auth::user()->name)}} {{__(Auth::user()->last_name)}}</span>
                                </a>
                                <div class="dropdown-menu  dropdown-menu-right shadow animated--grow-in z" aria-labelledby="userDropdown">
                                    <a class="dropdown-item text-black" href="{{route('home')}}">
                                        <i class="fas fa-fw fa-tachometer-alt"></i> {{__('Dashboard')}}
                                    </a>
                                    <a class="dropdown-item text-black" href="{{route('profile.index')}}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2"></i> {{__('Profile')}}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 "></i> {{__('Logout')}}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        @else
                            <li style="z-index:2;" class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="flex-c-m trans-04 p-lr-25 text-white"><i class="fa fa-user mr-2"></i>  {{__(Auth::user()->name)}} {{__(Auth::user()->last_name)}}</span>
                                </a>
                                <div class="dropdown-menu  dropdown-menu-right shadow animated--grow-in z" aria-labelledby="userDropdown">
                                    <a class="dropdown-item text-black" href="{{route('user.profile')}}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2"></i> {{__('Profile')}}
                                    </a>
                                    <a class="dropdown-item text-black" href="{{route('user.change_password')}}">
                                        <i class="fas fa-lock fa-sm fa-fw mr-2"></i> {{__('Change password')}}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 "></i> {{__('Logout')}}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        @endif
                    @else
                        <a href="{{route('login')}}" class="flex-c-m trans-04 p-lr-25 text-white">
                            <i class="bi bi-box-arrow-in-right mr-2"></i> Login
                        </a>
                        <a href="{{route('register')}}" class="flex-c-m trans-04 p-lr-25 text-white" >
                            <i class="fa fa-user mr-2"></i>  Sign Up
                        </a>
                    @endauth
                </div>
            </div>
        </div>
        <div style="z-index:1;" class="wrap-menu-desktop how-shadow1">
            <nav class="limiter-menu-desktop container">
                <!-- Logo desktop -->
                <a href="{{route('frontend.home')}}" class="logo">
                    <img src="{{asset('images/logo/art_3.jpg')}}" alt="IMG-LOGO">
                    <i class="text-dark">Artisanat <sup class="fw-bold">Store</sup></i>
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li>
                            <a href="{{route('frontend.home')}}">Home</a>
                        </li>
                        <li>
                            <a href="{{route('frontend.shop')}}">Shop</a>
                        </li>
                        <li>
                            <a href="{{route('frontend.about')}}">About</a>
                        </li>
                        <li>
                            <a href="{{route('frontend.contact')}}">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    @php
                      $total=0;
                    @endphp
                    @foreach ((array) session('cart') as $cart)
                        @if ($cart != null)
                             @php
                             ++$total;
                             @endphp
                        @endif
                    @endforeach
                    <a href="{{route('cart')}}" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="{{$total}}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </a>
                </div>
            </nav>
        </div>
    </div>
    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="{{route('frontend.home')}}"> <img src="{{asset('images/logo/art_3.jpg')}}" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            @php
            $total=0;
            @endphp
            @foreach ((array) session('cart') as $cart)
                @if ($cart != null)
                    @php
                    ++$total;
                    @endphp
                @endif
            @endforeach
            <a href="{{route('cart')}}" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="{{$total}}">
                <i class="zmdi zmdi-shopping-cart"></i>
            </a>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar bg-primary">
            <li>
                <div class="left-top-bar text-white">
                    contact@artisanat.com
                </div>
            </li>
            <li>
                @auth
                @if (Auth::user()->hasrole('admin'))
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="flex-c-m trans-04 p-lr-25 text-white"><i class="fa fa-user mr-2"></i>  {{__(Auth::user()->name)}} {{__(Auth::user()->last_name)}}</span>
                        </a>
                        <div class="dropdown-menu  dropdown-menu-right shadow animated--grow-in z" aria-labelledby="userDropdown">
                            <a class="dropdown-item text-black" href="{{route('home')}}">
                                <i class="fas fa-fw fa-tachometer-alt"></i> {{__('Dashboard')}}
                            </a>
                            <a class="dropdown-item text-black" href="{{route('profile.index')}}">
                                <i class="fas fa-user fa-sm fa-fw mr-2"></i> {{__('Profile')}}
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 "></i> {{__('Logout')}}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="flex-c-m trans-04 p-lr-25 text-white"><i class="fa fa-user mr-2"></i>  {{__(Auth::user()->name)}} {{__(Auth::user()->last_name)}}</span>
                        </a>
                        <div class="dropdown-menu  dropdown-menu-right shadow animated--grow-in z" aria-labelledby="userDropdown">
                            <a class="dropdown-item text-black" href="{{route('user.profile')}}">
                                <i class="fas fa-user fa-sm fa-fw mr-2"></i> {{__('Profile')}}
                            </a>
                            <a class="dropdown-item text-black" href="{{route('user.change_password')}}">
                                <i class="fas fa-lock fa-sm fa-fw mr-2"></i> {{__('Change password')}}
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 "></i> {{__('Logout')}}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @endif
            @else
                <a href="{{route('login')}}" class="flex-c-m trans-04 p-lr-25 text-white">
                    <i class="bi bi-box-arrow-in-right mr-2"></i> Login
                </a>
                <a href="{{route('register')}}" class="flex-c-m trans-04 p-lr-25 text-white" >
                    <i class="fa fa-user mr-2"></i>  Sign Up
                </a>
            @endauth
            </li>
        </ul>

        <ul class="main-menu-m bg-light">
            <li>
                <a href="{{route('frontend.home')}}" class="text-dark">Home</a>
            </li>
            <li>
                <a href="{{route('frontend.shop')}}"  class="text-dark">Shop</a>
            </li>
            <li>
                <a href="{{route('frontend.about')}}" class="text-dark">About</a>
            </li>
            <li>
                <a href="{{route('frontend.contact')}}" class="text-dark">Contact</a>
            </li>
        </ul>
    </div>
</header>
