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

    <style>
        /* uplod1 */
    .inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;

    }
    .inputfile + label {
        font-size: 1em;
        font-weight: 50;
        color: white;
        background-color: #2a4cb4;
        display: inline-block;
        border-radius: 5px;
        padding: 4px;
        justify-content: center;
    margin-left: 10px;
    }

    .inputfile:focus + label,
    .inputfile + label:hover {
        background-color:#040db8;
    }
    .inputfile + label {
        cursor: pointer; /* "hand" cursor */
        text-align: center;
    }
    .inputfile:focus + label {
        outline: 1px dotted #000;
        outline: -webkit-focus-ring-color auto 5px;
        text-align: center;
    }
    .inputfile + label * {
        pointer-events: none;
        text-align: center;
    }
</style>
</head>

{{-- bg-gradient-primary --}}
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
             @include('frontend::layouts.sidebar')
            <div class="col py-3">
                @include('frontend::layouts.breadcrumbs')
                @include('frontend::layouts.messageFlash')
                @yield('content')
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
        <script src="{{asset('Frontend/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('Frontend/vendor/animsition/js/animsition.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('Frontend/vendor/bootstrap/js/popper.js')}}"></script>
        <script src="{{asset('Frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('Frontend/vendor/select2/select2.min.js')}}"></script>
        <script>
            $(".js-select2").each(function(){
                $(this).select2({
                    minimumResultsForSearch: 20,
                    dropdownParent: $(this).next('.dropDownSelect2')
                });
            })
        </script>
    <!--===============================================================================================-->
        <script src="{{asset('Frontend/vendor/daterangepicker/moment.min.js')}}"></script>
        <script src="{{asset('Frontend/vendor/daterangepicker/daterangepicker.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('Frontend/vendor/slick/slick.min.js')}}"></script>
        <script src="{{asset('Frontend/js/slick-custom.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('Frontend/vendor/parallax100/parallax100.js')}}"></script>
        <script>
            $('.parallax100').parallax100();
        </script>
    <!--===============================================================================================-->
        <script src="{{asset('Frontend/vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>
        <script>
            $('.gallery-lb').each(function() { // the containers for all your galleries
                $(this).magnificPopup({
                    delegate: 'a', // the selector for gallery item
                    type: 'image',
                    gallery: {
                        enabled:true
                    },
                    mainClass: 'mfp-fade'
                });
            });
        </script>
    <!--===============================================================================================-->
        <script src="{{asset('Frontend/vendor/isotope/isotope.pkgd.min.js')}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset('Frontend/vendor/sweetalert/sweetalert.min.js')}}"></script>
        <script>
            $('.js-addwish-b2').on('click', function(e){
                e.preventDefault();
            });

            $('.js-addwish-b2').each(function(){
                var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
                $(this).on('click', function(){
                    swal(nameProduct, "is added to wishlist !", "success");

                    $(this).addClass('js-addedwish-b2');
                    $(this).off('click');
                });
            });

            $('.js-addwish-detail').each(function(){
                var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();
                $(this).on('click', function(){
                    swal(nameProduct, "is added to wishlist !", "success");
                    $(this).addClass('js-addedwish-detail');
                    $(this).off('click');
                });
            });

            /*---------------------------------------------*/

            $('.js-addcart-detail').each(function(){
                var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
                $(this).on('click', function(){
                    swal(nameProduct, "is added to cart !", "success");
                });
            });
        </script>
    <!--===============================================================================================-->
        <script src="{{asset('Frontend/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
        <script>
            $('.js-pscroll').each(function(){
                $(this).css('position','relative');
                $(this).css('overflow','hidden');
                var ps = new PerfectScrollbar(this, {
                    wheelSpeed: 1,
                    scrollingThreshold: 1000,
                    wheelPropagation: false,
                });

                $(window).on('resize', function(){
                    ps.update();
                })
            });
        </script>
    <!--===============================================================================================-->
        <script src="{{asset('Frontend/js/main.js')}}"></script>
    <!--===============================================================================================-->
    <script>
        $('.add_cart').each(function(){
            $('.add_cart').on('click', function(){
                swal("product is added to cart successufly!","","success");
                $(this).off('click');
            });
        });
    </script>
    <!--===============================================================================================-->
        @yield('script')

</body>
</html>
