<aside class="w-64" aria-label="Sidebar">
  <div class="overflow-y-auto py-4 rounded">
    <ul class="space-y-2">
      <li>
        <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-base font-normal text-gray-900 dark:text-white hover:bg-white dark:hover:bg-gray-700 {{ request()->is('dashboard') ? 'border-r-2 border-sky-900' : 'text-gray-400' }}">
          <i class="las la-chart-pie la-2x text-gray-400 {{ request()->is('dashboard') ? 'text-sky-900' : 'text-gray-400' }}"></i>
          <span class="ml-3 {{ request()->is('dashboard') ? 'text-sky-900 font-bold' : 'text-gray-400' }}">Dashboard</span>
        </a>
      </li>

      <li>
        <a href="{{ route('product.index') }}" class="flex items-center p-2 text-base font-normal text-gray-900 dark:text-white hover:bg-white dark:hover:bg-gray-700 {{ request()->is('product*') ? 'border-r-2 border-sky-900' : 'text-gray-400' }}">
          <i class="las la-shopping-bag la-2x text-gray-400 {{ request()->is('product*') ? 'text-sky-900' : 'text-gray-400' }}"></i>
          <span class="ml-3 {{ request()->is('product*') ? 'text-sky-900 font-bold' : 'text-gray-400' }}">Products</span>
        </a>
      </li>
      <li>
        <a href="{{ route('transaction.index') }}" class="flex items-center p-2 text-base font-normal text-gray-900 dark:text-white hover:bg-white dark:hover:bg-gray-700 {{ request()->is('transaction*') ? 'border-r-2 border-sky-900' : 'text-gray-400' }}">
          <i class="las la-shopping-cart la-2x text-gray-400 {{ request()->is('transaction*') ? 'text-sky-900' : 'text-gray-400' }}"></i>
          <span class="ml-3 {{ request()->is('transaction*') ? 'text-sky-900 font-bold' : 'text-gray-400' }}">Transaksi</span>
        </a>
      </li>
      <li>
        <a href="{{ route('profile.index') }}" class="flex items-center p-2 text-base font-normal text-gray-900 dark:text-white hover:bg-white dark:hover:bg-gray-700 {{ request()->is('profile*') ? 'border-r-2 border-sky-900' : 'text-gray-400' }}">
          <i class="las la-user la-2x text-gray-400 {{ request()->is('profile*') ? 'text-sky-900' : 'text-gray-400' }}"></i>
          <span class="ml-3 {{ request()->is('profile*') ? 'text-sky-900 font-bold' : 'text-gray-400' }}">Profile</span>
        </a>
      </li>
      <li>
        <form action="{{ route('logout') }}" method="POST" class="w-full">
          @csrf
          <button type="submit" class="w-full text-left flex items-center p-2 text-base font-normal text-gray-900 dark:text-white hover:bg-white dark:hover:bg-gray-700">
          <i class="las la-sign-out-alt la-2x text-gray-400"></i>
            <span class="ml-3">Sign Out</span>
          </button>
        </form>
      </li>
    </ul>
  </div>
</aside>
