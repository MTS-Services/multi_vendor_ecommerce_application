@extends('frontend.layouts.app', ['page_slug' => 'single_product'])

@section('title', 'Single Product')

@push('css')
    <style>
        #carousel {
            padding: 100px 0;
        }

        .carousel_section .swiper {
            width: 100%;
            height: 750px;
        }

        .carousel_section .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .carousel_section .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .carousel_section .mySwiper2 {
            height: 80%;
        }

        .mySwiper {
            height: 20%;
            padding: 10px 0;
        }

        .carousel_section .product_slider_thumbs .swiper-slide {
            opacity: 0.6;
        }

        .carousel_section .product_slider_thumbs .swiper-slide-thumb-active {
            opacity: 1;
        }

        /* Zoom Effect */
        #lens {
            position: absolute;
            border: 2px solid rgba(52, 158, 226, 0.8);
            z-index: 100;
            pointer-events: none;
            display: none;
            /* No fixed width/height here — JS will handle it */
        }


        #zoomResult {
            display: none;
            position: absolute;
            top: 0;
            left: 100%;
            margin-left: 20px;
            width: 300px;
            height: 300px;
            background-repeat: no-repeat;
            background-size: 200%;
            /* To ensure zooming effect */
            z-index: 99;
            background-color: #fff;
            border: 1px solid #ddd;
            /* Optional: border to see the zoom area */
        }

        .carousel_section .hover-wrapper {
            position: relative;
            /* Ensure proper positioning of zoom result and lens */
            /* transform: translate(0, 0); */
        }

        .carousel_section .hover-wrapper:hover #zoomResult {
            display: block;
        }
    </style>
@endpush

