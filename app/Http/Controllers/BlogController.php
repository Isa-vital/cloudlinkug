<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::latestPublished()->paginate(9);
        $categories = BlogPost::published()->whereNotNull('category')->distinct()->pluck('category');
        return view('blog.index', compact('posts', 'categories'));
    }

    public function show($slug)
    {
        $post = BlogPost::published()->where('slug', $slug)->firstOrFail();
        $related = BlogPost::published()
            ->where('id', '!=', $post->id)
            ->where('category', $post->category)
            ->take(3)
            ->get();
        $recent = BlogPost::latestPublished()
            ->where('id', '!=', $post->id)
            ->take(5)
            ->get();
        return view('blog.show', compact('post', 'related', 'recent'));
    }

    public function category($category)
    {
        $posts = BlogPost::latestPublished()->where('category', $category)->paginate(9);
        $categories = BlogPost::published()->whereNotNull('category')->distinct()->pluck('category');
        return view('blog.index', compact('posts', 'categories', 'category'));
    }
}
