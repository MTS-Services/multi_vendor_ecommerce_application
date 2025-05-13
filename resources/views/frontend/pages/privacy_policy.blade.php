@extends('frontend.layouts.app', ['page_slug' => 'privacy_policy'])

@section('title', 'Privacy Policy')
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
                    <a href="{{ route('frontend.home')}}" class="text-text-gray hover:text-text-accent">{{ __('Home') }}</a>
                </li>
                <li class="relative bracamb-dot capitalize">
                    <span class="text-text-black dark:text-text-white font-midium">{{ __('Privacy Policy') }}</span>
                </li>
            </ul>
        </div>

        {{-- Page Title --}}
        <h1 class="text-3xl lg:text-4xl  font-bold text-center my-10">{{ __('Privacy Policy') }}</h1>
    </section>
    <section class="py-15 bg-bg-gray dark:bg-bg-darkQuaternary">
        <div class="container max-w-[1020px]">
            <div class="flex flex-col gap-10">
                {{-- Conditions 1 --}}
                <div>
                    <h2 class="text-xl lg:text-2xl font-semibold mb-3">{{ __("1. Information We Collect") }}</h2>
                    <p class="text-sm lg-text-base">
                        {{ __("When you visit the Site, we automatically collect certain information about your device, including information about your web browser, IP address, time zone, and some of the cookies that are installed on your device. Additionally, as you browse the Site, we collect information about the individual web pages or products that you view, what websites or search terms referred you to the Site, and information about how you interact with the Site. We refer to this automatically collected information as 'Device Information'.") }}
                    </p>
                    <p class="py-5">{{ __('We collect Device Information using the following technologies:') }}</p>
                    <p>{{ _("'Cookies' are data files that are placed on your device or computer and often include an anonymous unique identifier. For more information about cookies, and how to disable cookies, visit this link:") }}
                        <br>
                        (.....) <br>
                        {{ __("'Log files' track actions occurring on the Site, and collect data including your IP address, browser type, Internet service provider, referring/exit pages, and date/time stamps. 'Web beacons', 'tags', and 'pixels' are electronic files used to record information about how you browse the Site. Additionally, when you make a purchase or attempt to purchase through the Site, we collect certain information from you, including your name, billing address, shipping address, and payment information (including credit card number, email address, and phone number). We refer to this information as 'Order Information'.") }}
                    </p>
                </div>
                {{-- Conditions 2 --}}
                <div>
                    <h2 class="text-xl lg:text-2xl font-semibold mb-3">{{ __("2. How We Use Your Information") }}</h2>
                    <p class="text-sm lg-text-base">
                        {{ __('We use the Order Information that we collect generally to fulfill any orders placed through the Site (including processing your payment information, arranging for shipping, and providing you with invoices and/or order confirmations). Additionally, we use this Order Information to:') }}
                    </p>
                    <p class="mt-5">{{ __("Communicate with you;") }}</p>
                    <p>{{ __("Screen our orders for potential risk or fraud; and When in line with the preferences you have shared with us, provide you with information or advertising relating to our products or services.") }}</p>
                    <p>{{ __("We use the Device Information that we collect to help us screen for potential risk and fraud (in particular, your IP address), and more generally to improve and optimize our Site (for example, by generating analytics about how our customers browse and interact with the Site, and to assess the success of our marketing and advertising campaigns).") }}
                    </p>
                </div>
                {{-- Conditions 3 --}}
                <div>
                    <h2 class="text-xl lg:text-2xl font-semibold mb-3">{{ __("3. Sharing Your Personal Information") }}</h2>
                    <p class="text-sm lg-text-base">
                        {{ __("We share your Personal Information with third parties to help us use your Personal Information, as described above. For example, we use Shopify to power our online store--you can read more about how Shopify uses your Personal Information here: https://www.shopify.com/legal/privacy. We also use Google Analytics to help us understand how our customers use the Site--you can read more about how Google uses your Personal Information here: https://www.google.com/intl/en/policies/privacy/. You can also opt-out of Google Analytics here: https://tools.google.com/dlpage/gaoptout.") }}
                    </p>
                    <p class="mt-5">{{ __("Finally, we may also share your Personal Information to comply with applicable laws and regulations, to respond to a subpoena, search warrant, or other lawful request for information we receive, or to otherwise protect our rights.") }}</p>
                </div>
                {{-- Conditions 4 --}}
                <div>
                    <h2 class="text-xl lg:text-2xl font-semibold mb-3">{{ __("4. Data Retention") }}</h2>
                    <p class="text-sm lg-text-base">
                        {{ __("When you place an order through the Site, we will maintain your Order Information for our records unless and until you ask us to delete this information.") }}
                    </p>
                </div>
                {{-- Conditions 5 --}}
                <div>
                    <h2 class="text-xl lg:text-2xl font-semibold mb-3">{{ __("5. Your Rights") }}</h2>
                    <p class="text-sm lg-text-base">
                        {{ __("You are responsible for maintaining the confidentiality of your account and password information, and you agree to accept responsibility for all activities that occur under your account and password. This website and The Company Pte Ltd reserves the right to refuse service, terminate accounts remove or edit content or cancel orders.By placing an order, you warrant that you are over 18 years of age, and that you are providing shop.company.com or shop.beetle.com.sg with accurate, truthful information and that you have the authority to place the order.") }}
                    </p>
                </div>
                {{-- Conditions 6 --}}
                <div>
                    <h2><h2 class="text-xl lg:text-2xl font-semibold mb-3">{{ __("6. Changes") }}</h2>
                        <p class="text-sm lg-text-base">
                            {{ __("We may update this privacy policy from time to time to reflect, for example, changes to our practices or for other operational, legal, or regulatory reasons.") }}
                        </p>
                </div>
                {{-- Conditions 7 --}}
                <div>
                    <h2 class="text-xl lg:text-2xl font-semibold mb-3">{{ __("7. Contact Us") }}</h2>
                    <p class="text-sm lg-text-base">
                        {{ __("For more information about our privacy practices, if you have questions, or if you would like to make a complaint, please contact us by e-mail at [Email Address] or by mail using the details provided below:") }}
                    </p>
                    <p class="mt-5"><a class=" hover:text-text-danger" href="#">{{ __("contact@evolon.com") }}</a></p>
                </div>
            </div>
        </div>
    </section>



@endsection
