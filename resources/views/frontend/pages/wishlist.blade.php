@extends('frontend.layouts.app', ['page_slug' => 'wishlist'])

@section('title', 'Wishlist')
@push('css')
<style>
    .bracamb-dot::before {
        content: "";
        height: 6px;
        width: 6px;
        border-radius: 50%;
        background-color: #8752FA;
        display: inline-block;
        margin-right: 3px;
    }
</style>
    
@endpush
@section('content')
    <!-- Breadcrumb -->
    <div class="container mx-auto px-4 py-4 text-sm">
        <ul class="flex items-center gap-2 ">
            <li>
                <a href="#" class="text-text-gray hover:text-text-accent">{{ __("Home") }}</a>
            </li>
            <li class="relative bracamb-dot capitalize">
                <span class="font-midium">{{ __("Accoute") }}</span>
            </li>
        </ul>
    </div>

    <!-- Header -->
    <div class="container mx-auto px-4 py-8 text-center">
        <div class="flex flex-col items-center justify-center">
            <h1 class="text-4xl font-medium mb-3 capitalize">{{ __("My Wishlist") }}</h1>
        </div>
    </div>
    {{-- Produts --}}
    <div class="container">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-5">

            @php
                $collections = collect([
                    'id' => 1,
                    'image' => 'frontend/images/t-shirt.jpg',
                    'title' => 'Turtleneck T-Shirt',
                    'price' => 100.0,
                    'old_price' => 120.0,
                ]);
            @endphp

            <x-frontend.product :items="$collections" />
            <x-frontend.product :items="$collections" />
            <x-frontend.product :items="$collections" />

        </div>
        {{-- Page inner --}}
        <div class="flex justify-center items-center gap-2 mt-10">
            <button class="btn-paginate">{{ __('1') }}</button>
            <button class="btn-paginate">{{ __('2') }}</button>
            <button class="btn-paginate"><span class="text-center"><i class="text-sm ms-2"
                        data-lucide="chevron-right"></i></span></button>
        </div>
    </div>
@endsection