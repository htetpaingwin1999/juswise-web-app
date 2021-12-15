<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('theme')
</head>

<body id="page-top">

    @guest
    @yield('content')
    @else
    <div class="container-fluid box">
        <div class="row">
            <!-- Sidebar Bar -->
            @include('layouts.sidebar')

            <!-- Content Area -->
            <div class="col-12 col-lg-9 col-xl-9 content vh-100">

                {{-- Header --}}
                @include('layouts.header')

                {{-- Content --}}
                @yield('content')

            </div>
        </div>
    </div>
    @endguest


    <script src="{{ asset('js/app.js') }}"></script>
    @yield('foot')

    @auth
    @include('layouts.toast')
    @endauth

    @include('layouts.alert')
</body>

</html>