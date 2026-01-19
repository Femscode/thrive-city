@extends('layouts.admin')

@section('header')
<div class="flex items-center w-full">
    <h2 class="font-semibold text-lg text-slate-800">Create Product</h2>
</div>
@endsection

@section('content')
<div class="bg-white shadow rounded">
    <div class="p-6">
        <div class="mb-4"><a href="{{ route('products.index') }}" class="btn-outline">Back</a></div>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="mt-1 w-full border border-slate-300 rounded px-3 py-2" required>
                    @error('name')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Category</label>
                    <select name="category_id" class="mt-1 w-full border border-slate-300 rounded px-3 py-2" required>
                        <option value="">Select category</option>
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" @selected(old('category_id')==$cat->id)>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Price (CAD)</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="mt-1 w-full border border-slate-300 rounded px-3 py-2" required>
                    @error('price')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Quantity</label>
                    <input type="number" name="quantity" value="{{ old('quantity', 0) }}" class="mt-1 w-full border border-slate-300 rounded px-3 py-2" required>
                    @error('quantity')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700">Image</label>
                <input type="file" name="image" accept="image/*" class="mt-1">
                @error('image')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700">Additional Images</label>
                <input type="file" name="gallery_images[]" accept="image/*" multiple class="mt-1">
                @error('gallery_images.*')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700">Description</label>
                <textarea name="description" rows="4" class="mt-1 w-full border border-slate-300 rounded px-3 py-2">{{ old('description') }}</textarea>
                @error('description')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_active" value="1" class="rounded" checked>
                <span>Active</span>
            </div>
            
            <div class="border-t pt-4">
                <h3 class="text-sm font-medium text-slate-900 mb-2">Customer Customization Options</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="select_size" value="1" class="rounded" @checked(old('select_size', false))>
                        <span>Customer Selects Size</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="select_color" value="1" class="rounded" @checked(old('select_color', false))>
                        <span>Customer Selects Color</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="select_design_placement" value="1" class="rounded" @checked(old('select_design_placement', false))>
                        <span>Customer Selects Design Placement</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="upload_design" value="1" class="rounded" @checked(old('upload_design', false))>
                        <span>Customer Uploads Design</span>
                    </div>
                </div>
            </div>
                
            <div>
                <button type="submit" class="btn-gradient">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection
