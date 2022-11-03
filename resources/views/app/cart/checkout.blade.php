<x-home-layout>
  <div class="px-52">
    <div class="flex gap-3 flex-1">
      <div class="w-3/5 bg-white shadow-lg rounded-md h-fit">
        <h1 class="p-3 text-xl font-bold">Checkout</h1>
        <hr>
        <div class="p-3">
          <h2 class="font-bold">Informasi Pembeli</h2>

          <div>
            <x-input-label for="name" :value="__('Nama')" />

            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>

          <div class="mt-4">
            <x-input-label for="address" :value="__('Alamat')" />

            <x-text-area id="address" class="block mt-1 w-full" name="address" :value="old('address')" required autofocus></x-text-area>

            <x-input-error :messages="$errors->get('address')" class="mt-2" />
          </div>

          <h2 class="font-bold mt-4">Metode Pengiriman</h2>
          <ul class="grid gap-3 w-full md:grid-cols-2">
            <li>
              <input type="radio" id="deliver" name="delivery_method" value="deliver" class="hidden peer" required>
              <label for="deliver" class="inline-flex justify-between items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="block">
                  <div class="w-full text-lg font-semibold">Kirim</div>
                  <div class="w-full">Dikirimkan oleh driver</div>
                </div>
                <i class="fa-solid fa-truck fa-lg"></i>
              </label>
            </li>
            <li>
              <input type="radio" id="pickup" name="delivery_method" value="pickup" class="hidden peer">
              <label for="pickup" class="inline-flex justify-between items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="block">
                  <div class="w-full text-lg font-semibold">Ambil</div>
                  <div class="w-full">Ambil sendiri pesanan</div>
                </div>
                <i class="fa-solid fa-bag-shopping fa-xl"></i>
              </label>
            </li>
          </ul>

          <h2 class="font-bold mt-4">Informasi Pembayaran</h2>

          <ul class="grid gap-3 w-full md:grid-cols-2">
            <li>
              <input type="radio" id="cod" name="payment_method" value="cod" class="hidden peer" required>
              <label for="cod" class="inline-flex justify-between items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="block">
                  <div class="w-full text-lg font-semibold">Cash on Delivery</div>
                  <div class="w-full">Bayar saat diambil / dikirim</div>
                </div>
                <i class="fa-solid fa-hand-holding-dollar fa-xl"></i>
              </label>
            </li>
            <li>
              <input type="radio" id="transfer" name="payment_method" value="transfer" class="hidden peer">
              <label for="transfer" class="inline-flex justify-between items-center p-5 w-full text-gray-500 bg-white rounded-lg border border-gray-200 cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="block">
                  <div class="w-full text-lg font-semibold">Transfer</div>
                  <div class="w-full">Transfer ke Rekening</div>
                </div>
                <i class="fa-solid fa-money-bill-transfer fa-lg"></i>
              </label>
            </li>
          </ul>
        </div>
        <hr>
      </div>
      <div class="w-2/5 h-fit">
        <div class="bg-white shadow-lg rounded-md">

          <h1 class="text-2xl py-5 text-center font-bold">5 Barang</h1>

          <div class="p-3">
            <div class="flex justify-between">
              <h3 class="font-bold">Subtotal</h3>
              <p class="total-text">{{ format_rupiah($total) }}</p>
              <input type="hidden" name="total" value="{{ $total }}">
            </div>
            <div class="flex justify-between">
              <h3 class="font-bold">Ongkir</h3>
              <p class="total-text">{{ format_rupiah(0) }}</p>
              <input type="hidden" name="total" value="{{ $total }}">
            </div>
            <div class="flex justify-between">
              <h3 class="font-bold">Total</h3>
              <p class="total-text">{{ format_rupiah($total) }}</p>
              <input type="hidden" name="total" value="{{ $total }}">
            </div>
          </div>
          <hr>
          <div class="flex justify-end p-3">
            <button type="button" class="px-5 py-1 bg-blue-500 text-white rounded-md">Bayar</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  @push('scripts')
  <script>

  </script>
  @endpush
</x-home-layout>
