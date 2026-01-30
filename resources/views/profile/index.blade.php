<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Profile Settings (Education & Social)


        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            @if (session('success'))
                <div class="p-4 bg-green-100 text-green-700 rounded-lg shadow-sm border border-green-200">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <div class="bg-white p-6 rounded-xl shadow-sm border">
                    <h3 class="text-lg font-bold text-gray-700 mb-6 flex items-center">
                        🎓 Add Education
                    </h3>
                    <form action="{{ route('admin.education.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="text" name="school_name" placeholder="Institution (Ex: OFPPT)"
                            class="w-full rounded-md border-gray-300" required>
                        <input type="text" name="degree" placeholder="Degree (Ex: Fullstack Developer)"
                            class="w-full rounded-md border-gray-300" required>
                        <input type="text" name="description" placeholder="School Name (Ex: OFPPT)"
                            class="w-full rounded-md border-gray-300" required>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-xs text-gray-500">Start Date</label>
                                <input type="date" name="start_date" class="w-full rounded-md border-gray-300"
                                    required>
                            </div>
                            <div>
                                <label class="text-xs text-gray-500">End Date (Optional)</label>
                                <input type="date" name="end_date" class="w-full rounded-md border-gray-300">
                            </div>
                        </div>
                        <button type="submit"
                            class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700">Add
                            Education</button>
                    </form>
                </div>
                <table class="min-w-full text-sm text-left border mt-4">
                    <thead class="bg-gray-50 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-2">School / Degree</th>
                            <th class="px-4 py-2 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach ($education as $edu)
                            <tr>
                                <td class="px-4 py-2 text-left leading-tight">
                                    <span class="font-bold text-gray-800">{{ $edu->school_name }}</span> <br>
                                    <span class="text-gray-500 text-xs">{{ $edu->degree }}</span>
                                </td>
                                <td class="px-4 py-2 text-right space-x-2 whitespace-nowrap">
                                    <button
                                        onclick="document.getElementById('edit-edu-{{ $edu->id }}').classList.remove('hidden')"
                                        class="text-indigo-600 hover:text-indigo-900 font-semibold">
                                        Edit
                                    </button>

                                    <form action="{{ route('education.destroy', $edu->id) }}" method="POST"
                                        class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline"
                                            onclick="return confirm('Delete?')">Del</button>
                                    </form>
                                </td>
                            </tr>

                            <div id="edit-edu-{{ $edu->id }}"
                                class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-60 backdrop-blur-sm flex items-center justify-center p-4">
                                <div class="bg-white p-6 rounded-xl shadow-2xl w-full max-w-md text-left">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-lg font-bold text-gray-800">Edit Education</h3>
                                        <button
                                            onclick="document.getElementById('edit-edu-{{ $edu->id }}').classList.add('hidden')"
                                            class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
                                    </div>

                                    <form action="{{ route('education.update', $edu->id) }}" method="POST"
                                        class="space-y-4">
                                        @csrf @method('PUT')

                                        <input type="text" name="school_name" value="{{ $edu->school_name }}"
                                            class="w-full rounded-md border-gray-300" required>
                                        <input type="text" name="degree" value="{{ $edu->degree }}"
                                            class="w-full rounded-md border-gray-300" required>
                                        <input type="text" name="description" value="{{ $edu->description }}"
                                            placeholder="Description" class="w-full rounded-md border-gray-300">

                                        <div class="grid grid-cols-2 gap-4">
                                            <input type="date" name="start_date" value="{{ $edu->start_date }}"
                                                class="w-full rounded-md border-gray-300" required>
                                            <input type="date" name="end_date" value="{{ $edu->end_date }}"
                                                class="w-full rounded-md border-gray-300">
                                        </div>

                                        <div class="flex gap-2 pt-2">
                                            <button type="button"
                                                onclick="document.getElementById('edit-edu-{{ $edu->id }}').classList.add('hidden')"
                                                class="flex-1 bg-gray-100 py-2 rounded-md">Cancel</button>
                                            <button type="submit"
                                                class="flex-1 bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>



            </div>

            <form action="{{ route('experiences.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="name" placeholder="Poste Name"class="w-full rounded-md border-gray-300">
                <input type="text" name="company" placeholder="Company" class="w-full rounded-md border-gray-300">
                <input type="date" name="start_date" class="rounded-md border-gray-300 p-2">
                <input type="date" name="end_date" class="rounded-md border-gray-300 p-2">
                <textarea name="description" class="w-full rounded-md border-gray-300"></textarea>
                <button type="submit" class="bg-blue-600 p-2 text-white">Add Experience</button>
            </form>
            @foreach (Auth::user()->experiences as $exp)
                <div class="p-4 border border-gray-700 my-2 rounded-lg flex justify-between items-center border-gray-300 ">
                    <div>
                        <h4 class=" font-bold">{{ $exp->name }} <span class="text-indigo-400">@
                                {{ $exp->company }}</span></h4>
                        <p class="text-gray-400 text-xs">{{ $exp->start_date }} - {{ $exp->end_date ?? 'Present' }}
                        </p>
                    </div>

                    <div class="flex gap-4">
                        <button
                            onclick="document.getElementById('edit-exp-{{ $exp->id }}').classList.remove('hidden')"
                            class="text-blue-400 hover:text-blue-300 font-semibold uppercase text-xs">
                            Edit
                        </button>

                        <form action="{{ route('experiences.destroy', $exp->id) }}" method="POST"
                            onsubmit="return confirm('Delete this experience?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-red-500 hover:text-red-400 font-semibold uppercase text-xs">Delete</button>
                        </form>
                    </div>
                </div>

                <div id="edit-exp-{{ $exp->id }}"
                    class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-80 backdrop-blur-sm flex items-center justify-center p-4 text-left">
                    <div class="bg-white p-6 rounded-xl shadow-2xl w-full max-w-md border border-gray-200">

                        <div class="flex justify-between items-center mb-6 border-b pb-3">
                            <h3 class="text-xl font-bold text-gray-800 uppercase tracking-tight">💼 Edit Experience
                            </h3>
                            <button
                                onclick="document.getElementById('edit-exp-{{ $exp->id }}').classList.add('hidden')"
                                class="text-gray-400 hover:text-gray-600 text-3xl line-height-0">&times;</button>
                        </div>

                        <form action="{{ route('experiences.update', $exp->id) }}" method="POST" class="space-y-5">
                            @csrf
                            @method('PUT')

                            <div>
                                <label class="block text-xs font-bold text-gray-600 uppercase mb-1">Position
                                    Name</label>
                                <input type="text" name="name" value="{{ $exp->name }}"
                                    class="w-full bg-white text-black border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 p-2.5 shadow-sm"
                                    required>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-600 uppercase mb-1">Company</label>
                                <input type="text" name="company" value="{{ $exp->company }}"
                                    class="w-full bg-white text-black border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 p-2.5 shadow-sm"
                                    required>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-600 uppercase mb-1">Description</label>
                                <textarea name="description" rows="4"
                                    class="w-full bg-white text-black border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 p-2.5 shadow-sm"
                                    required>{{ $exp->description }}</textarea>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-gray-600 uppercase mb-1">Start
                                        Date</label>
                                    <input type="date" name="start_date" value="{{ $exp->start_date }}"
                                        class="w-full bg-white text-black border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 p-2.5"
                                        required>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-600 uppercase mb-1">End
                                        Date</label>
                                    <input type="date" name="end_date" value="{{ $exp->end_date }}"
                                        class="w-full bg-white text-black border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 p-2.5">
                                </div>
                            </div>

                            <div class="flex gap-3 pt-4 border-t">
                                <button type="button"
                                    onclick="document.getElementById('edit-exp-{{ $exp->id }}').classList.add('hidden')"
                                    class="flex-1 bg-gray-100 text-gray-800 py-3 rounded-lg font-bold hover:bg-gray-200 transition">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="flex-1 bg-indigo-600 text-white py-3 rounded-lg font-bold hover:bg-indigo-700 shadow-lg transition">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
