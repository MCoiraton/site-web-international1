<?php
use App\Destination;
$destinations=Destination::all();
?>
<nav class="bg-white p-2 m-6 rounded-lg text-gray-600 body-font">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex-shrink-0 flex items-center">
            <img class="h-8" src="{{ asset('img/logo.png')}}" alt="Logo">
          </div>
          <div class="hidden sm:block sm:ml-6">
            <div class="flex space-x-4 md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400 ">
              <a href="/" class="hover:bg-blue-500 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Accueil</a>
              <a href="/destinations" class="inline-flex items-center hover:bg-blue-500 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Destinations</a>
              @if(session()->has('uid')  && session('isAdmin'))
              <a href="/admin" class="hover:bg-blue-500 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Espace Admin</a>
              @endif
            </div>
          </div>
          
        </div>
        <div class="origin-right flex">
          @if(!session()->has('uid'))
          <a href="/auth/login" class="text-blue-500 hover:bg-blue-500 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Connexion UL</a>
          @else
          <a href="/profil" class="hover:bg-blue-500 hover:text-white px-3 py-2 rounded-md text-sm font-medium flex">
            <svg class="mx-2" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
              <path d="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm8.127 19.41c-.282-.401-.772-.654-1.624-.85-3.848-.906-4.097-1.501-4.352-2.059-.259-.565-.19-1.23.205-1.977 1.726-3.257 2.09-6.024 1.027-7.79-.674-1.119-1.875-1.734-3.383-1.734-1.521 0-2.732.626-3.409 1.763-1.066 1.789-.693 4.544 1.049 7.757.402.742.476 1.406.22 1.974-.265.586-.611 1.19-4.365 2.066-.852.196-1.342.449-1.623.848 2.012 2.207 4.91 3.592 8.128 3.592s6.115-1.385 8.127-3.59zm.65-.782c1.395-1.844 2.223-4.14 2.223-6.628 0-6.071-4.929-11-11-11s-11 4.929-11 11c0 2.487.827 4.783 2.222 6.626.409-.452 1.049-.81 2.049-1.041 2.025-.462 3.376-.836 3.678-1.502.122-.272.061-.628-.188-1.087-1.917-3.535-2.282-6.641-1.03-8.745.853-1.431 2.408-2.251 4.269-2.251 1.845 0 3.391.808 4.24 2.218 1.251 2.079.896 5.195-1 8.774-.245.463-.304.821-.179 1.094.305.668 1.644 1.038 3.667 1.499 1 .23 1.64.59 2.049 1.043z"/>
            </svg>
            <p class="mx-2">
              <?php
              echo(session('prenom'));
              echo(" ");
              echo(session('nom'));
              ?>
            </p>
            
          </a>
          <a href="/auth/logout">
            <button type="button" class="p-2 text-blue-700 rounded-full hover:bg-blue-300 hover:text-white">
              <span class="sr-only">Déconnexion</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path class="pointer-events-none text-white" d="M8 10v-5l8 7-8 7v-5h-8v-4h8zm2-8v2h12v16h-12v2h14v-20h-14z"/></svg>
            </button>
          </a>
          @endif
        </div>
    </div>
    <script src="https://unpkg.com/flowbite@1.3.3/dist/flowbite.js"></script>
  </nav>
 