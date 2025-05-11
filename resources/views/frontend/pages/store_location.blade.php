@extends('frontend.layouts.app', ['page_slug' => 'store_location'])

@section('title', 'Store location')
@section('content')
    {{-- map section --}}
    <section class="py-10">
        <div class="head text-center py-7">
            <h2 class="text-4xl">{{ __('Store Locations') }}</h2>
        </div>
        <div class="container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d58402.673347362055!2d90.41479456026752!3d23.812656882805943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sbn!2sbd!4v1746702456720!5m2!1sbn!2sbd"
                width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <section class="dark:bg-bg-darkTertiary pb-10">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
                {{-- card -1 --}}
                <div
                    class="group w-full border p-6 hover:bg-bg-danger/10 transition-all duration-300 bg-bg-white dark:bg-bg-accent/30 rounded-xl shadow-lg space-y-4 text-sm font-sans">
                    <h2 class="text-base font-semibold">{{ __('Store 1 Sydney') }}</h2>

                    <p>
                        <span
                            class="text-base font-semibold text-text-primary/80 dark:text-text-white transition-all duration-300">
                            {{ __('Address:') }}
                        </span>
                        <span
                            class="text-base text-text-primary/80 dark:text-text-white hover:text-text-danger transition-all duration-300">
                            {{ __('15 Yarran st, Punchbowl, NSW, Australia') }}
                        </span>
                    </p>

                    <p>
                        <span
                            class="text-base font-semibold text-text-primary/80 dark:text-text-white transition-all duration-300">
                            {{ __('Phone number:') }}
                        </span>
                        <span
                            class="text-base text-text-primary/80 dark:text-text-white hover:text-text-danger transition-all duration-300">
                            {{ __('+1 234 567') }}
                        </span>
                    </p>

                    <p>
                        <span
                            class="text-base font-semibold text-text-primary/80 dark:text-text-white transition-all duration-300">
                            {{ __('Email:') }}
                        </span>
                        <span class="text-base text-text-primary/80 dark:text-text-white transition-all duration-300">
                            <a href="mailto:contact@vineta.com" class="hover:text-text-danger transition-all duration-300">
                                {{ __('contact@vineta.com') }}
                            </a>
                        </span>
                    </p>

                    <p>
                        <span
                            class="text-base font-semibold text-text-primary/80 dark:text-text-white hover:text-text-danger transition-all duration-300">
                            {{ __('Open:') }}
                        </span>
                        <span
                            class="text-base text-text-primary/80 dark:text-text-white hover:text-text-danger transition-all duration-300">
                            {{ __('8am – 7pm, Mon – Sat') }}
                        </span>
                    </p>

                    <a href="#"
                        class="inline-flex items-center text-base text-text-primary dark:text-text-white font-medium hover:underline hover:text-text-danger transition-all duration-300">
                        {{ __('Get Direction') }}
                        <i data-lucide="arrow-up-right" class="w-4 h-4 transition-all duration-300"></i>
                    </a>
                </div>
                 {{-- card -2 --}}
                <div
                    class="group w-full border p-6 hover:bg-bg-danger/10 transition-all duration-300 bg-bg-white dark:bg-bg-accent/30 rounded-xl shadow-lg space-y-4 text-sm font-sans">
                    <h2 class="text-base font-semibold">{{ __('Store 1 Sydney') }}</h2>

                    <p>
                        <span
                            class="text-base font-semibold text-text-primary/80 dark:text-text-white transition-all duration-300">
                            {{ __('Address:') }}
                        </span>
                        <span
                            class="text-base text-text-primary/80 dark:text-text-white hover:text-text-danger transition-all duration-300">
                            {{ __('15 Yarran st, Punchbowl, NSW, Australia') }}
                        </span>
                    </p>

                    <p>
                        <span
                            class="text-base font-semibold text-text-primary/80 dark:text-text-white transition-all duration-300">
                            {{ __('Phone number:') }}
                        </span>
                        <span
                            class="text-base text-text-primary/80 dark:text-text-white hover:text-text-danger transition-all duration-300">
                            {{ __('+1 234 567') }}
                        </span>
                    </p>

                    <p>
                        <span
                            class="text-base font-semibold text-text-primary/80 dark:text-text-white transition-all duration-300">
                            {{ __('Email:') }}
                        </span>
                        <span class="text-base text-text-primary/80 dark:text-text-white transition-all duration-300">
                            <a href="mailto:contact@vineta.com" class="hover:text-text-danger transition-all duration-300">
                                {{ __('contact@vineta.com') }}
                            </a>
                        </span>
                    </p>

                    <p>
                        <span
                            class="text-base font-semibold text-text-primary/80 dark:text-text-white hover:text-text-danger transition-all duration-300">
                            {{ __('Open:') }}
                        </span>
                        <span
                            class="text-base text-text-primary/80 dark:text-text-white hover:text-text-danger transition-all duration-300">
                            {{ __('8am – 7pm, Mon – Sat') }}
                        </span>
                    </p>

                    <a href="#"
                        class="inline-flex items-center text-base text-text-primary dark:text-text-white font-medium hover:underline hover:text-text-danger transition-all duration-300">
                        {{ __('Get Direction') }}
                        <i data-lucide="arrow-up-right" class="w-4 h-4 transition-all duration-300"></i>
                    </a>
                </div>
                 {{-- card -3 --}}
                <div
                    class="group w-full border p-6 hover:bg-bg-danger/10 transition-all duration-300 bg-bg-white dark:bg-bg-accent/30 rounded-xl shadow-lg space-y-4 text-sm font-sans">
                    <h2 class="text-base font-semibold">{{ __('Store 1 Sydney') }}</h2>

                    <p>
                        <span
                            class="text-base font-semibold text-text-primary/80 dark:text-text-white transition-all duration-300">
                            {{ __('Address:') }}
                        </span>
                        <span
                            class="text-base text-text-primary/80 dark:text-text-white hover:text-text-danger transition-all duration-300">
                            {{ __('15 Yarran st, Punchbowl, NSW, Australia') }}
                        </span>
                    </p>

                    <p>
                        <span
                            class="text-base font-semibold text-text-primary/80 dark:text-text-white transition-all duration-300">
                            {{ __('Phone number:') }}
                        </span>
                        <span
                            class="text-base text-text-primary/80 dark:text-text-white hover:text-text-danger transition-all duration-300">
                            {{ __('+1 234 567') }}
                        </span>
                    </p>

                    <p>
                        <span
                            class="text-base font-semibold text-text-primary/80 dark:text-text-white transition-all duration-300">
                            {{ __('Email:') }}
                        </span>
                        <span class="text-base text-text-primary/80 dark:text-text-white transition-all duration-300">
                            <a href="mailto:contact@vineta.com" class="hover:text-text-danger transition-all duration-300">
                                {{ __('contact@vineta.com') }}
                            </a>
                        </span>
                    </p>

                    <p>
                        <span
                            class="text-base font-semibold text-text-primary/80 dark:text-text-white hover:text-text-danger transition-all duration-300">
                            {{ __('Open:') }}
                        </span>
                        <span
                            class="text-base text-text-primary/80 dark:text-text-white hover:text-text-danger transition-all duration-300">
                            {{ __('8am – 7pm, Mon – Sat') }}
                        </span>
                    </p>

                    <a href="#"
                        class="inline-flex items-center text-base text-text-primary dark:text-text-white font-medium hover:underline hover:text-text-danger transition-all duration-300">
                        {{ __('Get Direction') }}
                        <i data-lucide="arrow-up-right" class="w-4 h-4 transition-all duration-300"></i>
                    </a>
                </div>
                 {{-- card -4 --}}
                <div
                    class="group w-full border p-6 hover:bg-bg-danger/10 transition-all duration-300 bg-bg-white dark:bg-bg-accent/30 rounded-xl shadow-lg space-y-4 text-sm font-sans">
                    <h2 class="text-base font-semibold">{{ __('Store 1 Sydney') }}</h2>

                    <p>
                        <span
                            class="text-base font-semibold text-text-primary/80 dark:text-text-white transition-all duration-300">
                            {{ __('Address:') }}
                        </span>
                        <span
                            class="text-base text-text-primary/80 dark:text-text-white hover:text-text-danger transition-all duration-300">
                            {{ __('15 Yarran st, Punchbowl, NSW, Australia') }}
                        </span>
                    </p>

                    <p>
                        <span
                            class="text-base font-semibold text-text-primary/80 dark:text-text-white transition-all duration-300">
                            {{ __('Phone number:') }}
                        </span>
                        <span
                            class="text-base text-text-primary/80 dark:text-text-white hover:text-text-danger transition-all duration-300">
                            {{ __('+1 234 567') }}
                        </span>
                    </p>

                    <p>
                        <span
                            class="text-base font-semibold text-text-primary/80 dark:text-text-white transition-all duration-300">
                            {{ __('Email:') }}
                        </span>
                        <span class="text-base text-text-primary/80 dark:text-text-white transition-all duration-300">
                            <a href="mailto:contact@vineta.com" class="hover:text-text-danger transition-all duration-300">
                                {{ __('contact@vineta.com') }}
                            </a>
                        </span>
                    </p>

                    <p>
                        <span
                            class="text-base font-semibold text-text-primary/80 dark:text-text-white hover:text-text-danger transition-all duration-300">
                            {{ __('Open:') }}
                        </span>
                        <span
                            class="text-base text-text-primary/80 dark:text-text-white hover:text-text-danger transition-all duration-300">
                            {{ __('8am – 7pm, Mon – Sat') }}
                        </span>
                    </p>

                    <a href="#"
                        class="inline-flex items-center text-base text-text-primary dark:text-text-white font-medium hover:underline hover:text-text-danger transition-all duration-300">
                        {{ __('Get Direction') }}
                        <i data-lucide="arrow-up-right" class="w-4 h-4 transition-all duration-300"></i>
                    </a>
                </div>
                 {{-- card -5 --}}
                <div
                    class="group w-full border p-6 hover:bg-bg-danger/10 transition-all duration-300 bg-bg-white dark:bg-bg-accent/30 rounded-xl shadow-lg space-y-4 text-sm font-sans">
                    <h2 class="text-base font-semibold">{{ __('Store 1 Sydney') }}</h2>

                    <p>
                        <span
                            class="text-base font-semibold text-text-primary/80 dark:text-text-white transition-all duration-300">
                            {{ __('Address:') }}
                        </span>
                        <span
                            class="text-base text-text-primary/80 dark:text-text-white hover:text-text-danger transition-all duration-300">
                            {{ __('15 Yarran st, Punchbowl, NSW, Australia') }}
                        </span>
                    </p>

                    <p>
                        <span
                            class="text-base font-semibold text-text-primary/80 dark:text-text-white transition-all duration-300">
                            {{ __('Phone number:') }}
                        </span>
                        <span
                            class="text-base text-text-primary/80 dark:text-text-white hover:text-text-danger transition-all duration-300">
                            {{ __('+1 234 567') }}
                        </span>
                    </p>

                    <p>
                        <span
                            class="text-base font-semibold text-text-primary/80 dark:text-text-white transition-all duration-300">
                            {{ __('Email:') }}
                        </span>
                        <span class="text-base text-text-primary/80 dark:text-text-white transition-all duration-300">
                            <a href="mailto:contact@vineta.com" class="hover:text-text-danger transition-all duration-300">
                                {{ __('contact@vineta.com') }}
                            </a>
                        </span>
                    </p>

                    <p>
                        <span
                            class="text-base font-semibold text-text-primary/80 dark:text-text-white hover:text-text-danger transition-all duration-300">
                            {{ __('Open:') }}
                        </span>
                        <span
                            class="text-base text-text-primary/80 dark:text-text-white hover:text-text-danger transition-all duration-300">
                            {{ __('8am – 7pm, Mon – Sat') }}
                        </span>
                    </p>

                    <a href="#"
                        class="inline-flex items-center text-base text-text-primary dark:text-text-white font-medium hover:underline hover:text-text-danger transition-all duration-300">
                        {{ __('Get Direction') }}
                        <i data-lucide="arrow-up-right" class="w-4 h-4 transition-all duration-300"></i>
                    </a>
                </div>

            </div>
        </div>
    </section>
@endsection
