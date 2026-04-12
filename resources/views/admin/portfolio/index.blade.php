@extends('layouts.admin')
@section('title', 'Manage Portfolio')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Portfolio Projects</h1>
    <a href="{{ route('admin.portfolio.create') }}" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold px-5 py-2.5 text-sm">+ Add Project</a>
</div>

<div class="bg-white shadow-sm overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
            <tr>
                <th class="px-4 py-3 text-left">Image</th>
                <th class="px-4 py-3 text-left">Title</th>
                <th class="px-4 py-3 text-left">Category</th>
                <th class="px-4 py-3 text-left">Client</th>
                <th class="px-4 py-3 text-center">Status</th>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($projects as $project)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3">
                    @if($project->image_path)
                    <img src="{{ asset('storage/' . $project->image_path) }}" alt="" class="w-16 h-12 object-cover">
                    @else
                    <span class="text-gray-300">—</span>
                    @endif
                </td>
                <td class="px-4 py-3 font-medium text-gray-800">{{ $project->title }}</td>
                <td class="px-4 py-3">{{ $project->category ?? '—' }}</td>
                <td class="px-4 py-3">{{ $project->client ?? '—' }}</td>
                <td class="px-4 py-3 text-center">
                    <span class="px-2 py-1 text-xs font-semibold {{ $project->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">{{ $project->is_active ? 'Active' : 'Inactive' }}</span>
                </td>
                <td class="px-4 py-3 text-right space-x-2">
                    <a href="{{ route('admin.portfolio.edit', $project) }}" class="text-sky-600 hover:underline">Edit</a>
                    <form action="{{ route('admin.portfolio.destroy', $project) }}" method="POST" class="inline" onsubmit="return confirm('Delete this project?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-4 py-8 text-center text-gray-400">No projects found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection