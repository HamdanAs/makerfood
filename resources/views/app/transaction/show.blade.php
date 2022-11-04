<x-app-layout>
  <x-slot name="header">
    <h1 class="header">Detail Transaksi</h1>
  </x-slot>

  <div class="mx-auto px-10 pt-10">
    <div class="overflow-hidden sm:rounded-lg">
      <div class="p-6">
        <div class="flex gap-5 w-full">
          <div class="bg-white rounded-md shadow-md w-1/3">
            <div class="px-5 py-3 flex justify-between items-center">
              <span class="font-bold">{{ $order->ref }}</span>
              <span class="px-3 py-1 bg-blue-500 rounded-md text-white text-sm">{{ $order->status_text }}</span>
            </div>
            <hr>

            <div class="py-3 px-5">
              <div>
                <p class="text-gray-600">Nama Pemesan</p>
                <p class="font-medium">{{ $order->name }}</p>
              </div>
              <div class="mt-2">
                <p class="text-gray-600">Alamat Pemesan</p>
                <p class="font-medium">{{ $order->address }}</p>
              </div>
              <div class="mt-2">
                <p class="text-gray-600">Pembayaran</p>
                <p class="font-medium">{{ $order->payment_method_text }}</p>
              </div>
              <div class="mt-2">
                <p class="text-gray-600">Pengiriman</p>
                <p class="font-medium">{{ $order->delivery_method_text }}</p>
              </div>
            </div>

            <hr>

            <div class="py-3 px-5">
              <div class="w-full flex gap-3">
                @switch($order->status)
                  @case(1)
                    <form action="{{ route('transaction.process', $order->id) }}" method="post">
                      @csrf
                      @method('patch')
                      <button type="submit" class="px-5 py-1 bg-blue-500 text-white rounded-md shadow">Proses</button>
                    </form>
                    <form action="{{ route('transaction.decline', $order->id) }}" method="POST">
                      @csrf
                      @method('patch')
                      <button type="submit" class="px-5 py-1 bg-red-500 text-white rounded-md shadow">Tolak</button>
                    </form>
                    @break
                  @case(2)
                    <form action="{{ route('transaction.send', $order->id) }}" method="post">
                      @csrf
                      @method('patch')
                      <button type="submit" class="px-5 py-1 bg-blue-500 text-white rounded-md shadow">Antar</button>
                    </form>
                    @break
                  @case(3)
                    <form action="{{ route('transaction.done', $order->id) }}" method="post">
                      @csrf
                      @method('patch')
                      <button disabled type="submit" class="px-5 py-1 bg-blue-500 text-white rounded-md shadow">Menunggu Konfirmasi Pemesan</button>
                    </form>
                    @break
                  @case(4)
                    <form action="{{ route('transaction.submit', $order->id) }}" method="post">
                      @csrf
                      @method('patch')
                      <button type="submit" class="px-5 py-1 bg-blue-500 text-white rounded-md shadow">Serahkan</button>
                    </form>
                    @break
                  @case(5)
                    <form action="{{ route('transaction.process', $order->id) }}" method="post">
                      @csrf
                      @method('patch')
                      <button disabled type="submit" class="px-5 py-1 bg-blue-500 text-white rounded-md shadow">Pesananan Telah Selesai</button>
                    </form>
                    @break
                  @default

                @endswitch
              </div>
            </div>
          </div>
          <div class="w-1/3">
            <div class="bg-white rounded-md shadow-md h-fit">
              <div class="px-5 py-3 flex justify-between items-center">
                <span class="font-bold">Detail Pesanan</span>
              </div>
              <hr>

              <div class="py-3 px-5">
                @forelse ($order->details as $detail)
                <div class="flex gap-3 items-center w-full mb-3">
                  <img src="{{ asset('images/food.jpg') }}" class="w-12 h-12 rounded-md object-cover" alt="">
                  <div class="w-full">
                    <span class="font-bold text-md block">{{ $detail->product->name }}</span>
                    <div class="w-full flex justify-between">
                      <div>
                        <span>x{{ $detail->qty }}</span>@<span class="text-gray-600">{{ format_rupiah($detail->product->price) }}</span>
                      </div>
                      <span>{{ format_rupiah($detail->subtotal) }}</span>
                    </div>
                  </div>
                </div>
                @empty
                <p class="px-5 pb-3">Belum ada barang.</p>
                @endforelse
              </div>
              <hr>
              <div class="px-5 py-3 flex justify-between">
                <p class="font-bold">Total</p>
                <p class="font-bold">{{ format_rupiah($order->total) }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
