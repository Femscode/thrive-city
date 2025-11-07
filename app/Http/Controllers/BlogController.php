<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * List blogs for admin management.
     */
    public function index()
    {
        $blogs = Blog::orderByDesc('created_at')->paginate(10);
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show admin create form.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created blog.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:5120'], // max 5MB
            'description' => ['required', 'string'],
        ]);

        // dd($request->all());
        $slug = Str::slug($validated['title']);
        // Ensure unique slug by appending a counter if necessary
        $baseSlug = $slug;
        $counter = 1;
        while (Blog::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter++;
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('blogs'), $filename);
            $imagePath = 'blogs/' . $filename; // relative to public directory
        }


        $blog = Blog::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'image_path' => $imagePath,
            'description' => $validated['description'],
        ]);

        return redirect()->route('blog.show', ['slug' => $blog->slug])
            ->with('status', 'Blog created successfully.');
    }

    /**
     * Display the specified blog.
     */
    public function show(string $slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('blog.details', compact('blog'));
    }

    /**
     * Show the form for editing the specified blog (admin).
     */
    public function edit(string $slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified blog in storage (admin).
     */
    public function update(Request $request, string $slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:5120'],
            'description' => ['required', 'string'],
        ]);

        // Update slug if title changed (ensure uniqueness)
        if ($validated['title'] !== $blog->title) {
            $newSlug = Str::slug($validated['title']);
            $baseSlug = $newSlug;
            $counter = 1;
            while (Blog::where('slug', $newSlug)->where('id', '!=', $blog->id)->exists()) {
                $newSlug = $baseSlug . '-' . $counter++;
            }
            $blog->slug = $newSlug;
        }

        // Handle image replacement
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blog->image_path && file_exists(public_path($blog->image_path))) {
                @unlink(public_path($blog->image_path));
            }
            $image = $request->file('image');
            $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('blogs'), $filename);
            $blog->image_path = 'blogs/' . $filename;
        }

        $blog->title = $validated['title'];
        $blog->description = $validated['description'];
        $blog->save();

        return redirect()->route('blog.index')
            ->with('status', 'Blog updated successfully.');
    }

    /**
     * Remove the specified blog from storage (admin).
     */
    public function destroy(string $slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        // Delete associated image if present
        if ($blog->image_path && file_exists(public_path($blog->image_path))) {
            @unlink(public_path($blog->image_path));
        }

        $blog->delete();

        return redirect()->route('blog.index')
            ->with('status', 'Blog deleted successfully.');
    }
}