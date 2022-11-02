<x-guest-layout>
  <div class="min-h-screen flex justify-center items-center">
    <div class="w-3/4 h-[75vh] flex bg-gray-100 rounded-md shadow-lg border-b-2 border-gray-300 border-r-2">
      <div class="w-1/2">
        <img src="{{ asset('images/food.jpg') }}" class="w-full h-full object-cover rounded-tl-md rounded-bl-md" alt="">
      </div>
      <div class="w-1/2 p-10 flex justify-center items-center">
        <div class="w-3/4">
          <h1 class="text-2xl font-bold text-center">Halo Chef!</h1>
          <p class="text-center">Selamat datang di MakerFood!</p>

          <form method="POST" action="{{ route('store-kitchen') }}" class="mt-4">
            @csrf

            <!-- Name -->
            <div>
              <x-input-label for="name" :value="__('Nama Dapur')" />

              <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

              <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Name -->
            <div class="mt-4">
              <x-input-label for="address" :value="__('Alamat Dapur')" />

              <x-text-area id="address" class="block mt-1 w-full" name="address" :value="old('address')" required autofocus ></x-text-area>

              <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
              <x-primary-button class="ml-4">
                {{ __('Daftar') }}
              </x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>
