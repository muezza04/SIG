<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/faviconone.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/faviconone.png') }}">
    <title>@yield('title', 'My Laravel Website')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>

      <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>
<body class="bg-gray-100">
    
    <!-- Include Header -->
    @include('partials.header')

    <!-- Main Content -->
    <main class="container mx-auto py-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-blue-500 text-white py-4 mt-10">
        <div class="container mx-auto flex justify-between items-center">
            <p>&copy; 2025 Kota Depok</p>
            <p>Developed by ☕️ Nuzu & Team</p>
        </div>
    </footer>

</body>
</html>
