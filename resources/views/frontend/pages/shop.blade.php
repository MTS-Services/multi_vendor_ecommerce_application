@extends('frontend.layouts.app', ['page_slug' => 'shop'])

@section('title', 'Shop')
@section('content')

    <x-frontend.bread-crumb />


    <section class="py-5">
        <div class="container">
            <div class="flex gap-5">
                {{-- Sidebar Start Here --}}
                <div
                    class="filter-sidebar w-100 xl:w-[25%] hidden xl:block bg-bg-gray h-fit dark:bg-bg-darkSecondary p-4 rounded-md dark:bg-opacity-30">
                    <details class="collapse collapse-arrow" open>
                        <summary class="collapse-title pb-0 font-semibold">
                            <span class="">Collections</span>
                        </summary>
                        <div class="collapse-content text-sm">
                            <ul class="opacity-100">
                                <li class="my-3"><a
                                        class="text-text-black dark:text-text-white hover:text-text-accent font-font-md"
                                        href="#">Men's top (20)</a></li>
                                <li class="my-3"><a
                                        class="text-text-black dark:text-text-white hover:text-text-accent font-font-md"
                                        href="#">Men (20)</a></li>
                                <li class="my-3"><a
                                        class="text-text-black dark:text-text-white hover:text-text-accent font-font-md"
                                        href="#">Women (20)</a></li>
                                <li class="my-3"><a
                                        class="text-text-black dark:text-text-white hover:text-text-accent font-font-md"
                                        href="#">Kid (20)</a></li>
                                <li class="my-3"><a
                                        class="text-text-black dark:text-text-white hover:text-text-accent font-font-md"
                                        href="#">T-shirt (20)</a></li>
                            </ul>
                        </div>
                    </details>
                    <!-- Divider -->
                    <div class="divider m-0"></div>
                    {{-- Availability --}}
                    <details class="collapse collapse-arrow" open>
                        <summary class="collapse-title pb-0 font-semibold ">
                            <span>Availability</span>
                        </summary>
                        <div class="collapse-content text-sm">
                            <label for="" class="flex items-center gap-2 py-2">
                                <input type="checkbox" name="availability-checkbox" id="stock-in"
                                    class="availability-checkbox checkbox checkbox-sm dark:border-white"> <span
                                    class="text-text-black dark:text-text-white">In Stock</span>
                            </label>
                            <label for="stock-out" class="flex items-center gap-2">
                                <input type="checkbox" name="availability-checkbox" id="stock-out"
                                    class="availability-checkbox checkbox checkbox-sm dark:border-white"> <span
                                    class="text-text-black dark:text-text-white">Out Of Stock</span>
                            </label>
                        </div>
                    </details>
                    <!-- Divider -->
                    <div class="divider m-0"></div>
                    {{-- Price --}}
                    <details class="collapse collapse-arrow" open>
                        <summary class="collapse-title pb-0 font-semibold">Price</summary>
                        <div class="collapse-content">
                            <div class="mb-4">
                                <div class="relative w-full price-slider">
                                    <div class="absolute w-full h-1 bg-bg-dark bg-opacity-40 z-[1] rounded-full"></div>
                                    <div class="absolute h-1 z-[2] rounded-full bg-bg-orange slider-range"></div>
                                    <input type="range" min="0" max="500" value="20"
                                        class="absolute p-0 top-1/2 -translate-y-1/2 w-full z-[3] pointer-events-none min-range">
                                    <input type="range" min="0" max="500" value="300"
                                        class="absolute p-0 top-1/2 -translate-y-1/2 w-full z-[3] pointer-events-none max-range">
                                </div>
                            </div>

                            <!-- Price display -->
                            <div class="pt-8">
                                <p class="text-sm">
                                    Price: <span class="text-text-danger min-price">$20</span> -
                                    <span class="text-text-danger max-price">$300</span>
                                </p>
                            </div>
                        </div>
                    </details>

                    <!-- Divider -->
                    <div class="divider m-0"></div>
                    {{-- Color --}}
                    <details class="collapse collapse-arrow" open>
                        <summary class="collapse-title pb-0 font-semibold ">Color</summary>
                        <div class="collapse-content text-sm">
                            <div class="flex flex-wrap gap-3">
                                <x-frontend.color-input color="red" />
                                <x-frontend.color-input color="#000" />
                                <x-frontend.color-input color="red" />
                                <x-frontend.color-input color="#000" />
                                <x-frontend.color-input color="red" />
                                <x-frontend.color-input color="#000" />
                                <x-frontend.color-input color="red" />
                                <x-frontend.color-input color="#000" />
                                <x-frontend.color-input color="red" />
                                <x-frontend.color-input color="#000" />
                            </div>
                        </div>
                    </details>
                    <!-- Divider -->
                    <div class="divider m-0"></div>

                    {{-- Size --}}
                    <details class="collapse collapse-arrow" open>
                        <summary class="collapse-title pb-0 font-semibold ">Size</summary>
                        <div class="collapse-content text-sm">
                            <div class="flex flex-wrap gap-2 mb-4">
                                <div
                                    class="px-3 py-1 shadow-shadowPrimary bg-bg-white dark:bg-bg-darkTertiary rounded text-sm">
                                    XS (20)</div>
                                <div
                                    class="px-3 py-1 shadow-shadowPrimary bg-bg-white dark:bg-bg-darkTertiary rounded text-sm">
                                    S
                                    (8)</div>
                                <div
                                    class="px-3 py-1 shadow-shadowPrimary bg-bg-white dark:bg-bg-darkTertiary rounded text-sm">
                                    L
                                    (20)</div>
                                <div
                                    class="px-3 py-1 shadow-shadowPrimary bg-bg-white dark:bg-bg-darkTertiary rounded text-sm">
                                    M
                                    (20)</div>
                                <div
                                    class="px-3 py-1 shadow-shadowPrimary bg-bg-white dark:bg-bg-darkTertiary rounded text-sm">
                                    XL (20)</div>
                            </div>
                        </div>
                    </details>
                    <!-- Divider -->
                    <div class="divider m-0"></div>
                    {{-- Brand --}}
                    <details class="collapse collapse-arrow" open>
                        <summary class="collapse-title pb-0 font-semibold ">Brand</summary>
                        <div class="collapse-content text-sm">
                            <ul class="space-y-2 text-sm">
                                <li class="flex items-center gap-2">
                                    <input type="checkbox" class="brand-checkbox checkbox checkbox-sm dark:border-white"
                                        name="brand-checkbox">
                                    <span>Vintea</span>
                                    <span class="text-text-gray">(1)</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <input type="checkbox" class="brand-checkbox checkbox checkbox-sm dark:border-white"
                                        name="brand-checkbox">
                                    <span>Zara</span>
                                    <span class="text-text-gray">(20)</span>
                                </li>
                        </div>
                    </details>
                    <!-- Divider -->
                    <div class="divider m-0"></div>
                    <!-- On Sale -->
                    <div class="mb-6">
                        <h4 class="font-semibold p-4 text-lg">On sale</h3>
                            <div class="space-y-4">
                                <div class="flex gap-3">
                                    <div class="w-20 h-100 shrink-0 rounded-sm overflow-hidden">
                                        <img src="{{ asset('frontend/images/on-sale.jpg') }}" alt="Turtleneck T-shirt">
                                    </div>
                                    <div>
                                        <h4 class="text-base font-medium">Turtleneck T-shirt</h4>
                                        <div class="flex gap-2 items-center mt-1">
                                            <span class="text-sm text-text-danger font-medium">$100.00</span>
                                            <span class="text-sm font-medium line-through text-text-gray">$130.00</span>
                                        </div>
                                        <p class="text-sm text-text-gray mt-1">3 color available</p>
                                    </div>
                                </div>
                                <div class="flex gap-3 mt-5">
                                    <div class="w-20 h-100 shrink-0 rounded-sm overflow-hidden">
                                        <img src="{{ asset('frontend/images/on-sale.jpg') }}" alt="Loose Fit Tee"
                                            class="img-fluid">
                                    </div>
                                    <div>
                                        <h4 class="text-base font-medium">Loose Fit Tee</h4>
                                        <div class="flex gap-2 items-center mt-1">
                                            <span class="text-sm font-medium text-text-danger">$130.00</span>
                                        </div>
                                        <p class="text-sm text-text-gray mt-1">3 color available</p>
                                    </div>
                                </div>
                            </div>
                    </div>

                </div>
                @include('frontend.includes.filter_sidebar')
                {{-- Sidebar Section End Here --}}

                {{-- Shop Card Section Start Here --}}
                <div class="w-full xl:w-[75%]">
                    <div class="flex items-center justify-between">
                        <div class="w-full flex items-center gap-3">
                            <button
                                class="openFilterSidebar btn px-2 py-0 rounded-full bg-transparent border border-bg-accent text-text-accent text-xs font-medium xs:text-sm xs:px-5 xs:py-2 lg:text-base w-fit text-nowrap xl:hidden">
                                <span><i data-lucide="sliders-horizontal" class="w-5 h-5"></i></span>
                                <span class="ml-2 text-base">Filter</span>
                            </button>
                            <details class="dropdown">
                                <summary
                                    class="btn px-2 py-0 rounded-full bg-transparent border border-bg-accent text-text-accent text-xs font-medium xs:text-sm xs:px-5 xs:py-2 lg:text-base w-fit text-nowrap">
                                    Sort By<i data-lucide="chevron-down"></i></summary>
                                <ul
                                    class="menu dropdown-content bg-bg-gray dark:bg-bg-darkSecondary rounded-box z-1 w-fit p-2 shadow-sm text-sm lg:text-base">
                                    <li><a class="font-normal" href="#">Default</a></li>
                                    <li><a class="font-normal" href="#">Price High</a></li>
                                    <li><a class="font-normal" href="#">Price Low</a></li>
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
                    {{-- Pagination --}}
                    <div class="flex justify-center items-center gap-2 mt-10">
                        <button class="btn-paginate">1</button>
                        <button class="btn-paginate">2</button>
                        <button class="btn-paginate">3</button>
                        <button class="btn-paginate">
                            <i data-lucide="chevron-right"></i>
                        </button>
                    </div>
                </div>
                {{-- Shop Card Section End Here --}}
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            {{-- Description --}}
            <div class="mt-16 text-center max-w-8xl mx-auto text-text-gray text-base">
                <p class="">
                    Our women's collection brings you a unique blend of classic sophistication and the latest fashion
                    trends. Whether you're looking for versatile daywear, stylish work attire, or statement pieces for
                    special occasions, this collection has it all. Each garment is thoughtfully crafted with attention to
                    detail, using high-quality fabrics to ensure lasting comfort and a flawless fit. From chic blouses and
                    tailored pants to stunning dresses and outerwear, you'll find pieces that seamlessly blend elegance with
                    practicality. Our collection is designed to empower women with confidence and style, no matter the
                    occasion.
                </p>
                <p>
                    Looking for more? Don’t miss out on our other exciting collections for
                    <a href="#" class="text-text-danger font-medium underline">BAGS</a>
                    and
                    <a href="#" class="text-text-danger font-medium underline">ACCESSORIES.</a>
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <div class="border-t mt-16 dark:bg-bg-darkSecondary dark:border-none">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div>
                    <div class="flex justify-center mb-3">
                        <i class="fa-solid fa-box text-xl"></i>
                    </div>
                    <h3 class="font-medium mb-2">Free Shipping</h3>
                    <p class="text-sm text-text-gray">Enjoy free shipping on all orders over $100</p>
                </div>
                <div>
                    <div class="flex justify-center mb-3">
                        <i class="fa-solid fa-rotate text-xl"></i>
                    </div>
                    <h3 class="font-medium mb-2">Easy Returns</h3>
                    <p class="text-sm text-text-gray">Hassle-free returns within 30 days of shipping experience</p>
                </div>
                <div>
                    <div class="flex justify-center mb-3">
                        <i class="fa-solid fa-headset text-xl"></i>
                    </div>
                    <h3 class="font-medium mb-2">24/7 Support</h3>
                    <p class="text-sm text-text-gray">Shop with confidence backed by our year warranty</p>
                </div>
            </div>
        </div>
    </div>
    {{-- Shop Card Section End Here --}}
