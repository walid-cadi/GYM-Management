@extends('layouts.index')

@section('content')
@include('layouts.user-nav')
    <div class="mt-[11vh]">
        <div class="w-1/4 p-3">
                <form action="{{ route("trainer-requests.store") }}" method="POST">
                    @csrf
                    <div class="text-center">
                        <button type="submit" class="w-full py-3 px-6 bg-[#006400] text-white rounded-md shadow-lg hover:bg-[#006400dd] focus:outline-none focus:ring-2 focus:ring-blue-400">
                            Request To Be Trainer
                        </button>
                    </div>
                </form>
        </div>
    </div>
@endsection


