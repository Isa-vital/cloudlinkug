@extends('layouts.admin')
@section('title', 'New Blog Post')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">New Blog Post</h1>
    <a href="{{ route('admin.blog.index') }}" class="text-sky-600 hover:underline text-sm">&larr; Back to posts</a>
</div>

<form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.blog._form')
    <div class="mt-6 flex space-x-3">
        <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold px-6 py-2.5 text-sm">Publish Post</button>
    </div>
</form>
@endsection

@push('scripts')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#body-editor',
        height: 450,
        menubar: false,
        plugins: 'lists link image code table wordcount',
        toolbar: 'undo redo | blocks | bold italic underline strikethrough | alignleft aligncenter alignright | bullist numlist | link image | code',
        content_style: 'body { font-family: DM Sans, sans-serif; font-size: 15px; line-height: 1.7; }'
    });
</script>
@endpush
