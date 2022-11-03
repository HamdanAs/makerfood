<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
  <script src="https://kit.fontawesome.com/8a50216966.js" crossorigin="anonymous"></script>
  <!-- Styles -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    body {
      font-family: 'Nunito', sans-serif;
    }
  </style>
</head>

<body class="antialiased">
  <div class="relative flex min-h-screen bg-gray-100 sm:pt-0 pb-10">
    <nav class="p-5 fixed top-0 left-0 right-0 bg-white flex gap-5 items-center justify-between z-50 shadow-md">
      <div class="flex items-center gap-5">
        <h1 class="text-2xl font-bold">
          <a href="/">MakerFood</a>
        </h1>
        <div class="relative">
          <input type="text" class="border-0 bg-gray-100 rounded-3xl w-[300px] pl-12" placeholder="search">
          <i class="las la-search la-lg absolute top-[30%] left-[15px] text-gray-400"></i>
        </div>
      </div>
      <div class="flex items-center gap-5">
        <div class="relative group">
          <i class="las la-shopping-cart la-2x"></i>
          <span class="absolute bg-blue-500 shadow rounded-full w-5 h-5 text-center text-white bottom-0 left-0">{{ $carts->count() }}</span>
          <div class="absolute w-72 bg-gray-300 shadow-md z-50 left-[-600%] mt-2 rounded-lg scale-0 origin-top group-hover:scale-100 transition-all">
            <a href="{{ route('cart.index') }}" class="px-5 py-2 w-full text-center flex justify-between">
              <span>Keranjang</span>
              <span>Lihat Semua</span>
            </a>
            <hr class="mb-3">
            @forelse ($carts as $cart)
            <div class="flex gap-3 items-center w-full mb-3 px-5">
              <img src="{{ asset('images/food.jpg') }}" class="w-12 h-12 rounded-md object-cover" alt="">
              <div>
                <span class="font-bold text-md block">{{ $cart->product->name }}</span>
                <span>x{{ $cart->qty }}</span>@<span class="text-gray-600">{{ format_rupiah($cart->product->price) }}</span>
              </div>
            </div>
            @empty
            <p class="px-5 pb-3">Belum ada barang.</p>
            @endforelse
          </div>
        </div>
        @auth
        <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-10 h-10 rounded-full cursor-pointer" src="{{ asset('images/food.jpg') }}" alt="User dropdown">

        <!-- Dropdown menu -->
        <div id="userDropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
          <div class="py-3 px-4 text-sm text-gray-900 dark:text-white">
            <div>{{ auth()->user()->name }}</div>
            <div class="font-medium truncate">{{ auth()->user()->email }}</div>
          </div>
          <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
            @can('access dashboard')
            <li>
              <a href="{{ route('dashboard') }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
            </li>
            @else
            <li>
              <a href="{{ route('create-kitchen') }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Daftarkan Dapur</a>
            </li>
            @endcan
            <li>
              <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profil</a>
            </li>
          </ul>
          <div class="py-1">
            <form action="{{ route('logout') }}" method="post">
              @csrf
              <button type="submit" class="block w-full text-left py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</button>
            </form>
          </div>
        </div>
        @else
        <a href="{{ route('login') }}" class="px-5 py-1 border-blue-500 border-2 rounded-lg">Login</a>
        <a href="{{ route('register') }}" class="px-5 py-1.5 bg-blue-500 rounded-lg text-white">Register</a>
        @endauth
      </div>
    </nav>

    <main class="pt-24 px-5 w-full">
      {{ $slot }}
    </main>
  </div>
  <footer class="bg-blue-500 py-2 flex justify-center items-center">
    <p class="text-white">Makerindo &copy; 2022</p>
  </footer>

  <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  @stack('scripts')
</body>

</html>
