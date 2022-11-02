<x-guest-layout>
  <div class="min-h-screen flex justify-center items-center">
    <div class="w-3/4 h-[75vh] flex bg-gray-100 rounded-md shadow-lg border-b-2 border-gray-300 border-r-2">
      <div class="w-1/2">
        <img src="{{ asset('images/food.jpg') }}" class="w-full h-full object-cover rounded-tl-md rounded-bl-md" alt="">
      </div>
      <div class="w-1/2 p-10 flex justify-center items-center">
        <div class="w-3/4">
          <h1 class="text-2xl font-bold text-center">Halo!</h1>
          <p class="text-center">Selamat datang di MakerFood!</p>

          <form method="POST" action="{{ route('register') }}" class="mt-4">
            @csrf

            <!-- Name -->
            <div>
              <x-input-label for="name" :value="__('Name')" />

              <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

              <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
              <x-input-label for="email" :value="__('Email')" />

              <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

              <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
              <x-input-label for="password" :value="__('Password')" />

              <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

              <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
              <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

              <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />

              <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
              <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Sudah terdaftar?') }}
              </a>

              <x-primary-button class="ml-4">
                {{ __('Register') }}
              </x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>
