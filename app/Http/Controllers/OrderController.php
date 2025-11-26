<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * Display the dashboard with order summary and list
     */
    public function index()
    {
        // Dashboard overview metrics
        $totalOrders = OrderRequest::count();
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalBlogs = Blog::count();
        $recentBlogs = Blog::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalOrders',
            'totalProducts',
            'totalCategories',
            'totalBlogs',
            'recentBlogs'
        ));
    }

    /**
     * Orders list page (moved from dashboard)
     */
    public function list()
    {
        return view('admin.orders.index');
    }

    /**
     * Display the specified order details
     */
    public function show($id)
    {
        $order = OrderRequest::with('items')->findOrFail($id);
        return view('order-details', compact('order'));
    }

    /**
     * Get orders data for DataTable (AJAX)
     */
    public function getOrdersData(Request $request)
    {
        $query = OrderRequest::query();

        // Search functionality
        if ($request->has('search') && $request->search['value']) {
            $searchValue = $request->search['value'];
            $query->where(function ($q) use ($searchValue) {
                $q->where('customer_name', 'like', "%{$searchValue}%")
                    ->orWhere('customer_email', 'like', "%{$searchValue}%")
                    ->orWhere('status', 'like', "%{$searchValue}%");
            });
        }

        // Get total count before pagination
        $totalRecords = OrderRequest::count();
        $filteredRecords = $query->count();

        // Ordering
        if ($request->has('order')) {
            $orderColumn = $request->order[0]['column'];
            $orderDirection = $request->order[0]['dir'];

            $columns = ['id', 'customer_name', 'customer_email', 'items_count', 'status', 'created_at'];
            if (isset($columns[$orderColumn])) {
                $query->orderBy($columns[$orderColumn], $orderDirection);
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        // Pagination
        $start = $request->start ?? 0;
        $length = $request->length ?? 10;
        $orders = $query->skip($start)->take($length)->withCount('items')->get();

        // Format data for DataTable
        $data = $orders->map(function ($order) {
            return [
                'id' => $order->id,
                'customer_name' => $order->customer_name,
                'customer_email' => $order->customer_email,
                'items_count' => (int) ($order->items_count ?? 0),
                'status' => $order->status,
                'created_at' => $order->created_at->format('M d, Y H:i'),
                'actions' => $order->id // Will be processed in frontend
            ];
        });

        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data
        ]);
    }
}
