
    function marker(long, lat) {

        const options = {
            coordinates: [long, lat],
            name: "Dummy Judul",
            adress: "keterangan",
            postalCode: "keterangan 2",
            city: "keterangan 3 "
        }

        // Defining the map
        let map = L.map("mapid", {
            center: options.coordinates,
            zoom: 9,
            scrollWheelZoom: true
        });

        // Basemap config
        // L.tileLayer("https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png", {
        //     attribution: 'Map tiles by <a href="http://cartodb.com/attributions#basemaps">CartoDB</a> | Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
        // }).addTo(map);
        L.tileLayer("https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png", {
            attribution: 'Marstech'
        }).addTo(map);

        // Setting the company logo as a custom icon
        let myIcon = L.divIcon({
            className: "logo",
            iconSize: [45, 72],
            iconAnchor: [22.5, 72],
            popupAnchor: [0, -72]
        });

        // adding the marker
        L.marker(options.coordinates, {
                icon: myIcon
            })
            .addTo(map)
            .bindPopup(
                L.popup({}).setContent(
                    `<h3>${options.name}</h3>
        <p>${options.adress}</p>
        <p>${options.postalCode}, ${options.city}</p>
        `
                )
            )
            .openPopup();

        // adding marker original
        var popup = L.popup();

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent(e.latlng.toString())
                .openOn(map);
        }

        map.on('click', onMapClick);
    }
