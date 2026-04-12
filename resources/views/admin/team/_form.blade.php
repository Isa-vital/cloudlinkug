@php $member = $member ?? null; @endphp

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
            <label class="block text-sm font-semibold text-gray-700 mb-1">Full Name *</label>
            <input type="text" name="name" value="{{ old('name', $member->name ?? '') }}" required class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Role / Position</label>
            <input type="text" name="role" value="{{ old('role', $member->role ?? '') }}" placeholder="e.g. Lead Network Engineer" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
        </div>
    </div>
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Bio</label>
        <textarea name="bio" rows="4" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">{{ old('bio', $member->bio ?? '') }}</textarea>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Display Order</label>
            <input type="number" name="display_order" value="{{ old('display_order', $member->display_order ?? 0) }}" min="0" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
        </div>
        <div class="flex items-center pt-6">
            <label class="flex items-center space-x-2 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $member->is_active ?? true) ? 'checked' : '' }} class="w-5 h-5 text-sky-500 border-gray-300 rounded focus:ring-sky-500">
                <span class="text-sm font-semibold text-gray-700">Active</span>
            </label>
        </div>
    </div>
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Photo</label>
        @if($member && $member->photo_path)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $member->photo_path) }}" alt="" class="w-20 h-20 rounded-full object-cover border">
        </div>
        @endif
        <input type="file" name="photo" accept="image/*" class="w-full border border-gray-300 px-4 py-2 text-sm focus:border-sky-500 focus:outline-none">
        <p class="text-xs text-gray-400 mt-1">Square image recommended. Max 3MB.</p>
    </div>
</div>