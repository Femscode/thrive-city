<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CartController extends Controller
{
    protected function getCart(Request $request): array
    {
        return $request->session()->get('cart', []);
    }

    protected function saveCart(Request $request, array $cart): void
    {
        $request->session()->put('cart', $cart);
    }

    public function index(Request $request)
    {
        $cart = $this->getCart($request);
        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['qty'];
        });
        return view('frontend.cart', compact('cart', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
        ]);

        $product = Product::findOrFail($request->product_id);

        $rules = [
            'qty' => 'nullable|integer|min:1',
            'design_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,ai,psd|max:10240',
            'back_design' => 'nullable|file|mimes:jpg,jpeg,png,pdf,ai,psd|max:10240',
        ];

        if ($product->select_size) {
            $rules['size'] = 'required|string|max:60';
        } else {
            $rules['size'] = 'nullable|string|max:60';
        }

        if ($product->select_color) {
            $rules['color'] = 'required|string|max:60';
        } else {
            $rules['color'] = 'nullable|string|max:60';
        }

        if ($product->select_design_placement) {
            $rules['placements'] = 'required|array';
            $rules['placements.*'] = 'string';
        } else {
            $rules['placements'] = 'nullable|array';
            $rules['placements.*'] = 'string';
        }

        $validated = $request->validate($rules);
        
        $qty = $validated['qty'] ?? 1;

        $cart = $this->getCart($request);
        if (isset($cart[$product->id])) {
            $cart[$product->id]['qty'] += $qty;
            // Update optional apparel customization if provided
            if (isset($validated['color'])) {
                $cart[$product->id]['color'] = $validated['color'];
            }
            if (isset($validated['placements'])) {
                $cart[$product->id]['placements'] = $validated['placements'];
            }
            if (isset($validated['size'])) {
                $cart[$product->id]['size'] = $validated['size'];
            }
        } else {
            $item = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'qty' => $qty,
                'product_type' => optional($product->category)->slug ?? 'general',
            ];

            // Optional apparel customization
            if (isset($validated['size'])) {
                $item['size'] = $validated['size'];
            }
            if (isset($validated['color'])) {
                $item['color'] = $validated['color'];
            }
            if (isset($validated['placements'])) {
                $item['placements'] = $validated['placements'];
            }

            // Optional design file upload (only if product allows uploads)
            if (($request->hasFile('design_file') || $request->hasFile('back_design')) && !$product->upload_design) {
                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Design upload is not allowed for this product',
                    ], 422);
                }
                return redirect()->route('cart.index')->with('error', 'Design upload is not allowed for this product');
            }
            if ($request->hasFile('design_file')) {
                $file = $request->file('design_file');
                $filename = time() . '_' . $file->getClientOriginalName();
                //remove white space
                $filename = str_replace(' ', '', $filename);
                $destinationPath = public_path('designs');
                if (!File::isDirectory($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }
                $file->move($destinationPath, $filename);
                $item['design_file'] = 'designs/' . $filename;
            }
            if ($request->hasFile('back_design')) {
                $file = $request->file('back_design');
                $filename = time() . '_back_' . $file->getClientOriginalName();
                $filename = str_replace(' ', '', $filename);
                $destinationPath = public_path('designs');
                if (!File::isDirectory($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }
                $file->move($destinationPath, $filename);
                $item['back_design'] = 'designs/' . $filename;
            }

            $cart[$product->id] = $item;
        }

        $this->saveCart($request, $cart);

        // If the client expects JSON (AJAX), return a JSON response
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Product added to cart',
                'cart_count' => count($cart),
                'item' => $cart[$product->id],
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer',
            'qty' => 'required|integer|min:1',
        ]);

        $cart = $this->getCart($request);
        if (isset($cart[$validated['product_id']])) {
            $cart[$validated['product_id']]['qty'] = $validated['qty'];
            $this->saveCart($request, $cart);
            if ($request->expectsJson()) {
                $item = $cart[$validated['product_id']];
                $cart_total = collect($cart)->sum(function ($it) { return $it['price'] * $it['qty']; });
                return response()->json([
                    'success' => true,
                    'message' => 'Cart updated',
                    'item' => $item,
                    'item_subtotal' => $item['price'] * $item['qty'],
                    'cart_total' => $cart_total,
                    'cart_count' => count($cart),
                ]);
            }
            return redirect()->route('cart.index')->with('success', 'Cart updated');
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Item not found in cart',
            ], 404);
        }
        return redirect()->route('cart.index')->with('error', 'Item not found in cart');
    }

    public function remove(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer',
        ]);

        $cart = $this->getCart($request);
        if (isset($cart[$validated['product_id']])) {
            unset($cart[$validated['product_id']]);
            $this->saveCart($request, $cart);
            if ($request->expectsJson()) {
                $cart_total = collect($cart)->sum(function ($it) { return $it['price'] * $it['qty']; });
                return response()->json([
                    'success' => true,
                    'message' => 'Item removed',
                    'cart_total' => $cart_total,
                    'cart_count' => count($cart),
                ]);
            }
            return redirect()->route('cart.index')->with('success', 'Item removed');
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Item not found',
            ], 404);
        }
        return redirect()->route('cart.index')->with('error', 'Item not found');
    }
}
