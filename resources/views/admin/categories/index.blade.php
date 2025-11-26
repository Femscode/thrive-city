@extends('layouts.admin')

@section('header')
    <div class="flex items-center w-full">
        <h2 class="font-semibold text-lg text-slate-800">Categories</h2>
    </div>
@endsection

@section('content')
    <div class="bg-white shadow rounded">
        <div class="p-4">
            <div class="mb-4 flex justify-between items-center">
                <a href="{{ route('dashboard') }}" class="btn-outline">Back</a>
                <a href="{{ route('categories.create') }}" class="btn-gradient inline-flex items-center gap-2">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m-7-7h14"/></svg>
                    <span>Add Category</span>
                </a>
            </div>
            @if(session('success'))
                <div class="mb-3 p-3 bg-green-50 text-green-700 rounded">{{ session('success') }}</div>
            @endif
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="text-left px-3 py-2">Name</th>
                            <th class="text-left px-3 py-2">Slug</th>
                            <th class="text-left px-3 py-2">Description</th>
                            <th class="text-left px-3 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr class="border-t">
                                <td class="px-3 py-2">{{ $category->name }}</td>
                                <td class="px-3 py-2">{{ $category->slug }}</td>
                                <td class="px-3 py-2">{{ Str::limit($category->description, 80) }}</td>
                                <td class="px-3 py-2">
                                    <a href="{{ route('categories.edit', $category) }}" class="btn-outline">Edit</a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-outline" onclick="return confirm('Delete this category?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="px-3 py-2" colspan="4">No categories found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3">{{ $categories->links() }}</div>
            </div>
        </div>
    </div>
@endsection