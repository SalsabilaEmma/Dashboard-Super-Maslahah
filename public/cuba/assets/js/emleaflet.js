let map, markers = [];
    /* ----------------------------- Initialize Map ----------------------------- */
    function initMap() {
        var map = L.map('mapid').setView([-7.636990156366658, 111.54263021667786], 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        map.on('click', mapClicked);
        // initMarkers();
    }

    function generateMarker(data, index) {
        return L.marker(data.position, {
                draggable: data.draggable
            })
            .on('click', (event) => markerClicked(event, index))
            .on('dragend', (event) => markerDragEnd(event, index));
    }
    initMap();
    /* --------------------------- Initialize Markers --------------------------- */
    // function initMarkers() {
    //     // const initialMarkers = JSON.parse('<?php echo json_encode($initialMarkers); ?>');
    //     // const initialMarkers = <?php echo json_encode($initialMarkers); ?>;
    //     const initialMarkers = JSON.parse('<?php echo json_encode($initialMarkers); ?>');
    //     console.log(initialMarkers);

    //     for (let index = 0; index < initialMarkers.length; index++) {

    //         const data = initialMarkers[index];
    //         const marker = generateMarker(data, index);
    //         marker.addTo(map).bindPopup(`<b>${data.position.lat},  ${data.position.lng}</b>`);
    //         map.panTo(data.position);
    //         markers.push(marker)
    //     }
    // }

    // function generateMarker(data, index) {
    //     return L.marker(data.position, {
    //             draggable: data.draggable
    //         })
    //         .on('click', (event) => markerClicked(event, index))
    //         .on('dragend', (event) => markerDragEnd(event, index));
    // }
    // initMap();
    /* ------------------------- Handle Map Click Event ------------------------- */
    function mapClicked($event) {
        // console.log(map);
        console.log($event.latlng.lat, $event.latlng.lng);
    }

    // /* ------------------------ Handle Marker Click Event kalo pin diklik----------------------- */
    // function markerClicked($event, index) {
    //     console.log(map);
    //     console.log($event.latlng.lat, $event.latlng.lng);
    // }

    // /* ----------------------- Handle Marker DragEnd Event kalo pin digeser---------------------- */
    // function markerDragEnd($event, index) {
    //     console.log(map);
    //     console.log($event.target.getLatLng());
    // }

// let map, markers = [];
//     /* ----------------------------- Initialize Map ----------------------------- */
//     function initMap() {
//         map = L.map('mapid', {
//             center: {
//                 lat: -7.6369953598456375,
//                 lng: 111.54262959498016,
//             },
//             zoom: 15
//         });

//         L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//             // zoom: 19,
//             attribution: '© OpenStreetMap'
//         }).addTo(map);

//         map.on('click', mapClicked);
//         initMarkers();
//     }

//     /* --------------------------- Initialize Markers --------------------------- */
//     function initMarkers() {
//         const initialMarkers = JSON.parse('<?php echo json_encode($initialMarkers); ?>');
//         // const initialMarkers = <?php echo json_encode($initialMarkers); ?>;
//         console.log(initialMarkers);

//         for (let index = 0; index < initialMarkers.length; index++) {

//             const data = initialMarkers[index];
//             const marker = generateMarker(data, index);
//             marker.addTo(map).bindPopup(`<b>${data.position.lat},  ${data.position.lng}</b>`);
//             map.panTo(data.position);
//             markers.push(marker)
//         }
//     }

//     function generateMarker(data, index) {
//         return L.marker(data.position, {
//                 draggable: data.draggable
//             })
//             .on('click', (event) => markerClicked(event, index))
//             .on('dragend', (event) => markerDragEnd(event, index));
//     }
//     initMap();
//     /* ------------------------- Handle Map Click Event ------------------------- */
//     function mapClicked($event) {
//         console.log(map);
//         console.log($event.latlng.lat, $event.latlng.lng);
//     }

//     /* ------------------------ Handle Marker Click Event ----------------------- */
//     function markerClicked($event, index) {
//         console.log(map);
//         console.log($event.latlng.lat, $event.latlng.lng);
//     }

//     /* ----------------------- Handle Marker DragEnd Event ---------------------- */
//     function markerDragEnd($event, index) {
//         console.log(map);
//         console.log($event.target.getLatLng());
//     }
