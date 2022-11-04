<x-home-layout>
  <div class="px-52">
    <h1 class="text-2xl font-bold mb-5">History Pesanan</h1>
    @forelse ($orders as $order)
    <div class="bg-white shadow-md rounded-md mb-3">
      <div class="py-3 px-5 flex justify-between items-center">
        <h2 class="font-bold">{{ $order->ref }}</h2>

        <span class="py-1 px-3 bg-green-500 text-sm text-white rounded-md">{{ $order->status_text }}</span>
      </div>
      <hr>
      <div class="py-3 px-5">
        <div class="flex gap-5">
          <div class="w-1/3">
            <div class="">
              <p class="font-bold">Nama Pemesan</p>
              <p>{{ $order->name }}</p>
            </div>
            <div class="mt-1">
              <p class="font-bold">Alamat Pengiriman</p>
              <p>{{ $order->address }}</p>
            </div>
          </div>
          <div class="w-1/3">
            <div>
              <p class="font-bold">Metode Pembayaran</p>
              <p>{{ $order->payment_method_text }}</p>
            </div>
            <div class="mt-1">
              <p class="font-bold">Metode Pengiriman</p>
              <p>{{ $order->delivery_method_text }}</p>
            </div>
          </div>
          <div class="w-1/3">
            <div class="flex gap-3 items-center w-full mb-3 px-5">
              <img src="{{ asset('images/food.jpg') }}" class="w-12 h-12 rounded-md object-cover" alt="">
              <div>
                <span class="font-bold text-md block">Nasi Goreng</span>
                <span>x1</span>@<span class="text-gray-600">{{ format_rupiah(20000) }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="py-3 px-5">
        <div class="flex justify-between items-center">
          <h3 class="font-bold">Total : {{ format_rupiah($order->total) }}</h3>

          @if ($order->status == 3)
          <form action="{{ route('transaction.done', $order->id) }}" method="POST">
            @csrf
            @method('patch')
            <button type="submit" class="px-5 py-1 bg-blue-500 text-white rounded-md">Konfimasi Penerimaan</button>
          </form>
          @endif
        </div>
      </div>
    </div>
    @empty

    @endforelse
  </div>
</x-home-layout>
