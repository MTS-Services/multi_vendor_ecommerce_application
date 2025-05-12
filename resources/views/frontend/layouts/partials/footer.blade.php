<footer class="dark:bg-bg-darkTertiary">
    <!-- Feature Icons Row  Start-->
    <div class="container">
        <div class="flex flex-wrap justify-around items-center py-6 space-y-5 xl:space-y-0 divide-gray-300  text-center">
            <div
                class="xl:basis-1/4 sm:basis-1/2 basis-full w-full flex items-center justify-center gap-2 relative after:content-[''] after:absolute after:right-0 after:w-0.5 after:h-full after:bg-bg-dark dark:after:bg-bg-light after:hidden sm:after:block">
                <div class=" w-15 h-15 rounded-full flex items-center justify-center border">
                    <i data-lucide="box" class="w-8 h-8"></i>
                </div>
                <span class="text-xl">{{ __('FREE SHIPPING') }}</span>
            </div>
            <div
                class="xl:basis-1/4 sm:basis-1/2 basis-full w-full flex items-center justify-center gap-2 relative after:content-[''] after:absolute after:right-0 after:w-0.5 after:h-full after:bg-bg-dark dark:after:bg-bg-light after:hidden xl:after:block">
                <div class="w-15 h-15 rounded-full flex items-center justify-center border ">
                    <i data-lucide="gift" class="w-8 h-8"></i>
                </div>
                <span class="text-xl">{{ __('GIFT PACKAGE') }}</span>
            </div>
            <div
                class="xl:basis-1/4 sm:basis-1/2 basis-full w-full flex items-center justify-center gap-2 relative after:content-[''] after:absolute after:right-0 after:w-0.5 after:h-full after:bg-bg-dark dark:after:bg-bg-light after:hidden sm:after:block">
                <div class=" w-15 h-15 rounded-full flex items-center justify-center border ">
                    <i data-lucide="rotate-ccw" class="w-8 h-8"></i>
                </div>
                <span class="text-xl">{{ __('FREE RETURNS') }}</span>
            </div>
            <div class="xl:basis-1/4 sm:basis-1/2 basis-full w-full flex items-center justify-center gap-2">
                <div class=" w-15 h-15 rounded-full flex items-center justify-center border ">
                    <i data-lucide="headphones" class="w-8 h-8"></i>
                </div>
                <span class="text-xl">{{ __('SUPPORT ONLINE') }}</span>
            </div>
        </div>
    </div>
    {{-- Feature Icons Row End --}}

    <div class="divider"></div>

    {{-- logo part start --}}
    <div class="container">
        <div class="content flex flex-col md:flex-row items-center gap-5 justify-between">
            <a href="{{ route('frontend.home') }}">
                <span class="dark-mode-logo hidden">
                    <img src="{{ asset('frontend/images/logo-light.png') }}" alt="Logo">
                </span>
                <span class="light-mode-logo">
                    <img src="{{ asset('frontend/images/logo.png') }}" alt="Logo">
                </span>
            </a>
            <div class="flex gap-4">
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
    </div>
    {{-- logo part end --}}
    <div class="divider"></div>

    <!-- Main Flex Content start-->
    <div class="container mx-auto">
        <div class="w-full flex flex-wrap ">
            <!-- Column 1: Contact -->
            <div
                class="footer-accordion transition-all duration-300 w-full basis-full md:basis-1/2 xl:basis-1/3">
                <h2 class="footer-accordion-title text-xl font-semibold mb-4 flex items-center justify-between">
                    {{ __('Business Contact') }}
                    <i class="footer-accordion-icon md:hidden" data-lucide="plus"></i>
                </h2>
                <div
                    class="footer-accordion-content overflow-hidden text-sm md:text-base max-h-0 py-0 transition-all duration-300">
                    <div class="md:space-y-3 space-y-2 text-base text-text-primary dark:text-text-white">
                        <div class="flex  items-center gap-2">
                            <div class="w-7 h-7 rounded-full border  flex items-center justify-center mt-1">
                                <i data-lucide="map-pin" class="w-4 h-4"></i>
                            </div>
                            <a href="https://maps.google.com/?q=123+Yarran+st,+Punchbowl,+NSW+2196,+Australia"
                                target="_blank"
                                class="md:text-base  hover:text-text-accent transition-all duration-300">
                                {{ __('123 Yarran st, Punchbowl, NSW 2196, Australia') }}
                            </a>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-full border  flex items-center justify-center">
                                <i data-lucide="phone" class="w-4 h-4"></i>
                            </div>
                            <a href="tel:+64683421245"
                                class="md:text-base  hover:text-text-accent transition-all duration-300">
                                {{ __('(64) 8342 1245') }}
                            </a>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-full border  flex items-center justify-center">
                                <i data-lucide="mail" class="w-4 h-4"></i>
                            </div>
                            <a href="mailto:support@example.com"
                                class="md:text-base  hover:text-text-accent transition-all duration-300">
                                {{ __('support@example.com') }}
                            </a>
                        </div>
                    </div>
                    <a href="#"
                        class="md:text-base text-sm flex items-center justify-center text-text-tertiary mt-4 w-fit underline">{{ __('Get Direction') }}
                        <i data-lucide="move-up-right" class="w-3 h-3"></i></a>
                </div>
            </div>

            <!-- Column 2: Newsletter -->
            <div
                class="footer-accordion transition-all duration-300 w-full basis-full md:basis-1/2 xl:basis-1/3 xl:border-x border-0 px-0 xl:px-5">
                <h2 class="footer-accordion-title text-xl font-semibold mb-4 flex items-center justify-between">
                    {{ __('Subscribe Newsletter') }}
                    <i class="footer-accordion-icon md:hidden" data-lucide="plus"></i>
                </h2>
                <div
                    class="footer-accordion-content overflow-hidden text-sm md:text-base max-h-0 py-0 transition-all duration-300">
                    <p class="text-base  md:mb-4 mb-2">
                        {{ __('We invite you to register to read the latest news, offers and events about our company. We promise not spam your inbox.') }}
                    </p>
                    <form
                        class="flex items-center border border-border-dark dark:border-border-white rounded-full  overflow-hidden transition-all focus-within:ring-4 focus-within:ring-transparent focus-within:ring-opacity-50 focus-within:border-outline-primary group">
                        <input type="email" placeholder="{{ __('Email address') }}"
                            class="w-full px-4 py-3 text-base  focus:outline-none" />
                        <button type="submit"
                            class="bg-bg-accent  transition-all duration-300 border rounded-full hover:bg-bg-primary text-text-white w-14 h-12 flex items-center justify-center ">
                            <i data-lucide="move-right" class="w-5 h-5"></i>
                        </button>
                    </form>
                </div>

            </div>

            <!-- Column 3: About Us + Resource -->
            <div class="w-full basis-full xl:basis-1/3 lg:pl-0 xl:pl-5">
                <div class="flex md:flex-row flex-col ">
                    <!-- About Us -->
                    <div class="footer-accordion transition-all duration-300 md:w-1/2 w-full justify-end pb-0">
                        <h2 class="footer-accordion-title text-xl font-semibold mb-4 flex items-center justify-between">
                            {{ __('About Us') }}
                            <i class="footer-accordion-icon md:hidden" data-lucide="plus"></i>
                        </h2>
                        <div
                            class="footer-accordion-content overflow-hidden text-sm md:text-base max-h-0 py-0 transition-all duration-300">
                            <ul class="md:space-y-2 space-y-1 text-base text-text-primary dark:text-text-white">
                                <li><a href="#"
                                        class="hover:text-text-accent transition-all duration-300">{{ __('About Us') }}</a>
                                </li>
                                <li><a href="#"
                                        class="hover:text-text-accent transition-all duration-300">{{ __('Contact Us') }}</a>
                                </li>
                                <li><a href="#"
                                        class="hover:text-text-accent transition-all duration-300">{{ __('Our Store') }}</a>
                                </li>
                                <li><a href="#"
                                        class="hover:text-text-accent transition-all duration-300">{{ __('Our Story') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Resource -->
                    <div class="footer-accordion transition-all duration-300 md:w-1/2 w-full pb-0">
                        <h2 class="footer-accordion-title text-lg font-semibold mb-4 flex items-center justify-between">
                            {{ __('Resource') }}
                            <i class="footer-accordion-icon md:hidden" data-lucide="plus"></i>
                        </h2>
                        <div
                            class="footer-accordion-content overflow-hidden text-sm md:text-base max-h-0 py-0 transition-all duration-300">
                            <ul class="md:space-y-2 space-y-1 text-base text-text-primary dark:text-text-white">
                                <li><a href="#"
                                        class="hover:text-text-accent transition-all duration-300">{{ __('Privacy Policies') }}</a>
                                </li>
                                <li><a href="#"
                                        class="hover:text-text-accent transition-all duration-300">{{ __('Terms & Conditions') }}</a>
                                </li>
                                <li><a href="#"
                                        class="hover:text-text-accent transition-all duration-300">{{ __('Returns & Refunds') }}</a>
                                </li>
                                <li><a href="#"
                                        class="hover:text-text-accent transition-all duration-300">{{ __('FAQ’s') }}</a>
                                </li>
                                <li><a href="#"
                                        class="hover:text-text-accent transition-all duration-300">{{ __('Shipping') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Main content end --}}
    <div class="divider"></div>
    <!-- Footer socket -->
    <div class="py-6">
        <div class="container flex flex-col md:flex-row justify-between items-center gap-4">
            <!-- Copyright -->
            <div>

                <p>{{ __('Copyright © 2025') }} <strong>{{ config('app.name') }}</strong>.
                    {{ __('All rights reserved.') }}</p>
            </div>

            <!-- Payment Icons -->
            <div class="flex gap-2 flex-wrap items-center justify-center">
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
                <img src="{{ asset('frontend/images/footer_bank_logos (7).png') }}" alt="{{ __('Agribank') }}"
                    class="h-7" />
                <img src="{{ asset('frontend/images/footer_bank_logos (8).png') }}" alt="{{ __('VPBank') }}"
                    class="h-7" />
                <img src="{{ asset('frontend/images/footer_bank_logos (10).png') }}" alt="{{ __('Vietcombank') }}"
                    class="h-7" />
                <img src="{{ asset('frontend/images/footer_bank_logos (2).png') }}" alt="{{ __('Vietcombank') }}"
                    class="h-7" />
            </div>
        </div>
    </div>
    {{-- Bottom socket end --}}
</footer>
