@extends('frontend.layouts.app')
@section('content')
    <section class="py-20">
        <div class="container">
            <div
                class="flex flex-col md:flex-row shadow-shadowPrimary shadow-shadow-dark/10 dark:shadow-shadow-light/10 rounded-2xl w-full overflow-hidden bg-bg-white dark:bg-bg-darkTertiary">
                <!-- Left Side: Form -->
                <div class="w-full md:w-1/2 p-10 md:p-12 flex flex-col justify-center">
                    <h2 class="text-3xl font-semibold text-center mb-6">{{ __('Login your account') }}</h2>
                    <form class="space-y-5" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="flex items-center justify-between gap-3">
                            <label class="input">
                                <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none"
                                        stroke="currentColor">
                                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </g>
                                </svg>
                                <input type="text" placeholder="Username or email"
                                    name="email" />
                                <x-frontend.input-error :datas="['errors' => $errors, 'field' => 'email']" />
                            </label>

                        </div>
                        <label class="input">
                            <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none"
                                    stroke="currentColor">
                                    <path
                                        d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z">
                                    </path>
                                    <circle cx="16.5" cy="7.5" r=".5" fill="currentColor"></circle>
                                </g>
                            </svg>
                            <input type="password" placeholder="Password" name="password" />
                        </label>

                        <div class="mt-5 flex justify-between items-center gap-5 flex-wrap">
                            <button type="submit" class="btn-primary">{{ __('Login') }}</button>
                            <p class="text-center text-sm mt-4">
                                {{ __('Don\'t have an account?') }} <a href="{{ route('auth.user.register') }}"
                                    class="text-text-tertiary font-medium">
                                    {{ __('Sign up') }} </a>
                            </p>
                        </div>
                    </form>
                    <div>
                        <div class="divider">{{ __('Or sign up with') }}</div>
                        <div class="grid grid-cols-2 gap-4">
                            <a href="#" class="btn-primary rounded-md w-full gap-3">
                                <i class='bx bxl-google text-2xl'></i> {{ __('Google') }}
                            </a>
                            <button type="button" class="btn-secondary rounded-md w-full gap-3">
                                <i class='bx bxl-facebook text-2xl'></i> {{ __('Facebook') }}
                            </button>
                        </div>
                        <div class="text-center text-sm mt-4">
                            {{ __('Become a') }} <a href="#"
                                class="text-text-accent font-medium">{{ __('Seller') }}</a>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Image -->
                <div class="w-full md:w-1/2">
                    <img src="{{ asset('/frontend/images/5464026.jpg') }}" alt="Register Image"
                        class="w-full h-full object-cover" />
                </div>
            </div>
        </div>
    </section>
@endsection
