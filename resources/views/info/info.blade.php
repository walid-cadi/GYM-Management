@extends('layouts.index')

@section('content')
    <div class="w-full min-h-screen bg-[#1f1f1f] flex items-center justify-center px-5 md:px-0">
  <div class="bg-white md:w-[45vw] h-auto md:min-h-[70vh] flex flex-col md:flex-row rounded-2xl shadow-xl overflow-hidden">
    <!-- Form Section -->
    <div class="w-full md:w-full h-auto md:h-full p-7 flex flex-col items-center justify-start">
      <h1 class="text-[#111317] text-center text-3xl font-bold tracking-wide mb-6">
        More Info
      </h1>
      <form
        class="w-full max-w-md flex flex-col gap-y-4"
        action="{{ route('info.update', $user->id) }}"
        method="post"
      >
        @csrf
        @method("PUT")
        <div class="flex flex-col">
          <label class="text-[#111317] font-semibold text-lg mb-1" for="age">
            Age:
          </label>
          <input
            class="rounded-lg focus:ring-2 focus:ring-[#ff6d2f] focus:outline-none border border-gray-300 p-3 text-gray-700"
            type="number"
            required
            placeholder="Enter your age"
            name="age"
            id="age"
          />
        </div>
        <div class="flex flex-col">
          <label class="text-[#111317] font-semibold text-lg mb-1" for="weight">
            Weight:
          </label>
          <input
            class="rounded-lg focus:ring-2 focus:ring-[#ff6d2f] focus:outline-none border border-gray-300 p-3 text-gray-700"
            type="text"
            required
            placeholder="Enter your weight"
            name="weight"
            id="weight"
          />
        </div>
        <div class="flex flex-col">
          <label class="text-[#111317] font-semibold text-lg mb-1" for="height">
            Height:
          </label>
          <input
            class="rounded-lg focus:ring-2 focus:ring-[#ff6d2f] focus:outline-none border border-gray-300 p-3 text-gray-700"
            type="text"
            required
            placeholder="Enter your height"
            name="height"
            id="height"
          />
        </div>
        <div class="flex flex-col">
          <label class="text-[#111317] font-semibold text-lg mb-1" for="gender">
            Gender:
          </label>
          <select class="rounded-lg focus:ring-2 focus:ring-[#ff6d2f] focus:outline-none border border-gray-300 p-3 text-gray-700" type="number" required placeholder="Enter your gender" name="gender" id="gender">
            <option selected disabled value="">Select Gender</option>
            <option value="male">Male</option>
            <option value="femmale">Femmale</option>
          </select>
            <div class="w-full mt-4">
                    <label for="activity" class="text-[#FF9D52] font-medium">Activity Level</label>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" name="activity" value="1.2" class="focus:ring-yellow-500 focus:ring-offset-2 text-yellow-400" required>
                            <span class="ml-2">Little or no exercise</span>
                        </label>
                    </div>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" name="activity" value="1.375" class="focus:ring-yellow-500 focus:ring-offset-2 text-yellow-400" required>
                            <span class="ml-2">Sports 1–3 days/week</span>
                        </label>
                    </div>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" name="activity" value="1.55" class="focus:ring-yellow-500 focus:ring-offset-2 text-yellow-400" required>
                            <span class="ml-2">Sports 3–5 days/week</span>
                        </label>
                    </div>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" name="activity" value="1.725" class="focus:ring-yellow-500 focus:ring-offset-2 text-yellow-400" required>
                            <span class="ml-2">Sports 6–7 days/week</span>
                        </label>
                    </div>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" name="activity" value="1.9" class="focus:ring-yellow-500 focus:ring-offset-2 text-yellow-400" required>
                            <span class="ml-2">Twice daily</span>
                        </label>
                    </div>
                </div>
            </div>
        <button
          class="bg-[#ff6d2f] text-white text-lg font-semibold py-3 rounded-lg hover:bg-[#ff6d2fd5] transition duration-200"
        >
          Done
        </button>
      </form>
    </div>
  </div>
</div>

@endsection
