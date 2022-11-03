<x-app-layout>
  <x-slot name="header">
    <h1 class="header inline">Dashboard</h1> > <span>Tambah Produk</span>
  </x-slot>

  <div class="max-w-7xl mx-auto sm:px-6 lg:px-10">
    <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
      <div class="p-6 bg-white border-b border-gray-200">
        <form method="POST" action="{{ route('product.store') }}" class="mt-4">
          @csrf

          <!-- Name -->
          <div>
            <x-input-label for="name" :value="__('Nama Produk')" />

            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>

          <!-- Email Address -->
          <div class="mt-4">
            <x-input-label for="price" :value="__('Harga')" />

            <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required />

            <x-input-error :messages="$errors->get('price')" class="mt-2" />
          </div>

          <!-- Confirm Password -->
          <div class="mt-4">
            <x-input-label for="image" :value="__('Gambar')" />

            <div class="flex justify-center items-center w-full">
              <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                <div class="flex flex-col justify-center items-center pt-5 pb-6">
                  <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                  </svg>
                  <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                  <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                </div>
                <input id="dropzone-file" type="file" class="hidden" name="image" />
              </label>
            </div>

            <x-input-error :messages="$errors->get('image')" class="mt-2" />
          </div>

          <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
              {{ __('Simpan') }}
            </x-primary-button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
