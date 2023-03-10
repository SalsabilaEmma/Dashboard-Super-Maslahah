<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Dashboard Super Maslahah">
    <meta name="keywords"
        content="Dashboard Super Maslahah">
    <meta name="author" content="pixelstrap">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="icon" href="{{ url('public/img') }}/logo-suma-2.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('public/img') }}/logo-suma-2.png" type="image/x-icon">
    <title>Super Maslahah - Dashboard</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/vendors/chartist.css">
    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/vendors/date-picker.css">
    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/vendors/timepicker.css">

    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/vendors/scrollable.css">

    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/vendors/select2.css">

    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/vendors/datatables.css">

    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/vendors/datatables.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/style.css">
    <link id="color" rel="stylesheet" href="{{ url('public/cuba') }}/assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ url('public/cuba') }}/assets/css/responsive.css">

    @section('css')
    @show
    @yield('css')
</head>
{{-- onload="startTime()" --}}

<body>
    <!-- loader starts-->
    <div class="loader-wrapper">
        <div class="loader-index"><span></span></div>
        <svg>
            <defs></defs>
            <filter id="goo">
                <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
                <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo">
                </fecolormatrix>
            </filter>
        </svg>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        @include('layout.header')
        <!-- Page Header Ends
                                 -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <div class="sidebar-wrapper">
                <!-- Page Sidebar Start-->
                @include('layout.sidebar')
            </div>
            <!-- Page Content-->
            @yield('content')
            <!-- footer start-->
            @include('layout.footer')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
    <!-- latest jquery-->
    <script src="{{ url('public/cuba') }}/assets/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="{{ url('public/cuba') }}/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="{{ url('public/cuba') }}/assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="{{ url('public/cuba') }}/assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="{{ url('public/cuba') }}/assets/js/scrollbar/simplebar.js"></script>
    <script src="{{ url('public/cuba') }}/assets/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="{{ url('public/cuba') }}/assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="{{ url('public/cuba') }}/assets/js/sidebar-menu.js"></script>

    <script src="{{ url('public/cuba') }}/assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="{{ url('public/cuba') }}/assets/js/notify/index.js"></script>

    <script src="{{ url('public/cuba') }}/assets/js/select2/select2.full.min.js"></script>
    <script src="{{ url('public/cuba') }}/assets/js/select2/select2-custom.js"></script>

    <script src="{{ url('public/cuba') }}/assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('public/cuba') }}/assets/js/datatable/datatables/datatable.custom.js"></script>
    <script src="{{ url('public/cuba') }}/assets/js/tooltip-init.js"></script>

    <script src="{{ url('public/cuba') }}/assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('public/cuba') }}/assets/js/datatable/datatables/datatable.custom.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ url('public/cuba') }}/assets/js/script.js"></script>
    {{-- <script src="{{ url('public/cuba') }}/assets/js/theme-customizer/customizer.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
    <script>
        $(document).ready(function () {
            $('img').lazyload();
        });
    </script> --}}

@show
@yield('js')
<!-- di page juga @yield('js') baru bawahnya js yang spesifik -->
</body>

</html>
