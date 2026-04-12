@extends('layouts.admin')
@section('title', 'Manage Blog')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Blog Posts</h1>
    <a href="{{ route('admin.blog.create') }}" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold px-5 py-2.5 text-sm">+ New Post</a>
</div>

<div class="bg-white shadow-sm overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
            <tr>
                <th class="px-4 py-3 text-left">Image</th>
                <th class="px-4 py-3 text-left">Title</th>
                <th class="px-4 py-3 text-left">Category</th>
                <th class="px-4 py-3 text-left">Author</th>
                <th class="px-4 py-3 text-center">Status</th>
                <th class="px-4 py-3 text-left">Published</th>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($posts as $post)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3">
                    @if($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="" class="w-16 h-12 object-cover">
                    @else
                        <span class="text-gray-300">—</span>
                    @endif
                </td>
                <td class="px-4 py-3 font-medium text-gray-800">{{ Str::limit($post->title, 45) }}</td>
                <td class="px-4 py-3">{{ $post->category ?? '—' }}</td>
                <td class="px-4 py-3">{{ $post->author }}</td>
                <td class="px-4 py-3 text-center">
                    <span class="px-2 py-1 text-xs font-semibold {{ $post->is_published ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700' }}">{{ $post->is_published ? 'Published' : 'Draft' }}</span>
                </td>
                <td class="px-4 py-3 text-gray-500">{{ $post->published_at ? $post->published_at->format('M d, Y') : '—' }}</td>
                <td class="px-4 py-3 text-right space-x-2">
                    @if($post->is_published)
                    <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="text-gray-400 hover:text-gray-600" title="View"><i class="fas fa-external-link-alt"></i></a>
                    @endif
                    <a href="{{ route('admin.blog.edit', $post) }}" class="text-sky-600 hover:underline">Edit</a>
                    <form action="{{ route('admin.blog.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('Delete this post?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="px-4 py-8 text-center text-gray-400">No blog posts yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
