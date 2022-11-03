<x-app-layout>
  <x-slot name="header">
    <h1 class="header">Produk</h1>
  </x-slot>

  <div class="mx-auto sm:px-6 lg:px-4">
    <div class="bg-white overflow-hidden sm:rounded-lg">
      <div class="p-6 bg-white">
        <div class="flex justify-between items-center">
          <div class="pb-4 bg-white dark:bg-gray-900">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mt-1">
              <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
              </div>
              <input type="text" id="table-search" class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
            </div>
          </div>

          <div>
            <a href="{{ route('product.create') }}" class="px-5 py-2 bg-blue-500 rounded-md text-white">Tambah</a>
          </div>
        </div>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="py-3 px-6">
                  Nama Produk
                </th>
                <th scope="col" class="py-3 px-6">
                  Kategori
                </th>
                <th scope="col" class="py-3 px-6">
                  Rating
                </th>
                <th scope="col" class="py-3 px-6">
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
              @forelse ($products as $product)
              <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-2">
                  <img src="{{ asset('images/food.jpg') }}" class="w-12 h-12 rounded-md object-cover" alt="">
                  <div>
                    <span class="font-bold text-md block">{{ $product->name }}</span>
                    <span class="text-gray-600">{{ format_rupiah($product->price) }}</span>
                  </div>
                </th>
                <td class="py-4 px-6">
                  Makanan
                </td>
                <td class="py-4 px-6">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </td>
                <td class="py-4 px-6">
                  <a href="#" class="font-medium bg-blue-600 px-3 py-1 text-white rounded-md">Edit</a>
                </td>
              </tr>
              @empty

              @endforelse
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</x-app-layout>
