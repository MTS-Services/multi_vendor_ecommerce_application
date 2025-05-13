@extends('frontend.layouts.app', ['page_slug' => 'contact'])

@section('title', 'Contact')
@push('css')
    <style>
        .bracamb-dot::before {
            content: "";
            height: 6px;
            width: 6px;
            border-radius: 50%;
            background-color: #8752FA;
            display: inline-block;
            margin: 0 5px 0 4px;
        }
    </style>
@endpush

@section('content')
    <section class="py-5 bg-bg-lightSecondary dark:bg-bg-darkSecondary">
        <div class="container">
            <div class="text-center py-12">
                <h1 class="text-3xl lg:text-4xl  font-semibold pb-2">{{ __("Contact") }}</h1>
                <div>
                    <a href="{{ route('frontend.home') }}">{{ __('Home') }}</a>
                    <span class="bracamb-dot text-text-primary dark:text-text-white font-medium">{{ __('Contact') }}</span>
                </div>

            </div>
        </div>
    </section>
    {{-- Map Section --}}
    <section class="py-15 bg-bg-gray dark:bg-bg-darkTertiary">
        <div class="container">
            <div class="w-full rounded-lg overflow-hidden">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14599.57960961422!2d90.4200192!3d23.822336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1747105489340!5m2!1sen!2sbd"
                    width="100%" height="600px" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    {{-- Contact Form --}}
    <section class="py-15 bg-bg-lightSecondary dark:bg-bg-darkQuaternary">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="w-full">
                    <h2 class="text-2xl lg:text-3xl font-semibold capitalize pb-3">{{ __("Contact us") }}</h2>
                    <p class="pb-4 text-base lg:me-40 text-text-light">{{ __("Have a question? Please contact us using the customer
                        support
                        channels below.") }}</p>
                    <div class="text-base">
                        <p class="mb-2"><span class="font-semibold">{{ __("Address:") }}</span> <a class="text-text-light"
                                href="#">{{ __("15 Yarran st,
                                Punchbowl, NSW, Australia") }}</a></p>
                        <p class="mb-2"><span class="font-semibold">{{ __("Phone number:") }}</span> <a class="text-text-light"
                                href="#">{{ __("+1 234 567") }}</a>
                        </p>
                        <p class="mb-2"><span class="font-semibold">{{ __("Email:") }}</span> <a class="text-text-light"
                                href="#">{{ __("contact@vineta.com") }}</a>
                        </p>
                        <p class="mb-2"><span class="font-semibold">{{ __("Open:") }}</span><span class="text-text-light">{{ __(" 8am - 7pm,
                                Mon - Sat") }}</span></p>
                    </div>
                    {{-- Social Media Icon --}}
                    <div class="flex gap-4 mt-8">
                        <a href="www.facebook.com"
                            class="w-10 h-10 flex items-center justify-center border border-border-accent rounded-full bg-transparent hover:bg-bg-accent text-text-primary dark:text-text-white hover:text-text-light transition-all duration-300 ease-linear">
                            <i data-lucide="facebook" class="w-6 h-6"></i>
                            <span class="sr-only">{{ __('Facebook') }}</span>
                        </a>
                        <a href="www.facebook.com"
                            class="w-10 h-10 flex items-center justify-center border border-border-accent rounded-full bg-transparent hover:bg-bg-accent text-text-primary dark:text-text-white hover:text-text-light transition-all duration-300 ease-linear">
                            <i data-lucide="twitter" class="w-6 h-6"></i>
                            <span class="sr-only">{{ __('Twitter') }}</span>
                        </a>
                        <a href="www.facebook.com"
                            class="w-10 h-10 flex items-center justify-center border border-border-accent rounded-full bg-transparent hover:bg-bg-accent text-text-primary dark:text-text-white hover:text-text-light transition-all duration-300 ease-linear">
                            <i data-lucide="instagram" class="w-6 h-6"></i>
                            <span class="sr-only">{{ __('Instagram') }}</span>
                        </a>
                        <a href="www.facebook.com"
                            class="w-10 h-10 flex items-center justify-center border border-border-accent rounded-full bg-transparent hover:bg-bg-accent text-text-primary dark:text-text-white hover:text-text-light transition-all duration-300 ease-linear">
                            <i data-lucide="linkedin" class="w-6 h-6"></i>
                            <span class="sr-only">{{ __('Linkedin') }}</span>
                        </a>
                    </div>
                </div>
                <div class="w-full">
                    <div class="shadow-card bg-bg-gray dark:bg-bg-darkSecondary rounded-md p-6">
                        <h2 class="text-2xl lg:text-3xl font-semibold capitalize pb-3">{{ __("Get In Touch") }}</h2>
                        <p class="pb-4 text-base lg:me-40 text-text-light">{{__("Please submit all general enquiries in the
                            contact form below and we look forward to hearing from you soon.")}}</p>
                        <form action="#" method="POST">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="w-full mb-3">
                                    <label for="name"
                                        class="block text-sm font-medium text-text-light mb-2">{{ __("Name") }}</label>
                                    <input class="input rounded-md" type="text" name="name" id="name"
                                        class="input h-12">
                                </div>
                                <div class="w-full mb-3">
                                    <label for="email"
                                        class="block text-sm font-medium text-text-light mb-2">{{ __("Email") }}</label>
                                    <input class="input rounded-md" type="email" name="email" id="email"
                                        class="input h-12">
                                </div>
                            </div>
                            <div class="w-full mb-3">
                                <label for="message" class="block text-sm font-medium text-text-light mb-2">{{ __("Message") }}</label>
                                <textarea name="message" id="message" class="input h-20 rounded-md"></textarea>
                            </div>
                            <div class="flex justify-center">
                                <button type="submit" class="btn-primary mt-6 rounded-md w-full">{{ __("Send Message") }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
