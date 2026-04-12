@extends('layouts.admin')
@section('title', 'Manage Team')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Team Members</h1>
    <a href="{{ route('admin.team.create') }}" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold px-5 py-2.5 text-sm">+ Add Member</a>
</div>

<div class="bg-white shadow-sm overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
            <tr>
                <th class="px-4 py-3 text-left">Order</th>
                <th class="px-4 py-3 text-left">Photo</th>
                <th class="px-4 py-3 text-left">Name</th>
                <th class="px-4 py-3 text-left">Role</th>
                <th class="px-4 py-3 text-center">Status</th>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($members as $member)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3">{{ $member->display_order }}</td>
                <td class="px-4 py-3">
                    @if($member->photo_path)
                    <img src="{{ asset('storage/' . $member->photo_path) }}" alt="" class="w-10 h-10 rounded-full object-cover">
                    @else
                    <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-sm font-bold">{{ strtoupper(substr($member->name, 0, 1)) }}</div>
                    @endif
                </td>
                <td class="px-4 py-3 font-medium text-gray-800">{{ $member->name }}</td>
                <td class="px-4 py-3">{{ $member->role ?? '—' }}</td>
                <td class="px-4 py-3 text-center">
                    <span class="px-2 py-1 text-xs font-semibold {{ $member->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">{{ $member->is_active ? 'Active' : 'Inactive' }}</span>
                </td>
                <td class="px-4 py-3 text-right space-x-2">
                    <a href="{{ route('admin.team.edit', $member) }}" class="text-sky-600 hover:underline">Edit</a>
                    <form action="{{ route('admin.team.destroy', $member) }}" method="POST" class="inline" onsubmit="return confirm('Delete this team member?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-4 py-8 text-center text-gray-400">No team members found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection