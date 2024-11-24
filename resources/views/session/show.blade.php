@extends('layouts.index')

@section('content')
@include('layouts.user-nav')
<div class="min-h-screen bg-[#1f1f1f]">
    <div class="pt-[10vh] ">
        <div class="p-12 flex flex-col items-center gap-y-2">
            <h1 class="text-[#ff6d2f] text-4xl font-semibold">{{ $session->name }}</h1>
            <h1 class="text-white text-3xl font-semibold">owner: {{ $session->trainer->name }}</h1>
            <div class="flex items-center gap-x-11">
                <p class="text-white ">
                    <span class="font-medium text-white">Start:</span> {{ \Carbon\Carbon::parse($session->start)->format('F j, Y g:i A') }}
                </p>
                <p class="text-white">
                    <span class="font-medium text-white">End:</span> {{ \Carbon\Carbon::parse($session->end)->format('F j, Y g:i A') }}
                </p>
            </div>
            <h1 class="font-medium text-white">Description: {{ $session->description }}</h1>
            @if (Auth::user()->id == $session->user_id)
                <div class="flex items-center gap-x-3 mt-2 ">
                    <form method="post" action="{{ route("session.delete",$session->id) }}">
                        @csrf
                        @method("DELETE")
                        <button class="text-white bg-[#ff6d2f] p-2 rounded-md">Delete This Session</button>
                    </form>
                    @if ($session->available == false)
                            <form action="{{ route("session.available",$session) }}" method="post">
                                @csrf
                                @method("PUT")
                                <button class="p-2 text-white bg-[#ff6d2f] font-semibold rounded-md shadow-md hover:bg-[#ff6d2fd5]">Put Session Available</button>
                            </form>
                        @elseif ($session->available == true)
                            <form action="{{ route("session.available",$session) }}" method="post">
                                @csrf
                                @method("PUT")
                                <button class="p-2 text-white bg-[#ff6d2f] font-semibold rounded-md shadow-md hover:bg-[#ff6d2fd5]">Put Session UnAvailable</button>
                            </form>
                    @endif
                    <button class="bg-[#ff6d2f] text-white rounded-md px-4 py-2 hover:bg-[#ff6d2fc8] transition" id="session" onclick="openModal('exerciseModal')">
                        Create Exercise
                    </button>
                    <div id="exerciseModal" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
                        <div class="relative top-20 mx-auto shadow-2xl rounded-lg bg-white max-w-lg">
                            <div class="flex justify-end p-4">
                                <button onclick="closeModal('exerciseModal')"
                                        type="button"
                                        class="text-gray-500 hover:bg-gray-100 hover:text-gray-900 rounded-full p-2 transition">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="px-6 pb-8">
                                <form enctype="multipart/form-data" method="post" action="{{ route("exercise.store") }}" class="flex flex-col gap-6">
                                    @csrf
                                    <h1 class="text-xl font-bold text-gray-800 text-center">Create Exercise</h1>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700" for="image">Choose Exercise Photo</label>
                                        <input class="w-full mt-1 rounded-lg border border-gray-300 focus:border-[#ff6d2f] focus:ring-[#ff6d2f] p-3"
                                            name="image" id="image" type="file" accept="image/*" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700" for="name">Name</label>
                                        <input class="w-full mt-1 rounded-lg border-gray-300 focus:border-[#ff6d2f] focus:ring-[#ff6d2f] p-3"
                                            name="name" id="name" type="text" placeholder="Enter exercise name" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700" for="calories_burned">Calories Burned</label>
                                        <input class="w-full mt-1 rounded-lg border-gray-300 focus:border-[#ff6d2f] focus:ring-[#ff6d2f] p-3"
                                            name="calories_burned" id="calories_burned" type="number" min="1" placeholder="Enter Calories Burned" required>
                                        <input class=""
                                            name="sesion_id" type="hidden" value="{{ $session->id }}">
                                    </div>
                                    <button class="w-full py-3 px-6 bg-[#ff6d2f] text-white font-semibold rounded-lg shadow-md hover:bg-[#ff6d2fd8] focus:outline-none focus:ring-0 transition">
                                        Create
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        window.openModal = function(modalId) {
                            document.getElementById(modalId).style.display = 'block'
                            document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
                        }

                        window.closeModal = function(modalId) {
                            document.getElementById(modalId).style.display = 'none'
                            document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
                        }

                        // Close all modals when press ESC
                        document.onkeydown = function(event) {
                            event = event || window.event;
                            if (event.keyCode === 27) {
                                document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
                                let modals = document.getElementsByClassName('modal');
                                Array.prototype.slice.call(modals).forEach(i => {
                                    i.style.display = 'none'
                                })
                            }
                        };
                    </script>
                </div>
            @endif
        </div>
        <div class="p-12 flex flex-col items-center gap-y-4">
            <h1 class="text-[#ff6d2f] text-3xl font-semibold">Exercises</h1>
            <div class="flex-wrap flex gap-8">
                @foreach ($session->exercises as $exercise)
                    <div class="bg-white rounded-lg w-[29vw] h-[50vh]">
                        <img class="rounded-lg w-[100%] h-[65%]" src="{{ asset("storage/images/exercise/". $exercise->image) }}" alt="">
                        <div class="flex flex-col gap-y-3 p-4 w-[100%] h-[35%] ">
                            <div class="flex items-center justify-between">
                                <h1 class="text-lg font-semibold">{{ $exercise->name }}</h1>
                                <h1 class="text-lg font-semibold">Calories Burned: {{ $exercise->calories_burned }}</h1>
                            </div>
                            <div class="flex items-center gap-x-5">
                                 <form action="{{ route('exercises.updateStatusdone', ['exercise' => $exercise->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-x-2 py-2 px-6 bg-[#ff6d2f] text-white rounded-lg hover:bg-[#ff6d2fd0] transition">
                                        Mark as Done<i class="bi bi-check2-circle"></i>
                                    </button>
                                </form>
                                <form action="{{ route('exercises.updateStatusfavorite', ['exercise' => $exercise->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-x-2 py-2 px-6 bg-[#ff6d2f] text-white rounded-lg hover:bg-[#ff6d2fd4] transition">
                                        Favorite<i class="bi bi-heart-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
