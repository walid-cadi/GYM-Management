<x-app-layout>
    <div class="flex mt-[9vh]">
        <div >
            @include('layouts.sidebar')
        </div>
        <div class=" ms-[250px] w-full p-7 ">
            <div class="max-w-lg mx-auto p-8 bg-white rounded-lg shadow-lg mt-10">
                <h1 class="text-3xl font-extrabold text-center text-gray-800 mb-8">Request to Become a Trainer</h1>
                <form action="{{ route("trainer-requests.store") }}" method="POST">
                    @csrf
                    <div class="mt-6 text-center">
                        <button type="submit" class="w-full py-3 px-6 bg-blue-600 text-white rounded-md shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            Submit Request
                        </button>
                    </div>
                </form>
            </div>
            <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Request Date
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($trainerRequests as $request)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $request->user->name }}
                                        </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $request->created_at }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $request->status }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                                <form action="{{ route('trainer-requests.approve', $request) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Approve</button>
                                </form>
                                <form action="{{ route('trainer-requests.reject', $request) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Reject</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
