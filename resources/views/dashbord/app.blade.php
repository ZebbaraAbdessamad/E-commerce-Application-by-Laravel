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

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">
    <link href="{{asset('dashbord/css2/icons.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom fonts for this template-->
    <link href="{{asset('dashbord/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{asset('dashbord/css/sb-admin-2.min.css')}}" rel="stylesheet">
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


/*button2*/
.inputfile2 {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;

}
.inputfile2 + label {
    font-size: 1em;
    font-weight: 50;
    color: white;
    background-color: #158FCE;
    display: inline-block;
    border-radius: 5px;
    padding: 4px;
    justify-content: center;
   margin-left: 10px;
}

.inputfile2:focus + label,
.inputfile2 + label:hover {
    background-color:#37B3F3;
}
.inputfile2 + label {
	cursor: pointer; /* "hand" cursor */
    text-align: center;
}
.inputfile2:focus + label {
	outline: 1px dotted #000;
	outline: -webkit-focus-ring-color auto 5px;
    text-align: center;
}
.inputfile2 + label * {
	pointer-events: none;
    text-align: center;
}

</style>
</head>
<body>
    <div id="app">
        <div id="wrapper">
            @include('dashbord.menu')
            @include('dashbord.header')
            @include('dashbord.breadcrumbs')
            @include('dashbord.messageFlash')
            <main class="py-2">
                @yield('content')
            </main>
        </div>
        @include('dashbord.footer')
    </div>

    {{-- js & jquery --}}
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('dashbord/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('dashbord/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('dashbord/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('dashbord/js/sb-admin-2.min.js')}}"></script>
    <!-- Page level plugins -->
    <script src="{{asset('dashbord/vendor/chart.js/Chart.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{asset('dashbord/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('dashbord/js/demo/chart-pie-demo.js')}}"></script>
    @yield('script2')


    {{-- delete for users --}}
    <script>
    $('.delete_users_panel').on('click',function (params) {
        $('#users_id').val($(this).data('id'))
    })
    </script>

<!-- ajax change password -->
<script>
    $(document).ready(function(){
        $('#change_password_prf').click(function(e){
            e.preventDefault();
            $('.error1').html('');
            /*Ajax Request Header setup*/
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('formP1')
                }
            });
            /* Submit form data using ajax*/
            $.ajax({
                url: "{{route('profile.change_password')}}",
                method: 'POST',
                data: $('#formP1').serialize(),
                success: function(response){
                    var  success = response.success;
                    $('.success1').html(`<div class="alert alert-success" style="margin-right:3px;">
                    <span>  ${success}</span>
                    <button type="button" class="close" data-dismiss="alert" style="font-family: sans-serif; ">×</button> </div>`);
                },
                error: function(response){
                    var errors = response.responseJSON.errors;
                    var password_errors = '';
                    errors.password.forEach(function(element) {
                            password_errors =   password_errors + `<li>${element}</li>`;
                        });
                    $('.error1').html(`<div class="text-danger">
                    <ul style="    list-style-type: none; padding-left: 0px;">
                        ${password_errors}
                    </ul>
                    </div>`);
                },
            });
        });
    });
</script>
    <!-- show password -->
<script>
    $('.clk1').on('click', function(e) {
        if ($(this).closest(".d-flex").children('.myInput1').attr('type') === "password") {
            $(this).closest(".d-flex").children('.myInput1').attr('type', "text");
        } else {
            $(this).closest(".d-flex").children('.myInput1').attr('type', "password");
        }
    })
    $('.clk2').on('click', function(e) {
        if ($(this).closest(".d-flex").children('.myInput2').attr('type') === "password") {
            $(this).closest(".d-flex").children('.myInput2').attr('type', "text");
        } else {
            $(this).closest(".d-flex").children('.myInput2').attr('type', "password");
        }
    })
</script>
</body>
</html>
