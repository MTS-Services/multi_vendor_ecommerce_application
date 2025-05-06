@extends('frontend.layouts.app', ['page_slug' => 'home'])

@section('title', 'Home')

@section('content')
    <div class="container">
        <h1 class=" text-text-danger dark:text-text-white">Home</h1>

        <button class="btn-primary">Click Me <i data-lucide="user"></i></button>
        <button class="btn-secondary">Click Me</button>
        <button class="btn-paginate">1</button>

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

        </div>

    </div>


    <h1>Swiper Js</h1>


    <div class="swiper">
        <div class="swiper-wrapper relative">
            <div class="swiper-slide">
                <button class="filter-btn filter-btn-active">All</button>
            </div>

            <div class="swiper-slide">
                <button class="filter-btn">Web Design</button>
            </div>
            <div class="swiper-slide">
                <button class="filter-btn">Branding</button>
            </div>
            <div class="swiper-slide">
                <button class="filter-btn">Logo</button>
            </div>
            <div class="swiper-slide">
                <button class="filter-btn">Banner</button>
            </div>
            <div class="swiper-slide">
                <button class="filter-btn">Graphics</button>
            </div>

            <div class="swiper-slide">
                <button class="filter-btn">Technology</button>
            </div>

            <div class="swiper-slide">
                <button class="filter-btn">Innovation</button>
            </div>

            <div class="swiper-slide">
                <button class="filter-btn">Fitness</button>
            </div>
        </div>

        <!-- Navigation buttons -->
        <div class="swiper-button swiper-button-prev">
            <i class="fa-solid fa-angle-left"></i>
        </div>

        <div class="swiper-button swiper-button-next">
            <i class="fa-solid fa-angle-right"></i>
        </div>
    </div>


    <div class="min-h-screen">
        Hello world
        <i data-lucide="feather"></i>

        <div class="w-full h-48 bg-gradient-light dark:bg-gradient-dark"></div>
    </div>
@endsection

@push('js')
    <script type="module">
      import Swiper from '/frontend/js/swiper.min.js';

        $(document).ready(function() {
            const filterOptionSwiper = new Swiper('.swiper', {
                slidesPerView: 'auto',
                spaceBetween: 20,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        });
    </script>
@endpush
