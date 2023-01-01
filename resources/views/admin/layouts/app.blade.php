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
        <link rel="stylesheet" href="{{ asset('assets/admin/css/admin-style.css') }}">
        
    </head>
    <body class="">

        {{-- navbar --}}
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Company name</a>
                <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
            <div class="navbar-nav">
                <div class="nav-item text-nowrap">
                    <a class="nav-link px-3" href="#">Sign out</a>
                </div>
            </div>
        </header>

        {{-- page block --}}
        <div class="container-fluid">
            <div class="row">
                
                {{-- sidebar --}}
                @include('admin.components.sidebar')
                
                {{-- content --}}
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
                        @yield('content')
                    </div>
                </main>

            </div>
        </div>

        {{-- footer --}}
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
        <script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/admin/js/dashboard.js') }}"></script>

        {{-- other script --}}
        @stack('script')

    </body>
</html>
