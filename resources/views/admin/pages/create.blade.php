@extends('layouts.admin')
@section('title', 'Add Page')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Add Page</h1>
    <a href="{{ route('admin.pages.index') }}" class="text-sky-600 hover:underline text-sm">&larr; Back to list</a>
</div>

<form action="{{ route('admin.pages.store') }}" method="POST">
    @csrf
    @include('admin.pages._form')
    <div class="mt-6">
        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold px-6 py-2.5 text-sm">Save Page</button>
    </div>
</form>
@endsection

@push('scripts')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#content-editor',
        height: 400,
        menubar: false,
        plugins: 'lists link image code table',
        toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code',
        content_style: 'body { font-family: DM Sans, sans-serif; font-size: 15px; }'
    });
</script>
@endpush