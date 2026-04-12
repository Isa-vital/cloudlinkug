@php $project = $project ?? null; @endphp

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
            <input type="text" name="title" value="{{ old('title', $project->title ?? '') }}" required class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Slug</label>
            <input type="text" name="slug" value="{{ old('slug', $project->slug ?? '') }}" placeholder="Auto-generated from title" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Category</label>
            <input type="text" name="category" value="{{ old('category', $project->category ?? '') }}" placeholder="e.g. Networking, CCTV, Web Development" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Client</label>
            <input type="text" name="client" value="{{ old('client', $project->client ?? '') }}" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
        </div>
    </div>
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
        <textarea name="description" rows="5" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">{{ old('description', $project->description ?? '') }}</textarea>
    </div>
    <div class="flex items-center">
        <label class="flex items-center space-x-2 cursor-pointer">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $project->is_active ?? true) ? 'checked' : '' }} class="w-5 h-5 text-sky-500 border-gray-300 rounded focus:ring-sky-500">
            <span class="text-sm font-semibold text-gray-700">Active</span>
        </label>
    </div>
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Project Image</label>
        @if($project && $project->image_path)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $project->image_path) }}" alt="" class="w-40 h-28 object-cover border">
        </div>
        @endif
        <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 px-4 py-2 text-sm focus:border-sky-500 focus:outline-none">
        <p class="text-xs text-gray-400 mt-1">Recommended: 800x600px. Max 5MB.</p>
    </div>
</div>