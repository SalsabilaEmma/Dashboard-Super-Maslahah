@extends('layout.app')
@section('content')
    <style>
        .text-center {
            text-align: center;
        }

        #mapid {
            width: '100%';
            height: 400px;
            z-index: 1;
        }
    </style>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"></i></a>
                            </li>
                            {{-- <li class="breadcrumb-item">Extension Data Tables</li> --}}
                            <li class="breadcrumb-item active">Tracking</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-3">Tracking</h5>
                        </div>
                        <div class="card-body">
                            <div id="mapid"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    function loadMarkers() {
        $.ajax({
            // url: "{{ route('viewMap') }}",
            url: "{{ route('viewData') }}",
            success: function(initialMarkers) {
                const initialMarkers = JSON.parse(initialMarkers);
                console.log(initialMarkers);
                // Lanjutkan dengan memproses data di sini, seperti menambahkan marker ke peta
            }
        });
    }
</script> --}}
