<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Users Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-custom-red-500">
                <div class="">
                    <div class="p-4 text-custom-black"><strong>All Users</strong></div>
                </div>
                <div class="text-custom-black">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 border">
                            <thead class="bg-gray-800">
                                <tr>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-white uppercase tracking-wider border">ID</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-white uppercase tracking-wider border">Name</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-white uppercase tracking-wider border">Email</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-white uppercase tracking-wider border">Role</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-white uppercase tracking-wider border">Status</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-white uppercase tracking-wider border">Phone</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-white uppercase tracking-wider border">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-3 py-2 whitespace-nowrap text-xs text-gray-500 border">{{ $user->id }}</td>
                                        <td class="px-3 py-2 whitespace-nowrap text-xs font-medium text-gray-900 border">{{ $user->name }}</td>
                                        <td class="px-3 py-2 whitespace-nowrap text-xs text-gray-500 border">{{ $user->email }}</td>
                                        <td class="px-3 py-2 whitespace-nowrap text-xs text-gray-500 border">{{ $user->role }}</td>
                                        <td class="px-3 py-2 whitespace-nowrap text-xs text-gray-500 border">
                                            @if($user->status == 0)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">New</span>
                                            @elseif($user->status == 1)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending Verification</span>
                                            @elseif($user->status == 2)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Verified</span>
                                            @elseif($user->status == 5)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Rejected</span>
                                            @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Unknown</span>
                                            @endif
                                        </td>
                                        <td class="px-3 py-2 whitespace-nowrap text-xs text-gray-500 border">{{ $user->phone }}</td>
                                        <td class="px-3 py-2 whitespace-nowrap text-xs font-medium border">
                                            <a href="{{ route('admin.users.edit', $user) }}" class="inline-flex items-center px-2 py-1 text-xs bg-custom-red border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-custom-red-700 focus:bg-custom-red-700 active:bg-custom-red-800 focus:outline-none focus:ring-2 focus:ring-custom-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 