<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" id="html" class="{{ session('theme', 'light') }}"
    data-theme="{{ session('theme', 'light') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
            const $themeToggle = $('.theme-toggle');
            const $darkModeLogos = $('.dark-mode-logo');
            const $lightModeLogos = $('.light-mode-logo');

            // Load saved theme
            const savedTheme = localStorage.getItem('theme') || 'light';
            setTheme(savedTheme);

            // Toggle theme on any switch change
            $themeToggle.on('change', function() {
                const newTheme = $(this).is(':checked') ? 'dark' : 'light';
                setTheme(newTheme);
            });

            function setTheme(theme) {
                $html.removeClass('light dark').addClass(theme).attr('data-theme', theme);
                localStorage.setItem('theme', theme);
                toggleLogos(theme);
                $themeToggle.prop('checked', theme === 'dark');
            }

            function toggleLogos(theme) {
                if (theme === 'dark') {
                    $darkModeLogos.removeClass('hidden');
                    $lightModeLogos.addClass('hidden');
                } else {
                    $darkModeLogos.addClass('hidden');
                    $lightModeLogos.removeClass('hidden');
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


    {{-- Side Bar --}}
    <script>
        $(document).ready(function() {
            const $openSidebar = $('.openSidebar');
            const $closeSidebar = $('.closeSidebar');
            const $sidebar = $('.sidebar'); // Select the sidebar element globally

            const $firstNavbar = $('#first-navbar');
            const $secondNavbar = $('#second-navbar');
            let lastScrollPosition = 0;

            // Sidebar open functionality
            $openSidebar.on('click', function() {
                $sidebar.css('transform', 'translateX(0)'); // Show the sidebar
                // $(this).addClass('hidden'); // Hide the open button
            });

            // Sidebar close functionality
            $closeSidebar.on('click', function() {
                $sidebar.css('transform', 'translateX(100%)'); // Hide the sidebar
                setTimeout(() => {
                    // $openSidebar.removeClass('hidden'); // Show all openSidebar buttons
                }, 300); // Delay for the sidebar transition
            });

            // // Scroll event listener for navbar transitions
            // $(window).on('scroll', function() {
            //     const scrollPosition = $(this).scrollTop();

            //     // Scrolling down
            //     if (scrollPosition > 50 && scrollPosition > lastScrollPosition) {
            //         $firstNavbar.removeClass('navbar-show').addClass('navbar-hide');
            //         $secondNavbar.removeClass('navbar-hide').addClass('navbar-show');
            //     }
            //     // Scrolling up
            //     else if (scrollPosition < lastScrollPosition && scrollPosition <= 50) {
            //         $firstNavbar.removeClass('navbar-hide').addClass('navbar-show');
            //         $secondNavbar.removeClass('navbar-show').addClass('navbar-hide');
            //     }

            //     // Update last scroll position
            //     lastScrollPosition = scrollPosition;
            // });
        });
    </script>

    {{-- Toggle search form --}}
    <script>
        document.querySelectorAll('.toggle-search-btn').forEach(button => {
            button.addEventListener('click', (e) => {
                e.stopPropagation(); // Prevent this click from bubbling to the window
                const container = button.closest('.search-container');
                const form = container.querySelector('.searchForm');

                form.classList.toggle('opacity-0');
                form.classList.toggle('pointer-events-none');
                form.classList.toggle('scale-95');
                form.classList.toggle('scale-100');
                form.classList.toggle('opacity-100');
            });
        });

        // Hide any open search form when clicking outside
        window.addEventListener('click', (e) => {
            document.querySelectorAll('.search-container').forEach(container => {
                if (!container.contains(e.target)) {
                    const form = container.querySelector('.searchForm');
                    // Only hide if it's currently visible
                    if (form.classList.contains('opacity-100')) {
                        form.classList.add('opacity-0', 'pointer-events-none', 'scale-95');
                        form.classList.remove('opacity-100', 'scale-100');
                    }
                }
            });
        });
    </script>



    @stack('js-links')
    @stack('js')
</body>

</html>
