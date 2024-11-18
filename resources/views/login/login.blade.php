@extends('layouts.index')

@section('content')
    <div class="w-full min-h-screen bg-[#111317] flex items-center justify-center px-5 md:px-0">
        <div class="bg-white w-full md:w-[60vw] h-auto md:h-[70vh] flex flex-col md:flex-row rounded-xl overflow-hidden">
            <div class="w-full md:w-[55%] h-auto md:h-full p-7 flex flex-col">
                <h1 class="text-[#111317] text-center text-2xl md:text-3xl font-bold">
                    Join <span class="text-[#006400]">Fit</span>Master
                </h1>
                <form class="w-full flex flex-col gap-y-3 mt-5" action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="flex flex-col gap-y-2">
                        <label class="text-[#111317] font-semibold" for="name">Name :</label>
                        <input
                            class="rounded-xl focus:ring-0 focus:outline-none focus:border-gray-400 border border-gray-300 p-2"
                            type="text"
                            required
                            placeholder="Enter Your Name"
                            name="name"
                            id="name"
                        >
                    </div>
                    <div class="flex flex-col gap-y-2">
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
                    </div>
                    <button
                        class="bg-[#006400] text-white text-lg md:text-xl font-semibold py-2 rounded-lg hover:bg-[#006400e9] duration-200"
                    >
                        Register
                    </button>
                </form>
            </div>
            <div class="w-full md:w-[45%] h-60 md:h-full">
            <img
                src="{{ asset('images/gallery2.png') }}"
                class="w-full h-full object-cover"
                alt=""
            >
            </div>
        </div>
    </div>

@endsection
