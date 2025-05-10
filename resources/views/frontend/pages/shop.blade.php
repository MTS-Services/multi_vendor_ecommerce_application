@extends('frontend.layouts.app', ['page_slug' => 'shop'])

@section('title', 'Shop')
@push('css')
    <style>
        .bracamb-dot::before {
            content: "";
            height: 6px;
            width: 6px;
            border-radius: 50%;
            background-color: #8752FA;
            display: inline-block;
            margin-right: 3px;
        }

        .active{
            color: black !important;
            opacity: 1 !important;
        }

        /* Custom styles for the range inputs */
        .price-slider {
            position: relative;
            width: 100%;
            height: 4px;
        }

        .slider-track {
            position: absolute;
            width: 100%;
            height: 4px;
            background-color: #e5e7eb;
            z-index: 1;
            border-radius: 9999px;
        }

        .slider-range, .slider-ranges {
            position: absolute;
            height: 4px;
            background-color: #ff6b6b;
            z-index: 2;
            border-radius: 9999px;
        }

        /* Style the range inputs */
        input[type="range"] {
            -webkit-appearance: none;
            appearance: none;
            position: absolute;
            width: 100%;
            background: transparent;
            z-index: 3;
            pointer-events: none;
        }

        /* Style the range thumb */
        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: white;
            border: 2px solid #ff6b6b;
            cursor: pointer;
            pointer-events: auto;
            margin-top: -8px;
        }

        input[type="range"]::-moz-range-thumb {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: white;
            border: 2px solid #ff6b6b;
            cursor: pointer;
            pointer-events: auto;
        }
    </style>
