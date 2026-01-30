<x-app-layout>
    <div class="py-12 bg-[#0c0c0c] min-h-screen ">
        <div class="max-w-7xl mx-auto px-6">

            <div class="flex justify-between items-center mb-10">
                <h2 class="text-3xl font-black italic uppercase tracking-tighter">Manage <span class="text-cyan-400 shadow-cyan-500">Portfolio</span></h2>
                <button onclick="showAddForm()" class="bg-cyan-400 text-black px-6 py-2 rounded-full font-bold uppercase text-xs hover:bg-white transition shadow-[0_0_15px_rgba(0,255,255,0.4)]">
                    + Add New Certificate
                </button>
            </div>

            <div id="addForm" class="hidden mb-12 bg-[#151515] p-8 rounded-2xl border border-cyan-500/30 shadow-[0_0_30px_rgba(0,255,255,0.1)]">
                <h3 class="text-xl font-bold mb-6 text-cyan-400 uppercase italic">Add New Achievement</h3>
                <form action="{{ route('certificates.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @csrf
                    <div class="space-y-4">
                        <input type="text" name="title" placeholder="Certificate Title" required class="w-full bg-black border-black-800 rounded-xl p-3  focus:border-cyan-400 outline-none transition">
                        <textarea name="description" placeholder="Description" rows="4" required class="w-full bg-black border-black-800 rounded-xl p-3  focus:border-cyan-400 outline-none transition"></textarea>
                    </div>
                    <div class="space-y-4 text-center">
                        <div class="border-2 border-dashed border-black-800 p-6 rounded-xl hover:border-cyan-400 transition cursor-pointer bg-black/50">
                            <input type="file" name="image" required class="w-full  text-sm">
                        </div>
                        <div class="flex gap-2">
                            <button type="submit" class="flex-1 bg-cyan-400 text-black font-black py-4 rounded-xl uppercase transition hover:bg-white">Save</button>
                            <button type="button" onclick="hideForms()" class="bg-gray-900 border border-gray-700 px-6 rounded-xl font-bold hover:bg-red-900/20 transition">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>

            <div id="editFormContainer" class="hidden mb-12 bg-[#1a1a1a] p-8 rounded-2xl border border-cyan-500/30 shadow-[0_0_30px_rgba(0,255,255,0.1)]">
                <h3 class="text-xl font-bold mb-6 text-cyan-400 uppercase italic underline decoration-cyan-900">Edit Certificate Details</h3>
                <form id="realEditForm" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <input type="text" name="title" id="edit_title" required class="w-full bg-black border-black-800 rounded-xl p-3  focus:border-cyan-400 outline-none transition">
                        <textarea name="description" id="edit_description" rows="4" required class="w-full bg-black border-black-800 rounded-xl p-3  focus:border-cyan-400 outline-none transition"></textarea>
                    </div>
                    <div class="space-y-4">
                        <div class="text-[10px] text-cyan-700 mb-2 uppercase font-black tracking-widest">Optional: Upload new image to replace</div>
                        <input type="file" name="image" class="w-full  bg-black p-3 rounded-xl border border-black-800">
                        <div class="flex gap-2 mt-2">
                            <button type="submit" class="flex-1 bg-white text-black font-black py-4 rounded-xl uppercase hover:bg-cyan-400 transition">Update Now</button>
                            <button type="button" onclick="hideForms()" class="bg-gray-900 border border-gray-700 px-6 rounded-xl font-bold">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($certificates as $cert)
                    <div class="bg-[#151515] border border-black-800 rounded-2xl p-4 flex flex-col justify-between group hover:border-cyan-400/50 transition-all duration-500">
                        <div class="relative overflow-hidden rounded-xl mb-4 border border-gray-900">
                            <img src="{{ asset('storage/'.$cert->image) }}" class="w-10 h-20 object-cover group-hover:scale-110 transition duration-700 opacity-80 group-hover:opacity-100">
                            <div class="absolute top-2 right-2 bg-black/80 text-cyan-400 text-[10px] px-2 py-1 rounded font-bold border border-cyan-400/20">#{{ $loop->iteration }}</div>
                        </div>

                        <h3 class="font-bold text-lg mb-4 truncate  group-hover:text-cyan-400 transition">{{ $cert->title }}</h3>

                        <div class="flex gap-2">
                            <button
                                onclick="openEditForm('{{ $cert->id }}', '{{ addslashes($cert->title) }}', '{{ addslashes($cert->description) }}')"
                                class="flex-1 bg-transparent border border-cyan-400/30 text-cyan-400 text-center py-2 rounded-lg text-xs font-bold uppercase hover:bg-cyan-400 hover:text-black transition duration-300">
                                Edit
                            </button>

                            <form action="{{ route('certificates.destroy', $cert->id) }}" method="POST" class="flex-1">
                                @csrf @method('DELETE')
                                <button class="w-full bg-transparent border border-red-900/30 text-red-500 py-2 rounded-lg text-xs font-bold uppercase hover:bg-red-600 hover: transition duration-300" onclick="return confirm('Delete this achievement?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function showAddForm() {
            hideForms();
            document.getElementById('addForm').classList.remove('hidden');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function openEditForm(id, title, description) {
            hideForms();
            const editContainer = document.getElementById('editFormContainer');
            const form = document.getElementById('realEditForm');
            form.action = `/certificates/${id}`;
            document.getElementById('edit_title').value = title;
            document.getElementById('edit_description').value = description;
            editContainer.classList.remove('hidden');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function hideForms() {
            document.getElementById('addForm').classList.add('hidden');
            document.getElementById('editFormContainer').classList.add('hidden');
        }
    </script>
</x-app-layout>
