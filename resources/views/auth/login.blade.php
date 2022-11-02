<x-guest-layout>
  <div class="min-h-screen flex justify-center items-center">
    <div class="w-3/4 h-[75vh] flex bg-gray-100 rounded-md shadow-lg border-b-2 border-gray-300 border-r-2">
      <div class="w-1/2">
        <img src="{{ asset('images/food.jpg') }}" class="w-full h-full object-cover rounded-tl-md rounded-bl-md" alt="">
      </div>
      <div class="w-1/2 p-10 flex justify-center items-center">
        <div>
          <h1 class="text-2xl font-bold text-center">Halo!</h1>
          <p class="text-center">Silahkan login dulu untuk melanjutkan, ya!</p>

          <form method="POST" action="{{ route('login') }}" class="mt-5">
            @csrf

            <!-- Email Address -->
            <div class="">
              <x-input-label for="email" :value="__('Email')" />

              <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

              <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4 ">
              <x-input-label for="password" :value="__('Password')" />

              <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

              <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="mt-4 flex justify-between">
              <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
              </label>
              @if (Route::has('password.request'))
              <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                {{ __('Lupa password?') }}
              </a>
              @endif
            </div>

            <div class="flex items-center justify-end mt-4 ">

              <x-primary-button class="ml-3">
                {{ __('Log in') }}
              </x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>
