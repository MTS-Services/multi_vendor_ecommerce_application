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

        .active span {
            background-color: black !important;
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

        .slider-range {
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
        {{-- Filters --}}
        {{-- <details class="dropdown">
            <summary class="btn rounded-full bg-bg-transparent border border-bg-accent text-text-accent">Sort By (Default) <i data-lucide="chevron-down"></i></summary>
            <ul class="menu dropdown-content bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                <li><a class="font-normal" href="#">Sort By (Default)</a></li>
                <li><a class="font-normal" href="#">Title Ascending</a></li>
                <li><a class="font-normal" href="#">Title Descending</a></li>
                <li><a class="font-normal" href="#">Price Ascending</a></li>
                <li><a class="font-normal" href="#">Price Descending</a></li>
            </ul>
          </details>
        <div class="mt-5 mb-10">
            <span class=" me-3"><strong>Filter:</strong></span>
            <div class="inline-flex gap-2 justify-start items-center py-2 px-6 text-text-accent bg-transparent border border-bg-accent rounded-full font-medium transition-all duration-300 relative overflow-hidden mb-5">
                <a href="#">Abilability</a>
                <span class="inline-block"><i data-lucide="chevron-down"></i></span>
            </div>
            <div class="inline-flex gap-2 justify-start items-center py-2 px-6 text-text-accent bg-transparent border border-bg-accent rounded-full font-medium transition-all duration-300 relative overflow-hidden mb-5">
                <a href="#">Color</a>
                <span class="inline-block"><i data-lucide="chevron-down"></i></span>
            </div>
            <div class="inline-flex gap-2 justify-start items-center py-2 px-6 text-text-accent bg-transparent border border-bg-accent rounded-full font-medium transition-all duration-300 relative overflow-hidden mb-5">
                <a href="#">Size</a>
                <span class="inline-block"><i data-lucide="chevron-down"></i></span>
            </div>
        </div> --}}


        <div class="flex gap-5">
            {{-- Sidebar Start Here --}}
            <div class="w-[20%]">
                <details class="collapse collapse-arrow" open>
                    <summary class="collapse-title font-semibold ">
                        <span>Collections</span>
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
                <div class="border-t border-gray"></div>
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
                <div class="border-t border-gray"></div>
                {{-- Price --}}
                <!-- Price header with dropdown arrow -->
                <details class="collapse collapse-arrow" open>
                    <summary class="collapse-title font-semibold">Price</summary>
                    <div class="collapse-content">
                        <div class="mb-4">
                            <div class="price-slider h-6 mt-8 mb-4">
                                <div class="slider-track"></div>
                                <div class="slider-range" id="slider-range"></div>
                                <input type="range" id="min-range" min="0" max="500" value="20"
                                    class="absolute">
                                <input type="range" id="max-range" min="0" max="500" value="300"
                                    class="absolute">
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
                <div class="border-t border-gray"></div>
                {{-- <div class="mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-medium">Price</h3>
                        <i class="fa-solid fa-chevron-up text-xs"></i>
                    </div>
                    <div class="px-1">
                        <div class="h-1 bg-gray-200 rounded-full mb-4 relative">
                            <div class="absolute h-1 bg-gray-400 rounded-full left-1/4 right-1/4"></div>
                            <div class="absolute w-3 h-3 bg-white border border-gray-400 rounded-full -mt-1 left-1/4"></div>
                            <div class="absolute w-3 h-3 bg-white border border-gray-400 rounded-full -mt-1 right-1/4">
                            </div>
                        </div>
                        <div class="flex justify-between text-sm text-text-gray">
                            <span>Price: $50 — $150</span>
                        </div>
                    </div>
                </div> --}}

                {{-- Color --}}
                <details class="collapse collapse-arrow" open>
                    <summary class="collapse-title font-semibold ">Color</summary>
                    <div class="collapse-content text-sm">
                        <div class="grid grid-cols-5 gap-2 mb-2 pe-5">
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
                <div class="border-t border-gray"></div>

                {{-- Size --}}
                <details class="collapse collapse-arrow" open>
                    <summary class="collapse-title font-semibold ">Size</summary>
                    <div class="collapse-content text-sm">
                        <div class="flex flex-wrap gap-2 mb-4">
                            <div class="px-3 py-1 border border-gray-200 rounded text-sm">XS (20)</div>
                            <div class="px-3 py-1 border border-gray-200 rounded text-sm">S (8)</div>
                            <div class="px-3 py-1 border border-gray-200 rounded text-sm">L (20)</div>
                            <div class="px-3 py-1 border border-gray-200 rounded text-sm">M (20)</div>
                            <div class="px-3 py-1 border border-gray-200 rounded text-sm">XL (20)</div>
                        </div>
                    </div>
                </details>
                <!-- Divider -->
                <div class="border-t border-gray"></div>
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
                <div class="border-t border-gray"></div>
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
                                <img src="{{ asset('frontend/images/on-sale.jpg') }}" alt="Loose Fit Tee"
                                    class="img-fluid">
                            </div>
                            <div>
                                <h4 class="text-base font-medium">Loose Fit Tee</h4>
                                <div class="flex gap-2 items-center mt-1">
                                    <span class="text-sm font-medium text-text-danger font-medium">$130.00</span>
                                </div>
                                <p class="text-sm text-text-gray mt-1">3 color available</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Divider -->
                <div class="border-t border-gray"></div>
                {{-- Elavate --}}
                <div class="relative mt-3 rounded-md overflow-hidden">
                    <div class="hover:scale-110 transition-all duration-500">
                        <img src="{{ asset('frontend/images/sb-banner.jpg') }}" alt="Elevate">
                    </div>
                    <div
                        class="flex flex-col justify-center items-center p-10 absolute bottom-0 left-0 w-full text-center">
                        <h3 class="font-medium mb-4 capitalize text-4xl text-text-white z-10">Elevate your style</h3>
                        <button class="btn-primary">Shop Now</button>
                    </div>
                </div>

            </div>
            {{-- Sidebar Section End Here --}}

            {{-- Shop Card Section Start Here --}}
            <div class="w-[80%]">
                <div class="flex items-center justify-between">
                    <div class="w-full">
                        <details class="dropdown">
                            <summary class="btn rounded-full bg-bg-transparent border border-bg-accent text-text-accent">
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
                            <div
                                class="flex flex-col justify-center items-center gap-1 group hover:bg-opacity-100 active:hover:bg-opacity-100">
                                <span
                                    class="w-5 h-[2px] bg-bg-dark bg-opacity-30 group-hover:bg-opacity-100 inline-block transition-all duration-500"></span>
                                <span
                                    class="w-5 h-[2px] bg-bg-dark bg-opacity-30 group-hover:bg-opacity-100 inline-block transition-all duration-500"></span>
                            </div>
                            <div class="flex justify-center group hover:bg-opacity-100 items-center gap-1">
                                <span
                                    class="w-[2px] h-5 bg-bg-dark bg-opacity-30 group-hover:bg-opacity-100 inline-block transition-all duration-500"></span>
                                <span
                                    class="w-[2px] h-5 bg-bg-dark bg-opacity-30 group-hover:bg-opacity-100 inline-block transition-all duration-500"></span>
                            </div>
                            <div class="flex justify-center group hover:bg-opacity-100 items-center gap-1">
                                <span
                                    class="w-[2px] h-5 bg-bg-dark bg-opacity-30 group-hover:bg-opacity-100 inline-block transition-all duration-500"></span>
                                <span
                                    class="w-[2px] h-5 bg-bg-dark bg-opacity-30 group-hover:bg-opacity-100 inline-block transition-all duration-500"></span>
                                <span
                                    class="w-[2px] h-5 bg-bg-dark bg-opacity-30 group-hover:bg-opacity-100 inline-block transition-all duration-500"></span>
                            </div>
                            <div class="flex justify-center group hover:bg-opacity-100 items-center gap-1 active">
                                <span
                                    class="w-[2px] h-5 bg-bg-dark bg-opacity-30 group-hover:bg-opacity-100 inline-block transition-all duration-500"></span>
                                <span
                                    class="w-[2px] h-5 bg-bg-dark bg-opacity-30 group-hover:bg-opacity-100 inline-block transition-all duration-500"></span>
                                <span
                                    class="w-[2px] h-5 bg-bg-dark bg-opacity-30 group-hover:bg-opacity-100 inline-block transition-all duration-500"></span>
                                <span
                                    class="w-[2px] h-5 bg-bg-dark bg-opacity-30 group-hover:bg-opacity-100 inline-block transition-all duration-500"></span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-5">

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
    <div class="border-t mt-16">
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.getElementById('price-slider');
            const selectedRange = document.getElementById('selected-range');
            const minHandle = document.getElementById('min-handle');
            const maxHandle = document.getElementById('max-handle');
            const minPrice = document.getElementById('min-price');
            const maxPrice = document.getElementById('max-price');

            const minValue = 0;
            const maxValue = 1000;
            let currentMinValue = 20;
            let currentMaxValue = 300;

            // Initialize slider positions
            updateSlider();

            // Handle dragging functionality
            let isDragging = false;
            let currentHandle = null;

            function updateSlider() {
                const sliderWidth = slider.offsetWidth;
                const minPosition = ((currentMinValue - minValue) / (maxValue - minValue)) * 100;
                const maxPosition = ((currentMaxValue - minValue) / (maxValue - minValue)) * 100;

                minHandle.style.left = `${minPosition}%`;
                maxHandle.style.left = `${maxPosition}%`;
                selectedRange.style.left = `${minPosition}%`;
                selectedRange.style.width = `${maxPosition - minPosition}%`;

                minPrice.textContent = `$${currentMinValue}`;
                maxPrice.textContent = `$${currentMaxValue}`;
            }

            function startDrag(e, handle) {
                isDragging = true;
                currentHandle = handle;
                document.addEventListener('mousemove', onDrag);
                document.addEventListener('mouseup', stopDrag);
                document.addEventListener('touchmove', onDrag);
                document.addEventListener('touchend', stopDrag);
            }

            function onDrag(e) {
                if (!isDragging) return;

                const sliderRect = slider.getBoundingClientRect();
                const sliderWidth = sliderRect.width;

                // Get position (handle mouse or touch events)
                let clientX;
                if (e.type === 'touchmove') {
                    clientX = e.touches[0].clientX;
                } else {
                    clientX = e.clientX;
                }

                let position = (clientX - sliderRect.left) / sliderWidth;
                position = Math.max(0, Math.min(1, position));

                const value = Math.round(minValue + position * (maxValue - minValue));

                if (currentHandle === minHandle) {
                    currentMinValue = Math.min(value, currentMaxValue - 10);
                } else {
                    currentMaxValue = Math.max(value, currentMinValue + 10);
                }

                updateSlider();
            }

            function stopDrag() {
                isDragging = false;
                document.removeEventListener('mousemove', onDrag);
                document.removeEventListener('mouseup', stopDrag);
                document.removeEventListener('touchmove', onDrag);
                document.removeEventListener('touchend', stopDrag);
            }

            // Add event listeners
            minHandle.addEventListener('mousedown', (e) => startDrag(e, minHandle));
            maxHandle.addEventListener('mousedown', (e) => startDrag(e, maxHandle));
            minHandle.addEventListener('touchstart', (e) => startDrag(e, minHandle));
            maxHandle.addEventListener('touchstart', (e) => startDrag(e, maxHandle));

            //Checkbox event
            const checkboxs1 = document.querySelectorAll('.availability-checkbox');
            checkboxs1.forEach(checkbox1 => {
                checkbox1.addEventListener('change', () => {
                    if (checkbox1.checked) {
                        checkboxs1.forEach(cb => {
                            if (cb !== checkbox1) cb.checked = false;
                        });
                    }
                });
            });
            const checkboxs2 = document.querySelectorAll('.brand-checkbox');
            checkboxs2.forEach(checkbox2 => {
                checkbox2.addEventListener('change', () => {
                    if (checkbox2.checked) {
                        checkboxs2.forEach(cb => {
                            if (cb !== checkbox2) cb.checked = false;
                        });
                    }
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const minRange = document.getElementById('min-range');
            const maxRange = document.getElementById('max-range');
            const sliderRange = document.getElementById('slider-range');
            const minPrice = document.getElementById('min-price');
            const maxPrice = document.getElementById('max-price');

            // Update the slider
            function updateSlider() {
                // Calculate percentage positions
                const minPercent = (minRange.value / minRange.max) * 100;
                const maxPercent = (maxRange.value / maxRange.max) * 100;

                // Update the colored range
                sliderRange.style.left = minPercent + '%';
                sliderRange.style.width = (maxPercent - minPercent) + '%';

                // Update price display
                minPrice.textContent = '$' + minRange.value;
                maxPrice.textContent = '$' + maxRange.value;
            }

            // Set initial positions
            updateSlider();

            // Add event listeners
            minRange.addEventListener('input', function() {
                // Prevent min from exceeding max
                if (parseInt(minRange.value) > parseInt(maxRange.value) - 10) {
                    minRange.value = parseInt(maxRange.value) - 10;
                }
                updateSlider();
            });

            maxRange.addEventListener('input', function() {
                // Prevent max from being less than min
                if (parseInt(maxRange.value) < parseInt(minRange.value) + 10) {
                    maxRange.value = parseInt(minRange.value) + 10;
                }
                updateSlider();
            });
        });
    </script>
@endpush
