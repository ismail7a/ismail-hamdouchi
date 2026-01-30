<nav x-data="{ open: false }" class="bg-[#0a0a0a] border-b border-gray-900 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <!-- Logo -->
            <div class="flex items-center">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="text-cyan-400 font-black text-2xl italic tracking-tighter">
                        Home Page
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden sm:flex sm:items-center sm:ms-10 space-x-4">
                    <x-nav-link :href="route('admin.profile')" :active="request()->routeIs('admin.profile')" class="text-gray-400 hover:text-cyan-400 transition font-bold text-xs uppercase tracking-widest">
                        Exp-Edu Settings
                    </x-nav-link>

                    <x-nav-link :href="route('admin.create')" :active="request()->routeIs('admin.create')" class="text-gray-400 hover:text-cyan-400 transition font-bold text-xs uppercase tracking-widest">
                        Projects
                    </x-nav-link>

                    <x-nav-link :href="route('admin.skills')" :active="request()->routeIs('admin.skills')" class="text-gray-400 hover:text-cyan-400 transition font-bold text-xs uppercase tracking-widest">
                        Skills
                    </x-nav-link>

                    <x-nav-link :href="route('certificates.manage')" :active="request()->routeIs('certificates.manage')" class="text-gray-400 hover:text-cyan-400 transition font-bold text-xs uppercase tracking-widest">
                        Certificates
                    </x-nav-link>

                    <x-nav-link :href="route('admin.messages')" :active="request()->routeIs('admin.messages')" class="text-gray-400 hover:text-cyan-400 transition font-bold text-xs uppercase tracking-widest">
                        Messages
                    </x-nav-link>
                </div>
            </div>

            <!-- Desktop Right Menu -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 gap-4">
                <a href="{{ route('profile.edit') }}" class="text-[10px] bg-gray-900 text-gray-400 px-3 py-1 rounded-full border border-gray-800 hover:border-cyan-400 transition uppercase font-black">
                    Settings Profile
                </a>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-cyan-400/20 text-sm leading-4 font-bold rounded-xl text-cyan-400 bg-cyan-400/5 hover:bg-cyan-400 hover:text-black transition ease-in-out duration-150 shadow-[0_0_15px_rgba(0,255,255,0.1)]">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" class="hover:bg-red-600 hover:text-white transition font-bold"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 rounded-md text-cyan-400 hover:bg-cyan-400/10 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-black border-b border-gray-900">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('admin.profile')" class="text-cyan-400">Resume Info</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.create')" class="text-cyan-400">Projects</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.skills')" class="text-cyan-400">Skills</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('certificates.manage')" class="text-cyan-400">Certificates</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.messages')" class="text-cyan-400">Messages</x-responsive-nav-link>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')" class="text-red-500 hover:text-red-400 font-bold"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    Log Out
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</nav>
