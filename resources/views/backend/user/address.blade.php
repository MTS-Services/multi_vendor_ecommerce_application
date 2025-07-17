@extends('frontend.layouts.app')

@section('content')
  <div class="min-h-screen bg-gray-100 p-4 sm:p-6 lg:p-8">
        <div class="container mx-auto flex flex-col lg:flex-row gap-6">

            <aside class="w-full lg:w-64 bg-white rounded-lg shadow-md p-4 flex-shrink-0">
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
                        <li><a href="#" class="block py-2 px-3 rounded-md text-gray-700 hover:bg-gray-100 mb-1 transition duration-150 ease-in-out">My Profile</a></li>
                        <li><a href="#" class="block py-2 px-3 rounded-md text-gray-700 hover:bg-gray-100 mb-1 transition duration-150 ease-in-out">Address Book</a></li>
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

            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 sm:mb-8">
                <h1 class="text-2xl font-semibold text-gray-800 mb-4 md:mb-0">Address Book</h1>
                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4 text-sm whitespace-nowrap">
                    <a href="#" class="text-blue-500 hover:underline">Make default shipping address</a>
                    <span class="hidden sm:inline text-gray-400">|</span>
                    <a href="#" class="text-blue-500 hover:underline">Make default billing address</a>
                </div>
            </div>

            <div class="overflow-x-auto rounded-lg shadow-sm border border-gray-200 mb-8">
                <table class="min-w-full bg-white divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Full Name</th>
                            <th scope="col" class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                            <th scope="col" class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Postcode</th>
                            <th scope="col" class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone Number</th>
                            <th scope="col" class="relative py-3 px-4">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="py-4 px-4 whitespace-nowrap text-sm font-semibold text-gray-900">jewel</td>
                            <td class="py-4 px-4 whitespace-nowrap text-sm text-gray-700">
                                <span class="bg-orange-500 text-white px-2 py-0.5 rounded-full text-xs font-medium mr-2">HOME</span>
                                Kajir Goli, Panthopoth, Dhaka
                            </td>
                            <td class="py-4 px-4 whitespace-nowrap text-sm text-gray-700">Dhaka - Dhaka - South - Bashundhara City</td>
                            <td class="py-4 px-4 whitespace-nowrap text-sm text-gray-700">1732577482</td>
                            <td class="py-4 px-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex flex-col items-end space-y-1">
                                    <span class="text-xs text-gray-600">Default Shipping Address</span>
                                    <span class="text-xs text-gray-600">Default Billing Address</span>
                                    <a href="#" class="text-blue-500 hover:underline text-xs font-medium">EDIT</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                </table>
            </div>

            <div class="flex justify-end">
                <button class="flex items-center bg-teal-500 hover:bg-teal-600 text-white font-semibold py-3 px-6 rounded-md shadow-md transition duration-200 ease-in-out">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    ADD NEW ADDRESS
                </button>
            </div>

        </div>
    </div>


            
        </div>
    </div>
   
@endsection