@endsection
@push('js')
    <script src="{{ asset('frontend/js/filterSidebar.js') }}"></script>
    {{-- <script>
        $(document).ready(function() {

            // ======================== Price Range 

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
                $minRange.on('input', updatePriceSlider);
                $maxRange.on('input', updatePriceSlider);
            });

            // Event listeners
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

            //======================== End Of PriceRange

            // // Checkbox group 1 - availability
            // $('.availability-checkbox').on('change', function() {
            //     if ($(this).is(':checked')) {
            //         $('.availability-checkbox').not(this).prop('checked', false);
            //     }
            // });

            // // Checkbox group 2 - brand
            // $('.brand-checkbox').on('change', function() {
            //     if ($(this).is(':checked')) {
            //         $('.brand-checkbox').not(this).prop('checked', false);
            //     }
            // });

            // // Grid Layouts

            // $('.layout-btn').on('click', function() {
            //     const cols = $(this).data('grid');

            //     $('.layout-btn').removeClass('grid-layout-active')
            //     $(this).addClass('grid-layout-active')

            //     const grid = $('#productGrid');
            //     grid.removeClass(
            //         'grid-cols-1 grid-cols-2 grid-cols-3 grid-cols-4 lg:grid-cols-3 2xl:grid-cols-4');
            //     grid.addClass(`grid-cols-${cols}`);
            // });

            // function updateLayoutButtonStyle() {
            //     const width = $(window).width();

            //     $('.layout-btn').each(function() {
            //         const grid = $(this).attr('data-grid');

            //         if (width > 1200) {
            //             // Show all
            //             $(this).removeClass('hidden');
            //         } else if (width <= 768) {
            //             // Show only grid 1 and 2
            //             if (grid === '1' || grid === '2') {
            //                 $(this).removeClass('hidden');
            //             } else {
            //                 $(this).addClass('hidden');
            //             }
            //         } else if (width <= 1200) {
            //             // Show grid 1, 2, 3
            //             if (grid === '1' || grid === '2' || grid === '3') {
            //                 $(this).removeClass('hidden');
            //             } else {
            //                 $(this).addClass('hidden');
            //             }
            //         } else {
            //             // Fallback
            //             $(this).addClass('hidden');
            //         }
            //     });
            // }


            // // Run on load
            // updateLayoutButtonStyle();

            // // Run on window resize
            // $(window).resize(updateLayoutButtonStyle);

        });
    </script> --}}

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
