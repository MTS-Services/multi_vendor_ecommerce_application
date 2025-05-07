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
            <div class="carousel_section flex md:flex-row flex-col gap-x-4">
                <div class="slider_side flex w-1/2">
                    {{-- Thumbnails --}}
                    <div class="w-1/5 mr-4">
                        <div thumbsSlider="" class="swiper product_slider_thumbs h-full">
                            <div class="swiper-wrapper flex flex-col">
                                @for ($i = 1; $i <= 10; $i++)
                                    <div class="swiper-slide mb-2 cursor-pointer border rounded">
                                        <img src="https://swiperjs.com/demos/images/nature-{{ $i }}.jpg" />
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>

                    {{-- Main Slider with Zoom --}}
                    <div class="w-4/5 relative hover-wrapper">
                        <div class="swiper product_slider_image">
                            <div class="swiper-wrapper">
                                @for ($i = 1; $i <= 10; $i++)
                                    <div class="swiper-slide">
                                        <img class="zoomable"
                                            src="https://swiperjs.com/demos/images/nature-{{ $i }}.jpg" />
                                    </div>
                                @endfor
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>

                        <!-- Zoom Result Box -->
                        <div id="zoomResult"></div>
                        <!-- Zoom Lens -->
                        <div id="lens"></div>
                    </div>
                </div>
                {{-- product details  side --}}
                <div class="product_side w-1/2 mt-6 md:mt-0">
                    <h1 class="text-3xl font-bold mb-2">{{ __('Ice: Small') }}</h1>
                    <div class="flex items-center mb-3">
                        <div class="flex space-x-1 text-text-danger md:py-5 py-2">
                            <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                            <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                            <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                            <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                            <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                        </div>
                        <span class="ml-2 text-gray-600">({{ __('24 reviews') }})</span>
                    </div>

                    <div class="mb-6">
                        <p class="text-2xl font-bold text-gray-900">{{ __('$100.00-$120.00') }}</p>
                        <p class="text-sm">{{ __('Tax included. Shipping calculated at checkout.') }}</p>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-sm font-semibold text-gray-900 mb-2">{{ __('Size') }}</h3>
                        <div class="flex flex-wrap gap-2">
                            <button class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ __('S') }}</button>
                            <button class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ __('M') }}</button>
                            <button class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ __('L') }}</button>
                        </div>
                        <a href="#" class="text-sm mt-2 inline-block">{{ __('Size Guide') }}</a>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-sm font-semibold text-gray-900 mb-2">{{ __('Quantity') }}</h3>
                        <div class="flex">
                            <button class="p-2 border border-gray-300 rounded-l-md">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                </svg>
                            </button>
                            <input type="number" min="1" value="1"
                                class="p-2 w-16 text-center border-t border-b border-gray-300 focus:outline-none focus:ring-0">
                            <button class="p-2 border border-gray-300 rounded-r-md">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="flex flex-col gap-3 mb-6">
                        <button class="w-full py-3 px-4 bg-black text-white font-medium rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">
                            {{ __('Add to cart') }}
                        </button>
                        <button class="w-full py-3 px-4 bg-pink-200 text-pink-600 font-medium rounded-md hover:bg-pink-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                            {{ __('Buy it now') }}
                        </button>
                    </div>

                    <div class="mb-6 flex gap-4">
                        <a href="#" class="text-sm text-gray-600 hover:text-gray-900">{{ __('More payment options') }}</a>
                        <a href="#" class="text-sm text-gray-600 hover:text-gray-900">{{ __('Add to wishlist') }}</a>
                        <a href="#" class="text-sm text-gray-600 hover:text-gray-900">{{ __('Add to Compare') }}</a>
                    </div>

                    <div class="mb-6 !mx-auto text-center">
                        <h3 class="text-sm font-semibold text-gray-900 mb-2">{{ __('Guarantee Safe Checkout:') }}</h3>
                        <div class="flex gap-2 mx-auto">
                            <img src="{{ asset('frontend/images/footer_bank_logos (2).png') }}" alt="{{ __('Vietcombank') }}"
                             class="h-7" />
                            <img src="{{ asset('frontend/images/footer_bank_logos (1).png') }}" alt="{{ __('Eximbank') }}"
                                class="h-7" />
                            <img src="{{ asset('frontend/images/footer_bank_logos (11).png') }}" alt="{{ __('Pay') }}"
                                class="h-7" />
                            <img src="{{ asset('frontend/images/footer_bank_logos (3).png') }}" alt="{{ __('Techcombank') }}"
                                class="h-7" />
                            <img src="{{ asset('frontend/images/footer_bank_logos (4).png') }}" alt="{{ __('Vietinbank') }}"
                                class="h-7" />
                            <img src="{{ asset('frontend/images/footer_bank_logos (5).png') }}" alt="{{ __('BIDV') }}"
                                class="h-7" />
                            <img src="{{ asset('frontend/images/footer_bank_logos (6).png') }}" alt="{{ __('Sacombank') }}"
                                class="h-7" />
                        </div>
                    </div>

                    <div class="mb-6 space-y-2 flex justify-around mx-auto border p-6 rounded-2xl py-6">
                        <!-- Estimated Delivery Time -->
                        <div class="flex items-center border-r pr-14">
                            <div class="text-center">
                                <i data-lucide="car" class="w-7 h-7 mx-auto"></i>
                                <p class="text-base font-medium ">Estimated delivery time: 3-5 days</p>
                                <p class="text-xs text-text-primary/50 dark:text-text-white ">International</p>
                            </div>
                        </div>

                        <!-- Free Shipping -->
                        <div class="flex items-center">
                            <div class="text-center">
                                <i data-lucide="box" class="w-7 h-7 mx-auto"></i>
                                <p class="text-base font-medium ">Free shipping on all orders</p>
                                <p class="text-xs text-text-primary/50 dark:text-text-white ">Over $150</p>
                            </div>
                        </div>
                    </div>

                    {{-- product cart --}}
                    <div class="mt-8 border p-6 rounded-2xl">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('Frequently Bought Together') }}</h3>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <input type="checkbox"
                                    class="mr-3 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <div class="flex items-start w-full gap-3">
                                    <img src="{{ asset('frontend/images/airpod-pro-black.jpg') }}" alt="{{ __('AirPod Pro Black') }}"
                                        class="w-40 h-60 object-cover rounded mr-3">
                                    <div>
                                        <p class="text-base font-medium text-gray-900">{{ __('Single Breasted Blazer') }}</p>
                                        <p class="text-sm py-2">
                                            <span class="text-text-danger">{{ __('$100.00') }}</span>
                                            <span class="line-through ml-1">{{ __('$120.00') }}</span>
                                        </p>
                                        <select id="color-size" name="color-size"
                                            class="block rounded-full border border-gray-300 py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
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
                                    class="mr-3 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <div class="flex items-start w-full gap-3">
                                    <img src="{{ asset('frontend/images/airpod-pro-black.jpg') }}" alt="{{ __('AirPod Pro Black') }}"
                                        class="w-40 h-60 object-cover rounded mr-3">
                                    <div>
                                        <p class="text-base font-medium text-gray-900">{{ __('Single Breasted Blazer') }}</p>
                                        <p class="text-sm py-2">
                                            <span class="text-text-danger">{{ __('$100.00') }}</span>
                                            <span class="line-through ml-1">{{ __('$120.00') }}</span>
                                        </p>
                                        <select id="color-size" name="color-size"
                                            class="block rounded-full border border-gray-300 py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
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
                                    class="mr-3 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <div class="flex items-start w-full gap-3">
                                    <img src="{{ asset('frontend/images/airpod-pro-black.jpg') }}" alt="{{ __('AirPod Pro Black') }}"
                                        class="w-40 h-60 object-cover rounded mr-3">
                                    <div>
                                        <p class="text-base font-medium text-gray-900">{{ __('Single Breasted Blazer') }}</p>
                                        <p class="text-sm py-2">
                                            <span class="text-text-danger">{{ __('$100.00') }}</span>
                                            <span class="line-through ml-1">{{ __('$120.00') }}</span>
                                        </p>
                                        <select id="color-size" name="color-size"
                                            class="block rounded-full border border-gray-300 py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
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
                        <div class="mt-4 border-gray-200 pt-4">
                            <p class="text-sm font-semibold text-gray-900 pb-2">{{ __('Total price: $100.00 USD $120.00 USD') }}</p>
                            <button class="btn-fill btn-primary !px-6">{{ __('Add selected to cart') }}</button>
                        </div>
                    </div>
                </div>

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
    </script>
@endpush
