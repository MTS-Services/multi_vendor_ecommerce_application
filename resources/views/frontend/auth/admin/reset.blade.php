@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>@extends('frontend.layouts.app')

                        @section('content')
                        <div class="flex items-center justify-center min-h-screen bg-white px-4 py-10">
                          <div class="flex flex-col md:flex-row bg-white shadow-lg rounded-2xl w-full max-w-7xl min-h-[600px] overflow-hidden">

                            <!-- Left Side: Form -->
                            <div class="w-full md:w-1/2 p-10 md:p-12 flex flex-col justify-center">
                              <h2 class="text-3xl font-semibold text-center mb-6">Reset Your Password</h2>

                              <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
                                @csrf

                                {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}

                                <input type="email" name="email" value="{{ old('email', request()->email) }}" required autofocus
                                       class="w-full p-3 border border-light rounded-md focus:ring-2 focus:ring-accent @error('email') border-danger @enderror"
                                       placeholder="Email">

                                @error('email')
                                  <p class="text-danger text-sm mt-1">{{ $message }}</p>
                                @enderror

                                <input type="password" name="password" required
                                       class="w-full p-3 border border-light rounded-md focus:ring-2 focus:ring-accent @error('password') border-danger @enderror"
                                       placeholder="New Password">

                                @error('password')
                                  <p class="text-danger text-sm mt-1">{{ $message }}</p>
                                @enderror

                                <input type="password" name="password_confirmation" required
                                       class="w-full p-3 border border-light rounded-md focus:ring-2 focus:ring-accent"
                                       placeholder="Confirm Password">

                                <button type="submit" class="w-full bg-accent hover:bg-secondary text-white p-3 rounded-md transition">
                                  Reset Password
                                </button>

                                <div class="text-center text-sm mt-4">
                                  Back to <a href="{{ route('login') }}" class="text-accent hover:underline">Sign in</a>
                                </div>
                              </form>
                            </div>

                            <!-- Right Side: Image -->
                            <div class="w-full md:w-1/2">
                              <img src="{{ asset('/frontend/images/5464026.jpg') }}" alt="Reset Password" class="w-full h-full object-cover" />
                            </div>

                          </div>
                        </div>
                        @endsection


                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
