<!-- Sidebar -->
<div class="sidebar fixed top-0 right-0 h-screen w-2/3 translate-x-full transition-all duration-300 ease-in-out bg-c-dark shadow-lg shadow-c-primary z-[99999999999]">

    <div class="justify-between items-center border-b border-b-c-primary">
        <a href="{{ route('frontend.home') }}" class="">
            <span class="dark-mode-logo hidden">
                <img src="{{ asset('frontend/images/logo-light.png') }}" alt="Logo">
            </span>
            <span class="light-mode-logo">
                <img src="{{ asset('frontend/images/logo.png') }}" alt="Logo">
            </span>
        </a>
        <button class="closeSidebar" title="Close Sidebar">
            <i data-lucide="x" class="w-10 h-10 flex items-center justify-center bg-c-primary rounded-full text-c-light"></i>
        </button>
    </div>
    <ul class="menu p-0 pt-6">
        <li><a href="" class="text-lg px-10 text-c-light font-semibold rounded-none border-b border-b-c-primary transition-colors duration-300 hover:bg-c-light/5 hover:text-c-primary @if (isset($page_slug) && $page_slug == 'home')  @endif">Home</a></li>
        <li><a href="" class="text-lg px-10 text-c-light font-semibold rounded-none border-b border-b-c-primary transition-colors duration-300 hover:bg-c-light/5 hover:text-c-primary @if (isset($page_slug) && $page_slug == 'shop')  @endif">Shop</a></li>
    </ul>
</div>
