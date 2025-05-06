<dialog id="userLogin" class="modal">
    <div class="modal-box w-full max-w-7xl p-0 overflow-hidden rounded-xl">
      <!-- Close Button -->
      <form method="dialog">
        <button class="btn btn-sm btn-circle btn-ghost absolute right-4 top-4 z-10 text-xl">✕</button>
      </form>

      <div class="grid grid-cols-1 md:grid-cols-2 min-h-[600px]">
        <!-- Left Side: Image -->
        <div class="hidden md:block">
          <img src="{{ asset('/frontend/images/5464026.jpg') }}" alt="Login Image" class="w-full h-full object-cover" />
        </div>

        <!-- Right Side: Form -->
        <div class="flex items-center justify-center p-8 bg-white">
          <div class="w-full max-w-md">
            <h2 class="text-3xl font-semibold text-center mb-6">Sign in to Evolon</h2>

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
              @csrf
              <input type="email" name="email" placeholder="Email" required class="w-full p-3 border border-light rounded-md focus:outline-none focus:ring-2 focus:ring-accent" />

              <div class="relative">
                <input type="password" name="password" placeholder="Password" required class="w-full p-3 border border-light rounded-md pr-10 focus:outline-none focus:ring-2 focus:ring-accent" />
                <i class="fas fa-eye absolute top-1/2 right-3 transform -translate-y-1/2 text-light cursor-pointer"></i>
              </div>

              <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2">
                  <input type="checkbox" name="remember" class="form-checkbox" /> Remember me
                </label>
                <a href="{{ route('password.request') }}" class="text-accent hover:underline">Forgot Password?</a>
              </div>

              <button type="submit" class="w-full bg-accent hover:bg-secondary text-white p-3 rounded-md transition">Sign in</button>

              <div class="text-center text-light text-sm">Or login with</div>

              <div class="grid grid-cols-2 gap-4">
                <button type="button" class="w-full border p-3 rounded-md flex justify-center items-center gap-2 hover:bg-light">
                  <i class="fab fa-google"></i> Google
                </button>
                <button type="button" class="w-full border p-3 rounded-md flex justify-center items-center gap-2 hover:bg-light">
                  <i class="fab fa-apple"></i> Apple
                </button>
              </div>

              <div class="text-center text-sm mt-4">
                Don’t have an account?
                <a href="{{ route('register') }}" class="text-accent hover:underline">Sign up now</a>
              </div>

              <div class="text-center text-sm mt-2">
                Become a <a href="#" class="text-accent hover:underline">Seller</a>
              </div>
            </form>
          </div>
        </div>
      </div>

      <p class="text-center text-xs py-2 text-light">Press ESC or ✕ to close</p>
    </div>
  </dialog>
