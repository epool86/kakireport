<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Create New Parliamentary Constituency') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-custom-red-500">
                <div class="p-6 text-custom-black">
                    <form method="POST" action="{{ route('admin.malaysia.parlimens.store') }}">
                        @csrf

                        <!-- Basic Information Section -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 pb-2 border-b">Constituency Information</h3>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <!-- Code -->
                                <div>
                                    <x-input-label for="code" :value="__('Code (P.xxx format)')" />
                                    <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" required autofocus placeholder="P.001" />
                                    <x-input-error :messages="$errors->get('code')" class="mt-2" />
                                </div>

                                <!-- Name -->
                                <div>
                                    <x-input-label for="name" :value="__('Constituency Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
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

                        <!-- MP Information Section -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 pb-2 border-b">Member of Parliament Information</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- MP Name -->
                                <div>
                                    <x-input-label for="mp_name" :value="__('MP Name')" />
                                    <x-text-input id="mp_name" class="block mt-1 w-full" type="text" name="mp_name" :value="old('mp_name')" />
                                    <x-input-error :messages="$errors->get('mp_name')" class="mt-2" />
                                </div>

                                <!-- MP Party -->
                                <div>
                                    <x-input-label for="mp_party" :value="__('Political Party')" />
                                    <x-text-input id="mp_party" class="block mt-1 w-full" type="text" name="mp_party" :value="old('mp_party')" />
                                    <x-input-error :messages="$errors->get('mp_party')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <!-- Electoral Information Section -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 pb-2 border-b">Electoral Information</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Electorate Count -->
                                <div>
                                    <x-input-label for="electorate_count" :value="__('Number of Registered Voters')" />
                                    <x-text-input id="electorate_count" class="block mt-1 w-full" type="number" name="electorate_count" :value="old('electorate_count')" />
                                    <x-input-error :messages="$errors->get('electorate_count')" class="mt-2" />
                                </div>

                                <!-- Last Election Date -->
                                <div>
                                    <x-input-label for="last_election_date" :value="__('Last Election Date')" />
                                    <x-text-input id="last_election_date" class="block mt-1 w-full" type="date" name="last_election_date" :value="old('last_election_date')" />
                                    <x-input-error :messages="$errors->get('last_election_date')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <!-- Historical Information Section -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 pb-2 border-b">Historical Information</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Creation Date -->
                                <div>
                                    <x-input-label for="creation_date" :value="__('Constituency Creation Date')" />
                                    <x-text-input id="creation_date" class="block mt-1 w-full" type="date" name="creation_date" :value="old('creation_date')" />
                                    <x-input-error :messages="$errors->get('creation_date')" class="mt-2" />
                                </div>

                                <!-- Last Redelineation Date -->
                                <div>
                                    <x-input-label for="last_redelineation_date" :value="__('Last Redelineation Date')" />
                                    <x-text-input id="last_redelineation_date" class="block mt-1 w-full" type="date" name="last_redelineation_date" :value="old('last_redelineation_date')" />
                                    <x-input-error :messages="$errors->get('last_redelineation_date')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.malaysia.parlimens.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                {{ __('Cancel') }}
                            </a>

                            <x-primary-button class="ms-4">
                                {{ __('Create Constituency') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 