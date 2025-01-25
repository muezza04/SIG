@extends('layouts.app')

@section('title', 'Sistem Informasi Geografis')

@section('content')
    <div id="map" style="height: 550px; width: 100%; margin: 0 auto 20px;"></div>
    <script>
        var map = L.map('map').setView([-6.596892,106.7969502], 12);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png',{ maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

        fetch('/data/wilayah.json')
            .then(response => response.json())
            .then(data => {
                L.geoJSON(data, {
                    style: function (feature) {
                        // Tentukan warna berdasarkan nama kecamatan
                        let warna = '';
                        switch (feature.properties.name) {
                            case "Bogor Barat":
                                warna = 'blue';
                                break;
                            case "Bogor Selatan":
                                warna = 'red';
                                break;
                            case "Bogor Timur":
                                warna = 'green';
                                break;
                            case "Bogor Utara":
                                warna = 'yellow';
                                break;
                            case "Tanah Sareal":
                                warna = 'purple';
                                break;
                            default:
                                warna = 'grey'; // Warna default jika tidak cocok
                        }

                        return { 
                            color: 'black', // Warna border polygon
                            fillColor: warna, 
                            fillOpacity: 0.3,
                            weight: 0.8
                        };
                    },
                    onEachFeature: function (feature, layer) {
                        layer.bindPopup(feature.properties.name);
                    }
                }).addTo(map);
            })
            .catch(err => console.error("Error loading GeoJSON:", err));
    </script>

    <h1 class="text-4xl font-bold">Peta Tematik Kecamatan Kota Bogor</h1>
    <p class="mt-4 text-lg text-gray-600 text-justify">{{ $data['data']['kecamatan']['desk'] }}</p>

    <h1 class="text-2xl font-bold mt-4 hover:text-blue-500"><a href="{{ route('luaswilayah') }}">Peta Tematik Luas Wilayah</a></h1>
    <p class="mt-4 text-lg text-gray-600 text-justify" >{{ $data['data']['luas_wilayah']['desk'] }}</p>

    <h1 class="text-2xl font-bold mt-4 hover:text-blue-500"><a href="{{ route('populasi') }}">Peta Tematik Populasi Wilayah</a></h1>
    <p class="mt-4 text-lg text-gray-600 text-justify">{{ $data['data']['populasi']['desk'] }}</p>

    <h1 class="text-2xl font-bold mt-4 hover:text-blue-500"><a href="{{ route('kepadatanpenduduk') }}">Peta Tematik Kepadatan Penduduk</a></h1>
    <p class="mt-4 text-lg text-gray-600 text-justify">{{ $data['data']['kepadatan_penduduk']['desk'] }}</p>

    <h1 class="text-2xl font-bold mt-4 hover:text-blue-500"><a href="{{ route('jahe') }}">Peta Tematik Produk Jahe</a></h1>
    <p class="mt-4 text-lg text-gray-600 text-justify">{{ $data['data']['produksi_biofarmaka']['desk_jahe'] }}</p>
    
    <h1 class="text-2xl font-bold mt-4 hover:text-blue-500"><a href="{{ route('jeruk') }}">Peta Tematik Produk Jeruk Nipis</a></h1>
    <p class="mt-4 text-lg text-gray-600 text-justify">{{ $data['data']['produksi_biofarmaka']['desk_jeruk'] }}</p>

    <h1 class="text-2xl font-bold mt-4 hover:text-blue-500"><a href="{{ route('kencur') }}">Peta Tematik Produk Kencur</a></h1>
    <p class="mt-4 text-lg text-gray-600 text-justify">{{ $data['data']['produksi_biofarmaka']['desk_kencur'] }}</p>

    <h1 class="text-2xl font-bold mt-4 hover:text-blue-500"><a href="{{ route('kunyit') }}">Peta Tematik Produk Kunyit</a></h1>
    <p class="mt-4 text-lg text-gray-600 text-justify">{{ $data['data']['produksi_biofarmaka']['desk_kunyit'] }}</p>
@endsection
