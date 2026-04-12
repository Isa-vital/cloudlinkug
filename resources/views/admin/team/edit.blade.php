@extends('layouts.admin')
@section('title', 'Edit Team Member')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Edit Team Member</h1>
    <a href="{{ route('admin.team.index') }}" class="text-sky-600 hover:underline text-sm">&larr; Back to list</a>
</div>

<form action="{{ route('admin.team.update', $member) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    @include('admin.team._form', ['member' => $member])
    <div class="mt-6">
        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold px-6 py-2.5 text-sm">Update Member</button>
    </div>
</form>
@endsection