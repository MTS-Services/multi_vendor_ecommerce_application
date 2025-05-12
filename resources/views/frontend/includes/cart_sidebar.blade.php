<!-- Sidebar -->
<div
    class="cartSidebar fixed top-0 right-0 min-h-screen h-full w-1/4 translate-x-full transition-all duration-300 ease-in-out bg-bg-light dark:bg-bg-darkTertiary shadow-lg z-[99999999999]">

    <div class="h-screen overflow-auto py-5">
        <div class="flex justify-between items-center border-b border-b-border-light pt-0 p-5">
            <h4 class="text-xl font-medium">Shopping cart</h4>
            <button class="closeCartSidebar" title="Close Sidebar">
                <span class="w-10 h-10 flex items-center justify-center bg-bg-secondary rounded-full text-text-white">
                    <i data-lucide="x" class="text-lg"></i>
                </span>
            </button>
        </div>
        <div class="flex gap-3 p-2 mt-3 bg-bg-gray rounded-md shadow-card mx-5">
            <div class="w-[25%] h-100 shrink-0 rounded-sm overflow-hidden">
                <img src="{{ asset('frontend/images/on-sale.jpg') }}" alt="Turtleneck T-shirt">
            </div>
            <div class="w-[75%] flex flex-col">
                <div class="flex justify-between items-center">
                    <h4 class="text-md font-medium">Turtleneck T-shirt</h4>
                    <span><i data-lucide="x" class="text-sm"></i></span>
                </div>
                <p class="text-sm mt-2">White / L</p>
                <div class="flex gap-2 items-center my-2">
                    <span class="text-sm text-text-danger font-medium">$100.00</span>
                    <span class="text-sm font-medium line-through text-text-gray">$130.00</span>
                </div>
                <div class="flex items-center shadow-sm rounded-full w-24 p-[2px] bg-bg-accent bg-opacity-60 dark:bg-opacity-50 text-text-white">
                    <button class=" px-2 py-1 decrease-quantity" data-id="${item.id}">-</button>
                    <input type="text" value="1" class="w-8 text-center border-x bg-transparent" readonly>
                    <button class="px-2 py-1 increase-quantity" data-id="${item.id}">+</button>
                </div>
            </div>
        </div>
        <div class="flex gap-3 p-2 mt-3 bg-bg-gray rounded-md shadow-card mx-5">
            <div class="w-[25%] h-100 shrink-0 rounded-sm overflow-hidden">
                <img src="{{ asset('frontend/images/on-sale.jpg') }}" alt="Turtleneck T-shirt">
            </div>
            <div class="w-[75%] flex flex-col">
                <div class="flex justify-between items-center">
                    <h4 class="text-md font-medium">Turtleneck T-shirt</h4>
                    <span><i data-lucide="x" class="text-sm"></i></span>
                </div>
                <p class="text-sm mt-2">White / L</p>
                <div class="flex gap-2 items-center my-2">
                    <span class="text-sm text-text-danger font-medium">$100.00</span>
                    <span class="text-sm font-medium line-through text-text-gray">$130.00</span>
                </div>
                <div class="flex items-center shadow-sm rounded-full w-24 p-[2px] bg-bg-accent bg-opacity-60 dark:bg-opacity-50 text-text-white">
                    <button class=" px-2 py-1 decrease-quantity" data-id="${item.id}">-</button>
                    <input type="text" value="1" class="w-8 text-center border-x bg-transparent" readonly>
                    <button class="px-2 py-1 increase-quantity" data-id="${item.id}">+</button>
                </div>
            </div>
        </div>

        {{-- Cechout Card --}}
        <div class="p-6 border-t border-border-light dark:border-opacity-50 mt-5 dark:bg-bg-darkSecondary fixed bottom-0 w-full">
            <div class="flex justify-between mb-1">
                <span class="font-medium">Total:</span>
                <span class="font-medium" id="cart-total">$220.00 USD</span>
            </div>
            <p class="text-sm text-text-gray mb-4">Taxes and shipping calculated at checkout</p>

            <label class="flex items-center mb-4  border-t border-border-light dark:border-opacity-50 pt-5">
                <input type="checkbox" class="form-checkbox h-4 w-4 text-text-gray">
                <span class="ml-2 text-sm">I agree with <a href="#" class="underline">term and
                        conditions</a></span>
            </label>

            <div class="flex justify-around items-center mt-8">
                <a href="{{ route('frontend.cart') }}" class="btn-primary ">View Cart</a>
                <a href="#" class="btn-primary">Checkout</a>
            </div>
        </div>
    </div>
    <ul class="menu p-0 pt-6">
        <li><a href=""
                class="text-lg px-10 text-c-light font-semibold rounded-none border-b border-b-c-primary transition-colors duration-300 hover:bg-c-light/5 hover:text-c-primary @if (isset($page_slug) && $page_slug == 'home')  @endif">Home</a>
        </li>
        <li><a href="{{ route('frontend.shop') }}"
                class="text-lg px-10 text-c-light font-semibold rounded-none border-b border-b-c-primary transition-colors duration-300 hover:bg-c-light/5 hover:text-c-primary @if (isset($page_slug) && $page_slug == 'shop')  @endif">Shop</a>
        </li>
    </ul>
</div>
