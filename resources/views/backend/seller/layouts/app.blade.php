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
    <script src="{{ asset('backend/admin/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ asset('backend/admin/assets/css/fonts.min.css') }}"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>
    {{-- Boxicons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" />

    {{-- <link rel="stylesheet" href="{{ asset('backend/admin/assets/css/kaiadmin.min.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('backend/admin/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/seller/assets/css/sb-admin-2.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/seller/assets/css/sb-admin-2.min.css') }}">

    <link
        href="https://cdn.datatables.net/v/dt/jq-3.7.0/jszip-3.10.1/dt-2.1.7/b-3.1.2/b-html5-3.1.2/b-print-3.1.2/cr-2.0.4/fc-5.0.1/r-3.0.3/rr-1.5.0/datatables.min.css"
        rel="stylesheet">
    @stack('css-links')

    {{-- Custom CSS --}}
    @stack('css')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                showAlert('success', '{{ session('success') }}');
            @endif

            @if (session('error'))
                showAlert('error', '{{ session('error') }}');
            @endif

            @if (session('warning'))
                showAlert('warning', '{{ session('warning') }}');
            @endif
        });
        const content_image_upload_url = "{{ route('file.ci_upload') }}";
    </script>
</head>

<body style="overflow-x: hidden">

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
    <!--   Core JS Files   -->
    <script src="{{ asset('backend/admin/assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <!-- Kaiadmin JS -->
    <script src="{{ asset('backend/admin/assets/js/kaiadmin.min.js') }}"></script>

    <script src="{{ asset('backend/admin/js/functions.js') }}"></script>
    <script src="{{ asset('backend/seller/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('backend/admin/js/custom.js') }}"></script>
    {{-- Custom JS --}}
    @stack('js-links')
    @stack('js')
</body>

</html>
