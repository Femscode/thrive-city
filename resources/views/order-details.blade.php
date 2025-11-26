@extends('layouts.admin')

@section('header')
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Order Details #{{ $order->id }}
            </h2>
        </div>
       
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/order-details.css') }}">
@endpush

@section('content')
    <div class="py-8">
        <div class="max-w-7xl mx-auto od-page">
            <!-- Order Status and Actions -->
            <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center space-x-4 mb-4 sm:mb-0">
                    <span class="od-status-badge od-status-{{ $order->status }}">{{ $order->status }}</span>
                    <span class="text-gray-600">Created: {{ $order->created_at->format('M d, Y \a\t g:i A') }}</span>
                </div>
                
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Customer Information -->
                <div class="lg:col-span-2">
                    <div class="od-detail-card p-6 mb-6">
                        <h3 class="text-lg font-semibold brand-text-primary mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Customer Information
                        </h3>
                        <div class="od-info-grid">
                            <div class="od-info-item">
                                <div class="od-info-label">Customer Name</div>
                                <div class="od-info-value">{{ $order->customer_name }}</div>
                            </div>
                            <div class="od-info-item">
                                <div class="od-info-label">Email Address</div>
                                <div class="od-info-value">{{ $order->customer_email }}</div>
                            </div>
                            <div class="od-info-item">
                                <div class="od-info-label">Phone Number</div>
                                <div class="od-info-value">{{ $order->customer_phone ?: 'Not provided' }}</div>
                            </div>
                            <div class="od-info-item">
                                <div class="od-info-label">Address</div>
                                <div class="od-info-value">{{ $order->customer_address ?: 'Not provided' }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Items Ordered -->
                    <div class="od-detail-card p-6 mb-6">
                        <h3 class="text-lg font-semibold brand-text-primary mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"></path>
                            </svg>
                            Items Ordered
                        </h3>
                        @if($order->items && $order->items->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full table-auto">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2 text-left">Product</th>
                                            <th class="px-4 py-2 text-left">Type</th>
                                            <th class="px-4 py-2 text-left">Size</th>
                                            <th class="px-4 py-2 text-left">Color</th>
                                            <th class="px-4 py-2 text-left">Qty</th>
                                            <th class="px-4 py-2 text-left">Price</th>
                                            <th class="px-4 py-2 text-left">Design</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->items as $item)
                                            <tr class="border-t">
                                                <td class="px-4 py-2">{{ $item->product_name }}</td>
                                                <td class="px-4 py-2">{{ ucfirst($item->product_type) }}</td>
                                                <td class="px-4 py-2">{{ $item->size ? strtoupper($item->size) : '-' }}</td>
                                                <td class="px-4 py-2">{{ $item->color ? ucfirst($item->color) : '-' }}</td>
                                                <td class="px-4 py-2">{{ $item->qty }}</td>
                                                <td class="px-4 py-2">$ {{ number_format($item->price, 2) }}</td>
                                                <td class="px-4 py-2">
                                                    @if($item->design_file)
                                                        <a href="{{ asset($item->design_file) }}" download class="text-purple-700 hover:underline">Download</a>
                                                    @else
                                                        <span class="text-gray-500">None</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @if($item->placements && is_array($item->placements) && count($item->placements) > 0)
                                                <tr>
                                                    <td colspan="7" class="px-4 py-2">
                                                        <div class="od-info-label">Placements</div>
                                                        <div class="mt-2">
                                                            @foreach($item->placements as $placement)
                                                                <span class="od-placement-tag">{{ ucfirst($placement) }}</span>
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-gray-600">No items found for this order.</p>
                        @endif
                    </div>

                    <!-- Product Information -->
                    <div class="od-detail-card p-6 mb-6">
                        <h3 class="text-lg font-semibold brand-text-primary mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            Product Details
                        </h3>
                        <div class="od-info-grid">
                            <div class="od-info-item">
                                <div class="od-info-label">Product Type</div>
                                <div class="od-info-value">{{ ucfirst($order->product_type) }}</div>
                            </div>
                            @if($order->tshirt_type)
                            <div class="od-info-item">
                                <div class="od-info-label">T-Shirt Type</div>
                                <div class="od-info-value">{{ ucfirst($order->tshirt_type) }}</div>
                            </div>
                            @endif
                            @if($order->size)
                            <div class="od-info-item">
                                <div class="od-info-label">Size</div>
                                <div class="od-info-value">{{ strtoupper($order->size) }}</div>
                            </div>
                            @endif
                            @if($order->color)
                            <div class="od-info-item">
                                <div class="od-info-label">Color</div>
                                <div class="od-info-value">{{ ucfirst($order->color) }}</div>
                            </div>
                            @endif
                        </div>

                        @if($order->placements && count($order->placements) > 0)
                        <div class="mt-4">
                            <div class="od-info-label">Design Placements</div>
                            <div class="mt-2">
                                @foreach($order->placements as $placement)
                                    <span class="od-placement-tag">{{ ucfirst($placement) }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Special Instructions -->
                    @if($order->special_instructions)
                    <div class="od-detail-card p-6">
                        <h3 class="text-lg font-semibold brand-text-primary mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Special Instructions
                        </h3>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-gray-700 leading-relaxed">{{ $order->special_instructions }}</p>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Design File Preview -->
                <div class="lg:col-span-1">
                    <div class="od-detail-card p-6 sticky top-8">
                        <h3 class="text-lg font-semibold brand-text-primary mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Design File
                        </h3>
                        
                        @if($order->design_file)
                            <div class="text-center">
                                @php
                                    $fileExtension = pathinfo($order->design_file, PATHINFO_EXTENSION);
                                    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'svg', 'webp'];
                                @endphp
                                
                                @if(in_array(strtolower($fileExtension), $imageExtensions))
                                    <img src="https://thrivecitystudio.ca/thrivecity-files/public/{{ $order->design_file }}" 
                                         alt="Design Preview" 
                                         class="od-design-preview mx-auto mb-4">
                                @else
                                    <div class="flex flex-col items-center justify-center p-8 bg-gray-100 rounded-lg mb-4">
                                        <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <p class="text-gray-600 font-medium">{{ strtoupper($fileExtension) }} File</p>
                                        <p class="text-gray-500 text-sm">Preview not available</p>
                                    </div>
                                @endif
                                
                                <a href="{{ asset($order->design_file) }}" 
                                   download 
                                   class="od-btn-outline w-full text-center block">
                                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Download Design
                                </a>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-gray-500">No design file uploaded</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection