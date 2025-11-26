@extends('layouts.admin')

@section('header')
    <div class="flex items-center w-full">
        <h2 class="font-semibold text-lg text-slate-800">Orders</h2>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-4">
                <a href="{{ route('dashboard') }}" class="btn-outline">Back</a>
                <button onclick="refreshTable()" class="btn-outline">Refresh</button>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="dash-table-wrap">
                        <table id="ordersTable" class="min-w-full table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-left">Order ID</th>
                                    <th class="px-4 py-3 text-left">Customer Name</th>
                                    <th class="px-4 py-3 text-left">Email</th>
                                    <th class="px-4 py-3 text-left">Items</th>
                                    <th class="px-4 py-3 text-left">Status</th>
                                    <th class="px-4 py-3 text-left">Date</th>
                                    <th class="px-4 py-3 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let ordersTable;

        $(document).ready(function() {
            ordersTable = $('#ordersTable').DataTable({
                processing: true,
                serverSide: true,
                order: [[5, 'desc']],
                scrollX: true,
                ajax: {
                    url: '{{ route("orders.data") }}',
                    type: 'GET'
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'customer_name', name: 'customer_name' },
                    { data: 'customer_email', name: 'customer_email' },
                    { data: 'items_count', name: 'items_count' },
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

        function refreshTable() { ordersTable.ajax.reload(); }

        // manual status updates removed; Stripe now controls paid status
    </script>
@endpush