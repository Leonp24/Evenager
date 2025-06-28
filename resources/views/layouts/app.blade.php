<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Evenager')</title>


    <link rel="stylesheet" href="{{ asset('build/assets/app-DVByfu5x.css') }}">
    <script src="{{ asset('build/assets/app-m4Na9FCi.js') }}" defer></script>


    @php
    $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
    @endphp

    <link rel="stylesheet" href="{{ asset('build/' . $manifest['resources/css/app.css']['file']) }}">

    <script type="module" src="{{ asset('build/' . $manifest['resources/js/app.js']['file']) }}"></script>

</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container d-flex justify-content-center">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt=""></a>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('scripts')
</body>

</html>