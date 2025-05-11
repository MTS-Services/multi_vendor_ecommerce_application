<!-- Sidebar -->
<div
    class="filterSidebar fixed top-0 left-0 min-h-screen h-full w-2/4 -translate-x-full transition-all duration-300 ease-in-out bg-bg-light dark:bg-bg-darkTertiary shadow-lg z-[99999999999]">

    <div class="h-screen overflow-auto p-5">
        <div class="flex justify-between items-center border-b border-b-border-light pb-5">
            <h4>Filter</h4>
            <button class="closeFilterSidebar" title="Close Sidebar">
                <span class="w-10 h-10 flex items-center justify-center bg-bg-secondary rounded-full text-text-white">
                    <i data-lucide="x" class="text-lg"></i>
                </span>
            </button>
        </div>
        <div class="mt-5">
            <div class="text-sm p-4">
                <ul class="opacity-100">
                    <li class="my-3"><a
                            class="text-text-black dark:text-text-white hover:text-text-accent font-font-md"
                            href="#">Men's top (20)</a></li>
                    <li class="my-3"><a
                            class="text-text-black dark:text-text-white hover:text-text-accent font-font-md"
                            href="#">Men (20)</a></li>
                    <li class="my-3"><a
                            class="text-text-black dark:text-text-white hover:text-text-accent font-font-md"
                            href="#">Women (20)</a></li>
                    <li class="my-3"><a
                            class="text-text-black dark:text-text-white hover:text-text-accent font-font-md"
                            href="#">Kid (20)</a></li>
                    <li class="my-3"><a
                            class="text-text-black dark:text-text-white hover:text-text-accent font-font-md"
                            href="#">T-shirt (20)</a></li>
                </ul>
            </div>
            <div class="divider m-0"></div>
            {{-- Availability --}}
            <details class="collapse collapse-arrow" open>
                <summary class="collapse-title font-semibold ">
                    <span>Availability</span>
                </summary>
                <div class="collapse-content text-sm">
                    <label for="" class="flex items-center gap-2 py-2">
                        <input type="checkbox" name="availability-checkbox" id="stock-in"
                            class="availability-checkbox checkbox checkbox-sm dark:border-white"> <span
                            class="text-text-black dark:text-text-white">In Stock</span>
                    </label>
                    <label for="stock-out" class="flex items-center gap-2">
                        <input type="checkbox" name="availability-checkbox" id="stock-out"
                            class="availability-checkbox checkbox checkbox-sm dark:border-white"> <span
                            class="text-text-black dark:text-text-white">Out Of Stock</span>
                    </label>
                </div>
            </details>

            <div class="divider m-0"></div>
            {{-- Price --}}
            <details class="collapse collapse-arrow" open>
                <summary class="collapse-title pb-0 font-semibold">Price</summary>
                <div class="collapse-content">
                    <div class="mb-4">
                        <div class="relative w-full price-slider">
                            <div class="absolute w-full h-1 bg-bg-dark bg-opacity-40 z-[1] rounded-full"></div>
                            <div class="absolute h-1 z-[2] rounded-full bg-bg-orange slider-range"></div>
                            <input type="range" min="0" max="500" value="20"
                                class="absolute p-0 top-1/2 -translate-y-1/2 w-full z-[3] pointer-events-none min-range">
                            <input type="range" min="0" max="500" value="300"
                                class="absolute p-0 top-1/2 -translate-y-1/2 w-full z-[3] pointer-events-none max-range">
                        </div>
                    </div>

                    <!-- Price display -->
                    <div class="pt-8">
                        <p class="text-sm">
                            Price: <span class="text-text-danger min-price">$20</span> -
                            <span class="text-text-danger max-price">$300</span>
                        </p>
                    </div>
                </div>
            </details>


            <div class="divider m-0"></div>

            {{-- Colors --}}
            <details class="collapse collapse-arrow" open>
                <summary class="collapse-title font-semibold ">Color</summary>
                <div class="collapse-content text-sm">
                    <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-2 mb-2 pe-5">
                        <input type="radio" name="radio-1"
                            class="w-8 h-8 radio bg-bg-accent border-border-accent checked:bg-transparent text-text-accent" />
                        <input type="radio" name="radio-1"
                            class="w-8 h-8 radio bg-bg-secondary border-border-primary checked:bg-transparent text-text-tertiary" />
                        <input type="radio" name="radio-1"
                            class="w-8 h-8 radio bg-bg-dark border-border-dark checked:bg-transparent text-text-primary" />
                        <input type="radio" name="radio-1"
                            class="w-8 h-8 radio bg-bg-danger border-border-danger checked:bg-transparent text-text-danger" />
                        <input type="radio" name="radio-1"
                            class="w-8 h-8 radio bg-bg-accent border-border-accent checked:bg-transparent text-text-accent" />
                        <input type="radio" name="radio-1"
                            class="w-8 h-8 radio bg-bg-accent border-border-accent checked:bg-transparent text-text-accent" />
                        <input type="radio" name="radio-1"
                            class="w-8 h-8 radio bg-bg-accent border-border-accent checked:bg-transparent text-text-accent" />
                    </div>
                </div>
            </details>

            <div class="divider m-0"></div>

            {{-- Size --}}
            <details class="collapse collapse-arrow" open>
                <summary class="collapse-title font-semibold ">Size</summary>
                <div class="collapse-content text-sm">
                    <div class="flex flex-wrap gap-2 mb-4">
                        <div class="px-3 py-1 border border-gray-200 rounded text-sm">XS (20)</div>
                        <div class="px-3 py-1 border border-gray-200 rounded text-sm">S (8)</div>
                        <div class="px-3 py-1 border border-gray-200 rounded text-sm">L (20)</div>
                        <div class="px-3 py-1 border border-gray-200 rounded text-sm">M (20)</div>
                        <div class="px-3 py-1 border border-gray-200 rounded text-sm">XL (20)</div>
                    </div>
                </div>
            </details>

            <div class="divider m-0"></div>
            {{-- Brand --}}
            <details class="collapse collapse-arrow" open>
                <summary class="collapse-title font-semibold ">Brand</summary>
                <div class="collapse-content text-sm">
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-center gap-2">
                            <input type="checkbox" class="brand-checkbox checkbox checkbox-sm dark:border-white"
                                name="brand-checkbox">
                            <span>Vintea</span>
                            <span class="text-text-gray">(1)</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <input type="checkbox" class="brand-checkbox checkbox checkbox-sm dark:border-white"
                                name="brand-checkbox">
                            <span>Zara</span>
                            <span class="text-text-gray">(20)</span>
                        </li>
                </div>
            </details>

            <div class="divider m-0"></div>
            <!-- On Sale -->
            <div class="mb-6">
                <h3 class="font-medium mb-4">On sale</h3>
                <div class="space-y-4">
                    <div class="flex gap-3">
                        <div class="w-20 h-100 shrink-0 rounded-sm overflow-hidden">
                            <img src="{{ asset('frontend/images/on-sale.jpg') }}" alt="Turtleneck T-shirt">
                        </div>
                        <div>
                            <h4 class="text-base font-medium">Turtleneck T-shirt</h4>
                            <div class="flex gap-2 items-center mt-1">
                                <span class="text-sm text-text-danger font-medium">$100.00</span>
                                <span class="text-sm font-medium line-through text-text-gray">$130.00</span>
                            </div>
                            <p class="text-sm text-text-gray mt-1">3 color available</p>
                        </div>
                    </div>
                    <div class="flex gap-3 mt-5">
                        <div class="w-20 h-100 shrink-0 rounded-sm overflow-hidden">
                            <img src="{{ asset('frontend/images/on-sale.jpg') }}" alt="Loose Fit Tee"
                                class="img-fluid">
                        </div>
                        <div>
                            <h4 class="text-base font-medium">Loose Fit Tee</h4>
                            <div class="flex gap-2 items-center mt-1">
                                <span class="text-sm font-medium text-text-danger">$130.00</span>
                            </div>
                            <p class="text-sm text-text-gray mt-1">3 color available</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="divider m-0"></div>
            {{-- Elavate --}}
            <div class="relative mt-3 rounded-md overflow-hidden">
                <div class="hover:scale-110 transition-all duration-500">
                    <img src="{{ asset('frontend/images/sb-banner.jpg') }}" alt="Elevate">
                </div>
                <div
                    class="flex flex-col justify-center items-center p-10 absolute bottom-0 left-0 w-full text-center">
                    <h3 class="font-medium mb-4 capitalize text-4xl text-text-white z-10">Elevate your style</h3>
                    <a href="" class="btn-primary">Shop Now</a>
                </div>
            </div>

        </div>
    </div>
</div>
