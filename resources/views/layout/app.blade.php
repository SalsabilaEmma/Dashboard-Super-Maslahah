<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Super Maslahah &mdash; Dashboard</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('stisla/dist') }}/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('stisla/dist') }}/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('stisla/dist') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ url('stisla/dist') }}/assets/css/components.css">
    <link rel="stylesheet" href="{{ url('stisla/dist') }}/assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="{{ url('stisla/dist') }}/assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="{{ url('stisla/dist') }}/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="{{ url('stisla/dist') }}/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->

    <link rel="stylesheet" href="{{ url('stisla/dist') }}/assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="{{ url('stisla/dist') }}/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ url('stisla/dist') }}/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

    @section('css')
    @show
    @yield('css')
</head>

<body class="layout-2">
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            @include('layout.header')
            @include('layout.sidebar')
            @yield('content')
            @include('layout.footer')

        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ url('stisla/dist') }}/assets/modules/jquery.min.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/popper.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/tooltip.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/moment.min.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="{{ url('stisla/dist') }}/assets/modules/sticky-kit.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/jquery.sparkline.min.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/chart.min.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/summernote/summernote-bs4.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/js/page/index.js"></script>

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ url('stisla/dist') }}/assets/js/scripts.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/js/custom.js"></script>


    <script src="{{ url('stisla/dist') }}/assets/modules/datatables/datatables.min.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="{{ url('stisla/dist') }}/assets/modules/jquery-ui/jquery-ui.min.js"></script>

    <script src="{{ url('stisla/dist') }}/assets/js/page/modules-datatables.js"></script>
@show
@yield('js')
</body>

</html>
