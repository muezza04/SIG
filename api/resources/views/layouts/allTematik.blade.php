@extends('layouts.app')

@section('title', 'All Tematik')

@section('content')
<div id="map" style="height: 550px; width: 100%; margin: 0 auto 20px;"></div>
    <script>
        // Inisialisasi Peta
        const initializeMap = () => {
            const map = L.map('map').setView([-6.596892, 106.7969502], 12);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
            return map;
        };

        // Fungsi untuk mendapatkan warna berdasarkan nama kecamatan
        const getWarnaKecamatan = (name) => {
            const warnaMap = {
                "Bogor Barat": 'blue',
                "Bogor Selatan": 'red',
                "Bogor Timur": 'green',
                "Bogor Utara": 'yellow',
                "Tanah Sareal": 'purple',
            };
            return warnaMap[name] || 'grey'; // Default warna jika tidak cocok
        };

        // Fungsi untuk membuat style GeoJSON
        const geoJsonStyle = (feature) => ({
            color: 'black', // Border polygon
            fillColor: getWarnaKecamatan(feature.properties.name),
            fillOpacity: 0.3,
            weight: 0.8
        });

        // Fungsi untuk mendapatkan data kecamatan berdasarkan nama
        const getDataKecamatan = (name, dataset) => {
            const data = dataset.find(item => item.kecamatan === name);
            return data || {};
        };

        // Fungsi untuk menampilkan angka atau "Data tidak tersedia" dengan mempertimbangkan nol
        const displayValue = (value) => (value !== undefined && value !== null ? value : "Data tidak tersedia");

        // Fungsi untuk membuat konten popup
        const getPopupContent = (kecamatanName, biofarmakaData, luasWilayahData, populasiData, kepadatanPendudukData, tematikData) => {
            const biofarmaka = getDataKecamatan(kecamatanName, biofarmakaData);
            const luasWilayah = getDataKecamatan(kecamatanName, luasWilayahData);
            const populasi = getDataKecamatan(kecamatanName, populasiData);
            const kepadatanPenduduk = getDataKecamatan(kecamatanName, kepadatanPendudukData);

            return `
                <b>${kecamatanName}</b><br>
                Luas Wilayah: ${displayValue(luasWilayah.luas_wilayah)} ${tematikData.data.luas_wilayah.unit}<br>
                Populasi: ${displayValue(populasi.populasi)} ${tematikData.data.populasi.unit}<br>
                Kepadatan Penduduk: ${displayValue(kepadatanPenduduk.kepadatan_penduduk)} ${tematikData.data.kepadatan_penduduk.unit}<br>
                Jahe: ${displayValue(biofarmaka.jahe)} ${tematikData.data.produksi_biofarmaka.unit}<br>
                Jeruk Nipis: ${displayValue(biofarmaka.jeruk_nipis)} ${tematikData.data.produksi_biofarmaka.unit}<br>
                Kunyit: ${displayValue(biofarmaka.kunyit)} ${tematikData.data.produksi_biofarmaka.unit}<br>
                Kencur: ${displayValue(biofarmaka.kencur)} ${tematikData.data.produksi_biofarmaka.unit}<br>
            `;
        };

        // Fungsi utama untuk memuat data dan menampilkan peta
        const loadMapData = async () => {
            try {
                const [wilayahResponse, tematikResponse] = await Promise.all([
                    fetch('/data/wilayah.json'),
                    fetch('/data/tematik.json')
                ]);

                const wilayahData = await wilayahResponse.json();
                const tematikData = await tematikResponse.json();

                const { produksi_biofarmaka, luas_wilayah, populasi, kepadatan_penduduk } = tematikData.data;
                const map = initializeMap();

                // Tambahkan GeoJSON ke Peta
                L.geoJSON(wilayahData, {
                    style: geoJsonStyle,
                    onEachFeature: (feature, layer) => {
                        const kecamatanName = feature.properties.name;
                        const popupContent = getPopupContent(
                            kecamatanName,
                            produksi_biofarmaka.features,
                            luas_wilayah.features,
                            populasi.features,
                            kepadatan_penduduk.features,
                            tematikData
                        );
                        layer.bindPopup(popupContent);
                    }
                }).addTo(map);

            } catch (error) {
                console.error("Error loading data:", error);
            }
        };

        // Jalankan fungsi loadMapData
        loadMapData();
    </script>


<!-- <h1 class="text-2xl font-bold mt-4 hover:text-blue-500"><a href="">Peta All Tematik</a></h1>
<p class="mt-4 mb-8 text-lg text-gray-600 text-justify" >{{ $tematik['data']['produksi_biofarmaka']['desk_jahe'] }}</p> -->

<div class="flex justify-center mt-10">
    <table class="table-auto border-collapse border border-blue-500 text-center w-4/5">
        <thead class="border border-blue-500 bg-blue-100">
            <tr>
                <th class="border border-blue-500 py-2">Kecamatan</th>
                <th class="border border-blue-500 py-2">Luas Wilayah</th>
                <th class="border border-blue-500 py-2">Populasi</th>
                <th class="border border-blue-500 py-2">Kepadatan Penduduk</th>
                <th class="border border-blue-500 py-2">Jahe (kg)</th>
                <th class="border border-blue-500 py-2">Jeruk Nipis (kg)</th>
                <th class="border border-blue-500 py-2">Kunyit (kg)</th>
                <th class="border border-blue-500 py-2">Kencur (kg)</th>
            </tr>
        </thead>
        <tbody class="border border-blue-500">
            @foreach($tematik['data']['produksi_biofarmaka']['features'] as $feature)
            <tr class="{{ $loop->even ? 'bg-blue-200' : '' }}">
                <td class="border border-blue-500 py-1">{{ $feature['kecamatan'] }}</td>
                <td class="border border-blue-500 py-1">
                    {{ number_format($tematik['data']['luas_wilayah']['features'][$loop->index]['luas_wilayah'] ?? 0, 2) }} km²
                </td>
                <td class="border border-blue-500 py-1">
                    {{ number_format($tematik['data']['populasi']['features'][$loop->index]['populasi'] ?? 0, 0) }}
                </td>
                <td class="border border-blue-500 py-1">
                    {{ number_format($tematik['data']['kepadatan_penduduk']['features'][$loop->index]['kepadatan_penduduk'] ?? 0, 2) }} jiwa/km²
                </td>
                <td class="border border-blue-500 py-1">
                    {{ number_format($feature['jahe'] ?? 0, 0) }} kg
                </td>
                <td class="border border-blue-500 py-1">
                    {{ number_format($feature['jeruk_nipis'] ?? 0, 0) }} kg
                </td>
                <td class="border border-blue-500 py-1">
                    {{ number_format($feature['kunyit'] ?? 0, 0) }} kg
                </td>
                <td class="border border-blue-500 py-1">
                    {{ number_format($feature['kencur'] ?? 0, 0) }} kg
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection