<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <style>
        #map { height: 400px; }
    </style>
     <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>
    <body>
        <h1 style="text-align: center; margin-top: 20px;">Peta Indonesia</h1>
        <div id="map"></div>
        <script>
            var map = L.map('map').setView([51.505, -0.09], 3);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png',{ maxZoom: 19,
              attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            var loi = {
            "type": "FeatureCollection",
            "features": [
                {
                "type": "Feature",
                "properties": {
                    "nama":"Kampus A STT-NF"
                },
                "geometry": {
                    "coordinates": [
                    106.83271006867824,
                    -6.352869414097242
                    ],
                    "type": "Point"
                }
                }
            ]
            };

            var geojson = L.geoJSON(loi, {
                    onEachFeature: function (feature, layer) {
                    layer.bindPopup(feature.properties.nama);
                    }
            }).addTo(map);
        </script>
    </body>
</html>