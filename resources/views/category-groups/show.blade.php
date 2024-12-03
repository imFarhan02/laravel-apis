@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-6">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Category Group Details</h1>
    <div class="flex flex-col items-center">
        <div class="bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 text-white py-4 px-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold">Title</h2>
            <p class="text-lg mt-2">{{ $categoryGroup->title }}</p>
        </div>
    </div>
    <div class="mt-8 flex justify-center gap-4">
        <a href="{{ route('category-groups.edit', $categoryGroup->id) }}" 
           class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow-md">
           Edit
        </a>
        <a href="{{ route('category-groups.index') }}" 
           class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg shadow-md">
           Back to List
        </a>
    </div>
</div>
@endsection
