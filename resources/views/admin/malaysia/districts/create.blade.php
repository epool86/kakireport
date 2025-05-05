<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Create New District') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-custom-red-500">
                <div class="p-6 text-custom-black">
                    <form method="POST" action="{{ route('admin.malaysia.districts.store') }}">
                        @csrf

                        <!-- Basic Information Section -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 pb-2 border-b">District Information</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Name -->
                                <div>
                                    <x-input-label for="name" :value="__('District Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- State -->
                                <div>
                                    <x-input-label for="state_id" :value="__('State')" />
                                    <select id="state_id" name="state_id" class="border-gray-300 focus:border-custom-red-500 focus:ring-custom-red-500 rounded-md shadow-sm block mt-1 w-full" required>
                                        <option value="">Select State</option>
                                        @foreach($states as $id => $stateName)
                                            <option value="{{ $id }}" {{ old('state_id') == $id ? 'selected' : '' }}>{{ $stateName }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('state_id')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <!-- Geographic & Demographic Information Section -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 pb-2 border-b">Geographic & Demographic Information</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Area -->
                                <div>
                                    <x-input-label for="area_sqkm" :value="__('Area (km²)')" />
                                    <x-text-input id="area_sqkm" class="block mt-1 w-full" type="number" step="0.01" name="area_sqkm" :value="old('area_sqkm')" />
                                    <x-input-error :messages="$errors->get('area_sqkm')" class="mt-2" />
                                </div>

                                <!-- Population -->
                                <div>
                                    <x-input-label for="population" :value="__('Population')" />
                                    <x-text-input id="population" class="block mt-1 w-full" type="number" name="population" :value="old('population')" />
                                    <x-input-error :messages="$errors->get('population')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.malaysia.districts.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                {{ __('Cancel') }}
                            </a>

                            <x-primary-button class="ms-4">
                                {{ __('Create District') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 