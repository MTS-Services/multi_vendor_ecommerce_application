@extends('frontend.layouts.app', ['page_slug' => 'home'])

@section('title', 'Home')

@section('content')
    {{-- ===================== banner Section ===================== --}}
    <section class="swiper banner bg-bg-gray dark:bg-bg-darkSecondary dark:bg-opacity-70 ">
        <div class="swiper-wrapper relative">
            @foreach ($banners as $banner)
                <div class="swiper-slide group/banner">
                    <div class="lg:container {{ $loop->iteration % 2 == 0 ? 'pl-0 pr-4 lg:p-4' : 'pr-0 pl-4 lg:p-4' }}">
                        <div
                            class="item flex {{ $loop->iteration % 2 == 0 ? 'flex-row-reverse' : 'flex-row' }} items-center justify-between relative overflow-hidden min-h-80 lg:min-h-96 2xl:min-h-[500px]">
                            <div
                                class="w-full md:basis-1/2 relative z-[2] {{ $loop->iteration % 2 == 0 ? 'flex flex-col items-end text-end' : '' }}">
                                <p class="text-xs md:text-base">{{ $banner['title'] }}</p>
                                <h2 class="sm:text-xl text-lg lg:text-2xl xl:text-6xl md:py-4 py-1 max-w-72">
                                    {{ $banner['subtitle'] }}
                                </h2>
                                <a href="#" class="btn-primary">{{ __('Shop Now') }} <i
                                        data-lucide="chevron-right"></i></i></a>
                            </div>
                            <div
                                class="md:basis-1/2 md:relative absolute z-[1] w-64 top-1/2 md:top-0 -translate-y-1/2 md:translate-y-0 {{ $loop->iteration % 2 == 0 ? '-left-1/3 md:left-0' : '-right-1/3 sm:-right-1/4 md:right-0' }}">
                                <img src="{{ $banner->modified_image }}" alt="{{ $banner->title }}">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination z-10 hiddin lg:block"></div>
        <!-- Navigation buttons -->
        <div class="hidden lg:block">
            <div class="swiper-button swiper-button-prev hidden lg:block">
                <i data-lucide="chevron-left" class="w-5 h-5"></i>
            </div>

            <div class="swiper-button swiper-button-next hidden lg:block">
                <i data-lucide="chevron-right" class="w-5 h-5"></i>
            </div>
        </div>
    </section>
    {{-- ===================== banner Section end ===================== --}}

    {{-- ===================== Arrivals Section ===================== --}}
    @php
        $arivals = [
            [
                'title' => 'APPLE WATCHES COLLECTION',
            ],
            [
                'title' => 'APPLE WATCHES COLLECTION',
            ],
            [
                'title' => 'APPLE WATCHES COLLECTION',
            ],
            [
                'title' => 'APPLE WATCHES COLLECTION',
            ],
            [
                'title' => 'APPLE WATCHES COLLECTION',
            ],
            [
                'title' => 'APPLE WATCHES COLLECTION',
            ],
            [
                'title' => 'APPLE WATCHES COLLECTION',
            ],
            [
                'title' => 'APPLE WATCHES COLLECTION',
            ],
            [
                'title' => 'APPLE WATCHES COLLECTION',
            ],
            [
                'title' => 'APPLE WATCHES COLLECTION',
            ],
            [
                'title' => 'APPLE WATCHES COLLECTION',
            ],
        ];
    @endphp
    <section class="bg-bg-accent bg-opacity-50 py-6">
        <div class="swiper arrivals">
            <div class="swiper-wrapper ease-linear">
                @foreach ($arivals as $arival)
                    <div class="swiper-slide text-center flex w-auto">
                        <div
                            class="text-xs md:text-base font-bold text-text-primary flex items-center justify-center gap-3 w-fit">
                            <img src="{{ asset('frontend/images/star.png') }}" alt="{{ $arival['title'] }}"
                                class="w-5 h-5">
                            {{ $arival['title'] }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- ===================== Arrivals Section End ===================== --}}

    {{-- =====================  Categories Section ===================== --}}

    <section class="md:py-22 py-11 relative  dark:bg-opacity-50">
        <div class="container">
            <h2 class="text-2xl md:text-4xl md:pb-8 pb-4 font-bold">{{ __('Categories') }}</h2>
            <div class="relative">
                <div class="swiper categories static">
                    <div class="swiper-wrapper">
                        @foreach ($categories as $category)
                            <div class="swiper-slide p-2">
                                <x-frontend.category :category="$category" />
                            </div>
                        @endforeach
                    </div>
                    <div class="hidden xl:block">
                        <div class="swiper-pagination z-10 !-bottom-6 lg:!-bottom-8"></div>
                        <!-- Navigation buttons -->
                        <div class="swiper-button swiper-button-prev 3xl:-left-13 2xl:-left-9">
                            <i data-lucide="chevron-left" class="w-5 h-5"></i>
                        </div>
                        <div class="swiper-button swiper-button-next 3xl:-right-13 2xl:-right-9">
                            <i data-lucide="chevron-right" class="w-5 h-5"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    {{-- ===================== Categories Section End ===================== --}}

    {{-- ===================== Featured Products ===================== --}}
    <section class="bg-bg-gray dark:bg-bg-darkSecondary py-8 md:py-18">
        <div class="container">
            <div class="header pb-6">
                <h2 class="text-4xl">{{ __('Featured Products') }}</h2>
                <p class="py-3">{{ __('Check out our featured products.') }}</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-4">
                @php
                    $collections = collect([
                        'id' => 1,
                        'image' => 'frontend/images/phone.png',
                        'title' => 'Galaxy S21 5G 128GB G991U Unlocked Smartphone',
                        'price' => 999.99,
                        'old_price' => 1000.0,
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

            </div>
        </div>
    </section>

    {{--  =====================  Featured Products end  ===================== --}}

    {{-- ===================== Offer Banner Section  ===================== --}}
    <section class="bg-bg-white dark:bg-bg-darkTertiary py-8 md:py-18">
        <div class="container">
            <div
                class="rounded-xl bg-gradient-primary dark:bg-gradient-dark  flex lg:flex-row flex-col-reverse items-center lg:p-6  lg:justify-around">
                <div class="flex flex-col lg:gap-y-4 gap-y-2 py-5 text-center lg:text-left">
                    <h2 class="text-4xl  ">{{ __('Unmatched Performance') }}</h2>
                    <p class="text-sm sm:text-base">{{ __('Upgrade your devices with cutting-edge technology.') }}</p>
                    <a href="#" class="btn-primary mx-auto lg:mx-0">{{ __('Shop Now') }} <i
                            data-lucide="chevron-right"></i></i></a>
                </div>
                <img src="{{ asset('frontend/images/home_phone.png') }}" alt=""
                    class="w-full sm:w-1/2 lg:w-10/12 xl:w-6/12">
            </div>
        </div>
    </section>
    {{-- ===================== Offer Banner Section end ===================== --}}

    {{-- ===================== Testimonials start ===================== --}}
    @php
        $testimonials = [[1], [2], [3], [4], [5], [6]];
    @endphp
    <section>
        <div class="container py-10 md:py-18">
            <h2 class="text-4xl pb-5">{{ __('Happy Customers') }}</h2>
            <div class="relative">
                <div class="swiper testimonial static">
                    <div class="swiper-wrapper">
                        @foreach ($testimonials as $testimonial)
                            <div class="swiper-slide p-2">
                                <x-frontend.testimonial :testimonial="$testimonial" />
                            </div>
                        @endforeach
                    </div>

                    <div class="hidden xl:block">
                        <div class="swiper-pagination z-10 !-bottom-6 lg:!-bottom-8"></div>
                        <!-- Navigation buttons -->
                        <div class="swiper-button swiper-button-prev 3xl:-left-13 2xl:-left-9">
                            <i data-lucide="chevron-left" class="w-5 h-5"></i>
                        </div>

                        <div class="swiper-button swiper-button-next 3xl:-right-13 2xl:-right-9">
                            <i data-lucide="chevron-right" class="w-5 h-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ===================== testimonial section end ===================== --}}

    {{-- ===================== Brand items start ===================== --}}

    @php
        $brands = [[1], [2], [3], [4], [5], [6], [7], [8], [9], [10]];
    @endphp
    <section class="bg-bg-gray dark:bg-bg-darkSecondary md:py-13 py-6">
        <div class="container relative">
            <div class="swiper brand">
                <div class="swiper-wrapper">

                    @foreach ($brands as $brand)
                        <div class="swiper-slide w-auto !mb-3">
                            <div
                                class="shadow-card bg-bg-white dark:bg-bg-black rounded-lg p-3 flex items-center justify-center grayscale hover:grayscale-0 transition-all duration-300 ease-linear ">
                                <img class="" src="{{ asset('frontend/images/bear.png') }}" alt="pulbear"
                                    class="w-full h-full object-cover">
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="swiper-pagination z-10 !-bottom-8"></div>
            </div>
        </div>
    </section>
    {{-- Brand items end --}}
@endsection
@push('js')
    <script type="module">
        // import Swiper JS
        import Swiper from '/frontend/js/swiper.min.js';

        // Banner Slider
        const bannerEl = document.querySelector('.banner');
        new Swiper(bannerEl, {
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            spaceBetween: 20,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            on: {
                init: function() {
                    hideControlsIfNotEnoughSlides(bannerEl, this, 1);
                }
            }
        });

        // Arrivals Slider
        new Swiper('.arrivals', {
            slidesPerView: "auto",
            loop: true,
            speed: 10000,
            disableOnInteraction: false,
            spaceBetween: 50,
            pauseOnMouseEnter: true,
            autoplay: {
                delay: 1,
            },
        });

        // Categories Slider

        const categorySwiperEl = document.querySelector('.categories');
        new Swiper(categorySwiperEl, {
            loop: true,
            slidesPerView: 6,
            spaceBetween: 20,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                450: {
                    slidesPerView: 2
                },
                768: {
                    slidesPerView: 3
                },
                1024: {
                    slidesPerView: 4
                },
                1280: {
                    slidesPerView: 5
                },
                1536: {
                    slidesPerView: 6
                },
            },
            on: {
                init: function() {
                    hideControlsIfNotEnoughSlides(categorySwiperEl, this, () => this.params.slidesPerView);
                }
            }
        });

        // Testimonial Slider
        const testimonialEl = document.querySelector('.testimonial');
        new Swiper(testimonialEl, {
            slidesPerView: 3,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            spaceBetween: 20,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
            },
            on: {
                init: function() {
                    hideControlsIfNotEnoughSlides(testimonialEl, this, () => this.params.slidesPerView);
                }
            }
        });

        // brand Slider
        const brandEl = document.querySelector('.brand');
        new Swiper(brandEl, {
            slidesPerView: 'auto',
            speed: 1000,
            disableOnInteraction: false,
            spaceBetween: 50,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            spaceBetween: 20,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                320: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                480: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                640: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 5,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 6,
                    spaceBetween: 20,
                },
            },
            on: {
                init: function() {
                    hideControlsIfNotEnoughSlides(brandEl, this, () => this.params.slidesPerView);
                }
            }
        });
    </script>
@endpush
