<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->paginate(12);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:160|unique:categories,name',
            'description' => 'nullable|string',
        ]);

        $slugBase = Str::slug($validated['name']);
        $slug = $slugBase;
        $i = 1;
        while (Category::where('slug', $slug)->exists()) {
            $slug = $slugBase.'-'.$i++;
        }

        $category = Category::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:160|unique:categories,name,'.$category->id,
            'description' => 'nullable|string',
        ]);

        $category->name = $validated['name'];
        // Optionally update slug when name changes
        $slugBase = Str::slug($validated['name']);
        if ($slugBase !== $category->slug) {
            $slug = $slugBase;
            $i = 1;
            while (Category::where('slug', $slug)->where('id', '!=', $category->id)->exists()) {
                $slug = $slugBase.'-'.$i++;
            }
            $category->slug = $slug;
        }
        $category->description = $validated['description'] ?? null;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}