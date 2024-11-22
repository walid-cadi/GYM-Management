{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('layouts.index')

@section('content')
    <div class="w-full min-h-screen bg-[#1f1f1f] flex items-center justify-center px-5 md:px-0">
        <div class="bg-white w-full md:w-[60vw] h-auto md:h-[70vh] flex flex-col md:flex-row rounded-xl overflow-hidden">
            <div class="w-full md:w-[55%] h-auto md:h-full p-7 flex flex-col justify-center">
                <h1 class="text-[#111317] text-center text-2xl md:text-3xl font-bold">
                    <span class="text-[#ff6d2f]">Fit</span>Master
                </h1>
                <form class="w-full flex flex-col gap-y-3 mt-5" action="{{ route('login') }}" method="post">
                    @csrf
                    {{-- <div class="flex flex-col gap-y-2">
                        <label class="text-[#111317] font-semibold" for="email">Email :</label>
                        <input
                            class="rounded-xl focus:ring-0 focus:outline-none focus:border-gray-400 border border-gray-300 p-2"
                            type="email"
                            required
                            placeholder="Enter Your Email"
                            name="email"
                            id="email"
                        >
                    </div>
                    <div class="flex flex-col gap-y-2">
                        <label class="text-[#111317] font-semibold" for="password">Password :</label>
                        <input
                            class="rounded-xl focus:ring-0 focus:outline-none focus:border-gray-400 border border-gray-300 p-2"
                            type="password"
                            required
                            placeholder="Enter Your Password"
                            name="password"
                            id="password"
                        >
                    </div> --}}
                    <!-- Email Address -->
                    <div class="flex flex-col gap-y-2">
                        <x-input-label for="email" class="text-[#111317] font-semibold" for="email" :value="__('Email')" />
                        <x-text-input id="email" placeholder="Enter Your Email" class="rounded-xl focus:ring-0 focus:outline-none focus:border-gray-400 border border-gray-300 p-2" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <!-- Password -->
                    <div class="flex flex-col gap-y-2">
                        <x-input-label for="password" class="text-[#111317] font-semibold" for="email" :value="__('Password')" />
                        <x-text-input id="password" placeholder="Enter Your Password" class="rounded-xl focus:ring-0 focus:outline-none focus:border-gray-400 border border-gray-300 p-2"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <button
                        class="bg-[#ff6d2f] text-white text-lg md:text-xl font-semibold py-2 rounded-lg hover:bg-[#ff6d2fcd] duration-200"
                    >
                        LogIn
                    </button>
                </form>
            </div>
            <div class="w-full md:w-[45%] h-60 md:h-full">
            <img
                src="{{ asset('assets/gallery3.png') }}"
                class="w-full h-full object-cover"
                alt=""
            >
            </div>
        </div>
    </div>
@endsection
