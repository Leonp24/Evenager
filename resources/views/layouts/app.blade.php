<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Evenager')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

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