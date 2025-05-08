<dialog id="userLogin" class="modal">
    <div class="modal-box w-full max-w-7xl p-0 overflow-hidden">
      <form method="dialog">
        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 z-10">✕</button>
      </form>
      <div class="grid grid-cols-1 md:grid-cols-2">
        <!-- Left Side (image) -->
        <div class="hidden md:block bg-cover bg-center">
            <img src="{{ asset('/frontend/images/5464026.jpg') }}" alt="Logo" class="w-full h-full" />
        </div>

        <!-- Right Side -->
        <div class="flex items-center justify-center p-6 bg-white">
          <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded-2xl p-6">
              <h2 class="text-2xl font-semibold text-center mb-6">Sign in to Evolon</h2>
              <form class="space-y-4">
                <input type="email" placeholder="Email" class="w-full p-3 border border-light rounded-md" />
                <div class="relative">
                  <input type="password" placeholder="Password" class="w-full p-3 border border-light rounded-md pr-10" />
                  <i class="fas fa-eye absolute top-1/2 right-3 transform -translate-y-1/2 text-light cursor-pointer"></i>
                </div>
                <div class="flex items-center justify-between text-sm">
                  <label class="flex items-center gap-2">
                    <input type="checkbox" class="form-checkbox" /> Remember me
                  </label>
                  <a href="#" class="text-accent hover:underline">Forgot Password?</a>
                </div>
                <button type="submit" class="w-full bg-accent hover:bg-secondary text-white p-3 rounded-md">Sign in</button>
                <div class="text-center text-light text-sm">Or login with</div>
                <div class="grid grid-cols-2 gap-4">
                  <button type="button" class="w-full border p-3 rounded-md flex justify-center items-center gap-2">
                    <i class="fab fa-google"></i> Google
                  </button>
                  <button type="button" class="w-full border p-3 rounded-md flex justify-center items-center gap-2">
                    <i class="fab fa-apple"></i> Apple
                  </button>
                </div>
                <div class="text-center text-sm mt-4">
                  Don’t have an account? <a href="#" class="text-accent  hover:underline">Sign Up now</a>
                </div>
                <div class="text-center text-sm mt-4">
                    Become a <a href="#" class="text-accent hover:underline">Seller</a>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <p class="text-center text-xs py-2 text-light">Press ESC key or click on ✕ button to close</p>
    </div>
</dialog>

