@extends('layouts.admin')

@section('header')
    <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Blog</h2>
    </div>
@endsection

@push('styles')
    <style>
        .blog-form-card { background: #fff; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.12); }
    </style>
@endpush

@section('content')
    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
            @if(session('status'))
                <div class="mb-4 p-4 bg-green-50 text-green-700 rounded">{{ session('status') }}</div>
            @endif

            <div class="blog-form-card p-6 mb-12">
                <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" required>
                        @error('title')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Cover Image</label>
                        <input type="file" name="image" accept="image/*" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                        @error('image')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="blog-description" name="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" rows="10">{{ old('description') }}</textarea>
                        @error('description')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                        <p class="text-xs text-gray-500 mt-2">Rich text enabled. You can format content, add links, and images.</p>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 border rounded-md text-gray-700 hover:bg-gray-50">Cancel</a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 font-semibold">Create Blog</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#blog-description'), {
                toolbar: [
                    'heading', '|', 'bold', 'italic', 'underline', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'undo', 'redo'
                ]
            })
            .then(editor => {
                window.blogDescriptionEditor = editor;
                const textarea = document.querySelector('#blog-description');
                editor.model.document.on('change:data', () => {
                    textarea.value = editor.getData();
                });
            })
            .catch(error => {
                console.error('CKEditor 5 initialization error:', error);
            });
    </script>
@endpush