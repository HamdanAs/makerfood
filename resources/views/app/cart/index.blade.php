<x-home-layout>
  <div class="px-72">
    <div class="flex gap-3 flex-1">
      <div class="w-3/5 bg-white shadow-lg rounded-md h-fit">
        <h1 class="p-3 text-xl font-bold">Keranjang</h1>
        <hr>
        <div class="p-3">
          @forelse ($carts as $cart)
          <div class="flex gap-3 items-center w-full mb-3">
            <img src="{{ asset('images/food.jpg') }}" class="w-12 h-12 rounded-md object-cover" alt="">
            <div class="w-full">
              <span class="font-bold text-md block">{{ $cart->product->name }}</span>
              <div class="flex justify-between w-full">
                <div class="text-gray-600">{{ format_rupiah($cart->product->price) }}</div>
                <div>
                  <button disabled type="button" class="border-2 border-gray-200 px-3 dec" data-id="{{ $cart->product->id }}">-</button>
                  <input type="number" readonly class="border-2 border-gray-200 w-10 p-0 text-center" name="qty-{{ $cart->product->id }}" value="{{ $cart->qty }}" min="0">
                  <button disabled type="button" class="border-2 border-gray-200 px-3 inc" data-id="{{ $cart->product->id }}">+</button>
                </div>
              </div>
            </div>
          </div>
          @empty
          <p>Belum ada barang.</p>
          @endforelse
        </div>
        <hr>
      </div>
      <div class="w-2/5 h-fit">
        <div class="bg-white shadow-lg rounded-md">
          <h1 class="p-3 text-xl font-bold">Ringkasan Total</h1>
          <hr>
          <div class="p-3">
            <div class="flex justify-between">
              <h3 class="font-bold">Jumlah Item</h3>
              <p class="total-text">{{ $carts->sum('qty') }} Item</p>
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
            <a href="{{ route('cart.checkout') }}" class="px-5 py-1 bg-blue-500 text-white rounded-md">Lanjutkan</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  @push('scripts')
  <script>
    $(document).ready(function() {
      function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
          split = number_string.split(","),
          sisa = split[0].length % 3,
          rupiah = split[0].substr(0, sisa),
          ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka satuan ribuan
        if (ribuan) {
          separator = sisa ? "." : "";
          rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
      }

      $(document).on('click', '.inc', function() {
        let productId = $(this).data('id')

        let currentQty = parseInt($(`[name="qty-${productId}"]`).val())

        let currentTotal = parseInt($(`[name="total"]`).val())

        $(`[name="qty-${productId}"]`).val(currentQty + 1)
      });

      $(document).on('click', '.dec', function() {
        let productId = $(this).data('id')

        let currentQty = parseInt($(`[name="qty-${productId}"]`).val())

        if (currentQty == 0) {
          return
        }

        $(`[name="qty-${productId}"]`).val(currentQty - 1)
      });
    });
  </script>
  @endpush
</x-home-layout>
