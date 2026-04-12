@extends('layouts.admin')
@section('title', 'View Message')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Message from {{ $message->name }}</h1>
    <a href="{{ route('admin.messages.index') }}" class="text-sky-600 hover:underline text-sm">&larr; Back to messages</a>
</div>

<div class="bg-white shadow-sm p-6 space-y-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
        <div>
            <span class="block text-gray-400 text-xs uppercase mb-1">Name</span>
            <span class="font-medium text-gray-800">{{ $message->name }}</span>
        </div>
        <div>
            <span class="block text-gray-400 text-xs uppercase mb-1">Email</span>
            <a href="mailto:{{ $message->email }}" class="text-sky-600 hover:underline">{{ $message->email }}</a>
        </div>
        <div>
            <span class="block text-gray-400 text-xs uppercase mb-1">Phone</span>
            <span class="text-gray-800">{{ $message->phone ?? '—' }}</span>
        </div>
    </div>

    <div class="border-t pt-4">
        <span class="block text-gray-400 text-xs uppercase mb-1">Subject</span>
        <p class="font-medium text-gray-800">{{ $message->subject ?? 'No subject' }}</p>
    </div>

    <div class="border-t pt-4">
        <span class="block text-gray-400 text-xs uppercase mb-1">Message</span>
        <p class="text-gray-700 whitespace-pre-wrap leading-relaxed">{{ $message->message }}</p>
    </div>

    <div class="border-t pt-4 flex items-center justify-between text-sm">
        <span class="text-gray-400">Received: {{ $message->created_at->format('F d, Y \a\t H:i') }}</span>
        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Delete this message?')">
            @csrf @method('DELETE')
            <button class="text-red-600 hover:underline">Delete Message</button>
        </form>
    </div>
</div>
@endsection