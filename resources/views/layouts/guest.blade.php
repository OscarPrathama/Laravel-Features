<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        {{-- Bootstrap --}}
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        {{-- Style --}}
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        
    </head>
    <body class="">

        {{-- navbar --}}

        {{-- content --}}
        @yield('content')

        {{-- footet --}}

        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>

        {{-- other script --}}

    </body>
</html>
