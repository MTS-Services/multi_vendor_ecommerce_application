<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" id="html" class="{{ session('theme', 'light') }}"
    data-theme="{{ session('theme', 'light') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Swiper’s Zoom  --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" /> --}}
    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}" type="image/x-icon">

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

    {{-- Swiper CSS --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/swiper.min.css') }}">

    {{-- BoxIcons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" />

    @vite(['resources/css/app.css'])

    {{-- Custom CSS --}}
    @stack('css')

</head>

<body>

    {{-- ============================== Layouts ============================== --}}

    <!-- Custom Cursor -->
    <div class="cursor-wrapper">
        <div class="custom-cursor"></div>
    </div>

    {{-- User Login --}}

    {{-- Temporary Includes --}}
    @include('frontend.includes.login')


    {{-- Header --}}
    @include('frontend.layouts.partials.header')

    {{-- SideBar --}}
    @include('frontend.layouts.partials.sidebar')

    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('frontend.layouts.partials.footer')

    {{-- ============================== End of Layouts ============================== --}}

    {{-- Jquery --}}
    <script src="{{ asset('frontend/js/jQuery.js') }}"></script>
    {{-- Swiper JS --}}
    <script src="{{ asset('frontend/js/swiper.min.js') }}" type="module"></script>
    {{-- Lucide Icons --}}
    <script src="{{ asset('frontend/js/lucideIcon.js') }}"></script>
    <script>
        lucide.createIcons();
    </script>

    {{-- Toggle theme --}}
    <script src="{{ asset('frontend/js/themeToggle.js') }}"></script>

    {{-- Custom Cursor --}}
    <script src="{{ asset('frontend/js/customCursor.js') }}"></script>

    {{-- Side Bar --}}
    <script src="{{ asset('frontend/js/sidebar.js') }}"></script>

    {{-- Toggle search form --}}
    <script src="{{ asset('frontend/js/toggleSearchForm.js') }}"></script>

    {{-- Footer Accordion --}}
    <script>
        $(document).ready(function() {
            const $faqItems = $('.faq-item');

            $faqItems.each(function(index) {
                const $item = $(this);
                const $button = $item.find('.faq-question');
                const $answer = $item.find('.faq-answer');
                const $faqIcon = $item.find('.faq-icon');

                $button.on('click', function() {
                    // Collapse all other items
                    $faqItems.each(function(otherIndex) {
                        if (otherIndex !== index) {
                            const $otherItem = $(this);
                            $otherItem.find('.faq-answer').css('max-height', null);
                            $otherItem.removeClass('pb-5');
                            $otherItem.find('.faq-icon')
                                .removeClass('fa-minus text-t-primary')
                                .addClass('fa-plus');
                        }
                    });

                    // Toggle this item
                    if ($answer.css('max-height') !== 'none' && $answer.css('max-height') !==
                        '0px') {
                        // Collapse current
                        $answer.css('max-height', null);
                        $item.removeClass('pb-5');
                        $faqIcon.removeClass('fa-minus text-t-primary').addClass('fa-plus');
                    } else {
                        // Expand current
                        const scrollHeight = $answer.prop('scrollHeight') + 20;
                        $answer.css('max-height', scrollHeight + 'px');
                        $item.addClass('pb-5');
                        $faqIcon.removeClass('fa-plus').addClass('fa-minus text-t-primary');
                    }
                });
            });

            // Initialize first item expanded
            const $firstItem = $faqItems.first();
            const $firstAnswer = $firstItem.find('.faq-answer');
            const $firstIcon = $firstItem.find('.faq-icon');

            $firstAnswer.css('max-height', $firstAnswer.prop('scrollHeight') + 20 + 'px');
            $firstItem.addClass('pb-5');
            $firstIcon.removeClass('fa-plus').addClass('fa-minus text-t-primary');
        });
    </script>

    {{-- Custom JS --}}
    @stack('js')
</body>

</html>
