@extends('layouts.admin')

@section('header', 'Payments')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-700 hover:bg-slate-50">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back
        </a>
        <form method="GET" action="{{ route('admin.payments') }}" class="flex items-center gap-2">
            <input type="date" name="from" value="{{ $from  }}" class="rounded-md border border-slate-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-violet-500" />
            <input type="date" name="to" value="{{ $to  }}" class="rounded-md border border-slate-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-violet-500" />
            <button type="submit" class="inline-flex items-center gap-2 rounded-md bg-violet-600 text-white px-3 py-2 text-sm hover:bg-violet-700">Filter</button>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-slate-500 text-sm">Total Sales (Paid Orders)</div>
            <div class="text-3xl font-semibold text-slate-800 mt-1">${{ $totalSales }}</div>
            <div class="text-xs text-slate-500 mt-1">Range: {{ $from }} to {{ $to }}</div>
        </div>
        <div class="md:col-span-2 bg-white rounded-lg shadow p-4">
            <div class="font-semibold text-slate-800 mb-2">Paid Orders per Day</div>
            <div class="h-72">
                <canvas id="paymentsChart" class="w-full h-full"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script id="payments-days" type="application/json">@json($days)</script>
<script id="payments-counts" type="application/json">@json($counts)</script>
<script>
    (function() {
        var days = [];
        var counts = [];
        try {
            var daysEl = document.getElementById('payments-days');
            var countsEl = document.getElementById('payments-counts');
            if (daysEl && daysEl.textContent) { days = JSON.parse(daysEl.textContent); }
            if (countsEl && countsEl.textContent) { counts = JSON.parse(countsEl.textContent); }
        } catch (_) {}

        if (typeof Chart === 'undefined') return;

        var canvas = document.getElementById('paymentsChart');
        if (!canvas) return;
        var ctx = canvas.getContext('2d');

        if (window.paymentsChart && typeof window.paymentsChart.destroy === 'function') {
            window.paymentsChart.destroy();
        }

        window.paymentsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: days,
                datasets: [{
                    label: 'Paid Orders',
                    data: counts,
                    backgroundColor: 'rgba(34, 197, 94, 0.6)',
                    borderColor: 'rgba(34, 197, 94, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: { y: { beginAtZero: true } }
            }
        });
    })();
</script>
@endpush