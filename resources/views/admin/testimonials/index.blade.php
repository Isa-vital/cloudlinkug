@extends('layouts.admin')
@section('title', 'Manage Testimonials')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Testimonials</h1>
    <a href="{{ route('admin.testimonials.create') }}" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold px-5 py-2.5 text-sm">+ Add Testimonial</a>
</div>

<div class="bg-white shadow-sm overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
            <tr>
                <th class="px-4 py-3 text-left">Avatar</th>
                <th class="px-4 py-3 text-left">Client</th>
                <th class="px-4 py-3 text-left">Company</th>
                <th class="px-4 py-3 text-center">Rating</th>
                <th class="px-4 py-3 text-center">Status</th>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($testimonials as $testimonial)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3">
                    @if($testimonial->avatar_path)
                    <img src="{{ asset('storage/' . $testimonial->avatar_path) }}" alt="" class="w-10 h-10 rounded-full object-cover">
                    @else
                    <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-sm font-bold">{{ strtoupper(substr($testimonial->client_name, 0, 1)) }}</div>
                    @endif
                </td>
                <td class="px-4 py-3 font-medium text-gray-800">{{ $testimonial->client_name }}</td>
                <td class="px-4 py-3">{{ $testimonial->company ?? '—' }}</td>
                <td class="px-4 py-3 text-center text-yellow-400">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star{{ $i <= $testimonial->rating ? '' : ' text-gray-200' }}"></i>
                        @endfor
                </td>
                <td class="px-4 py-3 text-center">
                    <span class="px-2 py-1 text-xs font-semibold {{ $testimonial->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">{{ $testimonial->is_active ? 'Active' : 'Inactive' }}</span>
                </td>
                <td class="px-4 py-3 text-right space-x-2">
                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="text-sky-600 hover:underline">Edit</a>
                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline" onsubmit="return confirm('Delete this testimonial?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-4 py-8 text-center text-gray-400">No testimonials found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection