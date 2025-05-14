@extends('frontend.layouts.app', ['page_slug' => 'shop'])

@section('title', 'Shop')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="flex gap-5">
                {{-- Sidebar Start Here --}}

                @include('frontend.layouts.includes.desktop-filter-sidebar')
                @include('frontend.layouts.includes.mobile-filter-sidebar')
                {{-- Sidebar Section End Here --}}

                {{-- Shop Card Section Start Here --}}
                <div class="w-full xl:w-[75%]">
                    <div class="flex items-center justify-between">
                        <div class="w-full flex items-center gap-3">
                            <button
                                class="openFilterSidebar btn px-2 py-0 rounded-full bg-transparent border border-bg-accent text-text-accent text-xs font-medium xs:text-sm xs:px-5 xs:py-2 lg:text-base w-fit text-nowrap xl:hidden">
                                <span><i data-lucide="sliders-horizontal" class="w-5 h-5"></i></span>
                                <span class="ml-2 text-base">{{ __('Filter') }}</span>
                            </button>
                            <details class="dropdown">
                                <summary
                                    class="btn px-2 py-0 rounded-full bg-transparent border border-bg-accent text-text-accent text-xs font-medium xs:text-sm xs:px-5 xs:py-2 lg:text-base w-fit text-nowrap">
                                    Sort By<i data-lucide="chevron-down"></i></summary>
                                <ul
                                    class="menu dropdown-content bg-bg-gray dark:bg-bg-darkSecondary rounded-box z-1 w-fit p-2 shadow-sm text-sm lg:text-base">
                                    <li><a class="font-normal" href="#">{{ __('Default') }}</a></li>
                                    <li><a class="font-normal" href="#">{{ __('Price High') }}</a></li>
                                    <li><a class="font-normal" href="#">{{ __('Price Low') }}</a></li>
                                </ul>
                            </details>
                        </div>
                        <div class="w-full">
                            <div class="flex items-center gap-4 justify-end p-2">
                                <div data-grid="1"
                                    class="layout-btn opacity-30 hover:opacity-100 transition-all duration-300">
                                    <i data-lucide="tally-2" class="rotate-90 mt-3 mr-1"></i>
                                </div>
                                <div data-grid="2"
                                    class="layout-btn opacity-30 hover:opacity-100 transition-all duration-300">
                                    <i data-lucide="tally-2"></i>
                                </div>
                                <div data-grid="3"
                                    class="layout-btn opacity-30 hover:opacity-100 transition-all duration-300 hidden lg:inline-block">
                                    <i data-lucide="tally-3"></i>
                                </div>
                                <div data-grid="4"
                                    class="layout-btn opacity-30 text-center hover:opacity-100 transition-all duration-300 hidden 3xl:inline-block">
                                    <i data-lucide="tally-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="productGrid" class="grid grid-cols-1 gap-5 mt-5">

                        @php
                            $collections = collect([
                                'id' => 1,
                                'image' => 'frontend/images/phone.png',
                                'title' => 'Turtleneck T-Shirt',
                                'price' => 100.0,
                                'old_price' => 120.0,
                            ]);
                        @endphp

                        <x-frontend.product :items="$collections" />
                        <x-frontend.product :items="$collections" />
                        <x-frontend.product :items="$collections" />
                        <x-frontend.product :items="$collections" />
                        <x-frontend.product :items="$collections" />
                        <x-frontend.product :items="$collections" />
                        <x-frontend.product :items="$collections" />
                        <x-frontend.product :items="$collections" />
                        <x-frontend.product :items="$collections" />
                        <x-frontend.product :items="$collections" />
                        <x-frontend.product :items="$collections" />
                        <x-frontend.product :items="$collections" />
                        <x-frontend.product :items="$collections" />
                        <x-frontend.product :items="$collections" />
                        <x-frontend.product :items="$collections" />
                        <x-frontend.product :items="$collections" />

                    </div>
                </div>
                {{-- Shop Card Section End Here --}}
            </div>
            <div class="flex justify-center items-center gap-2 mt-10">
                <button class="btn-paginate active">{{ __('1') }}</button>
                <button class="btn-paginate">{{ __('2') }}</button>
                <button class="btn-paginate">{{ __('3') }}</button>
                <button class="btn-paginate">
                    <i data-lucide="chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

    <section class="bg-bg-white dark:bg-bg-darkSecondary py-10">
        <div class="container">
            <p class="md:text-center max-w-8xl mx-auto text-text-gray">
                {{ __("Our women's collection brings you a unique blend of classic sophistication and the latest fashion
                                trends. Whether you're looking for versatile daywear, stylish work attire, or statement pieces for
                                special occasions, this collection has it all. Each garment is thoughtfully crafted with attention to
                                detail, using high-quality fabrics to ensure lasting comfort and a flawless fit. From chic blouses and
                                tailored pants to stunning dresses and outerwear, you'll find pieces that seamlessly blend elegance with
                                practicality. Our collection is designed to empower women with confidence and style, no matter the
                                occasion.") }}
            </p>
            <p class="mt-5 md:text-center max-w-8xl mx-auto text-text-gray">
                {{ __('Looking for more? Don’t miss out on our other exciting collections for') }}
                <a href="#" class="text-text-danger font-medium underline">{{ __('BAGS') }}</a>
                {{ __('and') }}
                <a href="#" class="text-text-danger font-medium underline">{{ __('ACCESSORIES.') }}</a>
            </p>
        </div>

        <div class="divider"></div>

        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div>
                    <div class="flex justify-center mb-3">
                        <i class="fa-solid fa-box text-xl"></i>
                    </div>
                    <h3 class="font-medium mb-2">{{ __('Free Shipping') }}</h3>
                    <p class="text-sm text-text-gray">{{ __("Enjoy free shipping on all orders over $100") }}</p>
                </div>
                <div>
                    <div class="flex justify-center mb-3">
                        <i class="fa-solid fa-rotate text-xl"></i>
                    </div>
                    <h3 class="font-medium mb-2">{{ __('Easy Returns') }}</h3>
                    <p class="text-sm text-text-gray">{{ __('Hassle-free returns within 30 days of shipping experience') }}
                    </p>
                </div>
                <div>
                    <div class="flex justify-center mb-3">
                        <i class="fa-solid fa-headset text-xl"></i>
                    </div>
                    <h3 class="font-medium mb-2">{{ __('24/7 Support') }}</h3>
                    <p class="text-sm text-text-gray">{{ __('Shop with confidence backed by our year warranty') }}</p>
                </div>
            </div>
        </div>
    </section>
    {{-- Shop Card Section End Here --}}
@endsection
@push('js')
    <script src="{{ asset('frontend/js/filterSidebar.js') }}"></script>
    {{-- Price Range Slide --}}
    <script>
        $('.price-slider').each(function() {
            const $slider = $(this);
            const $minRange = $slider.find('.min-range');
            const $maxRange = $slider.find('.max-range');
            const $sliderRange = $slider.find('.slider-range');
            const $minPrice = $slider.closest('.collapse-content').find('.min-price');
            const $maxPrice = $slider.closest('.collapse-content').find('.max-price');

            function updatePriceSlider() {
                const minVal = parseInt($minRange.val());
                const maxVal = parseInt($maxRange.val());
                const maxAttr = parseInt($minRange.attr('max'));
                const minPercent = (minVal / maxAttr) * 100;
                const maxPercent = (maxVal / maxAttr) * 100;

                $sliderRange.css({
                    left: minPercent + '%',
                    width: (maxPercent - minPercent) + '%'
                });

                $minPrice.text('$' + minVal);
                $maxPrice.text('$' + maxVal);
            }

            // Initial setup
            updatePriceSlider();

            // Update on input
            $minRange.on('input', function() {
                if (parseInt($minRange.val()) > parseInt($maxRange.val()) - 10) {
                    $minRange.val(parseInt($maxRange.val()) - 10);
                }
                updatePriceSlider();
            });

            $maxRange.on('input', function() {
                if (parseInt($maxRange.val()) < parseInt($minRange.val()) + 10) {
                    $maxRange.val(parseInt($minRange.val()) + 10);
                }
                updatePriceSlider();
            });
        });
    </script>
    {{-- Grid Layouts --}}
    <script>
        $(document).ready(function() {
            const $grid = $('#productGrid');

            // Set grid layout and button styles
            function setGrid(cols) {
                $grid.removeClass('grid-cols-1 grid-cols-2 grid-cols-3 grid-cols-4');
                $grid.addClass(`grid-cols-${cols}`);

                $('.layout-btn').removeClass('grid-layout-active opacity-100').addClass('opacity-30');
                $(`.layout-btn[data-grid="${cols}"]`).addClass('grid-layout-active opacity-100').removeClass(
                    'opacity-30');
            }

            // Update layout buttons visibility and default layout
            function updateLayoutButtonStyle() {
                const width = $(window).width();
                let visibleGrids = [];

                $('.layout-btn').each(function() {
                    const grid = $(this).data('grid');

                    let visible = false;
                    if (width < 512) {
                        visible = grid === 1 || grid === 2;
                    } else if (width <= 768) {
                        visible = grid === 1 || grid === 2;
                    } else if (width <= 1536) {
                        visible = grid === 1 || grid === 2 || grid === 3;
                    } else {
                        visible = true;
                    }

                    $(this).toggle(visible);
                    if (visible) {
                        visibleGrids.push(grid);
                    }
                });

                // If the screen is < 512px, set to 1 column and activate first button
                const currentActive = $('.layout-btn.grid-layout-active:visible').data('grid');
                const defaultGrid = width < 512 ? 1 : (currentActive && visibleGrids.includes(currentActive) ?
                    currentActive : Math.max(...visibleGrids));

                setGrid(defaultGrid);
            }

            // Manual layout selection
            $('.layout-btn').on('click', function() {
                const cols = $(this).data('grid');
                setGrid(cols);
            });

            // Init and bind resize
            updateLayoutButtonStyle();
            $(window).on('resize', updateLayoutButtonStyle);
        });
    </script>
    {{-- Other --}}
    <script>
        // Checkbox group 1 - availability
        $('.availability-checkbox').on('change', function() {
            if ($(this).is(':checked')) {
                $('.availability-checkbox').not(this).prop('checked', false);
            }
        });

        // Checkbox group 2 - brand
        $('.brand-checkbox').on('change', function() {
            if ($(this).is(':checked')) {
                $('.brand-checkbox').not(this).prop('checked', false);
            }
        });
    </script>
@endpush
