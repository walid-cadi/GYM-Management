@extends('layouts.index')

@section('content')

<div class="flex flex-col bg-[#06080a]">
    <div class="hero_section w-full min-h-screen">
        @if (Route::has('login'))
            <nav class="flex flex-wrap items-center justify-between px-5 md:px-7 py-6">
                {{-- <img class="w-32 md:w-48" src="{{ asset('assets/FitMaster_Logo.png') }}" alt=""> --}}
                <h1 class="font-bold text-3xl text-white "><span class="text-[#ff6d2f]">F</span>it<span class="text-[#ff6d2f]">M</span>aster</h1>
                <div class="flex items-center gap-x-3 md:gap-x-5">
                    @auth
                        <a href="{{ url('/gym') }}" class="text-white font-semibold bg-[#ff6d2f] text-sm md:text-lg py-2 px-5 md:px-6 rounded-lg hover:bg-[#ff6d2fd0] duration-300">
                            GYM
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="bg-white rounded-lg text-[#ff6d2f] text-sm md:text-lg font-semibold py-2 px-5 md:px-7 hover:bg-[#ffffffcf] duration-300"
                        >
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="bg-[#ff6d2f] rounded-lg text-white text-sm md:text-lg font-semibold py-2 px-5 md:px-7 hover:bg-[#ff6d2fd6] duration-300"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            </nav>
        @endif


        <!-- Hero Section -->
        <div class="mt-10 md:mt-[15vh] flex flex-col items-start gap-y-6 md:gap-y-10 px-5 sm:px-10 md:px-[10vw]">
            <h1 class="text-white text-3xl sm:text-4xl md:text-5xl font-bold w-full md:w-[45vw] leading-tight">
                Transform your Fitness Journey
            </h1>
            <a
                href="{{ route('register') }}"
                class="text-white bg-[#ff6d2f] text-sm md:text-lg py-3 px-5 md:px-6 rounded-lg hover:bg-[#ff6d2fce] duration-300"
            >
                BECOME A MEMBER
            </a>
        </div>
    </div>
    {{-- about --}}
    <section class="bg-[#1f1f1f] py-16">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-8">
            <!-- Image -->
            <div class="flex-1 ">
                <img
                    src="{{ asset("assets/pexels-anush-1229356.jpg") }}"
                    alt="About Us Image"
                    class="rounded-lg shadow-lg w-full"
                />
            </div>
            <!-- Content -->
            <div class="flex-1 text-center md:text-left">
                <h2 class="text-4xl font-bold text-white mb-6">About Us</h2>
                <p class="text-white font-semibold mb-4">
                    At FitMaster, our mission is to inspire and empower individuals to achieve their fitness goals. With state-of-the-art equipment, expert trainers, and a vibrant community, we’re here to support you every step of the way.
                </p>
                <p class="text-white font-semibold mb-6">
                    Whether you’re looking to lose weight, build muscle, or improve your overall health, we have tailored solutions to meet your unique needs. Our facilities are designed to provide a motivating and inclusive environment for all fitness levels.
                </p>
                <a
                    href="#"
                    class="bg-[#ff6d2f] text-white py-3 px-6 rounded-lg shadow-md hover:bg-[#ff6d2fd7] transition"
                >
                    Learn More
                </a>
            </div>
        </div>
    </section>

    <!-- Popular Programs Section -->
