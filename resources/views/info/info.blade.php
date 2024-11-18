@extends('layouts.index')

@section('content')
    <div class="w-full min-h-screen bg-[#06080a] flex items-center justify-center px-5 md:px-0">
        <div class="bg-white md:w-[60vw] h-auto md:h-[70vh] flex flex-col md:flex-row rounded-xl overflow-hidden">
            <div class="w-full md:w-[50%] h-auto md:h-full p-7 flex flex-col">
                <h1 class="text-[#111317] text-center text-2xl md:text-3xl font-bold">
                    More Info
                </h1>
                <form class="w-full flex flex-col gap-y-2 mt-5" action="{{ route("info.update",$user->id) }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="flex flex-col gap-y-2">
                        <label class="text-[#111317] font-semibold" for="name">Width :</label>
                        <input
                            class="rounded-xl focus:ring-0 focus:outline-none focus:border-gray-400 border border-gray-300 p-2"
                            type="number"
                            required
                            placeholder="Enter Your width"
                            name="width"
                            id="width"
                        >
                    </div>
                    <div class="flex flex-col gap-y-2">
                        <label class="text-[#111317] font-semibold" for="name">Height :</label>
                        <input
                            class="rounded-xl focus:ring-0 focus:outline-none focus:border-gray-400 border border-gray-300 p-2"
                            type="number"
                            required
                            placeholder="Enter Your height"
                            name="height"
                            id="height"
                        >
                    </div>
                    <button
                        class="bg-[#006400] text-white text-lg md:text-xl font-semibold py-2 rounded-lg hover:bg-[#006400e9] duration-200"
                    >
                        Done
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
