@extends('frontend.layouts.app')
@section('content')

<div class="flex items-center justify-center min-h-screen bg-white px-4 py-10">
  <div class="flex flex-col md:flex-row bg-white shadow-lg rounded-2xl w-full max-w-7xl min-h-[600px] overflow-hidden">

    <!-- Left Side: Form -->
    <div class="w-full md:w-1/2 p-10 md:p-12 flex flex-col justify-center">
      <h2 class="text-3xl font-semibold text-center mb-6">Create your Evolon account</h2>
      <form class="space-y-5">
        <input type="text" placeholder="First Name" class="w-full p-3 border border-light rounded-md focus:ring-2 focus:ring-accent" />
        <input type="text" placeholder="Username" class="w-full p-3 border border-light rounded-md focus:ring-2 focus:ring-accent" />
        <input type="email" placeholder="Email" class="w-full p-3 border border-light rounded-md focus:ring-2 focus:ring-accent" />
        <div class="relative">
          <input type="password" placeholder="Password" class="w-full p-3 border border-light rounded-md pr-10 focus:ring-2 focus:ring-accent" />
          <i class="fas fa-eye absolute top-1/2 right-3 transform -translate-y-1/2 text-light cursor-pointer"></i>
        </div>
        <button type="submit" class="w-full bg-accent hover:bg-secondary text-white p-3 rounded-md transition">Register</button>

        <div class="text-center text-light text-sm">Or sign up with</div>
        <div class="grid grid-cols-2 gap-4">
          <button type="button" class="w-full border p-3 rounded-md flex justify-center items-center gap-2 hover:bg-accent transition">
            <i class="fab fa-google"></i> Google
          </button>
          <button type="button" class="w-full border p-3 rounded-md flex justify-center items-center gap-2 hover:bg-accent transition">
            <i class="fab fa-apple"></i> Apple
          </button>
        </div>

        <div class="text-center text-sm mt-4">
          Already have an account? <a href="{{ route('login') }}" class="text-accent hover:underline">Sign in</a>
        </div>
        <div class="text-center text-sm mt-2">
          Become a <a href="#" class="text-accent hover:underline">Seller</a>
        </div>
      </form>
    </div>

    <!-- Right Side: Image -->
    <div class="w-full md:w-1/2">
      <img src="{{ asset('/frontend/images/5464026.jpg') }}" alt="Register Image" class="w-full h-full object-cover" />
    </div>

  </div>
</div>

@endsection
