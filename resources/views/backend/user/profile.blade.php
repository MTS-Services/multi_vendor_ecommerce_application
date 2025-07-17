@extends('frontend.layouts.app')

@section('content')
  <div class="min-h-screen bg-gray-100 p-4 sm:p-6 lg:p-8">
        <div class="container mx-auto flex flex-col lg:flex-row gap-6">

            <aside class="w-full lg:w-64  rounded-lg  p-4 flex-shrink-0">
                <p class="text-gray-600 text-sm mb-2">Hello, *******482</p>
                <div class="inline-flex items-center bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full mb-4">
                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    Verified Account
                </div>

                <nav>
                    <ul>
                        <li><a href="#" class="block py-2 px-3 rounded-md bg-blue-500 text-white font-semibold mb-1 transition duration-150 ease-in-out">Manage My Account</a></li>
                        <li><a href="{{ route('user.profile') }}" class="block py-2 px-3 rounded-md text-gray-700 hover:bg-gray-100 mb-1 transition duration-150 ease-in-out">My Profile</a></li>
                        <li><a href="{{ route('user.address') }}" class="block py-2 px-3 rounded-md text-gray-700 hover:bg-gray-100 mb-1 transition duration-150 ease-in-out">Address Book</a></li>
                        <li><a href="#" class="block py-2 px-3 rounded-md text-gray-700 hover:bg-gray-100 mb-1 transition duration-150 ease-in-out">My Payment Options</a></li>
                      

                        <li class="mt-4 pt-4 border-t border-gray-200"><a href="#" class="block py-2 px-3 rounded-md text-gray-700 hover:bg-gray-100 mb-1 transition duration-150 ease-in-out">My Orders</a></li>
                        <li><a href="#" class="block py-2 px-3 rounded-md text-gray-700 hover:bg-gray-100 mb-1 transition duration-150 ease-in-out">My Returns</a></li>
                        <li><a href="#" class="block py-2 px-3 rounded-md text-gray-700 hover:bg-gray-100 mb-1 transition duration-150 ease-in-out">My Cancellations</a></li>

                        <li class="mt-4 pt-4 border-t border-gray-200"><a href="#" class="block py-2 px-3 rounded-md text-gray-700 hover:bg-gray-100 mb-1 transition duration-150 ease-in-out">My Reviews</a></li>
                        <li><a href="#" class="block py-2 px-3 rounded-md text-gray-700 hover:bg-gray-100 mb-1 transition duration-150 ease-in-out">My Wishlist & Followed Stores</a></li>

                      
                    </ul>
                </nav>
            </aside>
 <div class="min-h-screen bg-gray-100 p-4 sm:p-6 lg:p-8">
        <div class="container mx-auto bg-white rounded-lg shadow-md p-6 sm:p-8">

            <h1 class="text-2xl font-semibold text-gray-800 mb-6 sm:mb-8">My profile</h1>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8 mb-8">

                <div>
                    <label for="fullName" class="block text-gray-600 text-sm font-medium mb-1">Full Name</label>
                    <p id="fullName" class="text-gray-800 font-semibold text-lg">*******482</p>
                </div>

                <div>
                    <label for="email" class="block text-gray-600 text-sm font-medium mb-1">
                        Email Address
                        <a href="#" class="text-blue-500 hover:underline text-xs ml-1">| Add</a>
                    </label>
                    <p id="email" class="text-gray-800 text-lg">@</p>
                </div>

                <div>
                    <label for="mobile" class="block text-gray-600 text-sm font-medium mb-1">
                        Mobile
                        <a href="#" class="text-blue-500 hover:underline text-xs ml-1">| Change</a>
                    </label>
                    <p id="mobile" class="text-gray-800 text-lg mb-2">+880 179****82</p>
                    <label class="flex items-center text-sm text-gray-600 cursor-pointer">
                        <input type="checkbox" checked class="form-checkbox h-4 w-4 text-orange-500 rounded-sm border-gray-300 focus:ring-orange-500 mr-2">
                        Receive marketing SMS
                    </label>
                </div>

                <div>
                    <label for="birthday" class="block text-gray-600 text-sm font-medium mb-1">Birthday</label>
                    <p id="birthday" class="text-gray-500 text-lg">Please enter your birthday</p>
                </div>

                <div>
                    <label for="gender" class="block text-gray-600 text-sm font-medium mb-1">Gender</label>
                    <p id="gender" class="text-gray-500 text-lg">Please enter your gender</p>
                </div>

            </div>

            <div class="mt-8 pt-6 border-t border-gray-200">
                <button class="w-full md:w-auto bg-teal-500 hover:bg-teal-600 text-white font-semibold py-3 px-6 rounded-md shadow-md mb-4 transition duration-200 ease-in-out">
                    EDIT PROFILE
                </button>
                <button class="w-full md:w-auto bg-teal-500 hover:bg-teal-600 text-white font-semibold py-3 px-6 rounded-md shadow-md transition duration-200 ease-in-out md:ml-4">
                    CHANGE PASSWORD
                </button>
            </div>

        </div>
    </div>

            
        </div>
    </div>
   
@endsection
