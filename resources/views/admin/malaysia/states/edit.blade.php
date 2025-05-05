<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit State') }}: {{ $state->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-custom-red-500">
                <div class="p-6 text-custom-black">
                    <form method="POST" action="{{ route('admin.malaysia.states.update', $state) }}">
                        @csrf
                        @method('PUT')

                        <!-- Basic Information Section -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 pb-2 border-b">State Information</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Name -->
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $state->name)" required autofocus />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Capital City -->
                                <div>
                                    <x-input-label for="capital_city" :value="__('Capital City')" />
                                    <x-text-input id="capital_city" class="block mt-1 w-full" type="text" name="capital_city" :value="old('capital_city', $state->capital_city)" required />
                                    <x-input-error :messages="$errors->get('capital_city')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <!-- Ruler Information Section -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 pb-2 border-b">Ruler Information</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Ruler Type -->
                                <div>
                                    <x-input-label for="ruler_type" :value="__('Ruler Type')" class="mb-2" />
                                    <select id="ruler_type" name="ruler_type" class="border-gray-300 focus:border-custom-red-500 focus:ring-custom-red-500 rounded-md shadow-sm block mt-1 w-full" required>
                                        <option value="">Select Ruler Type</option>
                                        <option value="Sultan" {{ old('ruler_type', $state->ruler_type) === 'Sultan' ? 'selected' : '' }}>Sultan</option>
                                        <option value="Raja" {{ old('ruler_type', $state->ruler_type) === 'Raja' ? 'selected' : '' }}>Raja</option>
                                        <option value="Yang di-Pertuan Besar" {{ old('ruler_type', $state->ruler_type) === 'Yang di-Pertuan Besar' ? 'selected' : '' }}>Yang di-Pertuan Besar</option>
                                        <option value="Yang di-Pertuan Agong" {{ old('ruler_type', $state->ruler_type) === 'Yang di-Pertuan Agong' ? 'selected' : '' }}>Yang di-Pertuan Agong</option>
                                        <option value="Governor" {{ old('ruler_type', $state->ruler_type) === 'Governor' ? 'selected' : '' }}>Governor</option>
                                        <option value="None" {{ old('ruler_type', $state->ruler_type) === 'None' ? 'selected' : '' }}>None</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('ruler_type')" class="mt-2" />
                                </div>

                                <!-- Ruler Title -->
                                <div>
                                    <x-input-label for="ruler_title" :value="__('Ruler Title')" />
                                    <x-text-input id="ruler_title" class="block mt-1 w-full" type="text" name="ruler_title" :value="old('ruler_title', $state->ruler_title)" />
                                    <x-input-error :messages="$errors->get('ruler_title')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <!-- Geographic Information Section -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 pb-2 border-b">Geographic & Demographic Information</h3>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <!-- Establishment Date -->
                                <div>
                                    <x-input-label for="establishment_date" :value="__('Establishment Date')" />
                                    <x-text-input id="establishment_date" class="block mt-1 w-full" type="date" name="establishment_date" :value="old('establishment_date', $state->establishment_date ? $state->establishment_date->format('Y-m-d') : null)" />
                                    <x-input-error :messages="$errors->get('establishment_date')" class="mt-2" />
                                </div>

                                <!-- Area -->
                                <div>
                                    <x-input-label for="area_sqkm" :value="__('Area (km²)')" />
                                    <x-text-input id="area_sqkm" class="block mt-1 w-full" type="number" step="0.01" name="area_sqkm" :value="old('area_sqkm', $state->area_sqkm)" />
                                    <x-input-error :messages="$errors->get('area_sqkm')" class="mt-2" />
                                </div>

                                <!-- Population -->
                                <div>
                                    <x-input-label for="population" :value="__('Population')" />
                                    <x-text-input id="population" class="block mt-1 w-full" type="number" name="population" :value="old('population', $state->population)" />
                                    <x-input-error :messages="$errors->get('population')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.malaysia.states.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                {{ __('Cancel') }}
                            </a>

                            <x-primary-button class="ms-4">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 