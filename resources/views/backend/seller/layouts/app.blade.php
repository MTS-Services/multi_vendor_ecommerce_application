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
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>


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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('backend/seller/assets/js/scripts.js') }}"></script>
</body>

</html>