@endpush
@section('content')
    <!-- Breadcrumb -->
    <div class="container mx-auto px-4 py-4 text-sm">
        <ul class="flex items-center gap-2 ">
            <li>
                <a href="#" class="text-text-gray hover:text-text-accent">Home</a>
            </li>
            <li class="relative bracamb-dot">
                <a href="#collections" class="text-text-gray hover:text-text-accent">Collections</a>
            </li>
            <li class="relative bracamb-dot">
                <span class="font-midium">Women</span>
            </li>
        </ul>
    </div>

    <!-- Header -->
    <div class="container mx-auto px-4 py-8 text-center">
        <div class="flex flex-col items-center justify-center">
            <h1 class="text-3xl font-medium mb-3">Women</h1>
            <p class="text-text-gray mx-auto mb-4">
                Discover our carefully curated women's collection, where timeless elegance meets modern style.
            </p>
        </div>
    </div>

    <div class="container">
        <div class="flex gap-5">
            {{-- Sidebar Start Here --}}
            <div class="filter-sidebar w-100 xl:w-[25%] hidden xl:block dark:bg-bg-darkSecondary p-4 rounded-md dark:bg-opacity-30">
                <details class="collapse collapse-arrow" open>
                    <summary class="collapse-title font-semibold">
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
                <div class="border-t border-border-light dark:border-opacity-50"></div>
                {{-- Availability --}}
                <details class="collapse collapse-arrow" open>
                    <summary class="collapse-title font-semibold ">
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
                <div class="border-t border-border-light dark:border-opacity-50"></div>
                {{-- Price --}}
                <!-- Price header with dropdown arrow -->
                <details class="collapse collapse-arrow" open>
                    <summary class="collapse-title font-semibold">Price</summary>
                    <div class="collapse-content">
                        <div class="mb-4">
                            <div class="price-slider h-6 mt-8 mb-4">
                                <div class="slider-track"></div>
                                <div class="slider-range" id="slider-range"></div>
                                <input type="range" id="min-range" min="0" max="500" value="20" class="absolute">
                                <input type="range" id="max-range" min="0" max="500" value="300" class="absolute">
                            </div>
                        </div>

                        <!-- Price display -->
                        <div class="mb-6">
                            <p class="text-sm">
                                Price: <span class="text-text-danger" id="min-price">$20</span> - <span
                                    class="text-text-danger" id="max-price">$300</span>
                            </p>
                        </div>
                    </div>
                </details>
                <!-- Divider -->
                <div class="border-t border-border-light dark:border-opacity-50"></div>
                {{-- Color --}}
                <details class="collapse collapse-arrow" open>
                    <summary class="collapse-title font-semibold ">Color</summary>
                    <div class="collapse-content text-sm">
                        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-2 mb-2 pe-5">
                            <input type="radio" name="radio-1"
                                class="w-8 h-8 radio bg-bg-accent border-border-accent checked:bg-transparent text-text-accent" />
                            <input type="radio" name="radio-1"
                                class="w-8 h-8 radio bg-bg-secondary border-border-primary checked:bg-transparent text-text-tertiary" />
                            <input type="radio" name="radio-1"
                                class="w-8 h-8 radio bg-bg-dark border-border-dark checked:bg-transparent text-text-primary" />
                            <input type="radio" name="radio-1"
                                class="w-8 h-8 radio bg-bg-danger border-border-danger checked:bg-transparent text-text-danger" />
                            <input type="radio" name="radio-1"
                                class="w-8 h-8 radio bg-bg-accent border-border-accent checked:bg-transparent text-text-accent" />
                            <input type="radio" name="radio-1"
                                class="w-8 h-8 radio bg-bg-accent border-border-accent checked:bg-transparent text-text-accent" />
                            <input type="radio" name="radio-1"
                                class="w-8 h-8 radio bg-bg-accent border-border-accent checked:bg-transparent text-text-accent" />
                        </div>
                    </div>
                </details>
                <!-- Divider -->
                <div class="border-t border-border-light dark:border-opacity-50"></div>
                

                {{-- Size --}}
                <details class="collapse collapse-arrow" open>
                    <summary class="collapse-title font-semibold ">Size</summary>
                    <div class="collapse-content text-sm">
                            <fieldset class="flex flex-wrap gap-2">
                              <label class="cursor-pointer">
                                <input type="radio" name="size" value="XS" class="peer sr-only" />
                                <div class="px-4 py-2 rounded-lg border shadow-md border-border-dark border-opacity-20 peer-checked:border-border-accent peer-checked:bg-bg-accent peer-checked:text-white transition-all duration-300">
                                  XS (10)
                                </div>
                              </label>
                          
                              <label class="cursor-pointer">
                                <input type="radio" name="size" value="S" class="peer sr-only" />
                                <div class="px-4 py-2 rounded-lg border shadow-md border-border-dark border-opacity-20 peer-checked:border-border-accent peer-checked:bg-bg-accent peer-checked:text-white transition-all duration-300">
                                  S (8)
                                </div>
                              </label>
                          
                              <label class="cursor-pointer">
                                <input type="radio" name="size" value="M" class="peer sr-only" />
                                <div class="px-4 py-2 rounded-lg border shadow-md border-border-dark border-opacity-20 peer-checked:border-border-accent peer-checked:bg-bg-accent peer-checked:text-white transition-all duration-300">
                                  M (10)
                                </div>
                              </label>
                          
                              <label class="cursor-pointer">
                                <input type="radio" name="size" value="L" class="peer sr-only" />
                                <div class="px-4 py-2 rounded-lg border shadow-md border-border-dark border-opacity-20 peer-checked:border-border-accent peer-checked:bg-bg-accent peer-checked:text-white transition-all duration-300">
                                  L (20)
                                </div>
                              </label>
                          
                              <label class="cursor-pointer">
                                <input type="radio" name="size" value="XL" class="peer sr-only" />
                                <div class="px-4 py-2 rounded-lg border shadow-md border-border-dark border-opacity-20 peer-checked:border-border-accent peer-checked:bg-bg-accent peer-checked:text-white transition-all duration-300">
                                  XL (20)
                                </div>
                              </label>
                            </fieldset>
                        {{-- <div class="flex flex-wrap gap-2 mb-4">
                            <div class="px-3 py-1 border border-gray-200 rounded text-sm">XS (20)</div>
                            <div class="px-3 py-1 border border-gray-200 rounded text-sm">S (8)</div>
                            <div class="px-3 py-1 border border-gray-200 rounded text-sm">L (20)</div>
                            <div class="px-3 py-1 border border-gray-200 rounded text-sm">M (20)</div>
                            <div class="px-3 py-1 border border-gray-200 rounded text-sm">XL (20)</div>
                        </div> --}}
                    </div>
                </details>
                <!-- Divider -->
                <div class="border-t border-border-light dark:border-opacity-50"></div>
                {{-- Brand --}}
                <details class="collapse collapse-arrow" open>
                    <summary class="collapse-title font-semibold ">Brand</summary>
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
                <div class="border-t border-border-light dark:border-opacity-50"></div>
                <!-- On Sale -->
                <div class="mb-6">
                    <h3 class="font-medium mb-4">On sale</h3>
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
                                <img src="{{ asset('frontend/images/on-sale.jpg') }}" alt="Loose Fit Tee" class="img-fluid">
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
                <!-- Divider -->
                <div class="border-t border-border-light dark:border-opacity-50"></div>
                {{-- Elavate --}}
                <div class="relative mt-10 rounded-md overflow-hidden">
                    <div class="hover:scale-110 transition-all duration-500">
                        <img src="{{ asset('frontend/images/sb-banner.jpg') }}" alt="Elevate">
                    </div>
                    <div class="flex flex-col justify-center items-center p-10 absolute bottom-0 left-0 w-full text-center">
                        <h3 class="font-medium mb-4 capitalize text-4xl text-text-white z-10">Elevate your style</h3>
                        <button class="btn-primary">Shop Now</button>
                    </div>
                </div>

            </div>
            @include('frontend.includes.filter_sidebar')

            {{-- Sidebar Section End Here --}}

            {{-- Shop Card Section Start Here --}}
            <div class="w-full xl:w-[75%]">
                <div class="flex items-center justify-between">
                    <div class="w-full flex items-center gap-3">
                        <button class="openFilterSidebar btn rounded-full bg-bg-transparent border border-bg-accent text-text-accent xl:hidden">
                            <span><i data-lucide="sliders-horizontal" class="w-5 h-5"></i></span>
                            <span class="ml-2 text-base">Filter</span>
                        </button>
                        <details class="dropdown">
                            <summary class="btn rounded-full bg-bg-transparent dark:bg-bg-darkSecondary border border-bg-accent text-text-accent dark:text-text-white text-base min-w-[200px]">
                                Sort By (Default) <i data-lucide="chevron-down"></i></summary>
                            <ul class="menu dropdown-content bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                                <li><a class="font-normal" href="#">Sort By (Default)</a></li>
                                <li><a class="font-normal" href="#">Title Ascending</a></li>
                                <li><a class="font-normal" href="#">Title Descending</a></li>
                                <li><a class="font-normal" href="#">Price Ascending</a></li>
                                <li><a class="font-normal" href="#">Price Descending</a></li>
                            </ul>
                        </details>
                    </div>
                    <div class="w-full">
                        <div class="flex items-center gap-4 justify-end p-2">
                            <div data-grid="1"
                                class="layout-btn opacity-30 hover:opacity-100 transition-all duration-300">
                                <i data-lucide="tally-2" class="rotate-90 mt-3"></i>
                            </div>
                            <div data-grid="2"
                                class="layout-btn opacity-30 hover:opacity-100 transition-all duration-300">
                               <i data-lucide="tally-2" class="ms-2"></i>
                            </div>
                            <div data-grid="3"
                                class="layout-btn opacity-30 hover:opacity-100 transition-all duration-300">
                               <i data-lucide="tally-3" class="ms-1"></i>
                            </div>
                            <div data-grid="4"
                                class="layout-btn opacity-30 text-center hover:opacity-100 transition-all duration-300 active">
                               <i data-lucide="tally-4" class=""></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="productGrid"
                    class="grid grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-5 gap-y-10 mt-5">

                        @php
                            $collections = collect([
                                'id' => 1,
                                'image' => 'frontend/images/t-shirt.jpg',
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
                {{-- Page inner --}}
                <div class="flex justify-center items-center gap-2 mt-10">
                    <button class="btn-paginate">1</button>
                    <button class="btn-paginate">2</button>
                    <button class="btn-paginate">3</button>
                    <button class="btn-paginate"><span class="text-center"><i class="text-sm ms-2"
                                data-lucide="chevron-right"></i></span></button>
                </div>
            </div>
            {{-- Shop Card Section End Here --}}
        </div>
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
    <script>
        $(document).ready(function () {
            const $minRange = $('#min-range');
            const $maxRange = $('#max-range');
            const $sliderRange = $('#slider-range');
            const $minPrice = $('#min-price');
            const $maxPrice = $('#max-price');

            function updateSlider() {
                const minVal = parseInt($minRange.val());
                const maxVal = parseInt($maxRange.val());
                const minPercent = (minVal / parseInt($minRange.attr('max'))) * 100;
                const maxPercent = (maxVal / parseInt($maxRange.attr('max'))) * 100;

                $sliderRange.css({
                    left: minPercent + '%',
                    width: (maxPercent - minPercent) + '%'
                });

                $minPrice.text('$' + minVal);
                $maxPrice.text('$' + maxVal);
            }

            // Set initial positions
            updateSlider();

            // Event listeners
            $minRange.on('input', function () {
                if (parseInt($minRange.val()) > parseInt($maxRange.val()) - 10) {
                    $minRange.val(parseInt($maxRange.val()) - 10);
                }
                updateSlider();
            });

            $maxRange.on('input', function () {
                if (parseInt($maxRange.val()) < parseInt($minRange.val()) + 10) {
                    $maxRange.val(parseInt($minRange.val()) + 10);
                }
                updateSlider();
            });

            // Checkbox group 1 - availability
            $('.availability-checkbox').on('change', function () {
                if ($(this).is(':checked')) {
                    $('.availability-checkbox').not(this).prop('checked', false);
                }
            });

            // Checkbox group 2 - brand
            $('.brand-checkbox').on('change', function () {
                if ($(this).is(':checked')) {
                    $('.brand-checkbox').not(this).prop('checked', false);
                }
            });

            $('.layout-btn').on('click', function () {
                const cols = $(this).data('grid');

                $('.layout-btn').removeClass('active')
                $(this).addClass('active')

                const grid = $('#productGrid');
                grid.removeClass('grid-cols-1 grid-cols-2 grid-cols-3 grid-cols-4 lg:grid-cols-3 2xl:grid-cols-4');
                grid.addClass(`grid-cols-${cols}`);
            });

            function updateLayoutButtonStyle() {
                const width = $(window).width();

                $('.layout-btn').each(function () {
                    const grid = $(this).attr('data-grid');

                    if (width > 1200) {
                        // Show all
                        $(this).removeClass('hidden');
                    } else if (width <= 768) {
                        // Show only grid 1 and 2
                        if (grid === '1' || grid === '2') {
                            $(this).removeClass('hidden');
                        } else {
                            $(this).addClass('hidden');
                        }
                    } else if (width <= 1200) {
                        // Show grid 1, 2, 3
                        if (grid === '1' || grid === '2' || grid === '3') {
                            $(this).removeClass('hidden');
                        } else {
                            $(this).addClass('hidden');
                        }
                    } else {
                        // Fallback
                        $(this).addClass('hidden');
                    }
                });
            }


            // Run on load
            updateLayoutButtonStyle();

            // Run on window resize
            $(window).resize(updateLayoutButtonStyle);

        });
    </script>

@endpush