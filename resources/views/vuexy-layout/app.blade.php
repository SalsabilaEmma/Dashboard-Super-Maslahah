<!DOCTYPE html>
<html class="loading bordered-layout" lang="en" data-layout="bordered-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard Super Maslahah</title>
    <link rel="apple-touch-icon" href="{{ url('vuexy') }}/app-assets/images/ico/apple-icon-120.html">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('vuexy') }}/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('vuexy') }}/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('vuexy') }}/app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="{{ url('vuexy') }}/app-assets/vendors/css/extensions/toastr.min.css">

    <link rel="stylesheet" type="text/css" href="{{ url('vuexy') }}/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('vuexy') }}/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('vuexy') }}/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('vuexy') }}/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('vuexy') }}/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('vuexy') }}/app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('vuexy') }}/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('vuexy') }}/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('vuexy') }}/app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('vuexy') }}/app-assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('vuexy') }}/app-assets/css/themes/bordered-layout.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('vuexy') }}/app-assets/css/themes/semi-dark-layout.min.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('vuexy') }}/app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('vuexy') }}/app-assets/css/pages/dashboard-ecommerce.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('vuexy') }}/app-assets/css/plugins/charts/chart-apex.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('vuexy') }}/app-assets/css/plugins/extensions/ext-component-toastr.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('vuexy') }}/assets/css/style.css">
    <!-- END: Custom CSS-->

    @section('css')
    @show
    @yield('css')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    {{-- this --}}
    @include('layout.header')
    @include('layout.sidebar')
    @yield('content')
    @include('layout.footer')


    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>

    <!-- BEGIN: Vendor JS-->
    <script src="{{ url('vuexy') }}/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ url('vuexy') }}/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="{{ url('vuexy') }}/app-assets/vendors/js/extensions/toastr.min.js"></script>

    <script src="{{ url('vuexy') }}/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="{{ url('vuexy') }}/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="{{ url('vuexy') }}/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="{{ url('vuexy') }}/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js"></script>
    <script src="{{ url('vuexy') }}/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <script src="{{ url('vuexy') }}/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="{{ url('vuexy') }}/app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
    <script src="{{ url('vuexy') }}/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="{{ url('vuexy') }}/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="{{ url('vuexy') }}/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="{{ url('vuexy') }}/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="{{ url('vuexy') }}/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
    <script src="{{ url('vuexy') }}/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ url('vuexy') }}/app-assets/js/core/app-menu.min.js"></script>
    <script src="{{ url('vuexy') }}/app-assets/js/core/app.min.js"></script>
    <script src="{{ url('vuexy') }}/app-assets/js/scripts/customizer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ url('vuexy') }}/app-assets/js/scripts/pages/dashboard-ecommerce.min.js"></script>
    <script src="{{ url('vuexy') }}/app-assets/js/scripts/tables/table-datatables-basic.min.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>

@show
@yield('js')
</body>
<!-- END: Body-->

<!-- Mirrored from pixinvent.com/demo/vuexy-html-bootstrap-admin-template/html/ltr/vertical-menu-template-bordered/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Apr 2021 11:16:41 GMT -->

</html>
