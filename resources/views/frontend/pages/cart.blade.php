@extends('frontend.layouts.app', ['page_slug' => 'cart'])

@section('title', 'At to Cart')
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

        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 16px !important;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        {{-- Sidebar --}}
        @include('frontend.includes.cart_sidebar')

        {{-- Breadcrumb --}}
        <div class="container mx-auto px-4 py-4 text-sm">
            <ul class="flex items-center gap-2 ">
                <li>
                    <a href="#" class="text-text-gray hover:text-text-accent">Home</a>
                </li>
                <li class="relative bracamb-dot capitalize">
                    <span class="text-text-black dark:text-text-white font-midium">Cart</span>
                </li>
            </ul>
        </div>

        {{-- Page Title --}}
        <h1 class="text-3xl font-bold text-center mb-10">Shopping Cart</h1>

        {{-- Free Shipping Progress --}}
        <div class="mb-12 flex flex-col items-center justify-center">
            <p class="mb-4">Spend $100 more to get<span class="font-semibold">Free Shipping</span></p>
            <div class="shipping w-[400px]">
                <div class="w-full h-2 bg-bg-accent bg-opacity-30 rounded-full relative mt-5">
                    <span
                        class="absolute left-0 top-[50%] translate-y-[-50%] text-text-white bg-bg-accent w-10 h-10 rounded-full flex items-center justify-center"><i
                            data-lucide="truck" class=""></i></span>
                </div>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-8 mt-5">
            {{-- Cart Items Section --}}
            <div class="lg:w-2/3">
                {{-- Cart Table --}}
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="border-y border-border-light dark:border-opacity-50">
                            <tr>
                                <th class="py-4 text-left font-medium">Product</th>
                                <th class="py-4 text-left font-medium">Price</th>
                                <th class="py-4 text-left font-medium">Quantity</th>
                                <th class="py-4 text-left font-medium w-[12%]">Total</th>
                            </tr>
                        </thead>
                        <tbody id="cart-items">
                            {{-- Cartitems will be inserted here by JavaScript --}}
                        </tbody>
                    </table>
                </div>

                {{-- Gift Wrap Option --}}
                <div class="mt-6">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox h-4 w-4 text-text-gray">
                        <span class="ml-2 text-sm">Add gift wrap. Only $10.00. (You can choose or not)</span>
                    </label>
                </div>

                <!-- Discount Code -->
                <div class="mt-6 flex">
                    <input type="text" placeholder="Discount code"
                        class="border border-border-light dark:bg-bg-light dark:border-opacity-50 focus:outline-primary focus:opacity-50 rounded p-2 text-sm w-full h-12 max-w-xs">
                    <button class="btn-checkout ml-2 rounded-md">Apply</button>
                </div>

                <!-- Special Instructions -->
                <div class="mt-6">
                    <p class="font-medium mb-2">Special Instructions for seller</p>
                    <textarea
                        class="border border-border-light dark:bg-bg-light dark:border-opacity-50 rounded-md focus:outline-primary focus:opacity-50 w-full p-2 h-24 text-sm"></textarea>
                </div>

                <!-- Benefits -->
                <div class="border border-border-light dark:border-opacity-50 rounded-lg mt-6 py-5">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                        <div class="flex flex-col items-center">
                            <div
                                class="w-10 h-10 rounded-full bg-bg-accent dark:bg-bg-white bg-opacity-30 flex items-center justify-center text-text-accent mb-2">
                                <i data-lucide="truck" class="text-md"></i>
                            </div>
                            <span class="text-xs font-medium uppercase">FREE SHIPPING</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div
                                class="w-10 h-10 rounded-full bg-bg-accent dark:bg-bg-white bg-opacity-30 flex items-center justify-center text-text-accent mb-2">
                                <i data-lucide="gift" class="text-md"></i>
                            </div>
                            <span class="text-xs font-medium uppercase">GIFT PACKAGE</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div
                                class="w-10 h-10 rounded-full bg-bg-accent dark:bg-bg-white bg-opacity-30 flex items-center justify-center text-text-accent mb-2">
                                <i data-lucide="refresh-cw" class="text-md"></i>
                            </div>
                            <span class="text-xs font-medium uppercase">FREE RETURNS</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <div
                                class="w-10 h-10 rounded-full bg-bg-accent dark:bg-bg-white bg-opacity-30 flex items-center justify-center text-text-accent mb-2">
                                <i data-lucide="headphones" class="text-md"></i>
                            </div>
                            <span class="text-xs font-medium uppercase">SUPPORT ONLINE</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary Section -->
            <div class="lg:w-1/3">
                <div class="shadow-card p-6 rounded-md dark:bg-bg-darkSecondary">
                    <h2 class="font-medium mb-4">Shipping estimates</h2>

                    <div class="mb-4">
                        <label class="block text-sm mb-1">Country</label>
                        <input type="text" value="United State"
                            class="border border-border-light dark:border-opacity-50 rounded-md p-2 w-full text-sm focus:outline-primary focus:opacity-50">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm mb-1">State/Province</label>
                        <input type="text" placeholder="State/Province"
                            class="border border-border-light dark:border-opacity-50 rounded-md p-2 w-full text-sm focus:outline-primary focus:opacity-50">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm mb-1">Zipcode</label>
                        <input type="text" placeholder="41000"
                            class="border border-border-light dark:border-opacity-50 rounded-md p-2 w-full text-sm focus:outline-primary focus:opacity-50">
                    </div>

                    <button class="btn-checkout w-full">Estimate</button>
                </div>
                <div class="shadow-card p-6 rounded-md mt-5 dark:bg-bg-darkSecondary">
                    <div class="flex justify-between mb-1">
                        <span class="font-medium">Total:</span>
                        <span class="font-medium" id="cart-total">$220.00 USD</span>
                    </div>
                    <p class="text-sm text-text-gray mb-4">Taxes and shipping calculated at checkout</p>

                    <label class="flex items-center mb-4">
                        <input type="checkbox" class="form-checkbox h-4 w-4 text-text-gray">
                        <span class="ml-2 text-sm">I agree with <a href="#" class="underline">term and
                                conditions</a></span>
                    </label>

                    <button class="btn-checkout w-full">Checkout</button>

                    <p class="text-center text-sm text-text-gray my-2">We accept</p>
                    <div class="flex justify-center gap-2">
                        <img src="{{ asset('frontend/icons/visa.png') }}" alt="Visa" class="h-6">
                        <img src="{{ asset('frontend/icons/diners.png') }}" alt="Diners Club" class="h-6">
                        <img src="{{ asset('frontend/icons/mastercard.png') }}" alt="Mastercard" class="h-6">
                        <img src="{{ asset('frontend/icons/stripe.png') }}" alt="Stripe" class="h-6">
                    </div>
                </div>

                <!-- Testimonial -->
                <div
                    class="shadow-card mt-6 bg-gradient-to-br from-bg-accent to-bg-secondary opacity-80 text-text-white p-6 rounded-md">
                    <!-- Slider main container -->
                    <div class="swiper testimonial">
                        <div class="swiper-wrapper relative">
                            <div class="swiper-slide pb-15">
                                <div class="text-3xl mb-2">"</div>
                                <div class="flex mb-2">
                                    <i data-lucide="star" class="text-text-white text-opacity-100"></i>
                                    <i data-lucide="star" class="text-text-white text-opacity-100 ms-1"></i>
                                    <i data-lucide="star" class="text-text-white text-opacity-100 ms-1"></i>
                                    <i data-lucide="star" class="text-text-white text-opacity-100 ms-1"></i>
                                    <i data-lucide="star" class="text-text-white text-opacity-100 ms-1"></i>
                                </div>
                                <p class="text-sm mb-4">Stylish, comfortable, and perfect for any occasion! My new
                                    favorite fashion
                                    destination.</p>
                                <div class="flex items-center">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Customer"
                                        class="w-8 h-8 rounded-full mr-2">
                                    <span class="text-sm font-medium">Vincent P.</span>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-3xl mb-2">"</div>
                                <div class="flex mb-2">
                                    <i data-lucide="star" class="text-text-white text-opacity-100"></i>
                                    <i data-lucide="star" class="text-text-white text-opacity-100 ms-1"></i>
                                    <i data-lucide="star" class="text-text-white text-opacity-100 ms-1"></i>
                                    <i data-lucide="star" class="text-text-white text-opacity-100 ms-1"></i>
                                    <i data-lucide="star" class="text-text-white text-opacity-100 ms-1"></i>
                                </div>
                                <p class="text-sm mb-4">Stylish, comfortable, and perfect for any occasion! My new
                                    favorite fashion
                                    destination.</p>
                                <div class="flex items-center">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Customer"
                                        class="w-8 h-8 rounded-full mr-2">
                                    <span class="text-sm font-medium">Vincent P.</span>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-3xl mb-2">"</div>
                                <div class="flex mb-2">
                                    <i data-lucide="star" class="text-text-white text-opacity-100"></i>
                                    <i data-lucide="star" class="text-text-white text-opacity-100 ms-1"></i>
                                    <i data-lucide="star" class="text-text-white text-opacity-100 ms-1"></i>
                                    <i data-lucide="star" class="text-text-white text-opacity-100 ms-1"></i>
                                    <i data-lucide="star" class="text-text-white text-opacity-100 ms-1"></i>
                                </div>
                                <p class="text-sm mb-4">Stylish, comfortable, and perfect for any occasion! My new
                                    favorite fashion
                                    destination.</p>
                                <div class="flex items-center">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Customer"
                                        class="w-8 h-8 rounded-full mr-2">
                                    <span class="text-sm font-medium">Vincent P.</span>
                                </div>
                            </div>
                        </div>
                        <!-- Navigation buttons -->
                        <div
                            class="swiper-button swiper-button-prev left-0 top-[210px] bg-bg-white shadow-xl w-8 h-8 text-text-black rounded-full font-bold">
                            <i class="ffa-solida-angle-left"></i>
                        </div>

                        <div
                            class="swiper-button swiper-button-next left-15 top-[210px] bg-bg-white shadow-xl w-8 h-8 text-text-black rounded-full font-bold">
                            <i class="text-xlfa-solid fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- You May Also Like Section Start Here --}}
    <div class="container my-[80px]">
        <h2 class="text-center text-3xl capitalize">You may also like</h2>
        @php
            $collections = collect([
                'id' => 1,
                'image' => 'frontend/images/t-shirt.jpg',
                'title' => 'Turtleneck T-Shirt',
                'price' => 100.0,
                'old_price' => 120.0,
            ]);
        @endphp

        <!-- Slider main container -->
        <div class="swiper cart-product mt-10">
            <div class="swiper-wrapper relative">
                <div class="swiper-slide">
                    <x-frontend.product :items="$collections" />
                </div>
                <div class="swiper-slide">
                    <x-frontend.product :items="$collections" />
                </div>
                <div class="swiper-slide">
                    <x-frontend.product :items="$collections" />
                </div>
                <div class="swiper-slide">
                    <x-frontend.product :items="$collections" />
                </div>
                <div class="swiper-slide">
                    <x-frontend.product :items="$collections" />
                </div>
                <div class="swiper-slide">
                    <x-frontend.product :items="$collections" />
                </div>
            </div>
            <!-- Navigation buttons -->
            <div
                class="swiper-button swiper-button-prev bg-bg-accent shadow-xl w-8 h-8 text-text-white rounded-full font-bold">
                <i class=" ffa-solida-angle-left"></i>
            </div>

            <div
                class="swiper-button swiper-button-next bg-bg-accent shadow-xl w-8 h-8 text-text-white rounded-full font-bold">
                <i class="fa-solid fa-angle-right"></i>
            </div>
        </div>
    </div>
    {{-- You May Also Like Section End Here --}}


