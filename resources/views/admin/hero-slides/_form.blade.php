@php $slide = $slide ?? null; @endphp

@if($errors->any())
<div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 mb-6">
    <ul class="list-disc list-inside space-y-1">
        @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
    </ul>
</div>
@endif

<div class="bg-white shadow-sm p-6 space-y-6">
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Heading *</label>
        <input type="text" name="heading" value="{{ old('heading', $slide->heading ?? '') }}" required class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
    </div>
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Subheading</label>
        <input type="text" name="subheading" value="{{ old('subheading', $slide->subheading ?? '') }}" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Button Text</label>
            <input type="text" name="button_text" value="{{ old('button_text', $slide->button_text ?? '') }}" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Button URL</label>
            <input type="text" name="button_url" value="{{ old('button_url', $slide->button_url ?? '') }}" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Display Order</label>
            <input type="number" name="display_order" value="{{ old('display_order', $slide->display_order ?? 0) }}" min="0" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
        </div>
        <div class="flex items-center pt-6">
            <label class="flex items-center space-x-2 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $slide->is_active ?? true) ? 'checked' : '' }} class="w-5 h-5 text-sky-500 border-gray-300 rounded focus:ring-sky-500">
                <span class="text-sm font-semibold text-gray-700">Active</span>
            </label>
        </div>
    </div>
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Background Image</label>
        @if($slide && $slide->image_path)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $slide->image_path) }}" alt="" class="w-40 h-24 object-cover border">
        </div>
        @endif
        <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 px-4 py-2 text-sm focus:border-sky-500 focus:outline-none">
        <p class="text-xs text-gray-400 mt-1">Recommended: 1920x700px. Max 5MB.</p>
    </div>
</div>