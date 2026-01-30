<x-guest-layout>
    <div class="bg-[#0c0c0c] min-h-screen text-white">

        <div class="max-w-7xl mx-auto pt-20 pb-10 px-6 text-center">
            <h1 class="text-6xl font-black text-white italic uppercase tracking-tighter">
                All <span class="text-cyan-400">Certifications</span>
            </h1>
            <div class="w-24 h-1 bg-cyan-400 mx-auto mt-6 rounded-full"></div>
        </div>

        <div class="max-w-5xl mx-auto px-6 py-16 space-y-32">
            @forelse($certificates as $cert)
                <div class="flex flex-col lg:flex-row gap-12 items-center group">

                    <div class="lg:w-1/2 w-full relative">
                        <div class="absolute -inset-2 bg-cyan-500/20 rounded-[2rem] blur opacity-0 group-hover:opacity-100 transition duration-500"></div>
                        <div class="relative bg-[#151515] p-3 rounded-[2rem] border border-gray-800 shadow-2xl overflow-hidden">
                            <img src="{{ asset('storage/' . $cert->image) }}"
                                 alt="{{ $cert->title }}"
                                 class="w-full h-auto rounded-2xl hover:scale-105 transition duration-700 cursor-zoom-in">
                        </div>
                    </div>

                    <div class="lg:w-1/2 w-full space-y-6">
                        <div class="flex items-center gap-4">
                            <span class="text-cyan-400 font-mono text-sm tracking-[0.3em] uppercase">Credential</span>
                            <div class="h-[1px] flex-1 bg-gray-800"></div>
                        </div>

                        <h2 class="text-4xl font-bold text-white tracking-tight leading-tight">
                            {{ $cert->title }}
                        </h2>

                        <p class="text-gray-400 text-lg leading-relaxed italic">
                            "{{ $cert->description }}"
                        </p>

                        <div class="pt-4">
                            <button class="bg-white/5 border border-white/10 px-6 py-3 rounded-full text-xs font-black uppercase tracking-widest hover:bg-cyan-400 hover:text-black transition duration-300">
                                View Verification Link
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Horizontal Divider (Except for last item) --}}
                @if(!$loop->last)
                    <div class="w-full h-px bg-gradient-to-r from-transparent via-gray-800 to-transparent"></div>
                @endif

            @empty
                <div class="text-center py-20">
                    <p class="text-gray-600 text-xl italic">No certificates available at the moment.</p>
                    <a href="{{ route('welcome') }}" class="text-cyan-400 mt-4 inline-block underline">Return Home</a>
                </div>
            @endforelse
        </div>

        <div class="py-20 text-center">
            <a href="{{ route('welcome') }}" class="group inline-flex items-center gap-3 text-gray-500 hover:text-white transition">
                <span class="text-sm font-bold uppercase tracking-widest">Back to Overview</span>
                <div class="w-10 h-10 rounded-full border border-gray-800 flex items-center justify-center group-hover:border-cyan-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </div>
            </a>
        </div>
    </div>
</x-guest-layout>
