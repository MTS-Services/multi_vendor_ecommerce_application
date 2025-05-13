@extends('frontend.layouts.app', ['page_slug' => 'terms_condition'])

@section('title', 'Terms & Conditions')
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
    </style>
@endpush
@section('content')
    {{-- Breadcrumb --}}
    <section class="pb-15 bg-bg-lightSecondary dark:bg-bg-darkSecondary">
        <div class="container mx-auto px-4 py-4 text-sm">
            <ul class="flex items-center gap-2 ">
                <li>
                    <a href="{{ route('frontend.home') }}"
                        class="text-text-gray hover:text-text-accent">{{ __('Home') }}</a>
                </li>
                <li class="relative bracamb-dot capitalize">
                    <span class="text-text-black dark:text-text-white font-midium">{{ __('Terms & Conditions') }}</span>
                </li>
            </ul>
        </div>

        {{-- Page Title --}}
        <h1 class="text-3xl lg:text-4xl  font-bold text-center my-10">{{ __('Terms & Conditions') }}</h1>
    </section>
    <section class="py-15 bg-bg-gray dark:bg-bg-darkQuaternary">
        <div class="container max-w-[1020px]">
            <div class="flex flex-col gap-10">
                {{-- Conditions 1 --}}
                <div>
                    <h2 class="text-xl lg:text-2xl font-semibold mb-3">{{ __('1. Definitions') }}</h2>
                    <p class="text-sm lg-text-base mb-2"><strong>{{ __('Vendor:') }}
                        </strong>{{ __('A seller who registers on our platform to sell their products.') }}</p>
                    <p class="text-sm lg-text-base mb-2"><strong>{{ __('Customer:') }}</strong>
                        {{ __(' A user who purchases products from vendors listed on our platform.') }}</p>
                    <p class="text-sm lg-text-base mb-2">
                        <strong>{{ __('Platform:') }}</strong>{{ __(' The online website and services provided by [Your Website Name].') }}
                    </p>
                </div>
                {{-- Conditions 2 --}}
                <div>
                    <h2 class="text-xl lg:text-2xl font-semibold mb-3">{{ __('2. Account Registration') }}</h2>
                    <p class="text-sm lg-text-base mb-2">
                        {{ __('All users must register with accurate information.') }}
                    </p>
                    <p class="text-sm lg-text-base mb-2">
                        {{ __('Vendors must provide valid business details and agree to our vendor agreement.') }}</p>
                    <p class="text-sm lg-text-base mb-2">
                        {{ __('Users are responsible for maintaining the confidentiality of their account credentials.') }}
                    </p>
                </div>
                {{-- Conditions 3 --}}
                <div>
                    <h2 class="text-xl lg:text-2xl font-semibold mb-3">{{ __('3. Vendor Responsibilities') }}</h2>
                    <p class="text-sm lg-text-base mb-2">
                        {{ __('Vendors are solely responsible for listing, pricing, fulfilling, and shipping their products.') }}
                    </p>
                    <p class="text-sm lg-text-base mb-2">
                        {{ __('All products must comply with local laws and platform policies.') }}</p>
                    <p class="text-sm lg-text-base mb-2">
                        {{ __('Vendors must handle customer service, returns, and disputes for their products.') }}
                    </p>
                </div>
                {{-- Conditions 4 --}}
                <div>
                    <h2 class="text-xl lg:text-2xl font-semibold mb-3">{{ __('4. Product Listings') }}</h2>
                    <p class="text-sm lg-text-base mb-2">
                        {{ __('All product listings must be accurate and not misleading.') }}
                    </p>
                    <p class="text-sm lg-text-base mb-2">
                        {{ __('Prohibited items (e.g., illegal goods, counterfeit products) are not allowed.') }}</p>
                </div>
                {{-- Conditions 5 --}}
                <div>
                    <h2 class="text-xl lg:text-2xl font-semibold mb-3">{{ __('5. Order Fulfillment') }}</h2>
                    <p class="text-sm lg-text-base mb-2 leading-loose">
                        {{ __("Sellers must process orders on time. In case of any delay or non-delivery of the product, the platform reserves the right to suspend or cancel the account. A fixed commission or service charge is imposed on each sales transaction, which is detailed in the vendor agreement. Sellers are paid to their payment method as per the specified time frame.") }}
                    </p>
                </div>
                {{-- Conditions 6 --}}
                <div>
                    <h2 class="text-xl lg:text-2xl font-semibold mb-3">{{ __('6. Payments and Fees') }}</h2>
                    <p class="text-sm lg-text-base mb-2">
                        {{ __('We charge a commission or service fee on each transaction. The exact percentage is detailed in the Vendor Agreement.') }}
                    </p>
                    <p class="text-sm lg-text-base mb-2">
                        {{ __('Payouts to vendors are made on a scheduled basis via the payment method provided.') }}</p>
                </div>
                {{-- Conditions 7 --}}
                <div>
                    <h2 class="text-xl lg:text-2xl font-semibold mb-3">{{ __('7. Limitation of Liability') }}</h2>
                    <p class="text-sm lg-text-base mb-2">
                        {{ __('Evolon is a marketplace facilitator. We are not responsible for any disputes between vendors and customers.') }}
                    </p>
                    <p class="text-sm lg-text-base mb-2">
                        {{ __('Payouts to vendors are made on a scheduled basis via the payment method provided.') }}</p>
                    <p class="mt-5"><a class=" hover:text-text-danger" href="#">{{ __('support@example.com') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
