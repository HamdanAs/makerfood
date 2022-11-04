<x-app-layout>
  <x-slot name="header">
    <h1 class="header">Transaksi</h1>
  </x-slot>

  <div class="mx-auto px-10 pt-7">
    <h1 class="font-bold text-xl mb-3">Transaksi</h1>
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
              <input type="text" id="table-search" class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari transaksi">
            </div>
          </div>
        </div>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="py-3 px-6">
                  No Ref
                </th>
                <th scope="col" class="py-3 px-6">
                  Nama Pemesan
                </th>
                <th scope="col" class="py-3 px-6">
                  Pembayaran
                </th>
                <th scope="col" class="py-3 px-6">
                  Pengiriman
                </th>
                <th scope="col" class="py-3 px-6">
                  Total
                </th>
                <th scope="col" class="py-3 px-6">
                  Status
                </th>
                <th scope="col" class="py-3 px-6">
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody>
              @forelse ($orders as $order)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                  <td class="py-4 px-6">{{ $order->ref }}</td>
                  <td class="py-4 px-6">{{ $order->name }}</td>
                  <td class="py-4 px-6">{{ $order->payment_method_text }}</td>
                  <td class="py-4 px-6">{{ $order->delivery_method_text }}</td>
                  <td class="py-4 px-6">{{ format_rupiah($order->total) }}</td>
                  <td class="py-4 px-6">{{ $order->status_text }}</td>
                  <td class="py-4 px-6">
                    <a href="{{ route('transaction.show', $order->id) }}" class="px-5 py-1 bg-blue-500 text-white rounded-md shadow">Detail</a>
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