@endsection

@push('js')
    <script type="module">
        // Cart data
        const cartItems = [{
                id: 1,
                name: 'Turtleneck T-shirt',
                variant: 'White / L',
                price: 100.00,
                quantity: 1,
                image: '{{ asset('frontend/images/demo-image1.avif') }}'
            },
            {
                id: 2,
                name: 'Crop T-shirt',
                variant: 'White / L',
                price: 120.00,
                quantity: 1,
                image: '{{ asset('frontend/images/demo-image1.avif') }}'
            }
        ];

        // Render cart items
        function renderCartItems() {
            const cartItemsContainer = document.getElementById('cart-items');
            cartItemsContainer.innerHTML = '';

            cartItems.forEach(item => {
                const row = document.createElement('tr');
                row.className = 'border-b border-border-light dark:border-opacity-50';
                row.innerHTML = `
                <td class="py-4">
                    <div class="flex items-center">
                        <img src="${item.image}" alt="${item.name}" class="w-20 h-24 object-cover mr-4">
                        <div>
                            <h3 class="font-medium">${item.name}</h3>
                            <p class="text-sm text-text-gray">${item.variant}</p>
                            <button class="text-sm text-text-gray mt-1 remove-item hover:text-text-danger hover:underline transition-all duration-300" data-id="${item.id}">Remove</button>
                        </div>
                    </div>
                </td>
                <td class="py-4">$${item.price.toFixed(2)}</td>
                <td class="py-4">
                    <div class="flex items-center shadow-sm rounded-full w-24 p-1 bg-bg-accent bg-opacity-60 dark:bg-opacity-50 text-text-white">
                        <button class=" px-2 py-1 decrease-quantity" data-id="${item.id}">-</button>
                        <input type="text" value="${item.quantity}" class="w-8 text-center border-x bg-transparent" readonly>
                        <button class="px-2 py-1 increase-quantity" data-id="${item.id}">+</button>
                    </div>
                </td>
                <td class="py-4">$${(item.price * item.quantity).toFixed(2)}</td>
            `;
                cartItemsContainer.appendChild(row);
            });

            // Add event listeners
            document.querySelectorAll('.remove-item').forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = parseInt(this.getAttribute('data-id'));
                    removeItem(itemId);
                });
            });

            document.querySelectorAll('.decrease-quantity').forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = parseInt(this.getAttribute('data-id'));
                    updateQuantity(itemId, -1);
                });
            });

            document.querySelectorAll('.increase-quantity').forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = parseInt(this.getAttribute('data-id'));
                    updateQuantity(itemId, 1);
                });
            });

            updateCartTotal();
        }

        // Remove item from cart
        function removeItem(itemId) {
            const index = cartItems.findIndex(item => item.id === itemId);
            if (index !== -1) {
                cartItems.splice(index, 1);
                renderCartItems();
            }
        }

        // Update item quantity
        function updateQuantity(itemId, change) {
            const item = cartItems.find(item => item.id === itemId);
            if (item) {
                const newQuantity = item.quantity + change;
                if (newQuantity > 0) {
                    item.quantity = newQuantity;
                    renderCartItems();
                }
            }
        }

        // Update cart total
        function updateCartTotal() {
            const total = cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            document.getElementById('cart-total').textContent = `$${total.toFixed(2)} USD`;
        }

        // Initialize cart
        document.addEventListener('DOMContentLoaded', function() {
            renderCartItems();
        });


        // Slider
        import Swiper from '/frontend/js/swiper.min.js';

        $(document).ready(function() {
            const filterOptionSwiper = new Swiper('.testimonial', {
                slidesPerView: '1',
                spaceBetween: 20,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                },
                watchSlidesProgress: true,
            });
        });

        $(document).ready(function() {
            const filterOptionSwiper = new Swiper('.cart-product', {
                slidesPerView: '4',
                spaceBetween: 20,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                },
                watchSlidesProgress: true,
            });
        });

        $(document).ready(function() {
            const $openSidebar = $('.openCartSidebar');
            const $closeSidebar = $('.closeCartSidebar');
            const $sidebar = $('.cartSidebar'); // Select the sidebar element globally

            // Sidebar open functionality
            $openSidebar.on('click', function() {
                $sidebar.css('transform', 'translateX(0)'); // Show the sidebar
                // $(this).addClass('hidden'); // Hide the open button
            });

            $closeSidebar.on('click', function() {
                $sidebar.css('transform', 'translateX(100%)'); // Hide the sidebar
                setTimeout(() => {
                    // $openSidebar.removeClass('hidden'); // Show all openSidebar buttons
                }, 300); // Delay for the sidebar transition
            });
        });
    </script>
@endpush
