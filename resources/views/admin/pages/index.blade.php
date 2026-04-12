@extends('layouts.admin')
@section('title', 'Manage Pages')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Pages</h1>
    <a href="{{ route('admin.pages.create') }}" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold px-5 py-2.5 text-sm">+ Add Page</a>
</div>

<div class="bg-white shadow-sm overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
            <tr>
                <th class="px-4 py-3 text-left">Title</th>
                <th class="px-4 py-3 text-left">Slug</th>
                <th class="px-4 py-3 text-center">Status</th>
                <th class="px-4 py-3 text-left">Updated</th>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($pages as $page)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3 font-medium text-gray-800">{{ $page->title }}</td>
                <td class="px-4 py-3 text-gray-500">/page/{{ $page->slug }}</td>
                <td class="px-4 py-3 text-center">
                    <span class="px-2 py-1 text-xs font-semibold {{ $page->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">{{ $page->is_active ? 'Active' : 'Draft' }}</span>
                </td>
                <td class="px-4 py-3 text-gray-500">{{ $page->updated_at->format('M d, Y') }}</td>
                <td class="px-4 py-3 text-right space-x-2">
                    <a href="{{ route('admin.pages.edit', $page) }}" class="text-sky-600 hover:underline">Edit</a>
                    <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" class="inline" onsubmit="return confirm('Delete this page?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-4 py-8 text-center text-gray-400">No pages found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection