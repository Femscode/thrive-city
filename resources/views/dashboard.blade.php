@extends('layouts.admin')

@section('header')
    <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Management Dashboard') }}
        </h2>
      
    </div>
@endsection

@section('content')
    <div class="py-8">
        <div class="max-w-7xl mx-auto dash-page">
            <!-- Order Statistics -->
            @push('styles')
                <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
            @endpush

            <div class="dash-stats-row">
                <div class="dash-card">
                    <div class="flex items-center">
                        <div class="dash-icon dash-icon-primary">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <div class="dash-ml-4">
                            <p class="dash-label">Total Orders</p>
                            <p class="dash-value dash-value-primary">{{ $totalOrders }}</p>
                        </div>
                    </div>
                </div>

                <div class="dash-card">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="dash-icon dash-icon-yellow">
                                <!-- Blog icon: document with text lines -->
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V8l-4-4H7z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6M9 16h6M13 8h3" />
                                </svg>
                            </div>
                            <div class="dash-ml-4">
                                <p class="dash-label">Total Blogs</p>
                                <p class="dash-value dash-value-yellow">{{ count($blogs) }}</p>
                            </div>
                        </div>
                        <a href="{{ route('blog.index') }}" class="inline-flex items-center px-3 py-1.5 rounded-md bg-indigo-600 text-white hover:bg-indigo-700 text-sm font-semibold">
                            View All Blogs
                        </a>
                    </div>
                </div>

            </div>

            <!-- Orders DataTable -->
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold brand-text-primary">Recent Orders</h3>
                        <div class="flex space-x-2">
                            <button onclick="refreshTable()" class="btn-outline">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                                Refresh
                            </button>
                        </div>
                    </div>

                    <div class="dash-table-wrap">
                        <table id="ordersTable" class="min-w-full table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-left">Order ID</th>
                                    <th class="px-4 py-3 text-left">Customer Name</th>
                                    <th class="px-4 py-3 text-left">Email</th>
                                    <th class="px-4 py-3 text-left">Product Type</th>
                                    <th class="px-4 py-3 text-left">Status</th>
                                    <th class="px-4 py-3 text-left">Date</th>
                                    <th class="px-4 py-3 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- DataTable will populate this -->
                            </tbody>
                        </table>
                    </div>
                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let ordersTable;

        $(document).ready(function() {
            // Initialize DataTable
            ordersTable = $('#ordersTable').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: {
                    url: '{{ route("orders.data") }}',
                    type: 'GET'
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'customer_name', name: 'customer_name' },
                    { data: 'customer_email', name: 'customer_email' },
                    { data: 'product_type', name: 'product_type' },
                    { 
                        data: 'status', 
                        name: 'status',
                        render: function(data, type, row) {
                            return `<span class="status-badge status-${data}">${data}</span>`;
                        }
                    },
                    { data: 'created_at', name: 'created_at' },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return `
                                <div class="flex space-x-2">
                                    <a href="/orders/${data}" class="btn-outline text-xs">View</a>
                                    <select onchange="updateStatus(${data}, this.value)" class="text-xs border border-gray-300 rounded px-2 py-1">
                                        <option value="">Change Status</option>
                                        <option value="pending" ${row.status === 'pending' ? 'selected' : ''}>Pending</option>
                                        <option value="paid" ${row.status === 'paid' ? 'selected' : ''}>Paid</option>
                                        <option value="shipped" ${row.status === 'shipped' ? 'selected' : ''}>Shipped</option>
                                        <option value="delivered" ${row.status === 'delivered' ? 'selected' : ''}>Delivered</option>
                                    </select>
                                </div>
                            `;
                        }
                    }
                ],
                pageLength: 10,
                responsive: true,
                language: {
                    processing: "Loading orders...",
                    emptyTable: "No orders found",
                    zeroRecords: "No matching orders found"
                }
            });
        });

        function refreshTable() {
            ordersTable.ajax.reload();
        }

        function updateStatus(orderId, newStatus) {
            if (!newStatus) return;

            Swal.fire({
                title: 'Update Order Status?',
                text: `Are you sure you want to change the status to "${newStatus}"?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#390466',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/orders/${orderId}/status`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ status: newStatus })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                title: 'Updated!',
                                text: data.message,
                                icon: 'success',
                                confirmButtonColor: '#390466'
                            });
                            refreshTable();
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Failed to update order status.',
                                icon: 'error',
                                confirmButtonColor: '#390466'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred while updating the status.',
                            icon: 'error',
                            confirmButtonColor: '#390466'
                        });
                    });
                }
            });
        }
    </script>
@endpush
