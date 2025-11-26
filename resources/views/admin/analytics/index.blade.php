@extends('layouts.admin')

@section('header', 'Analytics')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-700 hover:bg-slate-50">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow p-4">
            <div class="font-semibold text-slate-800 mb-2">Orders Per Month</div>
            <div class="h-64">
                <canvas id="ordersChart" class="w-full h-full"></canvas>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <div class="font-semibold text-slate-800 mb-2">Products Bought (by Type)</div>
            <div class="h-64">
                <canvas id="productsChart" class="w-full h-full"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script id="analytics-months" type="application/json">@json($months)</script>
<script id="analytics-order-counts" type="application/json">@json($orderCounts)</script>
<script id="analytics-product-types" type="application/json">@json($productTypes)</script>
<script id="analytics-product-counts" type="application/json">@json($productCounts)</script>
<script>
    (function() {
        var months = [];
        var orderCounts = [];
        var productTypes = [];
        var productCounts = [];
        try {
            var monthsEl = document.getElementById('analytics-months');
            var orderCountsEl = document.getElementById('analytics-order-counts');
            var productTypesEl = document.getElementById('analytics-product-types');
            var productCountsEl = document.getElementById('analytics-product-counts');
            if (monthsEl && monthsEl.textContent) { months = JSON.parse(monthsEl.textContent); }
            if (orderCountsEl && orderCountsEl.textContent) { orderCounts = JSON.parse(orderCountsEl.textContent); }
            if (productTypesEl && productTypesEl.textContent) { productTypes = JSON.parse(productTypesEl.textContent); }
            if (productCountsEl && productCountsEl.textContent) { productCounts = JSON.parse(productCountsEl.textContent); }
        } catch (_) {}

        if (typeof Chart === 'undefined') return;

        var ordersCanvas = document.getElementById('ordersChart');
        if (ordersCanvas) {
            var ordersCtx = ordersCanvas.getContext('2d');
            if (window.ordersChart && typeof window.ordersChart.destroy === 'function') {
                window.ordersChart.destroy();
            }
            window.ordersChart = new Chart(ordersCtx, {
                type: 'bar',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Orders',
                        data: orderCounts,
                        backgroundColor: 'rgba(99, 102, 241, 0.6)',
                        borderColor: 'rgba(99, 102, 241, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: { y: { beginAtZero: true } }
                }
            });
        }

        var productsCanvas = document.getElementById('productsChart');
        if (productsCanvas) {
            var productsCtx = productsCanvas.getContext('2d');
            if (window.productsChart && typeof window.productsChart.destroy === 'function') {
                window.productsChart.destroy();
            }
            window.productsChart = new Chart(productsCtx, {
                type: 'bar',
                data: {
                    labels: productTypes,
                    datasets: [{
                        label: 'Count',
                        data: productCounts,
                        backgroundColor: 'rgba(167, 139, 250, 0.6)',
                        borderColor: 'rgba(167, 139, 250, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: { y: { beginAtZero: true } }
                }
            });
        }
    })();
</script>
@endpush