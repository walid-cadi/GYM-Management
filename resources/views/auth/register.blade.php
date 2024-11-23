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
        <div class="bg-white w-full md:w-[60vw] h-auto md:min-h-[70vh] flex flex-col md:flex-row rounded-xl overflow-hidden">
            <div class="w-full md:w-[55%] h-auto md:h-full p-7 flex flex-col">
                <h1 class="text-[#111317] text-center text-2xl md:text-3xl font-bold">
                    Join <span class="text-[#ff6d2f]">Fit</span>Master
                </h1>
                <form enctype="multipart/form-data" class="w-full flex flex-col gap-y-2 mt-5" action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="flex items-center space-x-6">
                        <div class="shrink-0">
                        <img id='preview_img'  class="h-16 w-16 object-cover rounded-full" src="data:image/png;base64,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" alt="Current profile photo" />
                        </div>
                        <label class="block">
                        <span class="text-gray-700">Choose profile photo</span>
                        <input required type="file" name="image" accept="image/*" onchange="loadFile(event)" class="block w-full text-sm text-slate-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-violet-50 file:text-[#ff6d2f]
                            hover:file:bg-violet-100
                        "/>
                        </label>
                    </div>
                    <script>
                        var loadFile = function(event) {
                            var input = event.target;
                            var file = input.files[0];
                            var type = file.type;
                        var output = document.getElementById('preview_img');
                            output.src = URL.createObjectURL(event.target.files[0]);
                            output.onload = function() {
                                URL.revokeObjectURL(output.src) // free memory
                            }
                        };
                    </script>
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
            <div class="w-full md:w-[45%] h-60 md:h-[86vh]">
                <img
                    src="{{ asset('assets/gallery2.png') }}"
                    class="w-full h-[100%] object-cover"
                    alt=""
                >
            </div>
        </div>
    </div>

@endsection
