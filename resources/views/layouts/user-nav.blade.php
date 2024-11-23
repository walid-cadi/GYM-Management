<nav class="flex z-40 fixed top-0 w-full justify-between bg-[#1f1f1f] text-white shadow-md">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-2 w-full">
      <div class="relative flex items-center justify-between h-16">
        <!-- Logo and Navigation Links -->
        <div class="flex items-center">
          <!-- Logo -->
          <a href="/" class="flex items-center gap-2">
            {{-- <img class="w-40" src="{{ asset('assets/FitMaster_Logo.png') }}" alt="Your Company"> --}}
            <h1 class="font-bold text-3xl text-white "><span class="text-[#ff6d2f]">F</span>it<span class="text-[#ff6d2f]">M</span>aster</h1>
          </a>

          <!-- Navigation Links (Desktop) -->
          {{-- <div class="hidden sm:flex sm:ml-10">
            <a href="/dashboard" class="rounded-md bg-[#006400] px-3 py-2 text-sm font-medium text-white" aria-current="page">Dashboard</a>
          </div> --}}
        </div>

        <div class="flex gap-x-8 text-lg">
            <a class="hover:text-[#ff6d2f]" href="/gym">Home</a>
            <a class="hover:text-[#ff6d2f]" href="/sessions">Sessions</a>
            <a class="hover:text-[#ff6d2f]" href="">Reservation</a>
            @role(["admin"])
            <a class="hover:text-[#ff6d2f]" href="/admin">Admin</a>
            @endRole
        </div>

        <!-- Profile Dropdown -->
        <div class="relative" x-data="{ openProfileMenu: false }">
          <button type="button" class="flex items-center text-sm focus:outline-none focus:ring-0" @click="openProfileMenu = !openProfileMenu">
            <span class="sr-only">Open user menu</span>
            <img class="h-8 w-8 rounded-full" src="{{ asset("storage/images/profile/". Auth::user()->image ) }}" alt="Profile Picture">
          </button>



          <!-- Dropdown Menu -->
          <div
            x-show="openProfileMenu"
            @click.away="openProfileMenu = false"
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-black/10 focus:outline-none"
          >
            <!-- Profile Link -->
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-900 hover:bg-[#ff6d2f] hover:text-white">
              Your Profile
            </a>
            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}" class="block">
              @csrf
              <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-[#ff6d2f] hover:text-white">
                Sign out
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
</nav>
