@extends('layouts.admin')

@section('page_title', 'Dashboard')

@section('content')

{{-- Stats Cards --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
    <div class="bg-white p-6 shadow-sm border-l-4 border-sky-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 uppercase tracking-wide">Total Services</p>
                <p class="text-3xl font-heading font-extrabold text-gray-900">{{ $stats['services'] }}</p>
            </div>
            <div class="w-12 h-12 bg-sky-500 text-white flex items-center justify-center">
                <i class="fas fa-concierge-bell text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 shadow-sm border-l-4 border-yellow-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 uppercase tracking-wide">Total Projects</p>
                <p class="text-3xl font-heading font-extrabold text-gray-900">{{ $stats['projects'] }}</p>
            </div>
            <div class="w-12 h-12 bg-yellow-500 text-gray-900 flex items-center justify-center">
                <i class="fas fa-briefcase text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 shadow-sm border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 uppercase tracking-wide">Team Members</p>
                <p class="text-3xl font-heading font-extrabold text-gray-900">{{ $stats['team'] }}</p>
            </div>
            <div class="w-12 h-12 bg-green-500 text-white flex items-center justify-center">
                <i class="fas fa-users text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 shadow-sm border-l-4 border-red-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 uppercase tracking-wide">Messages</p>
                <p class="text-3xl font-heading font-extrabold text-gray-900">{{ $stats['messages'] }}</p>
                @if($stats['unread'] > 0)
                <p class="text-xs text-red-500 font-semibold">{{ $stats['unread'] }} unread</p>
                @endif
            </div>
            <div class="w-12 h-12 bg-red-500 text-white flex items-center justify-center">
                <i class="fas fa-envelope text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 shadow-sm border-l-4 border-purple-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 uppercase tracking-wide">Blog Posts</p>
                <p class="text-3xl font-heading font-extrabold text-gray-900">{{ $stats['blog_posts'] }}</p>
                <p class="text-xs text-green-500 font-semibold">{{ $stats['blog_published'] }} published</p>
            </div>
            <div class="w-12 h-12 bg-purple-500 text-white flex items-center justify-center">
                <i class="fas fa-blog text-xl"></i>
            </div>
        </div>
    </div>
</div>

{{-- Recent Messages --}}
<div class="bg-white shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
        <h2 class="text-lg font-heading font-bold text-gray-900 uppercase">Recent Messages</h2>
        <a href="{{ route('admin.messages.index') }}" class="text-sm text-sky-500 hover:text-sky-600">View All</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Name</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Subject</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Date</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($recentMessages as $msg)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm {{ !$msg->is_read ? 'font-bold text-gray-900' : 'text-gray-600' }}">{{ $msg->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        <a href="{{ route('admin.messages.show', $msg) }}" class="hover:text-sky-500 transition">{{ $msg->subject }}</a>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $msg->created_at->diffForHumans() }}</td>
                    <td class="px-6 py-4">
                        @if($msg->is_read)
                        <span class="px-2 py-1 text-xs bg-gray-100 text-gray-600">Read</span>
                        @else
                        <span class="px-2 py-1 text-xs bg-yellow-500 text-gray-900 font-bold">New</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-8 text-center text-gray-400">No messages yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection