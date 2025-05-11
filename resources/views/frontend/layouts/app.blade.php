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

    @vite(['resources/css/app.css','resources/js/axios.js'])

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
    {{-- <script>
        $(document).ready(function() {
            const faqItems = $('.footer-accordion');

            let currentMode = null;

            function setupAccordion() {
                const isMobile = window.innerWidth <= 640;

                if (isMobile && currentMode !== 'mobile') {
                    currentMode = 'mobile';

                    // Collapse all initially
                    faqItems.each(function() {
                        const item = $(this);
                        const answer = item.find('.footer-accordion-content');
                        const button = item.find('.footer-accordion-title');
                        const icon = item.find('.footer-accordion-icon');

                        answer.css('max-height', '0');
                        item.removeClass('pb-5');
                        button.off('click').on('click', function() {
                            const isOpen = answer.css('max-height') !== '0px';

                            faqItems.each(function() {
                                const otherItem = $(this);
                                const otherAnswer = otherItem.find(
                                    '.footer-accordion-content');
                                otherAnswer.css('max-height', '0');
                                otherItem.removeClass('pb-5');

                            });

                            if (!isOpen) {
                                const scrollHeight = answer.prop('scrollHeight') + 20;
                                answer.css('max-height', scrollHeight + 'px');
                                item.addClass('pb-5');
                            }
                        });
                    });

                } else if (!isMobile && currentMode !== 'desktop') {
                    currentMode = 'desktop';

                    // Show all content and remove accordion behavior
                    $faqItems.each(function() {
                        const item = $(this);
                        const answer = item.find('.footer-accordion-content');
                        const button = item.find('.footer-accordion-title');

                        $answer.css('max-height', 'none');
                        $item.addClass('pb-5');
                        $button.off('click'); // remove toggle behavior
                    });
                }
            }

            // Initial setup
            setupAccordion();

            // Re-run on window resize
            $(window).on('resize', function() {
                setupAccordion();
            });
        });
    </script> --}}
    <script>
        $(document).ready(function() {
            const faqItems = $('.footer-accordion');
            let currentMode = null;

            function setupAccordion() {
                const isMobile = window.innerWidth <= 640;

                if (isMobile && currentMode !== 'mobile') {
                    currentMode = 'mobile';

                    faqItems.each(function() {
                        const item = $(this);
                        const answer = item.find('.footer-accordion-content');
                        const button = item.find('.footer-accordion-title');
                        const icon = item.find('.footer-accordion-icon');

                        // Collapse all initially
                        answer.css('max-height', '0');
                        item.removeClass('pb-5');
                        icon.attr('data-lucide', 'plus');
                        lucide.createIcons(); // Re-render icon

                        button.off('click').on('click', function() {
                            const isOpen = answer.css('max-height') !== '0px';

                            // Collapse all
                            faqItems.each(function() {
                                const otherItem = $(this);
                                const otherAnswer = otherItem.find(
                                    '.footer-accordion-content');
                                const otherIcon = otherItem.find('.footer-accordion-icon');

                                otherAnswer.css('max-height', '0');
                                otherItem.removeClass('pb-5');
                                otherIcon.attr('data-lucide', 'plus');
                            });

                            if (!isOpen) {
                                const scrollHeight = answer.prop('scrollHeight') + 20;
                                answer.css('max-height', scrollHeight + 'px');
                                item.addClass('pb-5');
                                icon.attr('data-lucide', 'minus');
                            }

                            lucide.createIcons(); // Re-render icons after all updates
                        });
                    });

                } else if (!isMobile && currentMode !== 'desktop') {
                    currentMode = 'desktop';

                    // Remove accordion behavior, show all
                    faqItems.each(function() {
                        const item = $(this);
                        const answer = item.find('.footer-accordion-content');
                        const button = item.find('.footer-accordion-title');
                        const icon = item.find('.footer-accordion-icon');

                        answer.css('max-height', 'none');
                        item.addClass('pb-5');
                        button.off('click');
                        icon.attr('data-lucide', 'minus');
                    });

                    lucide.createIcons();
                }
            }

            // Initial setup
            setupAccordion();

            // Re-setup on resize
            $(window).on('resize', function() {
                setupAccordion();
            });
        });
    </script>

<script>
$('#langSwitcher').on('change', function () {
    const selectedLang = $(this).val();

    axios.get('/set-locale?locale=' + selectedLang)
        .then(response => {
            window.location.reload();
        })
        .catch(error => {
            console.error('Failed to switch language:', error);
        });
});
</script>

    {{-- Custom JS --}}
    @stack('js')
</body>

</html>
