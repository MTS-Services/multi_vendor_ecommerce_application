@extends('frontend.layouts.app', ['page_slug' => 'home'])

@section('title', 'Home')

@section('content')
    {{-- ---------------------------------------- banner slider start -------------------- --}}
    <section class="swiper banner">
        <div class="swiper-wrapper relative">
            <div class="swiper-slide">
                <section class="bg-bg-danger">
                    <div class="container ">
                        <div class="slid flex-row flex items-center justify-between">
                            <div class="text">
                                <p class="text-xs md:text-base">{{ __('APPLE WATCHES COLLECTION') }}</p>
                                <h2 class="text-2xl md:text-6xl py-4 ">{{ __('Sale up to') }} <br>{{ __(' 15% off') }}</h2>
                                <a href="#" class="btn-primary">{{ __('Shop Now') }} <i
                                        data-lucide="chevron-right"></i></i></a>
                            </div>
                            <div class="image">
                                <img class=" " src="{{ asset('frontend/images/slider-electronic-1.png') }}"
                                    alt="Slider Image">
                            </div>

                        </div>
                    </div>
                </section>
            </div>
            <div class="swiper-slide">
                <section class="bg-bg-light">
                    <div class="container ">
                        <div class="slid flex-row flex items-center justify-between">
                            <div class="text">
                                <p class="text-xs md:text-base">{{ __('APPLE WATCHES COLLECTION') }}</p>
                                <h2 class="text-2xl md:text-6xl py-4 ">{{ __('Sale up to') }} <br>{{ __(' 15% off') }}</h2>
                                <a href="#" class="btn-primary">{{ __('Shop Now') }} <i
                                        data-lucide="chevron-right"></i></i></a>
                            </div>
                            <div class="image">
                                <img class="" src="{{ asset('frontend/images/slider-electronic-1.png') }}"
                                    alt="Slider Image">
                            </div>

                        </div>
                    </div>
                </section>
            </div>
            <div class="swiper-slide">
                <section class="bg-bg-danger">
                    <div class="container ">
                        <div class="slid flex-row flex items-center justify-between">
                            <div class="text">
                                <p class="text-xs md:text-base">{{ __('APPLE WATCHES COLLECTION') }}</p>
                                <h2 class="text-2xl md:text-6xl py-4 ">{{ __('Sale up to') }} <br>{{ __(' 15% off') }}
                                </h2>
                                <a href="#" class="btn-primary">{{ __('Shop Now') }} <i
                                        data-lucide="chevron-right"></i></i></a>
                            </div>
                            <div class="image">
                                <img class="" src="{{ asset('frontend/images/slider-electronic-1.png') }}"
                                    alt="Slider Image">
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="swiper-pagination z-10"></div>
        <!-- Navigation buttons -->
        <div class="swiper-button swiper-button-prev">
            <i data-lucide="chevron-right"></i>
        </div>

        <div class="swiper-button swiper-button-next">
            <i data-lucide="chevron-left"></i>
        </div>
    </section>
    {{-- -------------------------------------------- banner slider end ----------------------------------- --}}

    {{-- ---------------------------------------- new arival start--------------------------------------- --}}
    <section class="bg-bg-primary">
        <div class="swiper looping_slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide text-center flex w-auto py-5">
                    <h2 class="w-32 md:w-40 lg:w-48 h-auto object-cover text-text-white grayscale hover:grayscale-0;">
                        Lorem
                        ipsum dolor, </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-5">
                    <h2 class="w-32 md:w-40 lg:w-48 h-auto object-cover text-text-white grayscale hover:grayscale-0;">
                        New
                        Offer Arival </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-5">
                    <h2 class="w-32 md:w-40 lg:w-48 h-auto object-cover text-text-white grayscale hover:grayscale-0;">
                        Lorem
                        ipsum dolor, </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-5">
                    <h2 class="w-32 md:w-40 lg:w-48 h-auto object-cover text-text-white grayscale hover:grayscale-0;">
                        New
                        Offer Arival </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-5">
                    <h2 class="w-32 md:w-40 lg:w-48 h-auto object-cover text-text-white grayscale hover:grayscale-0;">
                        Lorem
                        ipsum dolor, </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-5">
                    <h2 class="w-32 md:w-40 lg:w-48 h-auto object-cover text-text-white grayscale hover:grayscale-0;">
                        New
                        Offer Arival </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-5">
                    <h2 class="w-32 md:w-40 lg:w-48 h-auto object-cover text-text-white grayscale hover:grayscale-0;">
                        Lorem
                        ipsum dolor, </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-5">
                    <h2 class="w-32 md:w-40 lg:w-48 h-auto object-cover text-text-white grayscale hover:grayscale-0;">
                        New
                        Offer Arival </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-5">
                    <h2 class="w-32 md:w-40 lg:w-48 h-auto object-cover text-text-white grayscale hover:grayscale-0;">
                        Lorem
                        ipsum dolor, </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-5">
                    <h2 class="w-32 md:w-40 lg:w-48 h-auto object-cover text-text-white grayscale hover:grayscale-0;">
                        New
                        Offer Arival </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-5">
                    <h2 class="w-32 md:w-40 lg:w-48 h-auto object-cover text-text-white grayscale hover:grayscale-0;">
                        Lorem
                        ipsum dolor, </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-5">
                    <h2 class="w-32 md:w-40 lg:w-48 h-auto object-cover text-text-white grayscale hover:grayscale-0;">
                        New
                        Offer Arival </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-5">
                    <h2 class="w-32 md:w-40 lg:w-48 h-auto object-cover text-text-white grayscale hover:grayscale-0;">
                        Lorem
                        ipsum dolor, </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-5">
                    <h2 class="w-32 md:w-40 lg:w-48 h-auto object-cover text-text-white grayscale hover:grayscale-0;">
                        New
                        Offer Arival </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-5">
                    <h2 class="w-32 md:w-40 lg:w-48 h-auto object-cover text-text-white grayscale hover:grayscale-0;">
                        Lorem
                        ipsum dolor, </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-5">
                    <h2 class="w-32 md:w-40 lg:w-48 h-auto object-cover text-text-white grayscale hover:grayscale-0;">
                        New
                        Offer Arival </h2>
                </div>

            </div>
        </div>
    </section>
    {{-- --------------------------------------new arival slider end ------------------------------- --}}
    {{-- --------------------------------------catagories slider start --------------------------------- --}}
    <section class="container py-15">
        <div class="header">
            <h2 class="text-2xl md:text-4xl font-bold">Categories</h2>
        </div>
        <div class="swiper categories">
            <div class="swiper-wrapper relative">

                <div class="swiper-slide">
                    <img src="{{ asset('frontend/images/airpod-pro-black.jpg') }}" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('frontend/images/earphone.png') }}" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('frontend/images/airpod-pro-black.jpg') }}" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('frontend/images/earphone.png') }}" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('frontend/images/airpod-pro-black.jpg') }}" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('frontend/images/earphone.png') }}" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('frontend/images/airpod-pro-black.jpg') }}" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('frontend/images/earphone.png') }}" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('frontend/images/airpod-pro-black.jpg') }}" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('frontend/images/earphone.png') }}" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('frontend/images/airpod-pro-black.jpg') }}" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('frontend/images/earphone.png') }}" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('frontend/images/airpod-pro-black.jpg') }}" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('frontend/images/earphone.png') }}" alt="">
                </div>

            </div>
            <div class="swiper-pagination z-10"></div>
            <!-- Navigation buttons -->
            <div class="swiper-button swiper-button-prev border rounded-full p-6">
                <i data-lucide="chevron-right" class="w-5 h-5"></i>
            </div>
            <div class="swiper-button swiper-button-next border rounded-full p-6">
                <i data-lucide="chevron-left" class="w-5 h-5"></i>
            </div>
        </div>
    </section>
    {{-- Featured Products  start --}}
    <section class="bg-bg-gray dark:bg-bg-dark py-18">
        <div class="container">
            <div class="header pb-6">
                <h2 class="text-4xl">{{ __('Featured Products') }}</h2>
                <p class="py-3">{{ __('Check out our featured products.') }}</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
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
    {{--    Featured Products  end --}}
    {{--  Unmatched Performance start   --}}
    <section class="bg-bg-white dark:bg-bg-dark py-18">
        <div class="container">
            <div class="main  rounded-xl bg-gradient-primary dark:bg-gradient-dark  flex items-center justify-around">
                <div class="left_side flex flex-col gap-y-4">
                    <h2 class="text-4xl ">{{ __('Unmatched Performance') }}</h2>
                    <p>{{ __('Upgrade your devices with cutting-edge technology.') }}</p>
                    <a href="#" class="btn-primary">{{ __('Shop Now') }} <i
                            data-lucide="chevron-right"></i></i></a>
                </div>
                <div class="right_side">
                    <img src="{{ asset('frontend/images/home_phone.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    {{--  Unmatched Performance end --}}
@endsection
@push('js')
    <script type="module">
        import Swiper from '/frontend/js/swiper.min.js';

        new Swiper('.banner', {
            slidesPerView: 1,
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
        });
        const loopingSlider = new Swiper('.looping_slider', {
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

        const sliderElement = document.querySelector('.looping_slider');

        sliderElement.addEventListener('mouseenter', () => {
            loopingSlider.autoplay.stop();
        });

        sliderElement.addEventListener('mouseleave', () => {
            loopingSlider.autoplay.start();
        });
        new Swiper('.categories', {
            slidesPerView: 6,
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
        });
    </script>
@endpush
