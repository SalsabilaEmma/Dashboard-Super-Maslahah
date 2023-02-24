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
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript">
    function initMap() {
        const myLatLng = {
            lat: -7.636990156366658,
            lng: 111.54263021667786
        };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 5,
            center: myLatLng,
        });

        new google.maps.Marker({
            position: myLatLng,
            map,
            title: "Hello Ciki!",
        });
    }
    window.initMap = initMap;
</script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDxG9Dawl673C8S7HibOsT0oZx0T0dkSOo&callback=initMap"></script>
