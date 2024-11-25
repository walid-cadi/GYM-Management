@extends('layouts.index')

@section('content')
@include('layouts.user-nav')
    <div class="mt-[9vh] p-12 flex flex-col min-h-[91vh] gap-y-5 bg-[#1f1f1f]">
        <h1 class="text-[#ff6d2f] text-3xl font-semibold">Acounts Details</h1>
        <div class="p-5 bg-[#383838] w-full rounded flex items-center gap-x-8">
            <img class="h-[100px] w-[100px]  rounded-full" src="{{ asset("storage/images/profile/". Auth::user()->image ) }}" alt="">
            <div class="text-white flex flex-wrap gap-x-[5vw]">
                <h1 class="text-xl"><span class="text-[#ff6d2f]">Name:</span> {{ Auth::user()->name }}</h1>
                <h1 class="text-xl"><span class="text-[#ff6d2f]">Email:</span> {{ Auth::user()->email }}</h1>
                <h1 class="text-xl"><span class="text-[#ff6d2f]">Age:</span> {{ Auth::user()->age }}</h1>
                <h1 class="text-xl"><span class="text-[#ff6d2f]">weight:</span> {{ Auth::user()->weight }}kg</h1>
                <h1 class="text-xl"><span class="text-[#ff6d2f]">height:</span> {{ Auth::user()->height }}cm</h1>
                <h1 class="text-white text-xl"><span class="text-[#ff6d2f]">calories:</span> {{ Auth::user()->calories }}</h1>
            </div>
        </div>

        <div class="flex-col flex">
            <h1 class="text-[#ff6d2f] text-2xl font-semibold">Favorite Exercises</h1>
            <div class="flex flex-wrap">
                @foreach ($dones as $done)
                    <h1>{{ $done->name }}</h1>
                @endforeach
            </div>
        </div>








        {{-- <div class="p-5 bg-[rgb(56,56,56)] w-full rounded">
            <form class="w-[40%] flex flex-col gap-y-4" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')
                    <div class="">
                        <x-input-label for="name" class="text-white" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full bg-[#1f1f1f] text-white focus:border-white focus:ring-0" :value="old('name', Auth::user()->name)" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                    <div class="">
                        <x-input-label for="name" class="text-white" :value="__('Email')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full bg-[#1f1f1f] text-white focus:border-white focus:ring-0" :value="old('name', Auth::user()->email)" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>
                    <button class="p-2 w-[10vw] bg-[#ff6d2f] text-white rounded">Save</button>
            </form>
        </div> --}}
    </div>
@endsection
