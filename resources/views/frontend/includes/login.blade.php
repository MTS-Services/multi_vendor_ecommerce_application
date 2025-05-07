<dialog id="my_modal_1" class="modal">
    <div class="modal-box max-w-7xl">
        <h3 class="text-lg font-bold">Login Page!</h3>
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
                <a href="{{ route('seller.profile') }}"
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
        <div class="modal-action">
            <form method="dialog">
                <button class="btn">Close</button>
            </form>
        </div>
    </div>
</dialog>
