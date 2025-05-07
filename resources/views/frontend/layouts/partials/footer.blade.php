<footer class=" dark:bg-bg-darkTertiary">
    <!-- Feature Icons Row  Start-->
    <div class="container">
        <div class="flex flex-wrap justify-around items-center py-6  divide-gray-300  text-center">
            <div class="flex pr-18 border-r items-center gap-2 ">
                <div class=" w-15 h-15 rounded-full flex items-center justify-center border ">
                    <i data-lucide="box" class="w-8 h-8"></i>
                </div>
                <span class="text-xl">{{ __('FREE SHIPPING') }}</span>
            </div>
            <div class="flex pr-18 border-r items-center gap-2 ">
                <div class=" w-15 h-15 rounded-full flex items-center justify-center border ">
                    <i data-lucide="gift" class="w-8 h-8"></i>
                </div>
                <span class="text-xl">{{ __('GIFT PACKAGE') }}</span>
            </div>
            <div class="flex pr-18 border-r items-center gap-2 ">
                <div class=" w-15 h-15 rounded-full flex items-center justify-center border ">
                    <i data-lucide="rotate-ccw" class="w-8 h-8"></i>
                </div>
                <span class="text-xl">{{ __('FREE RETURNS') }}</span>
            </div>
            <div class="flex pr-18 items-center gap-2">
                <div class=" w-15 h-15 rounded-full flex items-center justify-center border ">
                    <i data-lucide="headphones" class="w-8 h-8"></i>
                </div>
                <span class="text-xl">{{ __('SUPPORT ONLINE') }}</span>
            </div>
        </div>
    </div>
    {{-- Feature Icons Row End --}}

    {{-- logo part start --}}
    <section class="py-10 border">
        <div class="container">
            <div class="content flex flex-col md:flex-row items-center justify-between">
                <div class="left_side">
                    <span class="dark-mode-logo hidden">
                        <img src="{{ asset('frontend/images/logo-light.png') }}" alt="Logo">
                    </span>
                    <span class="light-mode-logo">
                        <img src="{{ asset('frontend/images/logo.png') }}" alt="Logo">
                    </span>
                </div>
                <div class="flex gap-4">
                    <a href="www.facebook.com"
                        class="w-14 h-14 flex items-center justify-center border rounded-full hover:bg-gradient-primary transition-all duration-500 dark:hover:bg-bg-gray/40">
                        <i data-lucide="facebook" class="w-6 h-6"></i>
                        <span class="sr-only">{{ __('Facebook') }}</span>
                    </a>
                    <a href="www.instagram.com"
                        class="w-14 h-14 flex items-center justify-center border rounded-full hover:bg-gradient-primary transition-all duration-500 dark:hover:bg-bg-gray/40">
                        <i data-lucide="instagram" class="w-6 h-6"></i>
                        <span class="sr-only">{{ __('Instagram') }}</span>
                    </a>
                    <a href="www.linkedin.com"
                        class="w-14 h-14 flex items-center justify-center border rounded-full hover:bg-gradient-primary transition-all duration-500 dark:hover:bg-bg-gray/40">
                        <i data-lucide="linkedin" class="w-6 h-6"></i>
                        <span class="sr-only">{{ __('LinkedIn') }}</span>
                    </a>
                    <a href="www.twitter.com"
                        class="w-14 h-14 flex items-center justify-center border rounded-full hover:bg-gradient-primary transition-all duration-500 dark:hover:bg-bg-gray/40">
                        <i data-lucide="x" class="w-6 h-6"></i>
                        <span class="sr-only">{{ __('Twitter/X') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    {{-- logo part end --}}

    <!-- Main Flex Content start-->
    <div class="container">

        <div class="w-full  mx-auto flex flex-wrap">

            <!-- Column 1: Contact -->
            <div class="w-full md:w-[30%] pr-16 py-10">
                <h2 class="text-xl font-semibold mb-4">{{ __('Business Contact') }}</h2>
                <div class="space-y-3 text-base text-text-primary dark:text-text-white">
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-full border  flex items-center justify-center mt-1">
                            <i data-lucide="map-pin" class="w-4 h-4"></i>
                        </div>
                        <a href="https://maps.google.com/?q=123+Yarran+st,+Punchbowl,+NSW+2196,+Australia"
                            target="_blank" class="text-base hover:text-text-danger transition-all duration-300">
                            {{ __('123 Yarran st, Punchbowl, NSW 2196, Australia') }}
                        </a>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-full border  flex items-center justify-center">
                            <i data-lucide="phone" class="w-4 h-4"></i>
                        </div>
                        <a href="tel:+64683421245" class="text-base hover:text-text-danger transition-all duration-300">
                            {{ __('(64) 8342 1245') }}
                        </a>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-full border  flex items-center justify-center">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                        </div>
                        <a href="mailto:support@example.com"
                            class="text-base hover:text-text-danger transition-all duration-300">
                            {{ __('support@example.com') }}
                        </a>
                    </div>
                </div>
                <a href="#"
                    class="text-base text-text-tertiary mt-4 inline-block underline">{{ __('Get Direction') }}
                    ↗</a>
            </div>

            <!-- Column 2: Newsletter -->
            <div class="w-full md:w-[40%] border-x  px-[100px] py-10">
                <h2 class="text-xl font-semibold mb-4">{{ __('Subscribe Newsletter') }}</h2>
                <p class="text-base  mb-4">
                    {{ __('We invite you to register to read the latest news, offers and events about our company. We promise not spam your inbox.') }}
                </p>
                <form
                    class="flex items-center border border-border-dark dark:border-border-white rounded-full  overflow-hidden transition-all focus-within:ring-4 focus-within:ring-outline-primary focus-within:ring-opacity-50 focus-within:border-outline-primary group">
                    <input type="email" placeholder="{{ __('Email address') }}"
                        class="w-full px-4 py-3 text-base  focus:outline-none" />
                    <button type="submit"
                        class="bg-bg-accent  transition-all duration-300 border rounded-full hover:bg-bg-primary text-text-white w-14 h-12 flex items-center justify-center ">
                        <i data-lucide="move-right" class="w-5 h-5"></i>
                    </button>
                </form>

            </div>

            <!-- Column 3: About Us + Resource -->
            <div class="w-full md:w-[30%] pl-16 py-10">
                <div class="flex md:flex-row flex-col  ">

                    <!-- About Us -->
                    <div class="md:w-1/2 justify-end">
                        <h2 class="text-xl font-semibold mb-4">{{ __('About Us') }}</h2>
                        <ul class="space-y-2 text-base text-text-primary dark:text-text-white">
                            <li><a href="#"
                                    class="hover:text-text-danger transition-all duration-300">{{ __('About Us') }}</a>
                            </li>
                            <li><a href="#"
                                    class="hover:text-text-danger transition-all duration-300">{{ __('Contact Us') }}</a>
                            </li>
                            <li><a href="#"
                                    class="hover:text-text-danger transition-all duration-300">{{ __('Our Store') }}</a>
                            </li>
                            <li><a href="#"
                                    class="hover:text-text-danger transition-all duration-300">{{ __('Our Story') }}</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Resource -->
                    <div class="md:w-1/2 ">
                        <h2 class="text-lg font-semibold mb-4">{{ __('Resource') }}</h2>
                        <ul class="space-y-2 text-base text-text-primary dark:text-text-white">
                            <li><a href="#"
                                    class="hover:text-text-danger transition-all duration-300">{{ __('Privacy Policies') }}</a>
                            </li>
                            <li><a href="#"
                                    class="hover:text-text-danger transition-all duration-300">{{ __('Terms & Conditions') }}</a>
                            </li>
                            <li><a href="#"
                                    class="hover:text-text-danger transition-all duration-300">{{ __('Returns & Refunds') }}</a>
                            </li>
                            <li><a href="#"
                                    class="hover:text-text-danger transition-all duration-300">{{ __('FAQ’s') }}</a>
                            </li>
                            <li><a href="#"
                                    class="hover:text-text-danger transition-all duration-300">{{ __('Shipping') }}</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>

    </div>
    {{-- Main content end --}}

    <!-- Footer socket -->
    <section class="border-t  ">

        <div class="container py-6 px-4 flex flex-col md:flex-row justify-between items-center gap-4">
            <!-- Copyright -->
            <div>

                <p>{{__('Copyright © 2025')}} <strong>{{ __('Vineta') }}</strong>. {{ __('All rights reserved.') }}</p>
            </div>

            <!-- Payment Icons -->
            <div class="flex gap-2">
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
    </section>
    {{-- Bottom socket end --}}
</footer>
