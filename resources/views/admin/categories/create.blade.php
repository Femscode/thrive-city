@extends('layouts.admin')

@section('header')
    <div class="flex items-center w-full">
        <h2 class="font-semibold text-lg text-slate-800">Create Category</h2>
    </div>
@endsection

@section('content')
    <div class="bg-white shadow rounded">
        <div class="p-6">
            <div class="mb-4"><a href="{{ route('categories.index') }}" class="btn-outline">Back</a></div>
            <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-slate-700">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="mt-1 w-full border border-slate-300 rounded px-3 py-2" required>
                    @error('name')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Description</label>
                    <textarea name="description" rows="4" class="mt-1 w-full border border-slate-300 rounded px-3 py-2">{{ old('description') }}</textarea>
                    @error('description')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
                </div>
                <div>
                    <button type="submit" class="btn-gradient">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection