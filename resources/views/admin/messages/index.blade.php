@extends('layouts.admin')
@section('title', 'Contact Messages')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Contact Messages</h1>
    <span class="text-sm text-gray-500">{{ $messages->where('is_read', false)->count() }} unread</span>
</div>

<div class="bg-white shadow-sm overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
            <tr>
                <th class="px-4 py-3 text-left"></th>
                <th class="px-4 py-3 text-left">Name</th>
                <th class="px-4 py-3 text-left">Email</th>
                <th class="px-4 py-3 text-left">Subject</th>
                <th class="px-4 py-3 text-left">Date</th>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($messages as $msg)
            <tr class="hover:bg-gray-50 {{ !$msg->is_read ? 'bg-sky-50 font-semibold' : '' }}">
                <td class="px-4 py-3">
                    @if(!$msg->is_read)
                    <span class="inline-block w-2.5 h-2.5 rounded-full bg-sky-500" title="Unread"></span>
                    @endif
                </td>
                <td class="px-4 py-3 text-gray-800">{{ $msg->name }}</td>
                <td class="px-4 py-3">{{ $msg->email }}</td>
                <td class="px-4 py-3">{{ Str::limit($msg->subject, 40) }}</td>
                <td class="px-4 py-3 text-gray-500">{{ $msg->created_at->format('M d, Y H:i') }}</td>
                <td class="px-4 py-3 text-right space-x-2">
                    <a href="{{ route('admin.messages.show', $msg) }}" class="text-sky-600 hover:underline">View</a>
                    <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST" class="inline" onsubmit="return confirm('Delete this message?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-4 py-8 text-center text-gray-400">No messages yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection