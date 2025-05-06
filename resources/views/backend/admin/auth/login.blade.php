@extends('layouts.app')
@section('title', 'Admin Login')
@section('content')
<div class="min-h-screen bg-white flex items-center justify-center px-4 py-10">
    <div class="w-full max-w-6xl bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col-reverse md:flex-row">

        <!-- Left Side: Form -->
        <div class="w-full md:w-1/2 p-8 sm:p-10 md:p-12 flex flex-col justify-center">
            <h2 class="text-3xl font-bold text-center mb-6">Admin Login</h2>

            <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                           placeholder="Email Address"
                           class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-accent @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="relative">
                    <input id="password" type="password" name="password" required
                           placeholder="Password"
                           class="w-full px-4 py-3 border rounded-md pr-10 focus:outline-none focus:ring-2 focus:ring-accent @error('password') border-red-500 @enderror">
                    <i class="fas fa-eye absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-400 cursor-pointer"></i>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center gap-2 text-sm">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="form-checkbox">
                    <label for="remember" class="text-gray-600">Remember Me</label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="w-full bg-accent hover:bg-secondary text-white py-3 rounded-md transition duration-200 font-medium">
                    Login
                </button>

                <!-- Forgot Password (optional) -->
                {{-- @if (Route::has('password.request')) --}}
                {{-- <div class="text-center mt-3"> --}}
                    {{-- <a href="{{ route('password.request') }}" class="text-sm text-accent hover:underline">Forgot Your Password?</a> --}}
                {{-- </div> --}}
                {{-- @endif --}}
            </form>
        </div>

        <!-- Right Side: Image -->
        <div class="w-full md:w-1/2 h-64 md:h-auto">
            <img src="{{ asset('/frontend/images/5464026.jpg') }}" alt="Login Image"
                 class="w-full h-full object-cover">
        </div>
    </div>
</div>
@endsection
