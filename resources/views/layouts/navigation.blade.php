<aside class="w-64 bg-gray-100" aria-label="Sidebar">
  <div class="overflow-y-auto py-4 px-3 rounded">
    <a href="/" class="flex items-center pl-2.5 mb-5">
      <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">MakerFood</span>
    </a>
    <ul class="space-y-2">
      <li>
        <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-white dark:hover:bg-gray-700 {{ request()->is('dashboard') ? 'active' : '' }}">
          <i class="fa-solid fa-chart-pie fa-lg"></i>
          <span class="ml-3">Dashboard</span>
        </a>
      </li>

      <li>
        <a href="{{ route('product.index') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-white dark:hover:bg-gray-700 {{ request()->is('product*') ? 'active' : '' }}">
          <i class="fa-solid fa-bag-shopping fa-lg"></i>
          <span class="flex-1 ml-3 whitespace-nowrap">Products</span>
        </a>
      </li>
      <li>
        <a href="{{ route('transaction.index') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-white dark:hover:bg-gray-700 {{ request()->is('transaction*') ? 'active' : '' }}">
          <i class="fa-solid fa-cart-shopping fa-lg"></i>
          <span class="flex-1 ml-3 whitespace-nowrap">Transaksi</span>
        </a>
      </li>
      <li>
        <form action="{{ route('logout') }}" method="POST" class="w-full">
          @csrf
          <button type="submit" class="w-full text-left flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-white dark:hover:bg-gray-700">
            <i class="fa-solid fa-right-from-bracket fa-lg"></i>
            <span class="flex-1 ml-3 whitespace-nowrap">Sign Out</span>
          </button>
        </form>
      </li>
    </ul>
  </div>
</aside>
