@extends('frontend.layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-white px-4 py-10">
  <div class="flex flex-col md:flex-row bg-white shadow-lg rounded-2xl w-full max-w-4xl min-h-[500px] overflow-hidden">

    <!-- Left Side: Image -->
    <div class="w-full md:w-1/2">
      <img src="{{ asset('/frontend/images/5464026.jpg') }}" alt="Verify Email Image" class="w-full h-full object-cover" />
    </div>

    <!-- Right Side: Content -->
    <div class="w-full md:w-1/2 p-10 md:p-12 flex flex-col justify-center">
      <h2 class="text-2xl font-semibold text-center mb-6">Verify Your Email Address</h2>

      @if (session('resent'))
        <div class="mb-4 text-accent text-sm text-center">
          A fresh verification link has been sent to your email address.
        </div>
      @endif

      <p class="text-center text-light text-sm mb-6">
        Before proceeding, please check your email for a verification link.
        If you did not receive the email,
      </p>

      <form class="text-center" method="POST" action="#">
        @csrf
        <button type="submit" class="bg-accent hover:bg-secondary text-white px-6 py-2 rounded-md transition">
          Click here to request another
        </button>
      </form>

      <div class="text-center text-sm mt-6 text-light">
        Already verified? <a href="{{ route('login') }}" class="text-accent hover:underline">Sign in</a>
      </div>
    </div>
  </div>
</div>
@endsection
