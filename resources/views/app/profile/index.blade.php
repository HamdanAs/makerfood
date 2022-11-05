<x-app-layout>
  <div class="px-10 pt-10">
    <x-session-status :status="session('success')" />

    <div class="bg-white overflow-hidden rounded-lg shadow-md">
      <div class="bg-white h-24">

      </div>
      <div class="bg-blue-500 h-20 relative">
        <div class="absolute top-[-30%] px-12 w-full">
          <div class="flex items-center justify-between">
            <div class="flex">
              <img src="{{ asset('images/food.jpg') }}" class="w-24 h-24 rounded-full" alt="">

              <div class="mt-7 ml-5">
                <h1 class="text-xl text-white font-bold">Profile</h1>
                <h3 class="text-white">Profile pribadi dan profil dapur</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-white overflow-hidden rounded-lg mt-5 shadow-md">
      <div class="border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
          <li class="mr-2">
            <a href="#" onclick="openTabs(event, 'profile')" class="tablinks inline-flex p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 border-b-2 group">
              <svg aria-hidden="true" class="mr-2 w-5 h-5 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
              </svg>Profile
            </a>
          </li>
          <li class="mr-2">
            <a href="#" onclick="openTabs(event, 'kitchen')" class="tablinks inline-flex p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
              <svg aria-hidden="true" class="mr-2 w-5 h-5 dark:text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
              </svg>Dapur
            </a>
          </li>
        </ul>
      </div>
      <div class="bg-white p-5">
        <div id="profile" class="w-3/5 tabcontent">
          <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('patch')

            <table class="w-full">
              <tr class="py-3">
                <td class="w-1/3 font-bold align-top py-3">Nama Lengkap</td>
                <td class="align-top py-3">:</td>
                <td class="py-3">
                  <x-text-input id="name" class="block mt-1 w-80 bg-gray-50" type="text" name="name" :value="$user->name" required />

                  <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </td>
              </tr>
              <tr class="py-3">
                <td class="w-1/3 font-bold align-top py-3">Email</td>
                <td class="align-top py-3">:</td>
                <td class="py-3">
                  <x-text-input id="email" class="block mt-1 w-80 bg-gray-50" type="email" name="email" :value="$user->email" required />

                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </td>
              </tr>
              <tr class="py-3">
                <td class="w-1/3 font-bold align-top py-3">No Telp</td>
                <td class="align-top py-3">:</td>
                <td class="py-3">
                  <x-text-input id="phone" class="block mt-1 w-80 bg-gray-50" type="text" name="phone" :value="$user->phone" required />

                  <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </td>
              </tr>
              <tr class="py-3">
                <td class="w-1/3 font-bold align-top py-3"></td>
                <td class="align-top py-3"></td>
                <td class="py-3">
                  <button type="submit" class="px-5 py-1 bg-blue-600 rounded-md shadow text-white">Simpan</button>
                </td>
              </tr>
            </table>
          </form>
        </div>
        <div id="kitchen" class="w-3/5 tabcontent" style="display: none;">
          <form action="{{ route('profile.update-kitchen') }}" method="post">
            @csrf
            @method('patch')
            <table class="w-full">
              <tr class="py-3">
                <td class="w-1/3 font-bold align-top py-3">Nama Dapur</td>
                <td class="align-top py-3">:</td>
                <td class="py-3">
                  <x-text-input id="name" class="block mt-1 w-80 bg-gray-50" type="text" name="name" :value="$kitchen->name" required />

                  <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </td>
              </tr>
              <tr class="py-3">
                <td class="w-1/3 font-bold align-top py-3">Alamat Dapur</td>
                <td class="align-top py-3">:</td>
                <td class="py-3">
                  <x-text-area id="address" class="block mt-1 w-full text-gray-900 bg-gray-50" name="address" required autofocus>{{ $kitchen->address }}</x-text-area>
                </td>
              </tr>
              <tr class="py-3">
                <td class="w-1/3 font-bold align-top py-3"></td>
                <td class="align-top py-3"></td>
                <td class="py-3">
                  <button class="px-5 py-1 bg-blue-600 rounded-md shadow text-white">Simpan</button>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>

  @push('scripts')
  <script>
    function openTabs(evt, name) {
      // Declare all variables
      var i, tabcontent, tablinks;

      // Get all elements with class="tabcontent" and hide them
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }

      // Get all elements with class="tablinks" and remove the class "active"
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" border-blue-600 active", "");
      }

      // Show the current tab, and add an "active" class to the button that opened the tab
      document.getElementById(name).style.display = "block";
      evt.currentTarget.className += " active";
    }
  </script>
  @endpush
</x-app-layout>
