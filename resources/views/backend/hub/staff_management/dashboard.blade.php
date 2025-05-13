<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- if using Vite --}}
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-800">Staff Dashboard</h1>
            <form method="POST" action="{{ route('staff.logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="max-w-6xl mx-auto mt-10">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-2xl font-bold mb-2">Welcome, {{ Auth::user()->name }} 👋</h2>
            <p class="text-gray-600 mb-4">You're logged in as a staff member.</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                <div class="bg-blue-100 text-blue-800 p-4 rounded-lg shadow">
                    <h3 class="font-semibold text-lg">Manage Users</h3>
                    <p class="text-sm">View and update user information</p>
                </div>
                <div class="bg-green-100 text-green-800 p-4 rounded-lg shadow">
                    <h3 class="font-semibold text-lg">Reports</h3>
                    <p class="text-sm">Access staff activity reports</p>
                </div>
                <div class="bg-yellow-100 text-yellow-800 p-4 rounded-lg shadow">
                    <h3 class="font-semibold text-lg">Settings</h3>
                    <p class="text-sm">Change dashboard preferences</p>
                </div>
            </div>
        </div>

    </div>

</body>
</html>
