@php $testimonial = $testimonial ?? null; @endphp

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
            <label class="block text-sm font-semibold text-gray-700 mb-1">Client Name *</label>
            <input type="text" name="client_name" value="{{ old('client_name', $testimonial->client_name ?? '') }}" required class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Company</label>
            <input type="text" name="company" value="{{ old('company', $testimonial->company ?? '') }}" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
        </div>
    </div>
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Message *</label>
        <textarea name="message" rows="4" required class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">{{ old('message', $testimonial->message ?? '') }}</textarea>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Rating *</label>
            <select name="rating" required class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
                @for($i = 5; $i >= 1; $i--)
                <option value="{{ $i }}" {{ old('rating', $testimonial->rating ?? 5) == $i ? 'selected' : '' }}>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                @endfor
            </select>
        </div>
        <div class="flex items-center pt-6">
            <label class="flex items-center space-x-2 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $testimonial->is_active ?? true) ? 'checked' : '' }} class="w-5 h-5 text-sky-500 border-gray-300 rounded focus:ring-sky-500">
                <span class="text-sm font-semibold text-gray-700">Active</span>
            </label>
        </div>
    </div>
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Avatar Photo</label>
        @if($testimonial && $testimonial->avatar_path)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $testimonial->avatar_path) }}" alt="" class="w-16 h-16 rounded-full object-cover border">
        </div>
        @endif
        <input type="file" name="avatar" accept="image/*" class="w-full border border-gray-300 px-4 py-2 text-sm focus:border-sky-500 focus:outline-none">
        <p class="text-xs text-gray-400 mt-1">Square image recommended. Max 2MB.</p>
    </div>
</div>