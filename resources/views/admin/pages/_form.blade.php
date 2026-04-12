@php $page = $page ?? null; @endphp

@if($errors->any())
<div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 mb-6">
    <ul class="list-disc list-inside space-y-1">
        @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
    </ul>
</div>
@endif

<div class="bg-white shadow-sm p-6 space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Title *</label>
            <input type="text" name="title" value="{{ old('title', $page->title ?? '') }}" required class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Slug</label>
            <input type="text" name="slug" value="{{ old('slug', $page->slug ?? '') }}" placeholder="Auto-generated from title" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
        </div>
    </div>
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Content</label>
        <textarea id="content-editor" name="content" rows="12" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">{{ old('content', $page->content ?? '') }}</textarea>
    </div>
    <div class="flex items-center">
        <label class="flex items-center space-x-2 cursor-pointer">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $page->is_active ?? true) ? 'checked' : '' }} class="w-5 h-5 text-sky-500 border-gray-300 rounded focus:ring-sky-500">
            <span class="text-sm font-semibold text-gray-700">Published</span>
        </label>
    </div>
</div>