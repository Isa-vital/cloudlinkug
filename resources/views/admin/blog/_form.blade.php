@php $post = $post ?? null; @endphp

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
            <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}" required class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Slug</label>
            <input type="text" name="slug" value="{{ old('slug', $post->slug ?? '') }}" placeholder="Auto-generated from title" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
        </div>
    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Excerpt</label>
        <textarea name="excerpt" rows="2" maxlength="500" placeholder="Brief summary shown on blog listing..." class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Body</label>
        <textarea id="body-editor" name="body" rows="14" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">{{ old('body', $post->body ?? '') }}</textarea>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Category</label>
            <input type="text" name="category" value="{{ old('category', $post->category ?? '') }}" placeholder="e.g. Technology, Security, Tips" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Author</label>
            <input type="text" name="author" value="{{ old('author', $post->author ?? 'Cloudlink Team') }}" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Publish Date</label>
            <input type="datetime-local" name="published_at" value="{{ old('published_at', $post && $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
            <p class="text-xs text-gray-400 mt-1">Leave empty to publish immediately when toggled on.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Featured Image</label>
            @if($post && $post->featured_image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="" class="w-40 h-28 object-cover border">
                </div>
            @endif
            <input type="file" name="featured_image" accept="image/*" class="w-full border border-gray-300 px-4 py-2 text-sm focus:border-sky-500 focus:outline-none">
            <p class="text-xs text-gray-400 mt-1">Recommended: 1200x630px. Max 5MB.</p>
        </div>
        <div class="flex items-center pt-6">
            <label class="flex items-center space-x-2 cursor-pointer">
                <input type="checkbox" name="is_published" value="1" {{ old('is_published', $post->is_published ?? false) ? 'checked' : '' }} class="w-5 h-5 text-sky-500 border-gray-300 rounded focus:ring-sky-500">
                <span class="text-sm font-semibold text-gray-700">Published</span>
            </label>
        </div>
    </div>
</div>
