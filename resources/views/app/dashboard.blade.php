<x-app-layout>
  <x-slot name="header">
    <h1 class="header">Dashboard</h1>
  </x-slot>

  <div class="">
    <div class="mx-auto sm:px-6 lg:px-4">
      <div class="bg-white overflow-hidden sm:rounded-lg">
        <div class="p-6 bg-white">
          <h1 class="text-xl font-bold text-gray-700">Overview</h1>
          <div class="grid grid-cols-4 w-full gap-5">
            <div class="p-3 border-2 border-gray-400 rounded-md">
              <div class="flex justify-between items-center">
                <i class="fa-solid fa-bag-shopping fa-xl" style="color: tomato;"></i>
                <span class="text-green-500">+24%</span>
              </div>
              <h3 class="text-xl font-bold text-gray-700 mt-3">20 Barang</h3>
              <span class="text-gray-500 font-bold">Total Barang</span>
            </div>
            <div class="p-3 border-2 border-gray-400 rounded-md">
              <div class="flex justify-between items-center">
                <i class="fa-solid fa-cart-shopping fa-xl" style="color: purple;"></i>
                <span class="text-green-500">+24%</span>
              </div>
              <h3 class="text-xl font-bold text-gray-700 mt-3">20 Transaksi</h3>
              <span class="text-gray-500 font-bold">Total Transaksi</span>
            </div>
            <div class="p-3 border-2 border-gray-400 rounded-md">
              <div class="flex justify-between items-center">
                <i class="fa-solid fa-rupiah-sign fa-xl" style="color: green;"></i>
                <span class="text-green-500">+24%</span>
              </div>
              <h3 class="text-xl font-bold text-gray-700 mt-3">Rp. 6.000.000</h3>
              <span class="text-gray-500 font-bold">Total Pendapatan</span>
            </div>
            <div class="p-3 border-2 border-gray-400 rounded-md">
              <div class="flex justify-between items-center">
                <i class="fa-solid fa-money-bill-wave fa-xl" style="color: red;"></i>
                <span class="text-green-500">+24%</span>
              </div>
              <h3 class="text-xl font-bold text-gray-700 mt-3">Rp. 6.000.000</h3>
              <span class="text-gray-500 font-bold">Total Pengeluaran</span>
            </div>
          </div>

          <div class="p-3 border-2 border-gray-400 rounded-md mt-10">
            <div class="flex items-center gap-5 mb-5">
              <a href="" class="text-xl font-bold text-gray-700">Pendapatan</a>
              <a href="" class="text-xl font-bold text-gray-300">Pengeluaran</a>
            </div>
            <canvas id="myChart" width="400" height="100"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  @push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

  <script>
    const ctx = $('#myChart');

    const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["January", "February", "March", "April", "May", "June",
          "July", "August", "September", "October", "November", "December"
        ],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: [
            'rgb(14 159 110)',
          ],
          borderWidth: 1,
          borderRadius: Number.MAX_VALUE,
          barPercentage: 0.2
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            grid: {
              display: false
            }
          },
          x: {
            grid: {
              display: false
            }
          }
        },
        plugins: {
          legend: {
            display: false
          }
        }
      }
    });
  </script>
  @endpush
</x-app-layout>
