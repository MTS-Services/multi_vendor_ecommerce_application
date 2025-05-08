@extends('frontend.layouts.app', ['page_slug' => 'user-profile'])

@section('title', 'User Profile')

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
                <a href="#" class="text-text-gray hover:text-text-accent">Home</a>
            </li>
            <li class="relative bracamb-dot">
                <span class="font-midium">Account</span>
            </li>
        </ul>
    </div>

    <!-- Header -->
    <div class="container mx-auto px-4 py-8 text-center">
        <div class="flex flex-col items-center justify-center">
            <h1 class="text-4xl font-semibold">My Account</h1>
        </div>
    </div>
    {{-- Main Content Start Here --}}
    <div class="container">
        <div class="flex flex-col lg:flex-row gap-15 mt-10">
            <div class="lg:w-1/5">
                <ul
                    class="sticky top-32 flex flex-col bg-gradient-light dark:bg-gradient-dark border border-border-light dark:border-opacity-30 rounded-md overflow-hidden">
                    <li class="font-semibold text-lg bg-bg-accent bg-opacity-100 text-text-white"><a href="#"
                            class="block p-3">Dashboard</a></li>
                    <li class="text-md font-medium border-b border-border-light dark:border-opacity-30"><a
                            href="#"class="block p-3 hover:text-text-accent transition-all duration-300 ease-linear">My Orders</a></li>
                    <li class="text-md font-medium border-b border-border-light dark:border-opacity-30"><a
                            href="#"class="block p-3 hover:text-text-accent transition-all duration-300 ease-linear">My Wishlist</a></li>
                    <li class="text-md font-medium border-b border-border-light dark:border-opacity-30"><a
                            href="#"class="block p-3 hover:text-text-accent transition-all duration-300 ease-linear">Addresses</a></li>
                    <li class="text-md font-medium"><a href="#"class="block p-3 hover:text-text-danger transition-all duration-300 ease-linear">Log Out</a></li>
                </ul>
            </div>
            <div class="lg:w-4/5">
                {{-- Title  --}}
                <h2 class="text-3xl font-semibold">Hello Vinetant Pham! <span class="text-sm">(not Vinetant Pham?<a
                            class="text-text-accent underline hover:text-text-primary transition-all duration-300 ease-linear"
                            href="#">Log Out</a>)</span></h2>
                <p class="text-md text-text-primary dark:text-text-white mt-3">Today is a great day to check your account page. You can check <a
                        href="#"
                        class="text-text-accent underline hover:text-text-primary transition-all duration-300 ease-linear">your
                        last orders</a> or have a look to <a href="#"
                        class="text-text-accent underline hover:text-text-primary transition-all duration-300 ease-linear">your
                        wishlist</a>. Or maybe you can start to shop our <a href="#"
                        class="text-text-accent underline hover:text-text-primary transition-all duration-300 ease-linear">latest
                        offers</a> ?</p>

                {{-- Card --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 my-10">
                    <div class="w-full">
                        <a href="#">
                            <div
                                class="relative flex flex-col items-center justify-center bg-gradient-light dark:bg-gradient-darkborder border-border-light dark:border-opacity-30 rounded-md overflow-hidden p-8">
                                <div class="relative">
                                    <i data-lucide="shopping-bag" class="w-12 h-12 dark:text-text-secondary"></i>
                                    <span
                                    class="absolute -top-4 -right-4 bg-bg-accent text-text-white text-xs w-8 h-8 flex items-center justify-center rounded-full">1</span>
                                </div>
                                <h3 class="text-2xl font-semibold mt-3 dark:text-text-secondary hover:text-text-accent">Orders</h3>
                                <p class="text-md text-text-primary mt-3">Check the history of all your orders</p>
                            </div>
                        </a>
                    </div>
                    <div class="w-full ">
                        <a href="#">
                            <div
                                class="flex flex-col items-center justify-center bg-gradient-light dark:bg-gradient-darkborder border-border-light dark:border-opacity-30 rounded-md overflow-hidden p-8">
                                <div class="relative">
                                    <i data-lucide="heart" class="w-12 h-12 dark:text-text-secondary"></i>
                                    <span
                                    class="absolute -top-4 -right-4 bg-bg-accent text-text-white text-xs w-8 h-8 flex items-center justify-center rounded-full">1</span>
                                </div>
                                <h3 class="text-2xl font-semibold mt-3 dark:text-text-secondary hover:text-text-accent">Wishlist</h3>
                                <p class="text-md text-text-primary mt-3">Check your Wishlist</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Main Content End Here --}}
@endsection
