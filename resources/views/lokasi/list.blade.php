@extends('layout.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Default</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Default </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row second-chart-list third-news-update">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form id="addform" class="form theme-form">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label"
                                                        for="exampleFormControlInput1">Longitude</label>
                                                    <input class="form-control" name="long" id="long"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="exampleInputPassword2">Latitude</label>
                                                    <input class="form-control" name="lat" id="lat"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="exampleInputPassword2">Lokasi</label>
                                                    <input class="form-control" name="lokasi" id="lokasi"
                                                        type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </form>
                                <table id="data-table" class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Longitude</th>
                                            <th>Latitude</th>
                                            <th>Lokasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Zero Configuration  Ends-->
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        // function loaddata() {
            /** View Data */
            $(document).ready(function() {
                $.ajax({
                    url: "{{ route('viewData') }}",
                    type: "GET",
                    success: function(data) {
                        $.each(JSON.parse(data), function(index, value) {
                            // $("#data-table").append(
                            //     "<tr>" +
                            //     "<td>" + value.long + "</td>" +
                            //     "<td>" + value.lat + "</td>" +
                            //     "<td>" + value.lokasi + "</td>" +
                            //     "</tr>"
                            // );
                            // let arr = [];
                            // for (let i = 0; i < value.length; i++) {
                            // const element = value[i];
                            var html = '';
                            html += '<tr>';
                            html += '<td>' + value.long + '</td>';
                            html += '<td>' + value.lat + '</td>';
                            html += '<td>' + value.lokasi + '</td>';
                            html += '</tr>';
                            $("#data-table").append(html);
                            // }
                        });
                    }
                });
            });
        // }

        // setInterval(function() {
        //     $("#data-table tbody").children().remove();
        //     loaddata();
        // }, 5000); // Set interval waktu untuk memanggil endpoint setiap 5 detik

        function viewdata() {
            $.ajax({
                url: "{{ route('viewData') }}",
                type: "GET",
                success: function(data) {
                    $.each(JSON.parse(data), function(index, value) {
                        // $("#data-table").append(
                        //     "<tr>" +
                        //     "<td>" + value.long + "</td>" +
                        //     "<td>" + value.lat + "</td>" +
                        //     "<td>" + value.lokasi + "</td>" +
                        //     "</tr>"
                        // );
                        var html = '';
                        html += '<tr>';
                        html += '<td>' + value.long + '</td>';
                        html += '<td>' + value.lat + '</td>';
                        html += '<td>' + value.lokasi + '<td>';
                        html += '</tr>';
                        $("#data-table").append(html);
                    });
                }
            });
        }
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#addform").on("submit", function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('add') }}",
                    data: $("#addform").serialize(),
                    dataType: "JSON",
                    success: function(response) {
                        console.log('aa');
                        $("#lokasi").val('');
                        $("#long").val('');
                        $("#lat").val('');

                        $("#data-table tbody").children().remove(); //added this line

                        viewdata(); //added this line

                    }, //added this line

                }); //added this line

            }); //added this line

        }); //added this line
    </script>
@endsection
