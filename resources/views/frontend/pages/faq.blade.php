@extends('frontend.layouts.app', ['page_slug' => 'faq'])

@section('title', 'Freequently Asked Questions')

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
                <span class="font-midium">FAQs</span>
            </li>
        </ul>
    </div>

    <!-- Header -->
    <div class="container mx-auto px-4 py-8 text-center">
        <div class="flex flex-col items-center justify-center">
            <h1 class="text-4xl font-semibold">Frequently Asked Questions</h1>
        </div>
    </div>
    {{-- Main Content Start Here --}}
    <div class="container">
        <div class="w-[80%] mx-auto">
            {{-- Shopping Information Start Here --}}
            <div>
                <div class="border-b">
                    <h2 class="text-2xl font-semibold mb-8 px-4">Shopping Information</h2>
                </div>
                <div class="join join-vertical w-full">
                    <div class="collapse collapse-arrow join-item border-b ">
                        <input type="checkbox" name="my-accordion" checked />
                        <div class="collapse-title font-semibold">How do I create an account?</div>
                        <div class="collapse-content text-sm">
                            Click the "Sign Up" button in the top right corner and follow the registration process.
                        </div>
                    </div>
                    <div class="collapse collapse-arrow join-item border-b">
                        <input type="checkbox" name="my-accordion" />
                        <div class="collapse-title font-semibold">I forgot my password. What should I do?</div>
                        <div class="collapse-content text-sm">
                            Click on "Forgot Password" on the login page and follow the instructions sent to your email.
                        </div>
                    </div>
                    <div class="collapse collapse-arrow join-item border-b">
                        <input type="checkbox" name="my-accordion" />
                        <div class="collapse-title font-semibold">How do I update my profile information?</div>
                        <div class="collapse-content text-sm">
                            Go to "My Account" settings and select "Edit Profile" to make changes.
                        </div>
                    </div>
                </div>
            </div>
            {{-- Shopping Information End Here --}}

            {{-- Payment Information Start Here --}}
            <div>
                <div class="border-b mt-10">
                    <h2 class="text-2xl font-semibold mb-8 px-4">Payment Information</h2>
                </div>
                <div class="join join-vertical w-full">
                    <div class="collapse collapse-arrow join-item border-b ">
                        <input type="checkbox" name="my-accordion" checked />
                        <div class="collapse-title font-semibold">How do I create an account?</div>
                        <div class="collapse-content text-sm">
                            Click the "Sign Up" button in the top right corner and follow the registration process.
                        </div>
                    </div>
                    <div class="collapse collapse-arrow join-item border-b">
                        <input type="checkbox" name="my-accordion" />
                        <div class="collapse-title font-semibold">I forgot my password. What should I do?</div>
                        <div class="collapse-content text-sm">
                            Click on "Forgot Password" on the login page and follow the instructions sent to your email.
                        </div>
                    </div>
                    <div class="collapse collapse-arrow join-item border-b">
                        <input type="checkbox" name="my-accordion" />
                        <div class="collapse-title font-semibold">How do I update my profile information?</div>
                        <div class="collapse-content text-sm">
                            Go to "My Account" settings and select "Edit Profile" to make changes.
                        </div>
                    </div>
                </div>
            </div>
            {{-- Payment Information End Here --}}

            {{-- Return & Exchange Start Here --}}
            <div>
                <div class="border-b mt-10">
                    <h2 class="text-2xl font-semibold mb-8 px-4">Return & Exchange</h2>
                </div>
                <div class="join join-vertical w-full">
                    <div class="collapse collapse-arrow join-item border-b ">
                        <input type="checkbox" name="my-accordion" checked />
                        <div class="collapse-title font-semibold">How do I create an account?</div>
                        <div class="collapse-content text-sm">
                            Click the "Sign Up" button in the top right corner and follow the registration process.
                        </div>
                    </div>
                    <div class="collapse collapse-arrow join-item border-b">
                        <input type="checkbox" name="my-accordion" />
                        <div class="collapse-title font-semibold">I forgot my password. What should I do?</div>
                        <div class="collapse-content text-sm">
                            Click on "Forgot Password" on the login page and follow the instructions sent to your email.
                        </div>
                    </div>
                    <div class="collapse collapse-arrow join-item border-b">
                        <input type="checkbox" name="my-accordion" />
                        <div class="collapse-title font-semibold">How do I update my profile information?</div>
                        <div class="collapse-content text-sm">
                            Go to "My Account" settings and select "Edit Profile" to make changes.
                        </div>
                    </div>
                </div>
            </div>
            {{-- Return & Exchange End Here --}}

        </div>
    </div>
    {{-- Main Content End Here --}}
@endsection
@push('js')
    <script>
        const accordion = document.getElementById("faq-accordion");
        const items = accordion.querySelectorAll(".collapse");

        items.forEach((item) => {
            const input = item.querySelector("input[type='checkbox']");
            const title = item.querySelector(".collapse-title");

            title.addEventListener("click", () => {
                if (input.checked) {
                    input.checked = false;
                } else {
                    items.forEach((el) => {
                        el.querySelector("input").checked = false;
                    });
                    input.checked = true;
                }
            });
        });
    </script>
@endpush
