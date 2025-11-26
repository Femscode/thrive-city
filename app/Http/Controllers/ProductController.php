<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->orderBy('created_at', 'desc')->paginate(12);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:160',
            'size' => 'nullable|string|max:60',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'customizable' => 'nullable|boolean',
            'upload_design' => 'nullable|boolean',
        ]);

        $slugBase = Str::slug($validated['name']);
        $slug = $slugBase;
        $i = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $slugBase.'-'.$i++;
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = Str::uuid()->toString().'.'.$ext;
            $dest = public_path('products');
            if (! File::exists($dest)) {
                File::makeDirectory($dest, 0755, true);
            }
            $file->move($dest, $filename);
            $imagePath = 'products/'.$filename;
        }

        $product = Product::create([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'size' => $validated['size'] ?? null,
            'slug' => $slug,
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
            'image' => $imagePath,
            'description' => $validated['description'] ?? null,
            'is_active' => $request->boolean('is_active', true),
            'customizable' => $request->boolean('customizable', false),
            'upload_design' => $request->boolean('upload_design', false),
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:160',
            'size' => 'nullable|string|max:60',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'customizable' => 'nullable|boolean',
            'upload_design' => 'nullable|boolean',
        ]);

        $product->category_id = $validated['category_id'];
        $product->name = $validated['name'];
        $slugBase = Str::slug($validated['name']);
        if ($slugBase !== $product->slug) {
            $slug = $slugBase;
            $i = 1;
            while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
                $slug = $slugBase.'-'.$i++;
            }
            $product->slug = $slug;
        }
        $product->price = $validated['price'];
        $product->quantity = $validated['quantity'];
        $product->size = $validated['size'] ?? null;
        $product->description = $validated['description'] ?? null;
        $product->is_active = $request->boolean('is_active', true);
        $product->customizable = $request->boolean('customizable', false);
        $product->upload_design = $request->boolean('upload_design', false);

        if ($request->hasFile('image')) {
            // delete old
            if ($product->image && File::exists(public_path($product->image))) {
                File::delete(public_path($product->image));
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = Str::uuid()->toString().'.'.$ext;
            $dest = public_path('products');
            if (! File::exists($dest)) {
                File::makeDirectory($dest, 0755, true);
            }
            $file->move($dest, $filename);
            $product->image = 'products/'.$filename;
        }

        $product->save();
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        if ($product->image && File::exists(public_path($product->image))) {
            File::delete(public_path($product->image));
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }

    public function toggleActive(Request $request, Product $product)
    {
        $validated = $request->validate([
            'is_active' => 'required|boolean',
        ]);

        $product->is_active = (bool) $validated['is_active'];
        $product->save();

        return response()->json([
            'success' => true,
            'id' => $product->id,
            'is_active' => $product->is_active,
        ]);
    }
}