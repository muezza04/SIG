@extends('layouts.app')

@section('title', 'Produk Jeruk Nipis')

@section('content')
<div id="map" style="height: 550px; width: 100%; margin: 0 auto 20px;"></div>
    <script>
        var map = L.map('map').setView([-6.596892,106.7969502], 12);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png',{ maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

        // Fetch data wilayah dan populasi secara bersamaan
        fetch('/data/wilayah.json')
            .then(response => response.json())
            .then(wilayahData => {
                fetch('/data/tematik.json') // Ambil tematik.json
                    .then(response => response.json())
                    .then(tematikData => {
                        const jerukData = tematikData.data.produksi_biofarmaka.features;

                        // Mapping wilayah.json dengan bindPopup
                        L.geoJSON(wilayahData, {
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
                                const kecamatanName = feature.properties.name;
                                const dataKecamatan = jerukData.find(item => item.kecamatan === kecamatanName);

                                // Bind data ke popup
                                const produksi_biofarmakaWil = dataKecamatan ? dataKecamatan.jeruk_nipis : "Data tidak tersedia";
                                const popupContent = `
                                    <b>${kecamatanName}</b><br>
                                    Jeruk Nipis: ${produksi_biofarmakaWil} ${tematikData.data.produksi_biofarmaka.unit}
                                `;
                                layer.bindPopup(popupContent);
                            }
                        }).addTo(map);
                    })
                    .catch(err => console.error("Error loading Tematik JSON:", err));
            })
            .catch(err => console.error("Error loading GeoJSON:", err));
    </script>

<h1 class="text-2xl font-bold mt-4 hover:text-blue-500"><a href="">Peta Tematik Produk Jeruk Nipis</a></h1>
<p class="mt-4 mb-8 text-lg text-gray-600 text-justify" >{{ $tematik['data']['produksi_biofarmaka']['desk_jeruk'] }}</p>

<div class="flex justify-center">
    <table class="table-auto border-collapse border border-blue-500 text-center w-4/5">
        <thead class="border border-blue-500 bg-blue-100">
            <tr>
                <th class="w-1/2 border border-blue-500 py-2">Kecamatan</th>
                <th class="w-1/2 border border-blue-500 py-2">Jeruk Nipis ({{ $tematik['data']['produksi_biofarmaka']['unit'] }})</th>
            </tr>
        </thead>
        <tbody class="border border-blue-500">
            @foreach($tematik['data']['produksi_biofarmaka']['features'] as $feature)
            <tr class="{{ $loop->even ? 'bg-blue-200' : '' }}">
                <td class="border border-blue-500 py-1">{{ $feature['kecamatan'] }}</td>
                <td class="border border-blue-500 py-1">{{ number_format($feature['jeruk_nipis'], 0) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection