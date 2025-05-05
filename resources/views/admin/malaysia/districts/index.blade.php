<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Districts Management') }}
            </h2>
            <a href="{{ route('admin.malaysia.districts.create') }}" class="inline-flex items-center px-4 py-2 bg-white border border-transparent rounded-md font-semibold text-xs text-custom-red-700 uppercase tracking-widest hover:bg-custom-gray-100">
                {{ __('ADD NEW') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-custom-red-500">
                <div class="p-6 text-custom-black">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr class="bg-custom-red-700 text-white text-left">
                                    <th class="py-3 px-4 uppercase font-semibold text-sm">Name</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm">State</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm">Area (km²)</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm">Population</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @forelse ($districts as $district)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="py-3 px-4">{{ $district->name }}</td>
                                        <td class="py-3 px-4">{{ $district->state->name }}</td>
                                        <td class="py-3 px-4">{{ number_format($district->area_sqkm, 2) }}</td>
                                        <td class="py-3 px-4">{{ number_format($district->population) }}</td>
                                        <td class="py-3 px-4 flex space-x-2">
                                            <a href="{{ route('admin.malaysia.districts.edit', $district) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                            <form method="POST" action="{{ route('admin.malaysia.districts.destroy', $district) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this district?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-3 px-4 text-center">No districts found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $districts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 