@section('content')
    <section id="carousel">
        <div class="container">
            <div class="carousel_section flex lg:flex-row flex-col gap-5">
                <div class="slider_side flex flex-col-reverse 2xl:flex-row w-full lg:w-1/2">
                    {{-- Thumbnails (below on small, left on large) --}}
                    <div class="w-full 2xl:w-1/5 mt-4 2xl:mt-0 lg:mr-4">
                        <div thumbsSlider="" class="swiper product_slider_thumbs h-full">
                            <div class="swiper-wrapper flex flex-row lg:flex-col">
                                @for ($i = 1; $i <= 10; $i++)
                                    <div class="swiper-slide mb-2 mr-2 lg:mr-0 lg:mb-2 cursor-pointer border rounded">
                                        <img src="https://swiperjs.com/demos/images/nature-{{ $i }}.jpg"
                                            class="w-20 h-16 2xl:h-20 object-cover" />
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>

                    {{-- Main Slider --}}
                    <div class="w-full 2xl:w-4/5 relative hover-wrapper">
                        <div class="swiper product_slider_image">
                            <div class="swiper-wrapper">
                                @for ($i = 1; $i <= 10; $i++)
                                    <div class="swiper-slide">
                                        <img class="zoomable w-full object-cover"
                                            src="https://swiperjs.com/demos/images/nature-{{ $i }}.jpg" />
                                    </div>
                                @endfor
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>

                        <!-- Zoom Elements -->
                        <div id="zoomResult"></div>
                        <div id="lens"></div>
                    </div>
                </div>


                {{-- product details  side --}}
                <div class="product_side w-full lg:w-1/2 mt-6 md:mt-0">
                    {{-- reating part --}}
                    <div>
                        <h1 class="text-2xl lg:text-3xl font-bold mb-2">{{ __('Turtleneck T-shirt') }}</h1>
                        <div class="flex items-center mb-3">
                            <div class="flex space-x-1 text-text-danger md:py-3 py-1">
                                <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                            </div>
                            <span class="ml-2 text-gray-600">({{ __('24 reviews') }})</span>
                        </div>

                        <div class="mb-6">
                            <p class="text-xl lg:text-2xl font-bold"><span
                                    class="text-text-danger">{{ __('$100.00') }}</span>-{{ '$120.00' }}</p>
                            <p class="flex items-center text-sm mt-3">
                                <i data-lucide="flame"
                                    class="w-5 h-5 lg:w-7 lg:h-7 text-text-danger dark:text-text-gray"></i>
                                {{ __('30 sold in last 24 hours') }}
                            </p>
                        </div>
                    </div>

                    {{-- Size Change --}}
                    <div class="mb-6">
                        <!-- Dynamic Size Label -->
                        <h3 id="selected-size" class="text-base font-semibold mb-2">
                            {{ __('Size') }}:<span class="semibold text-lg">{{ __('Small') }}</span>
                        </h3>

                        <!-- Size Buttons -->
                        <div class="flex flex-wrap gap-2">
                            <button data-label="Small"
                                class="size-btn w-12 h-12 lg:w-14 lg:h-14 border rounded-full text-base font-medium flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('S') }}
                            </button>
                            <button data-label="Medium"
                                class="size-btn w-12 h-12 lg:w-14 lg:h-14 border rounded-full text-base font-medium flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('M') }}
                            </button>
                            <button data-label="Large"
                                class="size-btn w-12 h-12 lg:w-14 lg:h-14 border rounded-full text-base font-medium flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('L') }}
                            </button>
                            <button data-label="Extra Large"
                                class="size-btn w-12 h-12 lg:w-14 lg:h-14 border rounded-full text-base font-medium flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('XL') }}
                            </button>
                        </div>
                    </div>

                    {{-- quantity and add to cart --}}
                    <div class="mb-8">
                        <div class="flex flex-wrap gap-3 items-center">
                            <!-- Quantity Controls -->
                            <div
                                class="flex items-center border rounded-full overflow-hidden bg-bg-dark/10 dark:bg-bg-white/10 px-4 lg:px-5 py-1 lg:py-2">
                                <button class="quantity-decrease">
                                    <i data-lucide="minus" class="w-4 h-4 hover:text-text-danger"></i>
                                </button>
                                <input type="text" min="1" value="1"
                                    class="w-10 lg:w-12 text-center py-1 bg-transparent focus:outline-none"
                                    id="quantity-input" />
                                <button class="quantity-increase">
                                    <i data-lucide="plus" class="w-4 h-4 hover:text-text-danger"></i>
                                </button>
                            </div>

                            <!-- Add to Cart Button -->
                            <button
                                class="flex-1 px-4 lg:px-5 py-2 lg:py-3 btn-primary text-text-white font-medium rounded-full">
                                {{ __('Add to cart') }}
                            </button>
                        </div>
                        <button class="w-full py-2 lg:py-3 px-4 mt-4 btn-secondary">
                            {{ __('Buy it now') }}
                        </button>
                    </div>

                    {{-- Payment System --}}
                    <div>
                        <p class="text-center text-sm mb-3">
                            <a href="#" class="underline hover:text-text-danger">{{ __('More payment options') }}</a>
                        </p>
                        <div class="mb-6 flex flex-wrap justify-center gap-4 lg:gap-6 text-sm">
                            <a href="#"
                                class="flex text-sm lg:text-base items-center gap-2 hover:text-text-danger transiction-ll">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                <span class="hidden sm:inline">{{ __('Remove from wishlist') }}</span>
                            </a>

                            <a href="#"
                                class="flex text-sm lg:text-base items-center gap-2 hover:text-text-danger transiction-ll">
                                <i data-lucide="stretch-horizontal" class="w-4 h-4"></i>
                                <span class="hidden sm:inline">{{ __('Already compared') }}</span>
                            </a>

                            <a href="#"
                                class="flex text-sm lg:text-base items-center gap-2 hover:text-text-danger transiction-ll">
                                <i data-lucide="help-circle" class="w-4 h-4"></i>
                                <span class="hidden sm:inline">{{ __('Ask a question') }}</span>
                            </a>

                            <a href="#"
                                class="flex text-sm lg:text-base items-center gap-2 hover:text-text-danger transiction-ll">
                                <i data-lucide="share-2" class="w-4 h-4"></i>
                                <span class="hidden sm:inline">{{ __('Share') }}</span>
                            </a>
                        </div>
                        <div class="mb-6 text-center">
                            <h3 class="text-sm font-semibold text-text-gray dark:text-text-gray mb-2">
                                {{ __('Guarantee Safe Checkout:') }}
                            </h3>
                            <div class="flex justify-center gap-2 lg:gap-4 flex-wrap">
                                <img src="{{ asset('frontend/images/footer_bank_logos (2).png') }}"
                                    alt="{{ __('Vietcombank') }}" class="h-5 lg:h-7 border" />
                                <img src="{{ asset('frontend/images/footer_bank_logos (1).png') }}"
                                    alt="{{ __('Eximbank') }}" class="h-5 lg:h-7 border" />
                                <img src="{{ asset('frontend/images/footer_bank_logos (11).png') }}"
                                    alt="{{ __('Pay') }}" class="h-5 lg:h-7 border" />
                                <img src="{{ asset('frontend/images/footer_bank_logos (3).png') }}"
                                    alt="{{ __('Techcombank') }}" class="h-5 lg:h-7 border" />
                                <img src="{{ asset('frontend/images/footer_bank_logos (4).png') }}"
                                    alt="{{ __('Vietinbank') }}" class="h-5 lg:h-7 border" />
                                <img src="{{ asset('frontend/images/footer_bank_logos (5).png') }}"
                                    alt="{{ __('BIDV') }}" class="h-5 lg:h-7 border" />
                                <img src="{{ asset('frontend/images/footer_bank_logos (6).png') }}"
                                    alt="{{ __('Sacombank') }}" class="h-5 lg:h-7 border" />
                            </div>
                        </div>
                    </div>

                    {{-- delivery --}}
                    <div
                        class="mb-6 space-y-2 flex flex-col sm:flex-row justify-around mx-auto border p-4 lg:p-6 rounded-xl lg:rounded-2xl py-4 lg:py-6">
                        <!-- Estimated Delivery Time -->
                        <div class="flex items-center sm:border-r sm:pr-6 lg:pr-14 pb-3 sm:pb-0">
                            <div class="text-center">
                                <i data-lucide="car" class="w-5 h-5 lg:w-7 lg:h-7 mx-auto"></i>
                                <p class="text-sm lg:text-base font-medium">{{ __("Estimated delivery time: 3-5 days") }}</p>
                                <p class="text-xs text-text-primary/50 dark:text-text-white">{{ __("International") }}</p>
                            </div>
                        </div>

                        <!-- Free Shipping -->
                        <div class="flex items-center">
                            <div class="text-center">
                                <i data-lucide="box" class="w-5 h-5 lg:w-7 lg:h-7 mx-auto"></i>
                                <p class="text-sm lg:text-base font-medium">{{ __("Free shipping on all orders") }}</p>
                                <p class="text-xs text-text-primary/50 dark:text-text-white">{{ __("Over $150") }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- product cart --}}
                    {{-- <div class="mt-6 lg:mt-8 border p-4 lg:p-6 rounded-xl lg:rounded-2xl">
                        <h3 class="text-lg font-semibold  mb-4">{{ __('Frequently Bought Together') }}</h3>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <input type="checkbox"
                                    class="mr-3 h-4 w-4 rounded  text-text-tertiary  focus:ring-indigo-500">
                                <div class="flex flex-col sm:flex-row items-start w-full gap-3">
                                    <img src="{{ asset('frontend/images/airpod-pro-black.jpg') }}"
                                        alt="{{ __('AirPod Pro Black') }}"
                                        class="w-full sm:w-32 lg:w-40 h-auto sm:h-40 lg:h-60 object-cover rounded">
                                    <div>
                                        <p class="text-sm lg:text-base font-medium ">
                                            {{ __('Single Breasted Blazer') }}</p>
                                        <p class="text-xs lg:text-sm py-1 lg:py-2">
                                            <span class="text-text-danger">{{ __('$100.00') }}</span>
                                            <span class="line-through ml-1">{{ __('$120.00') }}</span>
                                        </p>
                                        <select id="color-size" name="color-size"
                                            class="block w-full text-sm lg:text-base rounded-full border  py-1 lg:py-2 px-2 lg:px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500">
                                            <option value="" selected>{{ __('Black / S') }}</option>
                                            <option value="black-m">{{ __('Black / M') }}</option>
                                            <option value="black-l">{{ __('Black / L') }}</option>
                                            <option value="blue-s">{{ __('Blue / S') }}</option>
                                            <option value="blue-m">{{ __('Blue / M') }}</option>
                                            <option value="blue-l">{{ __('Blue / L') }}</option>
                                            <option value="blue-xl">{{ __('Blue / XL') }}</option>
                                            <option value="white-s">{{ __('White / S') }}</option>
                                            <option value="white-m">{{ __('White / M') }}</option>
                                            <option value="white-l">{{ __('White / L') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Repeat for other product items with same responsive classes -->
                            <div class="flex items-center">
                                <input type="checkbox"
                                    class="mr-3 h-4 w-4 rounded  text-indigo-600 focus:ring-indigo-500">
                                <div class="flex flex-col sm:flex-row items-start w-full gap-3">
                                    <img src="{{ asset('frontend/images/airpod-pro-black.jpg') }}"
                                        alt="{{ __('AirPod Pro Black') }}"
                                        class="w-full sm:w-32 lg:w-40 h-auto sm:h-40 lg:h-60 object-cover rounded">
                                    <div>
                                        <p class="text-sm lg:text-base font-medium ">
                                            {{ __('Single Breasted Blazer') }}</p>
                                        <p class="text-xs lg:text-sm py-1 lg:py-2">
                                            <span class="text-text-danger">{{ __('$100.00') }}</span>
                                            <span class="line-through ml-1">{{ __('$120.00') }}</span>
                                        </p>
                                        <select id="color-size" name="color-size"
                                            class="block w-full text-sm lg:text-base rounded-full border  py-1 lg:py-2 px-2 lg:px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500">
                                            <option value="" selected>{{ __('Black / S') }}</option>
                                            <option value="black-m">{{ __('Black / M') }}</option>
                                            <option value="black-l">{{ __('Black / L') }}</option>
                                            <option value="blue-s">{{ __('Blue / S') }}</option>
                                            <option value="blue-m">{{ __('Blue / M') }}</option>
                                            <option value="blue-l">{{ __('Blue / L') }}</option>
                                            <option value="blue-xl">{{ __('Blue / XL') }}</option>
                                            <option value="white-s">{{ __('White / S') }}</option>
                                            <option value="white-m">{{ __('White / M') }}</option>
                                            <option value="white-l">{{ __('White / L') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox"
                                    class="mr-3 h-4 w-4 rounded  text-indigo-600 focus:ring-indigo-500">
                                <div class="flex flex-col sm:flex-row items-start w-full gap-3">
                                    <img src="{{ asset('frontend/images/airpod-pro-black.jpg') }}"
                                        alt="{{ __('AirPod Pro Black') }}"
                                        class="w-full sm:w-32 lg:w-40 h-auto sm:h-40 lg:h-60 object-cover rounded">
                                    <div>
                                        <p class="text-sm lg:text-base font-medium ">
                                            {{ __('Single Breasted Blazer') }}</p>
                                        <p class="text-xs lg:text-sm py-1 lg:py-2">
                                            <span class="text-text-danger">{{ __('$100.00') }}</span>
                                            <span class="line-through ml-1">{{ __('$120.00') }}</span>
                                        </p>
                                        <select id="color-size" name="color-size"
                                            class="block w-full text-sm lg:text-base rounded-full border  py-1 lg:py-2 px-2 lg:px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500">
                                            <option value="" selected>{{ __('Black / S') }}</option>
                                            <option value="black-m">{{ __('Black / M') }}</option>
                                            <option value="black-l">{{ __('Black / L') }}</option>
                                            <option value="blue-s">{{ __('Blue / S') }}</option>
                                            <option value="blue-m">{{ __('Blue / M') }}</option>
                                            <option value="blue-l">{{ __('Blue / L') }}</option>
                                            <option value="blue-xl">{{ __('Blue / XL') }}</option>
                                            <option value="white-s">{{ __('White / S') }}</option>
                                            <option value="white-m">{{ __('White / M') }}</option>
                                            <option value="white-l">{{ __('White / L') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4  pt-4">
                            <p class="text-sm font-semibold  pb-2">
                                {{ __('Total price: $100.00 USD $120.00 USD') }}</p>
                            <button class="w-full btn-secondary !px-4 lg:!px-6">{{ __('Add selected to cart') }}</button>
                        </div>
                    </div> --}}
                </div>

            </div>
        </div>
    </section>
    <section class=" dark:bg-bg-darkSecondary py-8 md:py-18 ">
        <div class="container">
            <div class="header pb-6 text-center">
                <h2 class="text-4xl">{{ __('People Also Bought') }}</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-4">
                @php
                    $collections = collect([
                        'id' => 1,
                        'image' => 'frontend/images/phone.png',
                        'title' => 'Galaxy S21 5G 128GB G991U Unlocked Smartphone',
                        'price' => 999.99,
                        'old_price' => 1000.0,
                    ]);
                @endphp

                <x-frontend.product :items="$collections" />
                <x-frontend.product :items="$collections" />
                <x-frontend.product :items="$collections" />
                <x-frontend.product :items="$collections" />

            </div>
        </div>
    </section>
    <section class=" dark:bg-bg-darkSecondary py-8 md:py-18">
        <div class="container">
            <div class="header pb-6 text-center">
                <h2 class="text-4xl">{{ __('Recently Viewed') }}</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-4">
                @php
                    $collections = collect([
                        'id' => 1,
                        'image' => 'frontend/images/phone.png',
                        'title' => 'Galaxy S21 5G 128GB G991U Unlocked Smartphone',
                        'price' => 999.99,
                        'old_price' => 1000.0,
                    ]);
                @endphp

                <x-frontend.product :items="$collections" />
                <x-frontend.product :items="$collections" />
                <x-frontend.product :items="$collections" />
                <x-frontend.product :items="$collections" />

            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Initialize Swipers for Thumbnails and Main Image
        const swiperThumbs = new Swiper(".product_slider_thumbs", {
            direction: 'vertical',
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });

        const swiperMain = new Swiper(".product_slider_image", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiperThumbs,
            },
        });
        //    zoom efact
        const zoomResult = document.getElementById("zoomResult");
        const lens = document.getElementById("lens");

        document.querySelectorAll('.zoomable').forEach(img => {
            img.addEventListener('mousemove', function(e) {
                const rect = img.getBoundingClientRect();
                const wrapperRect = img.closest('.hover-wrapper').getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                const zoomFactor = 2; // 2x zoom
                const resultWidth = zoomResult.offsetWidth;
                const resultHeight = zoomResult.offsetHeight;

                // Set background of zoom result
                zoomResult.style.backgroundImage = `url('${img.src}')`;
                zoomResult.style.backgroundSize =
                    `${rect.width * zoomFactor}px ${rect.height * zoomFactor}px`;
                zoomResult.style.backgroundPosition =
                    `-${x * zoomFactor - resultWidth / 2}px -${y * zoomFactor - resultHeight / 2}px`;

                // Fixed lens size
                lens.style.display = 'block';
                lens.style.width = `100px`;
                lens.style.height = `100px`;
                lens.style.left = `${e.clientX - wrapperRect.left - 50}px`; // 100/2 = 50
                lens.style.top = `${e.clientY - wrapperRect.top - 50}px`;

                // Show zoom result
                zoomResult.style.display = 'block';
            });

            img.addEventListener('mouseenter', function() {
                zoomResult.style.display = 'block';
                lens.style.display = 'block';
            });

            img.addEventListener('mouseleave', function() {
                zoomResult.style.display = 'none';
                lens.style.display = 'none';
                zoomResult.style.backgroundImage = '';
            });
        });
        // increase decrease quantity
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('quantity-input');
            const increaseBtn = document.querySelector('.quantity-increase');
            const decreaseBtn = document.querySelector('.quantity-decrease');

            increaseBtn.addEventListener('click', () => {
                input.value = parseInt(input.value) + 1;
            });

            decreaseBtn.addEventListener('click', () => {
                let value = parseInt(input.value);
                if (value > 1) {
                    input.value = value - 1;
                }
            });
        });
        // sizee change
        document.addEventListener('DOMContentLoaded', () => {
            const sizeButtons = document.querySelectorAll('.size-btn');
            const sizeLabel = document.getElementById('selected-size');

            sizeButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const label = button.getAttribute('data-label');
                    sizeLabel.textContent = `Size: ${label}`;
                });
            });
        });
    </script>
@endpush
