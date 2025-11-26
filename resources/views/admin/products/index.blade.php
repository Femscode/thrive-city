@extends('layouts.admin')

@section('header')
    <div class="flex items-center w-full">
        <h2 class="font-semibold text-lg text-slate-800">Products</h2>
    </div>
@endsection

@section('content')
    <div class="bg-white shadow rounded">
        <div class="p-4">
            <div class="mb-4 flex justify-between items-center">
                <a href="{{ route('dashboard') }}" class="btn-outline">Back</a>
                <a href="{{ route('products.create') }}" class="btn-gradient inline-flex items-center gap-2">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m-7-7h14"/></svg>
                    <span>Add Product</span>
                </a>
            </div>
            @if(session('success'))
                <div class="mb-3 p-3 bg-green-50 text-green-700 rounded">{{ session('success') }}</div>
            @endif
            <div class="overflow-x-auto">
                <table id="productsTable" class="min-w-full">
                    <thead>
                        <tr>
                            <th class="text-left px-3 py-2">Image</th>
                            <th class="text-left px-3 py-2">Name</th>
                            <th class="text-left px-3 py-2">Category</th>
                            <th class="text-left px-3 py-2">Price (USD)</th>
                            <th class="text-left px-3 py-2">Quantity</th>
                            <th class="text-left px-3 py-2">Active</th>
                            <th class="text-left px-3 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr class="border-t">
                                <td class="px-3 py-2">
                                    @if($product->image)
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="h-10 w-10 object-cover rounded">
                                    @else
                                        <span class="text-slate-400">No image</span>
                                    @endif
                                </td>
                                <td class="px-3 py-2">{{ $product->name }} @if($product->size)<span class="text-slate-400">({{ $product->size }})</span>@endif</td>
                                <td class="px-3 py-2">{{ $product->category->name ?? '—' }}</td>
                                <td class="px-3 py-2">${{ number_format($product->price, 2) }}</td>
                                <td class="px-3 py-2">{{ $product->quantity }}</td>
                                <td class="px-3 py-2">
                                    <label class="relative inline-block w-12 h-6 align-middle select-none cursor-pointer">
                                        <input type="checkbox"
                                               class="sr-only peer toggle-active"
                                               data-id="{{ $product->id }}"
                                               data-url="{{ route('products.toggle-active', $product) }}"
                                               {{ $product->is_active ? 'checked' : '' }} />
                                        <span class="block w-full h-full bg-slate-300 rounded-full peer-checked:bg-green-500 transition"></span>
                                        <span class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition peer-checked:translate-x-6"></span>
                                    </label>
                                </td>
                                <td class="px-3 py-2">
                                    <a href="{{ route('products.edit', $product) }}" class="btn-outline">Edit</a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-outline" onclick="return confirm('Delete this product?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="px-3 py-2" colspan="7">No products found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3">{{ $products->links() }}</div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(function() {
            // Initialize DataTables
            $('#productsTable').DataTable();

            // Toggle active via AJAX
            // Use delegated binding so it works after DataTables redraws
            $(document).on('change', '.toggle-active', function() {
                const $cb = $(this);
                const isActive = $cb.is(':checked') ? 1 : 0;
                const token = $('meta[name="csrf-token"]').attr('content');
                const url = $cb.data('url');

                $.ajax({
                    url: url,
                    method: 'PATCH',
                    data: { is_active: isActive, _token: token },
                    success: function(resp) {
                        // Optional: show a subtle confirmation
                    },
                    error: function() {
                        alert('Failed to update status. Please try again.');
                        // revert checkbox state
                        $cb.prop('checked', !isActive);
                    }
                });
            });
        });
    </script>
@endpush