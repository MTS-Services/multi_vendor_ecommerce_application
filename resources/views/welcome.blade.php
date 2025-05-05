<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    @vite('resources/css/app.css')
</head>

<body>

    <div class="bg-slate-800 h-screen w-full flex justify-center items-center">
        <div class="">
            <h1 class="text-3xl text-center font-bold text-amber-600">{{ config('app.name', 'Laravel') }}</h1>

            <div class="flex items-center justify-center gap-3 mt-5">
                @auth('web')
                    <a href="{{ route('user.profile') }}"
                        class="px-4 py-2 text-sm font-medium text-white bg-amber-600 border border-transparent rounded-md hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Login</a>
                    <a href="{{ route('register') }}"
                        class="ml-4 px-4 py-2 text-sm font-medium text-white bg-emerald-600 border border-transparent rounded-md hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">Register</a>
                @endauth

                @auth('seller')
                    {{-- <a href="{{ route('seller.profile')}}" --}}
                        class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Seller
                        Dashboard</a>
                @else
                    <a href="{{ route('seller.login') }}"
                        class="px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-purple-500 to-pink-500 border border-transparent rounded-md hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-violet-500">Seller
                        Login</a>
                    <a href="{{ route('seller.register') }}"
                        class="px-4 py-2 text-sm font-medium text-white bg-gradient-to-l from-purple-500 to-pink-500 border-transparent rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">Seller
                        Register</a>
                @endauth

                @auth('admin')
                    <a href="{{ route('admin.dashboard') }}"
                        class="px-4 py-2 text-sm font-medium text-white bg-rose-600 border border-transparent rounded-md hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">Admin
                        Dashboard</a>
                @else
                    <a href="{{ route('admin.login') }}"
                        class="ml-4 px-4 py-2 text-sm font-medium text-white bg-purple-600 border border-transparent rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">Admin
                        Login</a>
                @endauth
            </div>
        </div>
    </div>

</body>

</html>
