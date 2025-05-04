<header class="bg-bg-white dark:bg-bg-dark">
    <div class="container">
        <div class="navbar">
            <div class="navbar-start">
                <label class="swap swap-rotate" for="theme-toggle">
                    <!-- this hidden checkbox controls the state -->
                    <input type="checkbox" class="theme-controller" value="synthwave" id="theme-toggle" title="থিম টোগল" />

                    <!-- sun icon -->
                    <svg class="swap-on h-auto w-7 fill-bg-dark dark:fill-bg-light" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
                    </svg>

                    <!-- moon icon -->
                    <svg class="swap-off h-auto w-5 fill-bg-dark dark:fill-bg-light" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
                    </svg>
                </label>
                <div class="dropdown dropdown-center text-text-primary dark:text-text-white">
                    <div tabindex="0" role="button" class="m-1">{{ __('English') }} <i
                            class='bx bx-chevron-down'></i></div>
                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-1 w-fit p-2 shadow-sm">
                        <li class="text-nowrap text-center"><a href="">{{ __('Bangla') }}</a></li>
                        <li class="text-nowrap text-center"><a href="">{{ __('Hindi') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="navbar-center">
                <a href="{{ route('frontend.home') }}" class="">
                    <span id="darkModeLogo" class="hidden">
                        <img src="{{ asset('frontend/images/logo-light.png') }}" alt="Logo">
                    </span>
                    <span id="lightModeLogo">
                        <img src="{{ asset('frontend/images/logo.png') }}" alt="Logo">
                    </span>

                </a>
            </div>
            <div class="navbar-end">
                <div class="flex items-center justify-center gap-3">
                    <div class="relative" id="searchWrapper">
                        <button class="text-2xl " type="button" onclick="toggleSearch()">
                            <i data-lucide="search" class="text-text-primary dark:text-text-white"></i>
                        </button>
                        <form action="{{ route('frontend.home') }}" id="searchForm"
                            class="absolute top-1/2 right-[110%] transform -translate-y-1/2 transition-all duration-300 ease-in-out scale-95 opacity-0 pointer-events-none w-96 z-50">
                            <div class="join w-full">
                                <div class="w-full">
                                    <label class="input">
                                        <svg class="h-[1em] opacity-50 stroke-current"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5"
                                                fill="none">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <path d="m21 21-4.3-4.3"></path>
                                            </g>
                                        </svg>
                                        <input type="search" required placeholder="Search" />
                                    </label>
                                </div>
                                <button class="btn-search join-item" type="submit">{{ __('Search') }}</button>
                            </div>
                        </form>
                    </div>
                    <a href="#" class="text-2xl">
                        <i data-lucide="user-round" class="text-text-primary dark:text-text-white"></i>
                    </a>
                    <a href="#" class="text-2xl relative">
                        <i data-lucide="heart" class="text-text-primary dark:text-text-white"></i>
                        <span
                            class="text-text-white text-xs absolute -top-2 -right-2 z-10 bg-bg-secondary w-4 h-4 rounded-full flex items-center justify-center">{{ __('2') }}</span>
                    </a>
                    <a href="#" class="text-2xl relative">
                        <i data-lucide="shopping-basket" class="text-text-primary dark:text-text-white"></i>
                        <span
                            class="text-text-white text-xs absolute -top-2 -right-2 z-10 bg-bg-secondary w-4 h-4 rounded-full flex items-center justify-center">{{ __('2') }}</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="divider my-2"></div>

        <div class="flex items-center justify-center gap-5 pb-4">
            <a href="#"
                class="capitalize text-text-primary dark:text-text-white relative 
          after:content-[''] after:absolute after:left-0 after:top-full after:h-0.5 after:bg-bg-accent 
           hover:after:w-full after:transition-all after:duration-300 @if (isset($page_slug) && $page_slug == 'home') after:w-full @else after:w-0 @endif">
                {{ __('Home') }}
            </a>
            <a href="#"
                class="capitalize text-text-primary dark:text-text-white relative 
          after:content-[''] after:absolute after:left-0 after:top-full after:h-0.5 after:bg-bg-accent 
           hover:after:w-full after:transition-all after:duration-300 @if (isset($page_slug) && $page_slug == '') after:w-full @else after:w-0 @endif">
                {{ __('Shop') }}
            </a>
            <a href="#"
                class="capitalize text-text-primary dark:text-text-white relative 
          after:content-[''] after:absolute after:left-0 after:top-full after:h-0.5 after:bg-bg-accent 
           hover:after:w-full after:transition-all after:duration-300 @if (isset($page_slug) && $page_slug == '') after:w-full @else after:w-0 @endif">
                {{ __('Contact') }}
            </a>
            <a href="#"
                class="capitalize text-text-primary dark:text-text-white relative 
          after:content-[''] after:absolute after:left-0 after:top-full after:h-0.5 after:bg-bg-accent 
           hover:after:w-full after:transition-all after:duration-300 @if (isset($page_slug) && $page_slug == '') after:w-full @else after:w-0 @endif">
                {{ __('Faq') }}
            </a>
        </div>
    </div>
</header>

<script>
    function toggleSearch() {
        const form = document.getElementById('searchForm');
        form.classList.toggle('opacity-0');
        form.classList.toggle('pointer-events-none');
        form.classList.toggle('scale-95');
        form.classList.toggle('scale-100');
        form.classList.toggle('opacity-100');
    }
</script>
