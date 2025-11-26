<?php

namespace App\Http\Controllers;

use App\Models\OrderRequest;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function index()
    {
        // Orders per month (last 12 months)
        $ordersPerMonth = OrderRequest::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('COUNT(*) as count'))
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->limit(12)
            ->get();

        $months = $ordersPerMonth->pluck('month');
        $orderCounts = $ordersPerMonth->pluck('count');

        // Products bought (grouped by product_type) from OrderItem
        $productsBought = OrderItem::select('product_type', DB::raw('COUNT(*) as count'))
            ->groupBy('product_type')
            ->orderBy('product_type', 'asc')
            ->get();

        $productTypes = $productsBought->pluck('product_type');
        $productCounts = $productsBought->pluck('count');

        return view('admin.analytics.index', [
            'months' => $months,
            'orderCounts' => $orderCounts,
            'productTypes' => $productTypes,
            'productCounts' => $productCounts,
        ]);
    }
}