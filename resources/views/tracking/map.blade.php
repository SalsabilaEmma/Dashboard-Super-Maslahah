@extends('layout.app')
@section('content')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" crossorigin=""></script>
<script src="https://unpkg.com/leaflet-control-geocoder@2.4.0/dist/Control.Geocoder.js"></script>
<script src="{{ url('cuba') }}/assets/js/emleaflet.js"></script>
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
                            <div id="map"></div>
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
    function initMap() {
        var center = {
            lat: -6.21462,
            lng: 106.84513
        }; // koordinat Jakarta
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: center
        });

        var marker = new google.maps.Marker({
            position: center,
            map: map,
            title: 'Jakarta'
        });
    }
</script>
<script
    src="https://maps.googleapis.com/maps/api/js?key={{ config('google-maps.key') }}&libraries=places&callback=initMap"
    async defer></script> --}}
