<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

      <!-- icon bootstrap -->
      <link href="{{ asset('icons/bootstrap-icons.css') }}" rel="stylesheet">


    {{-- URL Dashbord --}}
    <!-- Custom fonts for this template-->
    <link href="{{asset('dashbord/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{asset('dashbord/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('dashbord/css2/icons.min.css')}}" rel="stylesheet" type="text/css">

    {{-- URL frontend --}}
	<link rel="icon" type="image/png" href="{{asset('Frontend/images/icons/favicon.png')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend/fonts/linearicons-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('Frontend/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('Frontend/vendor/slick/slick.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('Frontend/vendor/MagnificPopup/magnific-popup.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Frontend/css/main.css')}}">
    @yield('css')
</head>

{{-- bg-gradient-primary --}}
<body>

    @yield('content')




    <!--===============================================================================================-->
        <script src="{{asset('Frontend/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('Frontend/vendor/animsition/js/animsition.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('Frontend/vendor/bootstrap/js/popper.js')}}"></script>
        <script src="{{asset('Frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('Frontend/vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('Frontend/vendor/daterangepicker/moment.min.js')}}"></script>
        <script src="{{asset('Frontend/vendor/daterangepicker/daterangepicker.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('Frontend/vendor/slick/slick.min.js')}}"></script>
        <script src="{{asset('Frontend/js/slick-custom.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('Frontend/vendor/parallax100/parallax100.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('Frontend/vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('Frontend/vendor/isotope/isotope.pkgd.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('Frontend/vendor/sweetalert/sweetalert.min.js')}}"></script>

        <script src="{{asset('Frontend/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

        <script src="{{asset('Frontend/js/main.js')}}"></script>

</body>
</html>
