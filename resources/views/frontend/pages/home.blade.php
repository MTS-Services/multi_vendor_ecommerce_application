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
    <div class="min-h-screen">
        Hello world
        <i data-lucide="feather"></i>

        <div class="w-full h-48 bg-gradient-light dark:bg-gradient-dark"></div>
    </div>
@endsection