<section class=" bg-white py-16">
    <div class="container mx-auto px-4">
        <!-- Section Title -->
        <h2 class="text-4xl font-bold text-center text-[#ff6d2f] mb-8">Popular Programs</h2>

        <!-- Swiper Carousel -->
        <div class="swiper-container">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="bg-[#1f1f1f] rounded-lg shadow-lg ">
                        <img
                            src="{{ asset("assets/pexels-victorfreitas-949126.jpg") }}"
                            class="rounded-md w-full"
                        />
                        <div class=" p-6 ">
                            <h3 class="text-xl font-semibold text-[#ff6d2f] mb-2">Strength Training</h3>
                            <p class="text-white">
                                Build muscle and enhance your strength with expert-guided programs tailored for all levels.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bg-[#1f1f1f] rounded-lg shadow-lg ">
                        <img
                            src="{{ asset("assets/pexels-willpicturethis-1954524.jpg") }}"
                            class="rounded-md w-full"
                        />
                        <div class=" p-6 ">
                            <h3 class="text-xl font-semibold text-[#ff6d2f] mb-2">Cardio Fitness</h3>
                            <p class="text-white">
                                Boost your endurance with high-energy cardio workouts designed to keep you motivated.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bg-[#1f1f1f] rounded-lg shadow-lg ">
                        <img
                            src="{{ asset("assets/pexels-cristian-rojas-8810062.jpg") }}"
                            class="rounded-md w-full"
                        />
                        <div class=" p-6 ">
                            <h3 class="text-xl font-semibold text-[#ff6d2f] mb-2">Body Combat</h3>
                            <p class="text-white">
                                Unleash your power and energy with our action-packed Body Combat classes.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bg-[#1f1f1f] rounded-lg shadow-lg ">
                        <img
                            src="{{ asset("assets/pexels-timothy-220722-700446.jpg") }}"
                            class="rounded-md w-full"
                        />
                        <div class=" p-6 ">
                            <h3 class="text-xl font-semibold text-[#ff6d2f] mb-2">Body Building</h3>
                            <p class="text-white">
                                Achieve your physique goals with tailored bodybuilding routines.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Swiper.js Script -->
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
            delay: 4000, // 4 seconds
            disableOnInteraction: false, // Continue autoplay even after user interaction
        },
        breakpoints: {
            640: { slidesPerView: 1 },
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        },
    });
</script>



    <!-- Testimonials Section -->
    <section class="bg-[#1f1f1f] py-16">
        <div class="container mx-auto px-4 text-[#1f1f1f]">
            <h2 class="text-4xl font-bold text-[#ff6d2f] text-center mb-12">What Our Members Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="flex flex-col rounded-xl ">
                    <div class="h-[38vh] overflow-hidden w-full">
                        <img class="w-[100%] h-[100%]  hover:scale-110 duration-300" src="{{ asset("assets/pexels-longkg2000-1693968.jpg") }}" alt="">
                    </div>
                    <div class="bg-white shadow-xl  p-6">
                        <p class="text-lg italic font-semibold mb-4">
                            "Joining FitMaster was the best decision I ever made. The trainers are amazing!"
                        </p>
                        <h4 class="text-xl font-semibold text-[#ff6d2f] ">- John Doe</h4>
                    </div>
                </div>
                <!-- Testimonial 2 -->
                <div class="flex flex-col">
                    <div class="h-[38vh] overflow-hidden w-full">
                        <img class="w-[100%] h-[100%] hover:scale-110 duration-300" src="{{ asset("assets/pexels-leonardho-1552103.jpg") }}" alt="">
                    </div>
                    <div class="bg-white shadow-xl  p-6">
                        <p class="text-lg italic font-semibold mb-4">
                            "The equipment is top-notch, and the atmosphere is so motivating!"
                        </p>
                        <h4 class="text-xl font-semibold text-[#ff6d2f] ">- Jane Smith</h4>
                    </div>
                </div>
                <!-- Testimonial 3 -->
                <div class="flex flex-col">
                    <div class="h-[38vh] overflow-hidden w-full">
                        <img class="w-[100%] h-[100%] hover:scale-110 duration-300" src="{{ asset("assets/pexels-timothy-220722-700392.jpg") }}" alt="">
                    </div>
                    <div class="bg-white shadow-xl  p-6">
                        <p class="text-lg italic font-semibold mb-4">
                            "I’ve never felt more energized and fit since joining this gym."
                        </p>
                        <h4 class="text-xl font-semibold text-[#ff6d2f] ">- Emily Johnson</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
