@extends('layouts.admin')

@section('page_title', 'Hero Slides')

@section('content')

<div class="flex justify-between items-center mb-6">
    <p class="text-gray-600">Manage homepage hero slider images and content.</p>
    <a href="{{ route('admin.hero-slides.create') }}" class="bg-sky-500 hover:bg-sky-600 text-white font-bold px-6 py-2.5 text-sm uppercase tracking-wide transition">
        <i class="fas fa-plus mr-2"></i>Add Slide
    </a>
</div>

<div class="bg-white shadow-sm overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Order</th>
                <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Image</th>
                <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Heading</th>
                <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Status</th>
                <th class="text-right px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($slides as $slide)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 text-sm text-gray-600">{{ $slide->display_order }}</td>
                <td class="px-6 py-4">
                    @if($slide->image_path)
                    <img src="{{ asset('storage/' . $slide->image_path) }}" alt="" class="w-20 h-12 object-cover">
                    @else
                    <span class="text-gray-400 text-xs">No image</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $slide->heading }}</td>
                <td class="px-6 py-4">
                    @if($slide->is_active)
                    <span class="px-2 py-1 text-xs bg-green-100 text-green-700 font-semibold">Active</span>
                    @else
                    <span class="px-2 py-1 text-xs bg-gray-100 text-gray-500">Inactive</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="{{ route('admin.hero-slides.edit', $slide) }}" class="text-sky-500 hover:text-sky-700 text-sm"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('admin.hero-slides.destroy', $slide) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this slide?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 text-sm"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-8 text-center text-gray-400">No hero slides yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection