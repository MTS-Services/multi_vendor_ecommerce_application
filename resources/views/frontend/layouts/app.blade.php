<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" id="html" class="{{ session('theme', 'light') }}"
    data-theme="{{ session('theme', 'light') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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

    {{-- Boxicons --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" /> --}}

    {{-- fontAwesome CDN --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" /> --}}


    @stack('css-links')
    @vite(['resources/css/app.css'])
    @stack('css')

</head>

<body>

    <!-- Custom Cursor -->
    <div class="cursor-wrapper">
        <div class="custom-cursor"></div>
    </div>


    {{-- Header --}}
    @include('frontend.layouts.partials.header')

    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('frontend.layouts.partials.footer')

    {{-- Jquery --}}
    <script src="{{ asset('frontend/js/jQuery.js') }}"></script>
    {{-- Lucide Icons --}}
    <script src="{{ asset('frontend/js/lucideIcon.js') }}"></script>
    <script>
        lucide.createIcons();
    </script>

    {{-- Toggle theme --}}
    <script>
        $(document).ready(function() {
            const $html = $('#html');
            const $themeToggle = $('#theme-toggle');
            const $darkModeLogo = $('#darkModeLogo');
            const $lightModeLogo = $('#lightModeLogo');

            // Load saved theme
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme) {
                $html.removeClass('light dark').addClass(savedTheme).attr('data-theme', savedTheme);
                $themeToggle.prop('checked', savedTheme === 'dark');
                toggleLogo(savedTheme);
            }

            // Toggle theme on change
            $themeToggle.on('change', function() {
                const newTheme = $themeToggle.is(':checked') ? 'dark' : 'light';
                $html.removeClass('light dark').addClass(newTheme).attr('data-theme', newTheme);
                localStorage.setItem('theme', newTheme);
                toggleLogo(newTheme);
            });

            function toggleLogo(theme) {
                if (theme === 'dark') {
                    $darkModeLogo.removeClass('hidden');
                    $lightModeLogo.addClass('hidden');
                } else {
                    $darkModeLogo.addClass('hidden');
                    $lightModeLogo.removeClass('hidden');
                }
            }
        });
    </script>

    {{-- Custom Cursor --}}
    <script>
        $(document).ready(function() {
            const $cursorWrapper = $('.cursor-wrapper');
            const $cursor = $('.custom-cursor');

            // Move the wrapper with the mouse
            $(document).on('mousemove', function(e) {
                const x = e.clientX;
                const y = e.clientY;
                $cursorWrapper.css('transform', `translate(${x}px, ${y}px) translate(-50%, -50%)`);

                // Randomly create stars (less frequent)
                // if (Math.random() < 0.3) {
                //     createStarTopLeft(x, y);
                // }
            });

            // Add animation on click
            $(document).on('mousedown', function() {
                $cursor.addClass('click');
            });

            $(document).on('mouseup', function() {
                $cursor.removeClass('click');
            });

            // Add pulsing effect when hovering over buttons and links
            $('a, button').hover(
                function() {
                    $cursor.addClass('animate-scalePulse');
                },
                function() {
                    $cursor.removeClass('animate-scalePulse');
                }
            );

            // Create colorful stars rising from the top-left corner of the circle
            // function createStarTopLeft(x, y) {
            //     const $star = $('<div class="star"></div>');

            //     // Add random colors
            //     const colors = ['#FF5733', '#33FF57', '#5733FF', '#FFFF33', '#33FFFF'];
            //     const color = colors[Math.floor(Math.random() * colors.length)];
            //     $star.css('background', `radial-gradient(circle, ${color}, transparent)`);

            //     // Position the star
            //     const offsetX = -10;
            //     const offsetY = -10;
            //     $star.css({
            //         position: 'absolute',
            //         left: `${x + offsetX}px`,
            //         top: `${y + offsetY}px`,
            //     });

            //     // Append to body and remove after animation
            //     $('body').append($star);
            //     $star.on('animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd', function() {
            //         $(this).remove();
            //     });
            // }
        });
    </script>

    @stack('js-links')
    @stack('js')
</body>

</html>
