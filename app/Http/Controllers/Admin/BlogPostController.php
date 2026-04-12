<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::latest()->get();
        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'          => 'required|string|max:255',
            'slug'           => 'nullable|string|max:255|unique:blog_posts,slug',
            'excerpt'        => 'nullable|string|max:500',
            'body'           => 'nullable|string',
            'featured_image' => 'nullable|image|max:5120',
            'category'       => 'nullable|string|max:100',
            'author'         => 'nullable|string|max:255',
            'is_published'   => 'nullable',
            'published_at'   => 'nullable|date',
        ]);

        $validated['slug']         = $validated['slug'] ?: Str::slug($validated['title']);
        $validated['is_published'] = $request->has('is_published');
        $validated['author']       = $validated['author'] ?: 'Cloudlink Team';

        if ($validated['is_published'] && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('blog', 'public');
        }

        BlogPost::create($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Blog post created successfully.');
    }

    public function edit(BlogPost $blog)
    {
        $post = $blog;
        return view('admin.blog.edit', compact('post'));
    }

    public function update(Request $request, BlogPost $blog)
    {
        $post = $blog;

        $validated = $request->validate([
            'title'          => 'required|string|max:255',
            'slug'           => 'nullable|string|max:255|unique:blog_posts,slug,' . $post->id,
            'excerpt'        => 'nullable|string|max:500',
            'body'           => 'nullable|string',
            'featured_image' => 'nullable|image|max:5120',
            'category'       => 'nullable|string|max:100',
            'author'         => 'nullable|string|max:255',
            'is_published'   => 'nullable',
            'published_at'   => 'nullable|date',
        ]);

        $validated['slug']         = $validated['slug'] ?: Str::slug($validated['title']);
        $validated['is_published'] = $request->has('is_published');
        $validated['author']       = $validated['author'] ?: 'Cloudlink Team';

        if ($validated['is_published'] && empty($validated['published_at']) && !$post->published_at) {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('featured_image')) {
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('blog', 'public');
        }

        $post->update($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy(BlogPost $blog)
    {
        if ($blog->featured_image) {
            Storage::disk('public')->delete($blog->featured_image);
        }
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Blog post deleted successfully.');
    }
}
