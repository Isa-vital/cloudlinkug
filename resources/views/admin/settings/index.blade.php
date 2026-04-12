@extends('layouts.admin')

@section('page_title', 'Site Settings')

@section('content')

<form action="{{ route('admin.settings.update') }}" method="POST">
    @csrf

    <div class="space-y-8">
        {{-- General Settings --}}
        <div class="bg-white shadow-sm p-6">
            <h3 class="text-lg font-heading font-bold text-gray-900 uppercase mb-4 pb-2 border-b">General Settings</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Site Name</label>
                    <input type="text" name="site_name" value="{{ $settings['site_name'] ?? '' }}" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Tagline</label>
                    <input type="text" name="tagline" value="{{ $settings['tagline'] ?? '' }}" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
                </div>
            </div>
        </div>

        {{-- Contact Info --}}
        <div class="bg-white shadow-sm p-6">
            <h3 class="text-lg font-heading font-bold text-gray-900 uppercase mb-4 pb-2 border-b">Contact Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Phone Number 1</label>
                    <input type="text" name="phone" value="{{ $settings['phone'] ?? '' }}" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Phone Number 2</label>
                    <input type="text" name="phone2" value="{{ $settings['phone2'] ?? '' }}" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Email Address</label>
                    <input type="email" name="email" value="{{ $settings['email'] ?? '' }}" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">WhatsApp Number (e.g., 256776121422)</label>
                    <input type="text" name="whatsapp" value="{{ $settings['whatsapp'] ?? '' }}" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Address</label>
                    <input type="text" name="address" value="{{ $settings['address'] ?? '' }}" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
                </div>
            </div>
        </div>

        {{-- Social Media --}}
        <div class="bg-white shadow-sm p-6">
            <h3 class="text-lg font-heading font-bold text-gray-900 uppercase mb-4 pb-2 border-b">Social Media Links</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1"><i class="fab fa-facebook text-blue-600 mr-1"></i>Facebook URL</label>
                    <input type="url" name="facebook" value="{{ $settings['facebook'] ?? '' }}" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1"><i class="fab fa-twitter text-blue-400 mr-1"></i>Twitter URL</label>
                    <input type="url" name="twitter" value="{{ $settings['twitter'] ?? '' }}" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1"><i class="fab fa-instagram text-pink-500 mr-1"></i>Instagram URL</label>
                    <input type="url" name="instagram" value="{{ $settings['instagram'] ?? '' }}" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1"><i class="fab fa-linkedin text-blue-700 mr-1"></i>LinkedIn URL</label>
                    <input type="url" name="linkedin" value="{{ $settings['linkedin'] ?? '' }}" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1"><i class="fab fa-youtube text-red-600 mr-1"></i>YouTube URL</label>
                    <input type="url" name="youtube" value="{{ $settings['youtube'] ?? '' }}" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">
                </div>
            </div>
        </div>

        {{-- Content --}}
        <div class="bg-white shadow-sm p-6">
            <h3 class="text-lg font-heading font-bold text-gray-900 uppercase mb-4 pb-2 border-b">Content</h3>
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">About Text</label>
                    <textarea name="about_text" rows="4" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">{{ $settings['about_text'] ?? '' }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Footer Text</label>
                    <textarea name="footer_text" rows="3" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none">{{ $settings['footer_text'] ?? '' }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Google Maps Embed Code</label>
                    <textarea name="google_maps_embed" rows="3" class="w-full border border-gray-300 px-4 py-2.5 focus:border-sky-500 focus:outline-none font-mono text-xs">{{ $settings['google_maps_embed'] ?? '' }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6">
        <button type="submit" class="bg-sky-500 hover:bg-sky-600 text-white font-bold px-8 py-3 text-sm uppercase tracking-wide transition">
            <i class="fas fa-save mr-2"></i>Save Settings
        </button>
    </div>
</form>

@endsection