<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\OrderRequest;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class FrontendController extends Controller
{
    //
    public function index() {
        return view('frontend.index');
    }

    public function about() {
        return view('frontend.about');
    }

    public function services() {
        return view('frontend.services');
    }

    public function portfolio() {
        return view('frontend.portfolio');
    }

    public function blogs() {
        $blogs = Blog::latest()->paginate(12);
        return view('frontend.blogs', compact('blogs'));
    }
    public function blogDetails($slug) {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('frontend.blog-details', compact('blog'));
    }
    
    public function placeOrder() {
        $deliveryPrice = optional(Delivery::first())->price ?? 0;
        return view('frontend.place-order', compact('deliveryPrice'));
    }

    public function marketplace() {
        $products = \App\Models\Product::with(['category', 'images'])
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);
        $cart = session('cart', []);
        $cartMap = [];
        foreach ($cart as $item) {
            $cartMap[$item['id']] = $item['qty'];
        }
        return view('frontend.marketplace', compact('products', 'cartMap'));
    }

    public function submitOrder(Request $request) {
        // Validate customer info only
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'nullable|string|max:20',
            'special_instructions' => 'nullable|string|max:1000',
        ]);

        // Retrieve cart from session
        $cart = $request->session()->get('cart', []);
        if (empty($cart)) {
            return response()->json([
                'success' => false,
                'message' => 'Your cart is empty. Please add items before checkout.'
            ], 422);
        }

        // Create an order request per cart item
        $orderIds = [];
        foreach ($cart as $item) {
            $order = OrderRequest::create([
                'product_type' => $item['product_type'] ?? 'general',
                'tshirt_type' => null,
                'size' => $item['size'] ?? null,
                'color' => $item['color'] ?? null,
                'placements' => $item['placements'] ?? null,
                'design_file' => $item['design_file'] ?? null,
                'back_design' => $item['back_design'] ?? null,
                'customer_name' => $validated['customer_name'],
                'customer_email' => $validated['customer_email'],
                'customer_phone' => $validated['customer_phone'] ?? null,
                'special_instructions' => $validated['special_instructions'] ?? null,
                'status' => 'pending',
            ]);
            $orderIds[] = $order->id;
        }

        // Clear cart after submission
        $request->session()->forget('cart');

        return response()->json([
            'success' => true,
            'message' => 'Order submitted successfully! We will contact you within 24 hours.',
            'order_ids' => $orderIds,
        ]);
    }

    public function contact() {
        return view('frontend.contact');
    }
}
