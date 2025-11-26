@extends('layouts.admin')

@section('header')
    <div class="flex items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Blog Management</h2>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/blog-index.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
@endpush

@section('content')
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-4">
                <a href="{{ route('dashboard') }}" class="btn-outline">Back</a>
                <a href="{{ route('blog.create') }}" class="btn-gradient">Create Blog</a>
            </div>
            <div class="bg-white shadow rounded-lg mt-6 blog-card">
                <div class="p-6">
                   
                    <div class="overflow-x-auto">
                    <table id="blogsTable" class="min-w-full divide-y divide-gray-200 blog-table display nowrap" style="width:100%">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($blogs as $blog)
                                <tr>
                                    <td class="px-4 py-3">
                                        @if($blog->image_path)
                                              <img src="https://thrivecitystudio.ca/thrivecity-files/public/{{ $blog->image_path }}" alt="{{ $blog->title }}" class="w-16 h-16 object-cover rounded blog-cover">
                              
                                        @else
                                            <div class="w-16 h-16 bg-gray-100 rounded flex items-center justify-center text-gray-400 text-xs">No Image</div>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900">{{ $blog->title }}</td>
                                    <td class="px-4 py-3 text-gray-600">{{ $blog->slug }}</td>
                                    <td class="px-4 py-3 text-gray-600">{{ $blog->created_at->format('M d, Y') }}</td>
                                    <td class="px-4 py-3 blog-actions">
                                        <a href="{{ route('blog.show', $blog->slug) }}" class="blog-action-btn blog-action-view">View</a>
                                        <a href="{{ route('blog.edit', $blog->slug) }}" class="blog-action-btn blog-action-edit">Edit</a>
                                        <form action="{{ route('blog.destroy', $blog->slug) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="blog-action-btn blog-action-delete delete-blog-btn">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-6 text-center text-gray-500">No blogs yet. Click "Create Blog" to add your first post.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="px-6 py-4 border-t bg-gray-50 blog-pagination">
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script>
        $(function() {
            const table = $('#blogsTable').DataTable({
                responsive: true,
                scrollX: true,
                pageLength: 10,
                order: [[3, 'desc']], // sort by Created
                columnDefs: [
                    { orderable: false, targets: [0, 4] } // Image, Actions
                ]
            });

            // Confirm delete
            $(document).on('click', '.delete-blog-btn', function(e) {
                const ok = confirm('Are you sure you want to delete this blog? This action cannot be undone.');
                if (!ok) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endpush