@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-6">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Category Groups</h1>
    
    <!-- Floating Add Button -->
    <div class="flex justify-end mb-4">
        <a href="{{ route('category-groups.create') }}" 
           class="inline-block px-6 py-3 font-semibold rounded-lg shadow-md transition">
           + Add New
        </a>
    </div>
    
    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
            <thead>
                <tr class="bg-gray-200 text-gray-700 uppercase text-sm">
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Title</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categoryGroups as $group)
                <tr class="border-b hover:bg-gray-100 transition">
                    <td class="py-4 px-6">{{ $group->id }}</td>
                    <td class="py-4 px-6">{{ $group->title }}</td>
                    <td class="py-4 px-6 text-center">
                        <div class="flex justify-center space-x-3">
                            <!-- View Button -->
                            <a href="{{ route('category-groups.show', $group->id) }}" 
                               class="px-4 py-2 hover:bg-indigo-600 text-sm rounded-lg shadow-md transition">
                               View
                            </a>
                            <!-- Edit Button -->
                            <a href="{{ route('category-groups.edit', $group->id) }}" 
                               class="px-4 py-2hover:bg-blue-600 text-sm rounded-lg shadow-md transition">
                               Edit
                            </a>
                            <!-- Delete Button -->
                            <form action="{{ route('category-groups.destroy', $group->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="px-4 py-2 text-sm rounded-lg shadow-md transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
