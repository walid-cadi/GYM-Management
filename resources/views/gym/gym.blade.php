@extends('layouts.index')

@section('content')
@include('layouts.user-nav')
    <div class="mt-[9vh]">
        <div class="bg-black w-full h-[92vh] relative">
            <div class="w-[100%] h-[100%]  opacity-[0.4] img"></div>
            <div class="flex flex-col absolute top-[40%] left-[25%] translate-x-[-50%] translate-y-[-50%] text-white ">
                <h1 class="text-2xl">SHAPE YOUR BODY</h1>
                <h1 class="text-6xl font-bold">BE <span class="text-[#ff6d2f]">STRONG</span></h1>
                <h1 class="text-6xl font-bold">TRAINING HARD</h1>
            </div>
        </div>
        <div class="p-12 flex justify-between">
            <div class="w-[40vw] flex-col gap-y-3 text-[#1f1f1f] text-6xl font-bold pt-7">
                <h1>Stay <span class="text-[#ff6d2f]">Healty</span> &</h1>
                <h1>Get Body In <span class="text-[#ff6d2f]">Shape</span></h1>
            </div>
            <video class="h-[50vh] rounded-lg" autoplay loop >
                <source src="{{ asset("assets/videos/4367572-hd_1920_1080_30fps.mp4") }}" type="video/mp4">
            </video>
        </div>
        {{-- sessions --}}
        <section class="bg-black w-full h-[50vh] relative">
            <div class="w-[100%] h-[100%]  img-sessions"></div>
                <div class="container mx-auto p-4 absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
                    <!-- Section Title -->
                    <h2 class="text-4xl font-bold text-center z-50 text-[#ff6d2f] mb-8">Our Sessions</h2>
                    <!-- Swiper Carousel -->
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach ($sessions as $session)
                                @if ($session)
                                    <div class="swiper-slide">
                                        <div class="bg-[#1f1f1f] rounded-lg shadow-lg ">
                                            <div class=" p-6 ">
                                                <h3 class="text-xl font-semibold text-[#ff6d2f] mb-2">{{ $session->name }}</h3>
                                                <p class="text-white">{{ $session->description }}</p>
                                                <div class="flex items-center justify-between">
                                                    <span class="font-medium text-white"><span class="text-[#ff6d2f]">Start:</span> {{ \Carbon\Carbon::parse($session->start)->format('j, Y g:i A') }}</span>
                                                    <span class="font-medium text-white"><span class="text-[#ff6d2f]">end:</span> {{ \Carbon\Carbon::parse($session->end)->format('j, Y g:i A') }}</span>
                                                </div>
                                                <div class="flex items-center justify-between mt-2">
                                                    <p class="text-white">spots: {{ $session->spots }}</p>
                                                    @if(Auth::user()->sessions->contains($session->id) || Auth::user()->id == $session->user_id)
                                                        <form action="{{ route("session.show", $session ) }}" method="get">
                                                            @csrf
                                                            <button class="text-[#ff6d2f] font-semibold text-lg">View Session</button>
                                                        </form>
                                                        @elseif (!(Auth::user()->id == $session->user_id) && $session->spots < 1)
                                                            <h1 class="text-gray-500 text-lg font-semibold" href="">The Session is Full</h1>
                                                        @elseif (!(Auth::user()->id == $session->user_id) && $session->available == false)
                                                            <h1 class="text-gray-500 text-lg font-semibold" href="">The Session is not available</h1>
                                                        @else
                                                        @if (!(Auth::user()->id == $session->user_id) && $session->is_premium )
                                                            <form action="{{ route('session.subscrip', $session->id) }}" method="POST">
                                                                @csrf
                                                                <button class=" p-3 bg-[#ff6d2f] text-white rounded-md shadow-md hover:bg-[#ff6d2fd5]">
                                                                    Pay for Premium
                                                                </button>
                                                            </form>
                                                        @else
                                                            <form method="post" action="{{ route('sessions.join', $session->id) }}">
                                                                @csrf
                                                                <button type="submit" class="p-3 bg-[#ff6d2f] text-white rounded-md shadow-md hover:bg-[#ff6d2fd5]">Join This Session</button>
                                                            </form>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif ($session->counte() == 0)
                                    <h1 class="text-white text-2xl font-semibold text-center">No Sessions</h1>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
        <script>
            const swiper = new Swiper('.swiper-container', {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 20,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true, // Enable pagination dots to navigate slides
                },
                autoplay: {
                    delay: 2000, // 4 seconds
                    disableOnInteraction: false, // Continue autoplay even after user interaction
                },
                breakpoints: {
                    640: { slidesPerView: 1 },
                    768: { slidesPerView: 2 },
                    1024: { slidesPerView: 3 },
                },
            });
        </script>
        <div class="py-10 flex justify-between">
            <div class="w-[49vw] flex flex-col gap-y-2 ">
                <div class="w-[100%] h-[67vh] ">
                    <img class="w-[100%] h-[100%]" src="{{ asset("assets/pexels-cesar-galeao-1673528-3253501.jpg") }}" alt="">
                </div>
                <div class="w-[100%] h-[67vh] flex gap-x-3">
                    <div class="w-[100%] h-[100%] ">
                        <img class="w-[100%] h-[100%]" src="{{ asset("assets/gallery-4.jpg") }}" alt="">
                    </div>
                    <div class="w-[100%] h-[100%] ">
                        <img class="w-[100%] h-[100%]" src="{{ asset("assets/pexels-kuldeep-singhania-1111658-2105493.jpg") }}" alt="">
                    </div>
                </div>
            </div>
            <div class="w-[49vw] flex flex-col gap-y-2">
                <div class="w-[100%] h-[67vh] flex gap-x-3">
                    <div class="w-[100%] h-[100%] ">
                        <img class="w-[100%] h-[100%]" src="{{ asset("assets/pexels-martenusmoonfotografia-10476176.jpg") }}" alt="">
                    </div>
                    <div class="w-[100%] h-[100%] ">
                        <img class="w-[100%] h-[100%]" src="{{ asset("assets/pexels-ivan-samkov-4164761.jpg") }}" alt="">
                    </div>
                </div>
                <div class="w-[100%] h-[67vh] ">
                    <img class="w-[100%] h-[100%]" src="{{ asset("assets/gallery-6.jpg") }}" alt="">
                </div>
            </div>
        </div>
         <!-- Footer -->
        <footer class="bg-[#ff6d2f] text-white py-10">
            <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- About Section -->
                <div>
                    <h2 class="text-2xl font-bold mb-4">About Us</h2>
                    <p class="text-white font-semibold">
                        Welcome to our gym! We’re dedicated to helping you achieve your fitness goals with top-notch equipment and experienced trainers.
                    </p>
                </div>
                <!-- Quick Links -->
                <div>
                    <h2 class="text-2xl font-bold mb-4">Quick Links</h2>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-white font-semibold ">Home</a></li>
                        <li><a href="#" class="text-white font-semibold ">Classes</a></li>
                        <li><a href="#" class="text-white font-semibold ">Trainers</a></li>
                        <li><a href="#" class="text-white font-semibold ">Membership</a></li>
                        <li><a href="#" class="text-white font-semibold ">Contact Us</a></li>
                    </ul>
                </div>
                <!-- Contact Section -->
                <div>
                    <h2 class="text-2xl font-bold mb-4">Contact Us</h2>
                    <p class="text-white mb-2">
                        <strong>Address:</strong> 123 Fitness Lane, Gym City
                    </p>
                    <p class="text-white mb-2">
                        <strong>Email:</strong> info@gymexample.com
                    </p>
                    <p class="text-white mb-2">
                        <strong>Phone:</strong> +1 (234) 567-890
                    </p>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="text-white ">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="text-white ">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="#" class="text-white ">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="text-white ">
                            <i class="bi bi-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Bottom Section -->
            <div class="text-center mt-10 text-white text-sm">
                &copy; 2024 FitMaster. All rights reserved.
            </div>
        </footer>
    </div>
@endsection


