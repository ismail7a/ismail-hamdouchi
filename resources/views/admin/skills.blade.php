<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Skills') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div class="p-4 bg-green-100 border-l-4 border-green-500 text-green-700 shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="p-6 bg-white shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Add New Skill</h3>
                <form action="{{ route('admin.skills.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Category</label>
                            <input type="text" name="type"required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">

                            <div>
                                <label class="block text-sm font-medium text-gray-700">picture</label>
                                <input type="file" name="picture" required
                                    class="mt-1 block w-full text-sm text-gray-500">
                            </div>
                        </div>
                        <div class="mt-4">
                            <x-primary-button>Save Skill</x-primary-button>
                        </div>
                </form>
            </div>

            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">picture</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($skills as $skill)
                            <tr>
                                <td class="px-6 py-4"><img src="{{ asset('storage/' . $skill->picture) }}"
                                        class="h-10 w-10 object-contain"></td>
                                <td class="px-6 py-4 font-medium">{{ $skill->name }}</td>
                                <td class="px-6 py-4 text-gray-500 uppercase text-xs">{{ $skill->type }}</td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <button onclick="openModal('modal{{ $skill->id }}')"
                                        class="text-blue-600 hover:text-blue-900">Edit</button>

                                    <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST"
                                        class="inline-block" onsubmit="return confirm('Delete this skill?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <div id="modal{{ $skill->id }}"
                                class="fixed inset-0 z-50 hidden bg-gray-600 bg-opacity-50 flex items-center justify-center">
                                <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                                    <h3 class="text-lg font-bold mb-4">Edit Skill</h3>
                                    <form action="{{ route('admin.skills.update', $skill->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf @method('PUT')
                                        <div class="space-y-4">
                                            <input type="text" name="name" value="{{ $skill->name }}"
                                                class="w-full border-gray-300 rounded-md">
                                            <select name="type" class="w-full border-gray-300 rounded-md">
                                                <option value="frontend"
                                                    {{ $skill->type == 'frontend' ? 'selected' : '' }}>Frontend
                                                </option>
                                                <option value="backend"
                                                    {{ $skill->type == 'backend' ? 'selected' : '' }}>Backend</option>
                                                <option value="tools" {{ $skill->type == 'tools' ? 'selected' : '' }}>
                                                    Tools</option>
                                            </select>
                                            <input type="file" name="picture" class="w-full text-sm">
                                        </div>
                                        <div class="mt-6 flex justify-end space-x-3">
                                            <button type="button" onclick="closeModal('modal{{ $skill->id }}')"
                                                class="text-gray-500">Cancel</button>
                                            <x-primary-button>Update</x-primary-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }
    </script>
</x-app-layout>
