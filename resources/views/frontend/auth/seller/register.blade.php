@extends('frontend.layouts.app')
@section('content')
    <section class="py-20">
        <div class="container">
            <div
                class="flex flex-col xl:flex-row-reverse shadow-shadowPrimary shadow-shadow-dark/10 dark:shadow-shadow-light/10 rounded-2xl w-full overflow-hidden bg-bg-white dark:bg-bg-darkTertiary">
                <!-- Left Side: Form -->
                <div class="w-full xl:w-1/2 p-10 md:p-12 flex flex-col justify-center">
                    <h2 class="text-3xl font-semibold text-center mb-6">{{ __('Join Our Seller Community') }}</h2>
                    <form class="space-y-5" action="{{ route('seller.register.submit') }}" method="POST">
                        @csrf

                        {{-- Name Field --}}
                        <div>
                            <div class="flex items-center flex-wrap lg:flex-nowrap justify-between gap-3">
                                <div class="w-full">
                                    <label class="w-full">
                                        <input type="text" placeholder="First Name" name="first_name" class="input" />
                                    </label>
                                    <x-frontend.input-error :datas="['errors' => $errors, 'field' => 'first_name']" />
                                </div>
                                <div class="w-full">
                                    <label class="w-full">
                                        <input type="text" placeholder="Last Name" name="last_name" class="input" />
                                    </label>
                                    <x-frontend.input-error :datas="['errors' => $errors, 'field' => 'last_name']" />
                                </div>
                            </div>

                            {{-- Name Error Box --}}
                            <div class="flex items-center flex-wrap lg:flex-nowrap justify-between gap-3">
                                <div class="w-full">
                                    <x-frontend.input-error :datas="['errors' => $errors, 'field' => 'first_name']" />
                                </div>
                                <div class="w-full">
                                    <x-frontend.input-error :datas="['errors' => $errors, 'field' => 'last_name']" />
                                </div>
                            </div>
                        </div>

                        {{-- Email Field --}}
                        <div class="w-full">
                            <label class="input">
                                <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none"
                                        stroke="currentColor">
                                        <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                                    </g>
                                </svg>
                                <input type="email" placeholder="Email" name="email" />
                            </label>
                            <x-frontend.input-error :datas="['errors' => $errors, 'field' => 'email']" />
                        </div>

                        {{-- Location Fields Grid --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            {{-- Country --}}
                            <div>

                                <div class="relative">
                                    <select name="country_id" id="country"
                                        class="appearance-none w-full rounded-md border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 p-2.5 pr-10 text-sm">
                                        <option value="" selected hidden>{{ __('Select Country') }}</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                                <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'country_id']" />
                            </div>

                            {{-- State --}}
                            <div>

                                <div class="relative">
                                    <select name="state_id" id="state"
                                        class="appearance-none w-full rounded-md border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 p-2.5 pr-10 text-sm"
                                        disabled>
                                        <option value="" selected hidden>{{ __('Select State') }}</option>
                                    </select>

                                    {{-- Custom dropdown icon --}}
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>

                                <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'state_id']" />
                            </div>

                            {{-- City --}}
                            <div>

                                <div class="relative">
                                    <select name="city_id" id="city"
                                        class="appearance-none w-full rounded-md border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 p-2.5 pr-10 text-sm"
                                        disabled>
                                        <option value="" selected hidden>{{ __('Select City') }}</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                                <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'city_id']" />
                            </div>


                            {{-- Hub --}}
                            <div>
                                <select name="hub_id" id="hub"
                                    class="w-full rounded-md border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 p-2.5 text-sm"
                                    disabled>
                                    <option value="" selected hidden>{{ __('Select Hub') }}</option>
                                </select>

                                <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'hub_id']" />
                            </div>
                        </div>
                        {{-- sHOP NAME --}}
                        <div class="flex items-center flex-wrap lg:flex-nowrap justify-between gap-3">
                            <div class="w-full">
                                <label class="w-full">
                                    <input type="text" placeholder="Shop Name" name="shop_name" class="input" />
                                </label>
                            </div>
                        </div>

                        {{-- Password Field --}}
                        <div>
                            <div class="flex items-center justify-between flex-wrap lg:flex-nowrap gap-3">
                                <div class="w-full">
                                    <label class="input relative">
                                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24">
                                            <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5"
                                                fill="none" stroke="currentColor">
                                                <path
                                                    d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z">
                                                </path>
                                                <circle cx="16.5" cy="7.5" r=".5" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                        <input type="password" placeholder="Password" name="password" />
                                        <button type="button"
                                            class="showpassword absolute top-1/2 right-1 transform -translate-y-1/2 w-8 h-8 flex items-center justify-center rounded-full text-text-white bg-bg-accent bg-opacity-70 hover:bg-opacity-100 hover:text-text-white transition-all duration-300 ease-linear">
                                            <i data-lucide="eye-off" class="w-4 h-4"></i>
                                        </button>
                                    </label>
                                </div>
                                <div class="w-full">
                                    <label class="input relative">
                                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24">
                                            <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5"
                                                fill="none" stroke="currentColor">
                                                <path
                                                    d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z">
                                                </path>
                                                <circle cx="16.5" cy="7.5" r=".5" fill="currentColor">
                                                </circle>
                                            </g>
                                        </svg>
                                        <input type="password" placeholder="Confirm Password"
                                            name="password_confirmation" />
                                        <button type="button"
                                            class="showpassword absolute top-1/2 right-1 transform -translate-y-1/2 w-8 h-8 flex items-center justify-center rounded-full text-text-white bg-bg-accent bg-opacity-70 hover:bg-opacity-100 hover:text-text-white transition-all duration-300 ease-linear">
                                            <i data-lucide="eye-off" class="w-4 h-4"></i>
                                        </button>
                                    </label>
                                </div>
                            </div>
                            <x-frontend.input-error :datas="['errors' => $errors, 'field' => 'password']" />
                        </div>

                        <div class="mt-5 flex justify-center items-center gap-5 flex-wrap">
                            <button type="submit" class="btn-primary">{{ __('Register') }}</button>
                        </div>
                    </form>
                    <div>
                        <div class="divider">{{ __('Or sign up with') }}</div>
                        <div class="flex flex-wrap gap-4">
                            <a href="#" class="btn-primary rounded-md w-full gap-3">
                                <i class='bx bxl-google text-2xl'></i> {{ __('Google') }}
                            </a>
                            <a href="#" class="btn-secondary rounded-md w-full gap-3">
                                <i class='bx bxl-facebook text-2xl'></i> {{ __('Facebook') }}
                            </a>
                        </div>

                        <p class="text-center text-sm mt-4">
                            {{ __('Already have an account?') }} <a href="{{ route('seller.login') }}"
                                class="text-text-tertiary font-medium">
                                {{ __('Sign in') }} </a>
                        </p>

                        <div class="text-center text-sm mt-4">
                            {{ __('Login as') }} <a href="{{ route('seller.login') }}"
                                class="text-text-accent font-medium">{{ __('Customer') }}</a>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Image -->
                <div class="w-1/2 hidden xl:block">
                    <img src="{{ asset('/frontend/images/5464026.jpg') }}" alt="Register Image"
                        class="w-full h-full object-cover" />
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="{{ asset('frontend/js/password.js') }}"></script>


    <script src="{{ asset('ckEditor5/main.js') }}"></script>

    <script>
        // Get Country States By Axios
        $(document).ready(function() {
            $('#country').on('change', function() {
                let route1 = "{{ route('axios.get-states-or-cities') }}";
                getStatesOrCity($(this).val(), route1);
            });
            $('#state').on('change', function() {
                let route2 = "{{ route('axios.get-cities') }}";
                getCities($(this).val(), route2);
            });
            $('#city').on('change', function() {
                let route3 = "{{ route('axios.get-hubs') }}";
                getHubs($(this).val(), route3);
            });
        });
    </script>
@endpush
