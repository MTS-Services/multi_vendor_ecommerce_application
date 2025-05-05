<footer class="bg-white text-text-primary text-sm mt-10 border-t ">



    <!-- Feature Icons Row -->
    <div class="flex flex-wrap justify-around items-center py-6 border-b  text-center">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 rounded-full flex items-center justify-center border ">
                <i data-lucide="box" class="w-5 h-5"></i>
            </div>
            <span>{{ __('FREE SHIPPING') }}</span>
        </div>
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 rounded-full flex items-center justify-center border ">
                <i data-lucide="gift" class="w-5 h-5"></i>
            </div>
            <span>{{ __('GIFT PACKAGE') }}</span>
        </div>
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 rounded-full flex items-center justify-center border ">
                <i data-lucide="rotate-ccw" class="w-5 h-5"></i>
            </div>
            <span>{{ __('FREE RETURNS') }}</span>
        </div>
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 rounded-full flex items-center justify-center border ">
                <i data-lucide="headphones" class="w-5 h-5"></i>
            </div>
            <span>{{ __('SUPPORT ONLINE') }}</span>
        </div>
    </div>
    <div class="container">
        <!-- Main Flex Content -->
        <div class=" bg-white text-text-primary text-sm">
            <div class="w-full  mx-auto flex flex-wrap">

                <!-- Column 1: Contact -->
                <div class="w-full md:w-[30%] pr-16 py-10">
                    <h2 class="text-xl font-semibold mb-4">{{ __('Business Contact') }}</h2>
                    <div class="space-y-3 text-sm text-text-primary dark:text-text-white">
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-full border  flex items-center justify-center mt-1">
                                <i data-lucide="map-pin" class="w-4 h-4"></i>
                            </div>
                            <a href="https://maps.google.com/?q=123+Yarran+st,+Punchbowl,+NSW+2196,+Australia" target="_blank" class="text-base hover:text-text-danger transition-all duration-300">
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
                            <a href="mailto:support@example.com" class="text-base hover:text-text-danger transition-all duration-300">
                                {{ __('support@example.com') }}
                            </a>
                        </div>
                    </div>
                    <a href="#"
                        class="text-base text-text-tertiary mt-4 inline-block underline">{{ __('Get Direction') }} ↗</a>
                </div>

                <!-- Column 2: Newsletter -->
                <div class="w-full md:w-[40%] border-x  px-[100px] py-10">
                    <h2 class="text-xl font-semibold mb-4">{{ __('Subscribe Newsletter') }}</h2>
                    <p class="text-sm text-gray-600 mb-4">
                        {{ __('We invite you to register to read the latest news, offers and events about our company. We promise not spam your inbox.') }}
                    </p>
                    <form class="flex items-center border border-border-dark rounded-full overflow-hidden transition-all focus-within:ring-4 focus-within:ring-outline-primary focus-within:ring-opacity-50 focus-within:border-outline-primary group">
                        <input type="email" placeholder="{{ __('Email address') }}"
                            class="w-full px-4 py-3 text-base text-text-primary focus:outline-none" />
                        <button type="submit" class="bg-bg-accent transition-all duration-300 border rounded-full hover:bg-bg-primary text-text-white w-14 h-12 flex items-center justify-center ">
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
                            <ul class="space-y-2 text-sm text-text-primary dark:text-text-white">
                                <li><a href="#" class="hover:text-text-danger transition-all duration-300">{{ __('About Us') }}</a></li>
                                <li><a href="#" class="hover:text-text-danger transition-all duration-300">{{ __('Contact Us') }}</a></li>
                                <li><a href="#" class="hover:text-text-danger transition-all duration-300">{{ __('Our Store') }}</a></li>
                                <li><a href="#" class="hover:text-text-danger transition-all duration-300">{{ __('Our Story') }}</a></li>
                            </ul>
                        </div>

                        <!-- Resource -->
                        <div class="md:w-1/2 ">
                            <h2 class="text-lg font-semibold mb-4">{{ __('Resource') }}</h2>
                            <ul class="space-y-2 text-sm text-text-primary dark:text-text-white">
                                <li><a href="#" class="hover:text-text-danger transition-all duration-300">{{ __('Privacy Policies') }}</a></li>
                                <li><a href="#" class="hover:text-text-danger transition-all duration-300">{{ __('Terms & Conditions') }}</a></li>
                                <li><a href="#" class="hover:text-text-danger transition-all duration-300">{{ __('Returns & Refunds') }}</a></li>
                                <li><a href="#" class="hover:text-text-danger transition-all duration-300">{{ __('FAQ’s') }}</a></li>
                                <li><a href="#" class="hover:text-text-danger transition-all duration-300">{{ __('Shipping') }}</a></li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Bottom Footer -->
    <div
        class="border-t  py-6 px-4 flex flex-col md:flex-row justify-between items-center gap-4 text-gray-500">

        <!-- Social Media Icons -->
        <div class="flex gap-4">
            <a href="#" class="w-8 h-8 flex items-center justify-center border rounded-full hover:bg-gray-100">
                <i data-lucide="facebook" class="w-4 h-4"></i>
                <span class="sr-only">{{ __('Facebook') }}</span>
            </a>
            <a href="#" class="w-8 h-8 flex items-center justify-center border rounded-full hover:bg-gray-100">
                <i data-lucide="instagram" class="w-4 h-4"></i>
                <span class="sr-only">{{ __('Instagram') }}</span>
            </a>
            <a href="#" class="w-8 h-8 flex items-center justify-center border rounded-full hover:bg-gray-100">
                <i data-lucide="linkedin" class="w-4 h-4"></i>
                <span class="sr-only">{{ __('LinkedIn') }}</span>
            </a>
            <a href="#" class="w-8 h-8 flex items-center justify-center border rounded-full hover:bg-gray-100">
                <i data-lucide="x" class="w-4 h-4"></i>
                <span class="sr-only">{{ __('Twitter/X') }}</span>
            </a>
        </div>

        <!-- Copyright -->
        <div>
            <p>© 2025 <strong>{{ __('Vineta') }}</strong>. {{ __('All rights reserved.') }}</p>
        </div>

        <!-- Payment Icons -->
        <div class="flex gap-2">
            <img src="/images/amex.png" alt="{{ __('Amex') }}" class="h-5" />
            <img src="/images/applepay.png" alt="{{ __('Apple Pay') }}" class="h-5" />
            <img src="/images/discover.png" alt="{{ __('Discover') }}" class="h-5" />
            <img src="/images/mastercard.png" alt="{{ __('Mastercard') }}" class="h-5" />
            <img src="/images/googlepay.png" alt="{{ __('Google Pay') }}" class="h-5" />
        </div>
    </div>

</footer>
