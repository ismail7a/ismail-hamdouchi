<x-app-layout>
    <div class="py-12 bg-[#0c0c0c] min-h-screen ">
        <div class="max-w-6xl mx-auto px-6">

            <div class="flex items-center justify-between mb-12 border-b border-black pb-8">
                <div>
                    <h2 class="text-4xl font-black italic uppercase tracking-tighter text-black">
                        Inbound <span class="text-black">Messages</span>
                    </h2>
                    <p class="text-black text-xs mt-2 uppercase tracking-[0.2em]">Contact form submissions from your portfolio</p>
                </div>
                <div class="bg-[#151515] px-4 py-2 rounded-full border border-black text-black font-mono text-sm">
                    Total: {{ $messages->count() }}
                </div>
            </div>

            <div class="space-y-4">
                @forelse($messages as $msg)
                    <div class="group bg-[#151515] border border-black p-6 rounded-[2rem] hover:border-black transition-all duration-300 relative overflow-hidden">
                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-black opacity-0 group-hover:opacity-100 transition-opacity"></div>

                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <span class="font-bold text-lg italic uppercase tracking-tight text-black">{{ $msg->name }}</span>
                                    <span class="text-black text-xs font-mono">&lt;{{ $msg->email }}&gt;</span>
                                </div>
                                <div class="bg-[#0c0c0c]/40 p-4 rounded-xl border border-black mt-2">
                                    <p class="text-black text-sm leading-relaxed italic">
                                        "{{ $msg->message }}"
                                    </p>
                                </div>
                            </div>

                            <div class="flex flex-col items-end gap-3 min-w-[150px]">
                                <span class="text-[10px] text-black font-black uppercase tracking-widest bg-[#151515] px-3 py-1 rounded-full border border-black">
                                    {{ $msg->created_at->format('M d, Y • H:i') }}
                                </span>

                                <div class="flex gap-2">
                                    <form action="{{ route('messages.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Delete this message?')">
                                        @csrf @method('DELETE')
                                        <button class="bg-black/10 text-black border border-black px-4 py-1 rounded-lg text-[10px] font-black uppercase hover:bg-black/20 transition">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="py-20 text-center border-2 border-dashed border-black rounded-[3rem]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-black mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <p class="text-black font-mono text-sm uppercase tracking-widest italic">Your inbox is empty</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
