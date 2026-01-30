<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          added new projects
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Project Name</label>
                        <input type="text" name="name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" rows="4" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Project Link (URL)</label>
                        <input type="url" name="project_link" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Upload Project Images (Up to 10)</label>
                        <input type="file" name="images[]" multiple accept="image/*" class="mt-2 block w-full text-sm text-gray-500">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="">
                            Save Project
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="mt-12 bg-white p-6 rounded-lg shadow">
    <h3 class="text-lg font-bold mb-4 border-b pb-2">Manage Projects</h3>
    <div class="grid grid-cols-1 gap-4">
        @foreach($projects as $project)
            <div class="flex items-center justify-between p-4 border rounded hover:bg-gray-50">
                <div class="flex items-center gap-4">
                    @if($project->images->first())
                        <img src="{{ asset('storage/' . $project->images->first()->image_path) }}" class="w-16 h-16 object-cover rounded">
                    @endif
                    <div>
                        <h4 class="font-bold">{{ $project->name }}</h4>
                        <p class="text-xs text-gray-500">{{ Str::limit($project->description, 50) }}</p>
                    </div>
                </div>

                <div class="flex gap-2">
                    <button onclick="document.getElementById('edit-project-{{ $project->id }}').classList.remove('hidden')" class="text-indigo-600 font-bold">Edit</button>

                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 font-bold">Delete</button>
                    </form>
                </div>
            </div>

            <div id="edit-project-{{ $project->id }}" class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-50 flex items-center justify-center p-4">
                <div class="bg-white p-6 rounded-xl w-full max-w-2xl overflow-y-auto max-h-[90vh]">
                    <h3 class="text-xl font-bold mb-4 text-black">Edit Project: {{ $project->name }}</h3>
                    <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <input type="text" name="name" value="{{ $project->name }}" class="w-full rounded border-gray-300 text-black bg-white" required>

                        <textarea name="description" rows="4" placeholder="Description" class="w-full rounded border-gray-300 text-black bg-white" required>{{ $project->description }}</textarea>

                        <input type="url" name="project_link" value="{{ $project->project_link }}" class="w-full rounded border-gray-300 text-black bg-white">



                        <div class="flex gap-2">
                            <button type="button" onclick="document.getElementById('edit-project-{{ $project->id }}').classList.add('hidden')" class="flex-1 bg-gray-200 py-2 rounded">Cancel</button>
                            <button type="submit" class="flex-1 bg-indigo-600 text-white py-2 rounded">Update Project</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
</x-app-layout>
