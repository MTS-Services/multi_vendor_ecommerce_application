@extends('frontend.layouts.app', ['page_slug' => 'checkout'])

@section('title', 'Checkout')

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

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .form-input {
            @apply w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-200;
        }

        .payment-option flex justify-center items-center gap-2 border border-border-light dark:bg-bg-darkTertiary dark:border-opacity-30 focus:outline-primary focus:opacity-50 rounded p-2 text-sm w-full h-12 {
            @apply flex items-start gap-2 p-4 border-b border-border-light dark:border-opacity-30;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            #check-preview,
            #check-preview * {
                visibility: visible;
            }

            #check-preview {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
        }

        .check-border {
            background-image: url("data:image/svg+xml,%3Csvg width='6' height='6' viewBox='0 0 6 6' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%239C92AC' fill-opacity='0.1' fill-rule='evenodd'%3E%3Cpath d='M5 0h1L0 5v1H5V0zm1 5v1H5v-1h1z'/%3E%3C/g%3E%3C/svg%3E");
        }

        .micr {
            font-family: Courier, monospace;
            letter-spacing: 0.2em;
        }

        .signature {
            font-family: 'Brush Script MT', cursive;
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
                <span class="font-midium">Checkout</span>
            </li>
        </ul>
    </div>

    <!-- Header -->
    <div class="container mx-auto px-4 py-8 text-center">
        <div class="flex flex-col items-center justify-center">
            <h1 class="text-3xl font-semibold">Checkout</h1>
        </div>
    </div>
    {{-- Main Content Start Here --}}
    <div class="container">
        <div class="flex flex-col lg:flex-row gap-8 mt-10 relative">
            <!-- Left Column - Checkout Form -->
            <div class="lg:w-2/3 bg-bg-white p-6 shadow-card rounded-lg dark:bg-bg-darkSecondary">
                <h2 class="text-xl font-medium mb-6">Checkout</h2>
                <form id="checkout-form">
                    <!-- Personal Information -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
                        <div>
                            <input type="text" placeholder="First name"
                                class="input h-12">
                        </div>
                        <div>
                            <input type="text" placeholder="Last name"
                                class="input h-12">
                        </div>
                    </div>

                    <div class="mb-4">
                        <select
                            class="input h-12">
                            <option value="" disabled selected>Country</option>
                            <option value="us">United States</option>
                            <option value="ca">Canada</option>
                            <option value="uk">United Kingdom</option>
                            <option value="au">Australia</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <input type="text" placeholder="Address"
                            class="input h-12">
                    </div>

                    <div class="mb-4">
                        <input type="text" placeholder="Apartment, suite, etc (optional)"
                            class="input h-12">
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-6">
                        <div>
                            <input type="text" placeholder="City"
                                class="input h-12">
                        </div>
                        <div>
                            <select
                                class="input h-12">
                                <option value="" disabled selected>State</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <!-- More states would go here -->
                            </select>
                        </div>
                        <div>
                            <input type="text" placeholder="Zipcode/Postal"
                                class="input h-12">
                        </div>
                    </div>

                    <div class="mb-8">
                        <input type="tel" placeholder="Phone"
                            class="input h-12">
                    </div>

                    <!-- Contact Information -->
                    <div class="flex justify-between items-center mb-4 mt-5">
                        <h2 class="text-xl font-medium">Contact Information</h2>
                        <a href="#" class="text-sm text-text-accent hover:underline">Log in</a>
                    </div>

                    <div class="mb-8">
                        <input type="email" placeholder="Email or phone number"
                            class="input h-12">
                    </div>

                    <!-- Shipping Method -->
                    <h2 class="text-xl font-medium mb-4">Shipping Method</h2>
                    <div class="space-y-4 mb-8">
                        <div
                            class="payment-option flex justify-center items-center gap-2 border border-border-light  dark:bg-bg-darkTertiary dark:border-opacity-30 focus:outline-primary focus:opacity-50 rounded p-2 text-sm w-full h-15">
                            <input type="radio" id="free-shipping" name="shipping" class="w-4">
                            <label for="free-shipping" class="w-full">
                                <div class="flex justify-between">
                                    <span>Free Shipping (Estimate in 7/10 - 10/10/2025)</span>
                                    <span class="font-medium">$0.00</span>
                                </div>
                            </label>
                        </div>
                        <div
                            class="payment-option flex justify-center items-center gap-2 border border-border-light  dark:bg-bg-darkTertiary dark:border-opacity-30 focus:outline-primary focus:opacity-50 rounded p-2 text-sm w-full h-15">
                            <input type="radio" id="express-shipping" name="shipping" class="w-4">
                            <label for="express-shipping" class="w-full">
                                <div class="flex justify-between">
                                    <span>Express Shipping (Estimate in 4/10 - 5/10/2025)</span>
                                    <span class="font-medium">$10.00</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Payment -->
                    <h2 class="text-xl font-medium mb-2">Payment</h2>
                    <p class="text-sm text-text-light mb-4">All transactions are secure and encrypted.</p>

                    <div class="space-y-4 mb-8">
                        <!-- Bank Transfer -->
                        <div
                            class="payment-option flex justify-center items-center gap-2 border border-border-light  dark:bg-bg-darkTertiary dark:border-opacity-30 focus:outline-primary focus:opacity-50 rounded p-2 text-sm w-full h-12">
                            <input type="radio" id="bank-transfer" name="payment" class="w-4">
                            <label for="bank-transfer" class="w-full">
                                <div>Direct bank transfer</div>
                            </label>
                        </div>
                        <div
                            class="bg-bg-white dark:bg-bg-darkTertiary bg-opacity-80 text-text-primary dark:text-text-white p-4 text-sm ">
                            Make your payment directly into our bank account. Please use your Order ID as the payment
                            reference. Your order will not be shipped until the funds have cleared in our account.
                        </div>

                        <!-- Check Payment - NEW OPTION -->
                        <div
                            class="payment-option flex justify-center items-center gap-2 border border-border-light  dark:bg-bg-darkTertiary dark:border-opacity-30 focus:outline-primary focus:opacity-50 rounded p-2 text-sm w-full h-12">
                            <input type="radio" id="check-payment" name="payment" class="w-4">
                            <label for="check-payment" class="w-full">
                                <div>Pay by check</div>
                            </label>
                        </div>
                        <div id="check-payment-info" class="hidden bg-bg-white dark:bg-bg-darkTertiary bg-opacity-80 p-4">
                            <p class="text-sm text-text-light mb-4">
                                Make your check payable to "Your Company Name" and include your Order ID in the memo line.
                                Your order will be processed once we receive your check.
                            </p>
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-sm font-medium">Mail your check to:</span>
                                <button id="preview-check"
                                    class="btn-primary rounded-md h-10 text-sm font-medium">
                                    Preview Check
                                </button>
                            </div>
                            <div
                                class="bg-bg-white dark:bg-bg-darkTertiary p-3 border border-border-light dark:border-opacity-30 rounded text-sm">
                                <p class="font-medium">Your Company Name</p>
                                <p>Attn: Payment Processing</p>
                                <p>123 Business Avenue</p>
                                <p>Commerce City, CC 12345</p>
                            </div>

                            <!-- Check Preview Modal (hidden by default) -->
                            <div id="check-modal"
                                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                                <div
                                    class="bg-bg-white dar rounded-lg shadow-xl max-w-4xl w-full max-h-screen overflow-y-auto p-6">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-xl font-bold">Check Preview</h3>
                                        <button id="close-check-modal" class="text-text-light hover:text-text-primary">
                                            <i data-lucide="x" class="text-md"></i>
                                        </button>
                                    </div>

                                    <!-- Check Preview -->
                                    <div id="check-preview"
                                        class="bg-bg-white border border-border-light dark:border-opacity-30 rounded-lg overflow-hidden check-border">
                                        <!-- Check Header -->
                                        <div class="flex justify-between p-6 border-b border-border-light dark:border-opacity-30">
                                            <div>
                                                <h1 class="text-2xl font-bold text-text-tertiary">YOUR BANK NAME</h1>
                                                <p class="text-sm text-text-light">123 Financial Street, Banking City, BC
                                                    12345</p>
                                            </div>
                                            <div class="text-right">
                                                <div class="inline-block border border-gray-300 rounded px-3 py-1 mb-2">
                                                    <span class="text-sm text-text-light">CHECK NO.</span>
                                                    <span class="block text-lg font-semibold dark:text-text-primary">1001</span>
                                                </div>
                                                <div class="text-sm text-text-light">
                                                    <span>DATE: </span>
                                                    <span class="font-medium dark:text-text-primary" id="check-date">May 8, 2025</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Check Body -->
                                        <div class="p-6">
                                            <!-- Pay To Line -->
                                            <div class="flex mb-6">
                                                <div class="w-24 text-text-light text-sm">PAY TO THE<br>ORDER OF</div>
                                                <div class="flex-1 border-b-2 border-border-light relative">
                                                    <span class="absolute bottom-1 text-lg font-medium dark:text-text-primary">Your Company
                                                        Name</span>
                                                </div>
                                                <div
                                                    class="w-32 flex items-center justify-center border-2 border-border-light ml-4 h-10">
                                                    <span class="text-lg font-bold dark:text-text-primary" id="check-amount">$610.00</span>
                                                </div>
                                            </div>

                                            <!-- Amount In Words -->
                                            <div class="flex mb-8">
                                                <div class="flex-1 border-b-2 border-border-light relative">
                                                    <span class="absolute bottom-1 text-md dark:text-text-primary">Six Hundred Ten Dollars and
                                                        00/100</span>
                                                </div>
                                                <div class="w-32 ml-4">
                                                    <span class="text-sm text-text-light dark:text-text-primary">DOLLARS</span>
                                                </div>
                                            </div>

                                            <!-- Memo and Signature -->
                                            <div class="flex mt-12">
                                                <div class="w-1/2">
                                                    <div class="border-b-2 border-border-light pb-1 w-3/4">
                                                        <span class="text-sm text-text-light">MEMO</span>
                                                        <span class="block dark:text-text-primary" id="check-memo">Order #12345</span>
                                                    </div>
                                                </div>
                                                <div class="w-1/2 text-right">
                                                    <div class="border-b-2 border-border-light pb-1 inline-block w-3/4">
                                                        <span class="signature text-xl dark:text-text-primary">Your Signature</span>
                                                    </div>
                                                    <div class="text-sm text-text-light mt-1">AUTHORIZED SIGNATURE</div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- MICR Line -->
                                        <div class="bg-bg-white border-t border-border-light dark:border-opacity-30 p-4">
                                            <div class="micr text-lg text-center dark:text-text-primary">
                                                ⑆123456789⑆ ⑈987654321⑈ 1001
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-6 flex justify-end">
                                        <button id="print-check"
                                            class="btn-primary flex justify-center items-center gap-2 rounded-md">
                                            <i data-lucide="printer" class="w-4 h-4"></i> Print Check
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cash on Delivery -->
                        <div
                            class="payment-option flex justify-center items-center gap-2 border border-border-light  dark:bg-bg-darkTertiary dark:border-opacity-30 focus:outline-primary focus:opacity-50 rounded p-2 text-sm w-full h-12">
                            <input type="radio" id="cash-delivery" name="payment" class="w-4">
                            <label for="cash-delivery" class="w-full">
                                <div>Cash on delivery</div>
                            </label>
                        </div>

                        <!-- Credit Card -->
                        <div
                            class="payment-option flex justify-center items-center gap-2 border border-border-light  dark:bg-bg-darkTertiary dark:border-opacity-30 focus:outline-primary focus:opacity-50 rounded p-2 text-sm w-full h-12">
                            <input type="radio" id="credit-card" name="payment" class="w-4">
                            <label for="credit-card" class="w-full">
                                <div class="flex justify-between">
                                    <span>Credit Card</span>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg"
                                        alt="Visa" class="h-6">
                                </div>
                            </label>
                        </div>
                        <div id="credit-card-form"
                            class="hidden bg-bg-white bg-opacity-80 dark:bg-transparent p-4 space-y-4">
                            <div>
                                <input type="text" placeholder="Card number"
                                    class="input h-12"
                                    id="card-number">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <input type="text" placeholder="Expiration date (MM/YY)"
                                    class="input h-12"
                                    id="expiry-date">
                                <input type="text" placeholder="Security code"
                                    class="input h-12"
                                    id="security-code">
                            </div>
                            <div>
                                <input type="text" placeholder="Name on card"
                                    class="input h-12"
                                    id="name-on-card">
                            </div>
                            <div class="flex items-center gap-2">
                                <input type="checkbox" id="billing-same" class="h-4 w-4">
                                <label for="billing-same" class="text-sm">Use shipping address as billing address</label>
                            </div>
                        </div>

                        <!-- PayPal -->
                        <div
                            class="payment-option flex justify-center items-center gap-2 border border-border-light  dark:bg-bg-darkTertiary dark:border-opacity-30 focus:outline-primary focus:opacity-50 rounded p-2 text-sm w-full h-12">
                            <input type="radio" id="paypal" name="payment" class="w-4">
                            <label for="paypal" class="w-full">
                                <div class="flex justify-between">
                                    <span>PayPal</span>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg"
                                        alt="PayPal" class="h-6">
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Privacy Policy -->
                    <p class="text-sm text-text-light mb-8">
                        Your personal data will be used to process your order, support your experience throughout this
                        website, and for other purposes described in our
                        <a href="#" class="text-text-accent hover:underline">privacy policy</a>.
                    </p>
                </form>
            </div>

            <!-- Right Column - Order Summary -->
            <div class="lg:w-1/3">
                <div class="sticky top-32 bg-bg-white p-6 shadow-card dark:bg-bg-darkSecondary rounded-lg">
                    <h2 class="text-lg font-semibold mb-6">In your cart</h2>

                    <!-- Cart Items -->
                    <div class="space-y-6 mb-6">
                        <!-- Item 1 -->
                        <div class="flex gap-4 shadow-card dark:bg-bg-darkTertiary rounded-md p-4">
                            <div class="relative">
                                <img src="{{ asset('frontend/images/phone.png') }}" alt="Short Sleeve Sweat"
                                    class="w-16 h-20 object-contain rounded">
                                <span
                                    class="absolute -top-2 -right-2 bg-bg-accent text-text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">1</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-medium">Short Sleeve Sweat</h3>
                                <p class="text-sm text-text-light mt-2">White / L</p>
                            </div>
                            <div class="text-right">
                                <p class="font-medium">$80.00</p>
                            </div>
                        </div>

                        <!-- Item 2 -->
                        <div class="flex gap-4 shadow-card dark:bg-bg-darkTertiary rounded-md p-4">
                            <div class="relative">
                                <img src="{{ asset('frontend/images/phone.png') }}" alt="Short Sleeve Sweat"
                                    class="w-16 h-20 object-contain rounded">
                                <span
                                    class="absolute -top-2 -right-2 bg-bg-accent text-text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">1</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-medium">Crop T-shirt</h3>
                                <p class="text-sm text-text-light">White / L</p>
                            </div>
                            <div class="text-right">
                                <p class="font-medium">$120.00</p>
                            </div>
                        </div>

                        <!-- Item 3 -->
                        <div class="flex gap-4 shadow-card dark:bg-bg-darkTertiary rounded-md p-4">
                            <div class="relative">
                                <img src="{{ asset('frontend/images/phone.png') }}" alt="Short Sleeve Sweat"
                                    class="w-16 h-20 object-contain rounded">
                                <span
                                    class="absolute -top-2 -right-2 bg-bg-accent text-text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">1</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-medium">Loose Fit Tee</h3>
                                <p class="text-sm text-text-light">White / L</p>
                            </div>
                            <div class="text-right">
                                <p class="font-medium">$390.00</p>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="border-t border-border-light dark:border-opacity-30 pt-4 space-y-2">
                        <div class="flex justify-between">
                            <span>Subtotal:</span>
                            <span class="font-medium">$590.00 USD</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Discount:</span>
                            <span class="font-medium">-$10 USD</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Shipping:</span>
                            <span class="font-medium">$10.00 USD</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Tax:</span>
                            <span class="font-medium">$10.00 USD</span>
                        </div>
                    </div>

                    <div class="border-t border-border-light dark:border-opacity-30 mt-4 pt-4">
                        <div class="flex justify-between text-lg font-medium">
                            <span>Subtotal:</span>
                            <span>$610.00 USD</span>
                        </div>
                    </div>

                    <!-- Place Order Button -->
                    <button type="submit" form="checkout-form" class="btn-primary mt-6 w-full">
                        Place Order
                    </button>
                </div>
            </div>

        </div>
    </div>
    </div>
    {{-- Main Content End Here --}}
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            // Toggle payment method forms
            $('input[name="payment"]').change(function() {
                // Hide all payment forms first
                $('#credit-card-form').addClass('hidden');
                $('#check-payment-info').addClass('hidden');

                // Show the selected payment form
                if ($('#credit-card').is(':checked')) {
                    $('#credit-card-form').removeClass('hidden');
                } else if ($('#check-payment').is(':checked')) {
                    $('#check-payment-info').removeClass('hidden');
                }
            });

            // Check preview modal
            $('#preview-check').click(function() {
                $('#check-modal').removeClass('hidden');
                // Update check date to current date
                const today = new Date();
                const options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                $('#check-date').text(today.toLocaleDateString('en-US', options));

                // Update check amount to match order total
                $('#check-amount').text('$610.00');

                // Update check memo with order number
                $('#check-memo').text('Order #' + Math.floor(10000 + Math.random() * 90000));
            });

            $('#close-check-modal').click(function() {
                $('#check-modal').addClass('hidden');
            });

            $('#print-check').click(function() {
                window.print();
            });

            // Form validation
            $('#checkout-form').submit(function(e) {
                e.preventDefault();

                // Basic validation
                let isValid = true;
                $(this).find('input[required], select[required]').each(function() {
                    if ($(this).val() === '') {
                        $(this).addClass('border-red-500');
                        isValid = false;
                    } else {
                        $(this).removeClass('border-red-500');
                    }
                });

                // Credit card validation if selected
                if ($('#credit-card').is(':checked')) {
                    const cardFields = ['#card-number', '#expiry-date', '#security-code', '#name-on-card'];
                    cardFields.forEach(field => {
                        if ($(field).val() === '') {
                            $(field).addClass('border-red-500');
                            isValid = false;
                        } else {
                            $(field).removeClass('border-red-500');
                        }
                    });
                }

                if (isValid) {
                    // Simulate order placement
                    alert('Order placed successfully!');
                    // In a real application, you would submit the form data to your server here
                } else {
                    alert('Please fill in all fields');
                }
            });

            // Update shipping cost when shipping method changes
            $('input[name="shipping"]').change(function() {
                updateOrderSummary();
            });

            function updateOrderSummary() {
                const subtotal = 590;
                const discount = 10;
                let shipping = $('#express-shipping').is(':checked') ? 10 : 0;
                const tax = 10;

                const total = subtotal - discount + shipping + tax;

                // Update the shipping cost display
                $('.flex.justify-between:contains("Shipping:")').find('span:last').text('$' + shipping.toFixed(2) +
                    ' USD');

                // Update the total
                $('.flex.justify-between.text-lg.font-medium span:last').text('$' + total.toFixed(2) + ' USD');
            }
        });
    </script>
@endpush
