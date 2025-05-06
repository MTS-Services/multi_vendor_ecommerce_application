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
                                <img class="w-auto " src="{{ asset('frontend/images/slider-electronic-1.png') }}"
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
                                <img class="" src="{{ asset('frontend/images/slider-electronic-2.png') }}"
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
            <i data-lucide="chevron-left" class="w-5 h-5"></i>
        </div>

        <div class="swiper-button swiper-button-next">
            <i data-lucide="chevron-right" class="w-5 h-5"></i>
        </div>
    </section>
    {{-- -------------------------------------------- banner slider end ----------------------------------- --}}

    {{-- ---------------------------------------- new arival looping slider start--------------------------------------- --}}
    <section class="bg-bg-primary">
        <div class="swiper looping_slider">
            <div class="swiper-wrapper ease-linear">
                <div class="swiper-slide text-center flex w-auto py-6">
                    <h2 class="text-xs md:text-base  text-text-white grayscale hover:grayscale-0;">
                        Lorem
                        ipsum dolor, </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-6">
                    <h2 class="text-xs md:text-base  text-text-white grayscale hover:grayscale-0;">
                        New
                        Offer Arival </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-6">
                    <h2 class="text-xs md:text-base  text-text-white grayscale hover:grayscale-0;">
                        Lorem
                        ipsum dolor, </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-6">
                    <h2 class="text-xs md:text-base  text-text-white grayscale hover:grayscale-0;">
                        New
                        Offer Arival </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-6">
                    <h2 class="text-xs md:text-base  text-text-white grayscale hover:grayscale-0;">
                        Lorem
                        ipsum dolor, </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-6">
                    <h2 class="text-xs md:text-base  text-text-white grayscale hover:grayscale-0;">
                        New
                        Offer Arival </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-6">
                    <h2 class="text-xs md:text-base  text-text-white grayscale hover:grayscale-0;">
                        Lorem
                        ipsum dolor, </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-6">
                    <h2 class="text-xs md:text-base  text-text-white grayscale hover:grayscale-0;">
                        New
                        Offer Arival </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-6">
                    <h2 class="text-xs md:text-base  text-text-white grayscale hover:grayscale-0;">
                        Lorem
                        ipsum dolor, </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-6">
                    <h2 class="text-xs md:text-base  text-text-white grayscale hover:grayscale-0;">
                        New
                        Offer Arival </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-6">
                    <h2 class="text-xs md:text-base  text-text-white grayscale hover:grayscale-0;">
                        Lorem
                        ipsum dolor, </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-6">
                    <h2 class="text-xs md:text-base  text-text-white grayscale hover:grayscale-0;">
                        New
                        Offer Arival </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-6">
                    <h2 class="text-xs md:text-base  text-text-white grayscale hover:grayscale-0;">
                        Lorem
                        ipsum dolor, </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-6">
                    <h2 class="text-xs md:text-base  text-text-white grayscale hover:grayscale-0;">
                        New
                        Offer Arival </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-6">
                    <h2 class="text-xs md:text-base  text-text-white grayscale hover:grayscale-0;">
                        Lorem
                        ipsum dolor, </h2>
                </div>
                <div class="swiper-slide text-center flex w-auto py-6">
                    <h2 class="text-xs md:text-base  text-text-white grayscale hover:grayscale-0;">
                        New
                        Offer Arival </h2>
                </div>

            </div>
        </div>
    </section>
    {{-- --------------------------------------new arival slider looping end ------------------------------- --}}
    {{-- --------------------------------------catagories slider start --------------------------------- --}}
    <section class="container py-15 relative">
        <div class="header">
            <h2 class="text-2xl md:text-4xl font-bold">Categories</h2>
        </div>
        <div class="swiper categories static">
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
            <div class="swiper-button swiper-button-prev">
                <i data-lucide="chevron-left" class="w-5 h-5"></i>
            </div>
            <div class="swiper-button swiper-button-next">
                <i data-lucide="chevron-right" class="w-5 h-5"></i>
            </div>
        </div>
    </section>
    {{-- --------------------------------------catagories slider end --------------------------------- --}}

    {{-- Featured Products  start --}}
    <section class="bg-bg-gray dark:bg-bg-dark py-18">
        <div class="container">
            <div class="header pb-6">
                <h2 class="text-4xl">{{ __('Featured Products') }}</h2>
                <p class="py-3">{{ __('Check out our featured products.') }}</p>
            </div>
            <div class="grid grid-col md:grid-cols-3 lg:grid-cols-4 gap-4">
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
                <div class="left_side flex flex-col lg:gap-y-4 gap-y-2">
                    <h2 class="lg:text-4xl md:text-2xl text-xl ">{{ __('Unmatched Performance') }}</h2>
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
    {{-- Testimonials start --}}
    <section>
        <div class="container py-10 md:py-18">
            <div class="headaer">
                <h2 class="text-4xl pb-5">{{ __('Happy Customers') }}</h2>
            </div>
            <div class="relative">
                <div class="swiper testimonial static">
                    <div class="swiper-wrapper relative">
                        {{-- card 1 --}}
                        <div class="swiper-slide">
                            <div class=" card mx-auto bg-white border rounded-xl  space-y-4">
                                <div class="md:px-6 px-3 md:py-4 py-2">
                                    <div class="flex items-center space-x-1 pt-2">
                                        <h4>{{ __('Jessica M.') }}</h4>
                                        <i data-lucide="badge-check" class="w-4 h-4"></i>
                                        <span class="text-xs">{{ __('Verified Buyer') }}</span>
                                    </div>
                                    <div class="flex space-x-1 text-text-danger md:py-5 py-2">
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                    </div>
                                    <p class="lg:text-sm text-xs  ">
                                        {{ __('  I love the gadget I purchased! The build quality is excellent, and the performance is
                                                                                                                                                                                                                                                                                                                                                                top-notch.
                                                                                                                                                                                                                                                                                                                                                                I’ve gotten so many compliments on it. Will definitely shop here again!') }}
                                    </p>
                                </div>
                                <div
                                    class=" border-t flex items-center space-x-4 gap-1 md:gap-3 md:px-6 px-3 md:py-4 py-2">
                                    <img src="{{ asset('frontend/images/author-electric1.jpg') }}" alt="">
                                    <div class="text">
                                        <p class="text-xs pb-2">{{ __('Item purchased: ') }}<span
                                                class=" text-sm font-semibold hover:text-text-danger ">{{ __('Instax Mini 12
                                                                                                                                                                                                                                                                                                                                                                                                                                        Camera') }}</span>
                                        </p>
                                        <p class="text-sm font-semibold">{{ __('$130.00') }}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- card 2 --}}
                        <div class="swiper-slide">
                            <div class=" card mx-auto bg-white border rounded-xl  space-y-4">
                                <div class="md:px-6 px-3 md:py-4 py-2">
                                    <div class="flex items-center space-x-1 pt-2">
                                        <h4>{{ __('Jessica M.') }}</h4>
                                        <i data-lucide="badge-check" class="w-4 h-4"></i>
                                        <span class="text-xs">{{ __('Verified Buyer') }}</span>
                                    </div>
                                    <div class="flex space-x-1 text-text-danger md:py-5 py-2">
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                    </div>
                                    <p class="lg:text-sm text-xs  ">
                                        {{ __('  I love the gadget I purchased! The build quality is excellent, and the performance is
                                                                                                                                                                                                                                                                                                                                                                top-notch.
                                                                                                                                                                                                                                                                                                                                                                I’ve gotten so many compliments on it. Will definitely shop here again!') }}
                                    </p>
                                </div>
                                <div
                                    class=" border-t flex items-center space-x-4 gap-1 md:gap-3 md:px-6 px-3 md:py-4 py-2">
                                    <img src="{{ asset('frontend/images/author-electric1.jpg') }}" alt="">
                                    <div class="text">
                                        <p class="text-xs pb-2">{{ __('Item purchased: ') }}<span
                                                class=" text-sm font-semibold hover:text-text-danger ">{{ __('Instax Mini 12
                                                                                                                                                                                                                                                                                                                                                                                                                                        Camera') }}</span>
                                        </p>
                                        <p class="text-sm font-semibold">{{ __('$130.00') }}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- card 3 --}}
                        <div class="swiper-slide">
                            <div class=" card mx-auto bg-white border rounded-xl  space-y-4">
                                <div class="md:px-6 px-3 md:py-4 py-2">
                                    <div class="flex items-center space-x-1 pt-2">
                                        <h4>{{ __('Jessica M.') }}</h4>
                                        <i data-lucide="badge-check" class="w-4 h-4"></i>
                                        <span class="text-xs">{{ __('Verified Buyer') }}</span>
                                    </div>
                                    <div class="flex space-x-1 text-text-danger md:py-5 py-2">
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                    </div>
                                    <p class="lg:text-sm text-xs  ">
                                        {{ __('  I love the gadget I purchased! The build quality is excellent, and the performance is
                                                                                                                                                                                                                                                                                                                                                                top-notch.
                                                                                                                                                                                                                                                                                                                                                                I’ve gotten so many compliments on it. Will definitely shop here again!') }}
                                    </p>
                                </div>
                                <div
                                    class=" border-t flex items-center space-x-4 gap-1 md:gap-3 md:px-6 px-3 md:py-4 py-2">
                                    <img src="{{ asset('frontend/images/author-electric1.jpg') }}" alt="">
                                    <div class="text">
                                        <p class="text-xs pb-2">{{ __('Item purchased: ') }}<span
                                                class=" text-sm font-semibold hover:text-text-danger ">{{ __('Instax Mini 12
                                                                                                                                                                                                                                                                                                                                                                                                                                        Camera') }}</span>
                                        </p>
                                        <p class="text-sm font-semibold">{{ __('$130.00') }}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- card 4 --}}
                        <div class="swiper-slide">
                            <div class=" card mx-auto bg-white border rounded-xl  space-y-4">
                                <div class="md:px-6 px-3 md:py-4 py-2">
                                    <div class="flex items-center space-x-1 pt-2">
                                        <h4>{{ __('Jessica M.') }}</h4>
                                        <i data-lucide="badge-check" class="w-4 h-4"></i>
                                        <span class="text-xs">{{ __('Verified Buyer') }}</span>
                                    </div>
                                    <div class="flex space-x-1 text-text-danger md:py-5 py-2">
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                    </div>
                                    <p class="lg:text-sm text-xs  ">
                                        {{ __('  I love the gadget I purchased! The build quality is excellent, and the performance is
                                                                                                                                                                                                                                                                                                                                                                top-notch.
                                                                                                                                                                                                                                                                                                                                                                I’ve gotten so many compliments on it. Will definitely shop here again!') }}
                                    </p>
                                </div>
                                <div
                                    class=" border-t flex items-center space-x-4 gap-1 md:gap-3 md:px-6 px-3 md:py-4 py-2">
                                    <img src="{{ asset('frontend/images/author-electric1.jpg') }}" alt="">
                                    <div class="text">
                                        <p class="text-xs pb-2">{{ __('Item purchased: ') }}<span
                                                class=" text-sm font-semibold hover:text-text-danger ">{{ __('Instax Mini 12
                                                                                                                                                                                                                                                                                                                                                                                                                                        Camera') }}</span>
                                        </p>
                                        <p class="text-sm font-semibold">{{ __('$130.00') }}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- card 5 --}}
                        <div class="swiper-slide">
                            <div class=" card mx-auto bg-white border rounded-xl  space-y-4">
                                <div class="md:px-6 px-3 md:py-4 py-2">
                                    <div class="flex items-center space-x-1 pt-2">
                                        <h4>{{ __('Jessica M.') }}</h4>
                                        <i data-lucide="badge-check" class="w-4 h-4"></i>
                                        <span class="text-xs">{{ __('Verified Buyer') }}</span>
                                    </div>
                                    <div class="flex space-x-1 text-text-danger md:py-5 py-2">
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                    </div>
                                    <p class="lg:text-sm text-xs  ">
                                        {{ __('  I love the gadget I purchased! The build quality is excellent, and the performance is
                                                                                                                                                                                                                                                                                                                                                                top-notch.
                                                                                                                                                                                                                                                                                                                                                                I’ve gotten so many compliments on it. Will definitely shop here again!') }}
                                    </p>
                                </div>
                                <div
                                    class=" border-t flex items-center space-x-4 gap-1 md:gap-3 md:px-6 px-3 md:py-4 py-2">
                                    <img src="{{ asset('frontend/images/author-electric1.jpg') }}" alt="">
                                    <div class="text">
                                        <p class="text-xs pb-2">{{ __('Item purchased: ') }}<span
                                                class=" text-sm font-semibold hover:text-text-danger ">{{ __('Instax Mini 12
                                                                                                                                                                                                                                                                                                                                                                                                                                        Camera') }}</span>
                                        </p>
                                        <p class="text-sm font-semibold">{{ __('$130.00') }}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- card 6 --}}
                        <div class="swiper-slide">
                            <div class=" card mx-auto bg-white border rounded-xl  space-y-4">
                                <div class="md:px-6 px-3 md:py-4 py-2">
                                    <div class="flex items-center space-x-1 pt-2">
                                        <h4>{{ __('Jessica M.') }}</h4>
                                        <i data-lucide="badge-check" class="w-4 h-4"></i>
                                        <span class="text-xs">{{ __('Verified Buyer') }}</span>
                                    </div>
                                    <div class="flex space-x-1 text-text-danger md:py-5 py-2">
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                        <i data-lucide="star" class="w-4 h-4 fill-text-danger"></i>
                                    </div>
                                    <p class="lg:text-sm text-xs  ">
                                        {{ __('  I love the gadget I purchased! The build quality is excellent, and the performance is
                                                                                                                                                                                                                                                                                                                                                                top-notch.
                                                                                                                                                                                                                                                                                                                                                                I’ve gotten so many compliments on it. Will definitely shop here again!') }}
                                    </p>
                                </div>
                                <div
                                    class=" border-t flex items-center space-x-4 gap-1 md:gap-3 md:px-6 px-3 md:py-4 py-2">
                                    <img src="{{ asset('frontend/images/author-electric1.jpg') }}" alt="">
                                    <div class="text">
                                        <p class="text-xs pb-2">{{ __('Item purchased: ') }}<span
                                                class=" text-sm font-semibold hover:text-text-danger ">{{ __('Instax Mini 12
                                                                                                                                                                                                                                                                                                                                                                                                                                        Camera') }}</span>
                                        </p>
                                        <p class="text-sm font-semibold">{{ __('$130.00') }}</p>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="swiper-pagination z-10 !-bottom-6 lg:!-bottom-8"></div>
                    <!-- Navigation buttons -->
                    <div class="swiper-button swiper-button-prev ">
                        <i data-lucide="chevron-left" class="w-5 h-5"></i>
                    </div>

                    <div class="swiper-button swiper-button-next ">
                        <i data-lucide="chevron-right" class="w-5 h-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- testimonial section end --}}
    {{-- Brand items --}}
    <section>
        <div class="container relative">
            <div class="swiper brand static">
                <div class="swiper-wrapper">
                    {{-- <div class="images flex items-center justify-center"> --}}
                    <div class="swiper-slide">
                        <div class="imag border">
                            <img class=" " src="{{ asset('frontend/images/zara.png') }}" alt="zara">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="imag border">
                            <img class=" " src="{{ asset('frontend/images/bear.png') }}" alt="pulbear">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="imag border">
                            <img class=" " src="{{ asset('frontend/images/nike.png') }}" alt="nike">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="imag border">
                            <img class=" " src="{{ asset('frontend/images/asos.png') }}" alt="asos">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="imag border">
                            <img class=" " src="{{ asset('frontend/images/burberry.png') }}" alt="burberry">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="imag border">
                            <img class=" " src="{{ asset('frontend/images/forever.png') }}" alt="forever">
                        </div>
                    </div>

                    {{-- </div> --}}
                </div>
                <div class="swiper-pagination z-10 !-bottom-8"></div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script type="module">
        // import Swiper JS
        import Swiper from '/frontend/js/swiper.min.js';
        // Banner Slider
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
        // Looping Slider
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

        // Categories Slider
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
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1280: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
                1536: {
                    slidesPerView: 5,
                    spaceBetween: 20,
                },

            },
        });

        // Testimonial Slider
        new Swiper('.testimonial', {
            slidesPerView: 3,
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
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },


            },
        });
        new Swiper('.brand', {
            slidesPerView: 3,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
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
                550: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                800: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
                1280: {
                    slidesPerView: 6,
                    spaceBetween: 20,
                }


            },
        });
    </script>
@endpush
