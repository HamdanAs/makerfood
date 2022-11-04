<x-app-layout>
  <div class="px-10 pt-10">
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

            <div class="mt-5">
              <button class="px-5 py-1 rounded-md border-2 border-white text-white">Edit Profile</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-white overflow-hidden rounded-lg mt-5 shadow-md">
      <div class="bg-white p-5">
        <div class="w-3/5">
          <table class="w-full">
            <tr class="py-3">
              <td class="w-1/3 font-bold align-top py-3">Nama Lengkap</td>
              <td class="align-top py-3">:</td>
              <td class="py-3">{{ $user->name }}</td>
            </tr>
            <tr class="py-3">
              <td class="w-1/3 font-bold align-top py-3">Email</td>
              <td class="align-top py-3">:</td>
              <td class="py-3">{{ $user->email }}</td>
            </tr>
            <tr class="py-3">
              <td class="w-1/3 font-bold align-top py-3">No Telp</td>
              <td class="align-top py-3">:</td>
              <td class="py-3">0988787843</td>
            </tr>
            <tr class="py-3">
              <td class="w-1/3 font-bold align-top py-3">Alamat</td>
              <td class="align-top py-3">:</td>
              <td class="py-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo atque voluptate ex?</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
