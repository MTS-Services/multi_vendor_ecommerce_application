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
    <!--   Core JS Files   -->
    <script src="{{ asset('backend/admin/assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('backend/seller/assets/js/scripts.js') }}"></script>

    {{-- Custom JS --}}
    @stack('js-links')
    @stack('js')
</body>

</html>
