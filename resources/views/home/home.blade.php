@extends('layouts.index')

@section('content')
    <div class="hero_section w-full min-h-screen bg-gray-800">
        @if (Route::has('login'))
            <nav class="flex flex-wrap items-center justify-between px-5 md:px-7 py-4">
                <img class="w-32 md:w-48" src="{{ asset('images/FitMaster_Logo.png') }}" alt="">
                <div class="flex items-center gap-x-3 md:gap-x-5">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-white text-sm md:text-lg font-medium">
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="bg-[#75de5d] rounded-full text-white text-sm md:text-lg font-semibold py-2 px-5 md:px-7 hover:bg-[#75de5dc6] duration-300"
                        >
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="bg-[#006400] rounded-full text-white text-sm md:text-lg font-semibold py-2 px-5 md:px-7 hover:bg-[#006400ce] duration-300"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            </nav>
        @endif
        <div class="mt-10 md:mt-[15vh] flex flex-col items-start gap-y-6 md:gap-y-10 px-5 sm:px-10 md:px-[10vw]">
        <h1 class="text-white text-3xl sm:text-4xl md:text-5xl font-bold w-full md:w-[45vw] leading-tight">
            Transform your Fitness Journey
        </h1>
        <a
            href="{{ route('register') }}"
            class="text-white bg-[#006400] text-sm md:text-lg py-3 px-5 md:px-6 rounded-lg hover:bg-[#006400cf] duration-300"
        >
            BECOME A MEMBER
        </a>
        </div>
    </div>
@endsection
