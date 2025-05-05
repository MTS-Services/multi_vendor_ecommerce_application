@extends('frontend.layouts.app', ['page_slug' => 'home'])

@section('title', 'Home')

@section('content')
    {{-- Featured Products --}}
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
    {{--     --}}
    <section class="bg-bg-white dark:bg-bg-dark py-18">
        <div class="container">
            <div class="main  rounded-xl bg-gradient-primary dark:bg-gradient-dark  flex items-center justify-around">
                <div class="left_side flex flex-col gap-y-4">
                    <h2 class="text-4xl ">{{ __('Unmatched Performance') }}</h2>
                    <p>{{ __('Upgrade your devices with cutting-edge technology.') }}</p>
                    <a href="#" class="btn-primary">{{ __('Shop Now') }} <i data-lucide="chevron-right"></i></i></a>
                </div>
                <div class="right_side">
                    <img src="{{ asset('frontend/images/home_phone.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
@endsection
