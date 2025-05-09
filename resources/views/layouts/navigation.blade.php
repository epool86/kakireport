<nav x-data="{ open: false }" class="bg-custom-red-700 border-b border-custom-red-800">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-white" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:text-custom-gray-100">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    
                    @if(auth()->check() && auth()->user()->role === 'admin')
                        <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')" class="text-white hover:text-custom-gray-100">
                            {{ __('User Management') }}
                        </x-nav-link>
                        
                        <!-- Malaysian Administrative System Dropdown -->
                        <div class="sm:flex sm:items-center">
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button class="flex items-center px-3 py-2 text-sm leading-4 font-medium text-white hover:text-custom-gray-100 focus:outline-none transition ease-in-out duration-150">
                                        {{ __('Database') }}
                                        <svg class="ml-1 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('admin.malaysia.states.index')" class="hover:bg-custom-red-50">
                                        {{ __('States') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('admin.malaysia.districts.index')" class="hover:bg-custom-red-50">
                                        {{ __('Districts') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('admin.malaysia.parlimens.index')" class="hover:bg-custom-red-50">
                                        {{ __('Parliaments') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('admin.malaysia.duns.index')" class="hover:bg-custom-red-50">
                                        {{ __('DUNs') }}
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white hover:text-custom-gray-200 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="hover:bg-custom-red-50">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="hover:bg-custom-red-50">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-custom-gray-200 hover:bg-custom-red-800 focus:outline-none focus:bg-custom-red-800 focus:text-white transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:bg-custom-red-800">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            
            @if(auth()->check() && auth()->user()->role === 'admin')
                <x-responsive-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')" class="text-white hover:bg-custom-red-800">
                    {{ __('User Management') }}
                </x-responsive-nav-link>
                
                <!-- Responsive Malaysia Admin System Links -->
                <div class="pt-2 pb-3 space-y-1 pl-3">
                    <div class="font-medium text-white">{{ __('Database') }}</div>
                    <x-responsive-nav-link :href="route('admin.malaysia.states.index')" :active="request()->routeIs('admin.malaysia.states.*')" class="text-white hover:bg-custom-red-800 pl-2">
                        {{ __('States') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.malaysia.districts.index')" :active="request()->routeIs('admin.malaysia.districts.*')" class="text-white hover:bg-custom-red-800 pl-2">
                        {{ __('Districts') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.malaysia.parlimens.index')" :active="request()->routeIs('admin.malaysia.parlimens.*')" class="text-white hover:bg-custom-red-800 pl-2">
                        {{ __('Parliamentary Constituencies') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.malaysia.duns.index')" :active="request()->routeIs('admin.malaysia.duns.*')" class="text-white hover:bg-custom-red-800 pl-2">
                        {{ __('State Constituencies') }}
                    </x-responsive-nav-link>
                </div>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-custom-red-800">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-custom-gray-200">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-white hover:bg-custom-red-800">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="text-white hover:bg-custom-red-800">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
