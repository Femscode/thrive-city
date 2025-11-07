<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\OrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('frontend.place-order');
    }

    public function submitOrder(Request $request) {
        // Validate the request
        // dd($request->all());exit;
        $validated = $request->validate([
            'product_type' => 'required|string|in:tshirt,sweatshirt,hoodie,founders_bundle',
            'tshirt_type' => 'nullable',
            'size' => 'required|string|in:S,M,L,XL,2XL,3XL',
            'color' => 'required|string',
            'placements' => 'required|array|min:1',
            'placements.*' => 'string',
            'design_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,ai,psd|max:10240', // 10MB max
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'nullable|string|max:20',
            'special_instructions' => 'nullable|string|max:1000',
        ]);

        // Handle file upload if present
        $designFilePath = null;
        if ($request->hasFile('design_file')) {
            $file = $request->file('design_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $designFilePath = $file->storeAs('designs', $filename, 'public');
        }

        // Create the order request
        $orderRequest = OrderRequest::create([
            'product_type' => $validated['product_type'],
            'tshirt_type' => $validated['tshirt_type'] ?? null,
            'size' => $validated['size'],
            'color' => $validated['color'],
            'placements' => $validated['placements'],
            'design_file' => $designFilePath,
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_phone' => $validated['customer_phone'],
            'special_instructions' => $validated['special_instructions'],
            'status' => 'pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Order request submitted successfully! We will contact you within 24 hours.',
            'order_id' => $orderRequest->id
        ]);
    }

    public function contact() {
        return view('frontend.contact');
    }
}

