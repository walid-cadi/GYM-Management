{{-- <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav> --}}

<nav class="flex fixed top-0 w-full justify-between bg-[#1f1f1f] text-white shadow-md">
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

        <!-- Profile Dropdown -->
        <div class="relative" x-data="{ openProfileMenu: false }">
          <button type="button" class="flex items-center text-sm focus:outline-none focus:ring-0" @click="openProfileMenu = !openProfileMenu">
            <span class="sr-only">Open user menu</span>
            <img class="h-8 w-8 rounded-full" src="data:image/png;base64,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" alt="Profile Picture">
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
