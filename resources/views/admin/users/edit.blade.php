<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit User') }}: {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-custom-red-500">
                <div class="p-6 text-custom-black">
                    <form method="POST" action="{{ route('admin.users.update', $user) }}">
                        @csrf
                        @method('PUT')

                        <!-- Basic Information Section -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 pb-2 border-b">Basic Information</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Name -->
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)" required autofocus />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Email Address -->
                                <div>
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)" required />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <!-- Role and Status Section -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 pb-2 border-b">Account Status</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Role -->
                                <div>
                                    <x-input-label for="role" :value="__('Role')" class="mb-2" />
                                    <div class="space-y-2">
                                        <label class="inline-flex items-center" for="role_admin">
                                            <input type="radio" id="role_admin" name="role" value="admin" class="text-custom-red-600 focus:ring-custom-red-500 border-gray-300" {{ old('role', $user->role) === 'admin' ? 'checked' : '' }}>
                                            <span class="ml-2">Admin</span>
                                        </label>
                                        <br>
                                        <label class="inline-flex items-center" for="role_moderator">
                                            <input type="radio" id="role_moderator" name="role" value="moderator" class="text-custom-red-600 focus:ring-custom-red-500 border-gray-300" {{ old('role', $user->role) === 'moderator' ? 'checked' : '' }}>
                                            <span class="ml-2">Moderator</span>
                                        </label>
                                        <br>
                                        <label class="inline-flex items-center" for="role_user">
                                            <input type="radio" id="role_user" name="role" value="user" class="text-custom-red-600 focus:ring-custom-red-500 border-gray-300" {{ old('role', $user->role) === 'user' ? 'checked' : '' }}>
                                            <span class="ml-2">User</span>
                                        </label>
                                    </div>
                                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                                </div>

                                <!-- Status -->
                                <div>
                                    <x-input-label for="status" :value="__('Status')" class="mb-2" />
                                    <div class="space-y-2">
                                        <label class="inline-flex items-center" for="status_0">
                                            <input type="radio" id="status_0" name="status" value="0" class="text-custom-red-600 focus:ring-custom-red-500 border-gray-300" {{ old('status', $user->status) == 0 ? 'checked' : '' }}>
                                            <span class="ml-2">New</span>
                                        </label>
                                        <br>
                                        <label class="inline-flex items-center" for="status_1">
                                            <input type="radio" id="status_1" name="status" value="1" class="text-custom-red-600 focus:ring-custom-red-500 border-gray-300" {{ old('status', $user->status) == 1 ? 'checked' : '' }}>
                                            <span class="ml-2">Pending Verification</span>
                                        </label>
                                        <br>
                                        <label class="inline-flex items-center" for="status_2">
                                            <input type="radio" id="status_2" name="status" value="2" class="text-custom-red-600 focus:ring-custom-red-500 border-gray-300" {{ old('status', $user->status) == 2 ? 'checked' : '' }}>
                                            <span class="ml-2">Verified</span>
                                        </label>
                                        <br>
                                        <label class="inline-flex items-center" for="status_5">
                                            <input type="radio" id="status_5" name="status" value="5" class="text-custom-red-600 focus:ring-custom-red-500 border-gray-300" {{ old('status', $user->status) == 5 ? 'checked' : '' }}>
                                            <span class="ml-2">Rejected</span>
                                        </label>
                                    </div>
                                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information Section -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 pb-2 border-b">Contact Information</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Phone -->
                                <div>
                                    <x-input-label for="phone" :value="__('Phone')" />
                                    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone', $user->phone)" />
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                </div>

                                <!-- IC -->
                                <div>
                                    <x-input-label for="ic" :value="__('IC Number')" />
                                    <x-text-input id="ic" class="block mt-1 w-full" type="text" name="ic" :value="old('ic', $user->ic)" />
                                    <x-input-error :messages="$errors->get('ic')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <!-- Address Section -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 pb-2 border-b">Address Information</h3>

                            <div class="grid grid-cols-1 gap-4">
                                <!-- Address 1 -->
                                <div>
                                    <x-input-label for="address_1" :value="__('Address Line 1')" />
                                    <x-text-input id="address_1" class="block mt-1 w-full" type="text" name="address_1" :value="old('address_1', $user->address_1)" />
                                    <x-input-error :messages="$errors->get('address_1')" class="mt-2" />
                                </div>

                                <!-- Address 2 -->
                                <div>
                                    <x-input-label for="address_2" :value="__('Address Line 2')" />
                                    <x-text-input id="address_2" class="block mt-1 w-full" type="text" name="address_2" :value="old('address_2', $user->address_2)" />
                                    <x-input-error :messages="$errors->get('address_2')" class="mt-2" />
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                                <!-- Postcode -->
                                <div>
                                    <x-input-label for="postcode" :value="__('Postcode')" />
                                    <x-text-input id="postcode" class="block mt-1 w-full" type="text" name="postcode" :value="old('postcode', $user->postcode)" />
                                    <x-input-error :messages="$errors->get('postcode')" class="mt-2" />
                                </div>

                                <!-- City -->
                                <div>
                                    <x-input-label for="city" :value="__('City')" />
                                    <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city', $user->city)" />
                                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                                </div>

                                <!-- State -->
                                <div>
                                    <x-input-label for="state" :value="__('State')" />
                                    <select id="state" name="state" class="border-gray-300 focus:border-custom-red-500 focus:ring-custom-red-500 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="">Select State</option>
                                        <option value="Johor" {{ old('state', $user->state) === 'Johor' ? 'selected' : '' }}>Johor</option>
                                        <option value="Kedah" {{ old('state', $user->state) === 'Kedah' ? 'selected' : '' }}>Kedah</option>
                                        <option value="Kelantan" {{ old('state', $user->state) === 'Kelantan' ? 'selected' : '' }}>Kelantan</option>
                                        <option value="Melaka" {{ old('state', $user->state) === 'Melaka' ? 'selected' : '' }}>Melaka</option>
                                        <option value="Negeri Sembilan" {{ old('state', $user->state) === 'Negeri Sembilan' ? 'selected' : '' }}>Negeri Sembilan</option>
                                        <option value="Pahang" {{ old('state', $user->state) === 'Pahang' ? 'selected' : '' }}>Pahang</option>
                                        <option value="Perak" {{ old('state', $user->state) === 'Perak' ? 'selected' : '' }}>Perak</option>
                                        <option value="Perlis" {{ old('state', $user->state) === 'Perlis' ? 'selected' : '' }}>Perlis</option>
                                        <option value="Pulau Pinang" {{ old('state', $user->state) === 'Pulau Pinang' ? 'selected' : '' }}>Pulau Pinang</option>
                                        <option value="Sabah" {{ old('state', $user->state) === 'Sabah' ? 'selected' : '' }}>Sabah</option>
                                        <option value="Sarawak" {{ old('state', $user->state) === 'Sarawak' ? 'selected' : '' }}>Sarawak</option>
                                        <option value="Selangor" {{ old('state', $user->state) === 'Selangor' ? 'selected' : '' }}>Selangor</option>
                                        <option value="Terengganu" {{ old('state', $user->state) === 'Terengganu' ? 'selected' : '' }}>Terengganu</option>
                                        <option value="Wilayah Persekutuan Kuala Lumpur" {{ old('state', $user->state) === 'Wilayah Persekutuan Kuala Lumpur' ? 'selected' : '' }}>Wilayah Persekutuan Kuala Lumpur</option>
                                        <option value="Wilayah Persekutuan Labuan" {{ old('state', $user->state) === 'Wilayah Persekutuan Labuan' ? 'selected' : '' }}>Wilayah Persekutuan Labuan</option>
                                        <option value="Wilayah Persekutuan Putrajaya" {{ old('state', $user->state) === 'Wilayah Persekutuan Putrajaya' ? 'selected' : '' }}>Wilayah Persekutuan Putrajaya</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('state')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
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