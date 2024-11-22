{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('layouts.index')

@section('content')
    <div class="w-full min-h-screen bg-[#1f1f1f] flex items-center justify-center px-5 md:px-0">
        <div class="bg-white w-full md:w-[60vw] h-auto md:h-[70vh] flex flex-col md:flex-row rounded-xl overflow-hidden">
            <div class="w-full md:w-[55%] h-auto md:h-full p-7 flex flex-col">
                <h1 class="text-[#111317] text-center text-2xl md:text-3xl font-bold">
                    Join <span class="text-[#ff6d2f]">Fit</span>Master
                </h1>
                <form class="w-full flex flex-col gap-y-2 mt-5" action="{{ route('register') }}" method="post">
                    @csrf
                    <!-- Name -->
                    <div class="flex flex-col gap-y-2">
                        <x-input-label for="name" class="text-[#111317] font-semibold" :value="__('Name')" />
                        <x-text-input id="name" placeholder="Enter Your Name" class="rounded-xl focus:ring-0 focus:outline-none focus:border-gray-400 border border-gray-300 p-2" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <!-- Email Address -->
                    <div class="flex flex-col gap-y-2">
                        <x-input-label for="email" class="text-[#111317] font-semibold" :value="__('Email')" />
                        <x-text-input id="email" placeholder="Enter Your Email" class="rounded-xl focus:ring-0 focus:outline-none focus:border-gray-400 border border-gray-300 p-2" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <!-- Password -->
                    <div class="flex flex-col gap-y-2">
                        <x-input-label for="password" class="text-[#111317] font-semibold" :value="__('Password')" />
                        <x-text-input id="password" placeholder="Enter Your Password" class="rounded-xl focus:ring-0 focus:outline-none focus:border-gray-400 border border-gray-300 p-2"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <!-- Confirm Password -->
                    <div class="flex flex-col gap-y-2">
                        <x-input-label for="password_confirmation" class="text-[#111317] font-semibold" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" placeholder="Confirm Password" class="rounded-xl focus:ring-0 focus:outline-none focus:border-gray-400 border border-gray-300 p-2"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    <button
                        class="bg-[#ff6d2f] text-white text-lg md:text-xl font-semibold py-2 rounded-lg hover:bg-[#ff6d2fd4] duration-200"
                    >
                        Register
                    </button>
                </form>
            </div>
            <div class="w-full md:w-[45%] h-60 md:h-full">
            <img
                src="{{ asset('assets/gallery2.png') }}"
                class="w-full h-full object-cover"
                alt=""
            >
            </div>
        </div>
    </div>

@endsection
