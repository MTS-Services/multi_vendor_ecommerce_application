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
                        <li><a href="{{ route('user.my-profile') }}" class="block py-2 px-3 rounded-md text-gray-700 hover:bg-gray-100 mb-1 transition duration-150 ease-in-out">My Profile</a></li>
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

            <main class="flex-1 bg-white rounded-lg shadow-md p-4 sm:p-6">

                <div class="mb-8">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold text-gray-800">Personal Profile</h2>
                        <a href="#" class="text-blue-500 hover:underline text-sm font-medium">EDIT</a>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4 shadow-sm">
                        <p class="text-gray-700 font-semibold mb-2">*******482</p>
                        <label class="flex items-center text-sm text-gray-600 cursor-pointer">
                            <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600 rounded-sm border-gray-300 focus:ring-blue-500 mr-2">
                            Receive marketing SMS
                        </label>
                    </div>
                </div>

                <div class="mb-8">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold text-gray-800">Address Book</h2>
                        <a href="#" class="text-blue-500 hover:underline text-sm font-medium">EDIT</a>
                    </div>
                    <p class="text-sm text-gray-500 mb-3">DEFAULT SHIPPING ADDRESS</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="border border-gray-200 rounded-md p-4 shadow-sm">
                            <p class="font-semibold text-gray-800 mb-1">jewel</p>
                            <p class="text-gray-700 text-sm">Kajir Goli, Panthopoth, Dhaka</p>
                            <p class="text-gray-700 text-sm">Dhaka - Dhaka - South - Bashundhara City</p>
                            <p class="text-gray-700 text-sm">(+880) 1723257482</p>
                        </div>
                        <div class="border border-gray-200 rounded-md p-4 shadow-sm">
                            <p class="font-semibold text-gray-800 mb-1">jewel</p>
                            <p class="text-gray-700 text-sm">Kajir Goli, Panthopoth, Dhaka</p>
                            <p class="text-gray-700 text-sm">Dhaka - Dhaka - South - Bashundhara City</p>
                            <p class="text-gray-700 text-sm">(+880) 1723257482</p>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Recent Orders</h2>
                    <div class="overflow-x-auto rounded-lg shadow-sm border border-gray-200">
                        <table class="min-w-full bg-white divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order #</th>
                                    <th scope="col" class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Placed On</th>
                                    <th scope="col" class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Items</th>
                                    <th scope="col" class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                    <th scope="col" class="relative py-3 px-4">
                                        <span class="sr-only">Manage</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr>
                                    <td class="py-3 px-4 whitespace-nowrap text-sm text-gray-900">622514908628138</td>
                                    <td class="py-3 px-4 whitespace-nowrap text-sm text-gray-600">15/12/2021</td>
                                    <td class="py-3 px-4 whitespace-nowrap">
                                        <img src="https://via.placeholder.com/48/0000FF/FFFFFF?text=P1" alt="Product 1" class="w-12 h-12 object-cover rounded-md shadow-sm">
                                    </td>
                                    <td class="py-3 px-4 whitespace-nowrap text-sm text-gray-900">৳ 980</td>
                                    <td class="py-3 px-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="inline-block bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold hover:bg-blue-200 transition duration-150 ease-in-out">MANAGE</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4 whitespace-nowrap text-sm text-gray-900">61898914728138</td>
                                    <td class="py-3 px-4 whitespace-nowrap text-sm text-gray-600">07/09/2021</td>
                                    <td class="py-3 px-4 whitespace-nowrap">
                                        <img src="https://via.placeholder.com/48/FF0000/FFFFFF?text=P2" alt="Product 2" class="w-12 h-12 object-cover rounded-md shadow-sm">
                                    </td>
                                    <td class="py-3 px-4 whitespace-nowrap text-sm text-gray-900">৳ 364</td>
                                    <td class="py-3 px-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="inline-block bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold hover:bg-blue-200 transition duration-150 ease-in-out">MANAGE</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4 whitespace-nowrap text-sm text-gray-900">61886165628138</td>
                                    <td class="py-3 px-4 whitespace-nowrap text-sm text-gray-600">06/09/2021</td>
                                    <td class="py-3 px-4 whitespace-nowrap">
                                        <img src="https://via.placeholder.com/48/008000/FFFFFF?text=P3" alt="Product 3" class="w-12 h-12 object-cover rounded-md shadow-sm">
                                    </td>
                                    <td class="py-3 px-4 whitespace-nowrap text-sm text-gray-900">৳ 2,351</td>
                                    <td class="py-3 px-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="inline-block bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold hover:bg-blue-200 transition duration-150 ease-in-out">MANAGE</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>
        </div>
    </div>
   
@endsection
