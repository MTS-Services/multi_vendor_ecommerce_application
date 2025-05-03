<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @section('title')
            {{ isset($title) ? $title : '' }}
        @show
        @if (!empty(trim($__env->yieldContent('title'))))
            {{ __(' - ') }}
        @endif
        {{ config('app.name', 'Ecommerce') }}
    </title>


    <link href="{{ asset('backend/seller/assets/css/styles.css') }}" rel="stylesheet" />

    {{-- Boxicons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" />

    @stack('css-links')

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- Custom CSS --}}
    @stack('css')

</head>

<body>


    {{-- Header --}}
    @include('backend.seller.layouts.partials.header')

    <div id="layoutSidenav">

        {{-- Sidebar --}}
        @include('backend.seller.layouts.partials.sidebar')

        <div id="layoutSidenav_content">

            <main>
                @yield('content')
            </main>

            {{-- Footer --}}
            @include('backend.seller.layouts.partials.footer')
        </div>
    </div>
    <script src="{{ asset('backend/seller/assets/js/scripts.js') }}"></script>

    {{-- Custom JS --}}
    @stack('js-links')
    @stack('js')
</body>

</html>
