@extends('layouts.public')

@section('title', 'Contact Us — ' . ($siteSetting['site_name'] ?? 'Cloudlink IT Services'))
@section('meta_description', 'Get in touch with Cloudlink IT Services for a free IT consultation. Call {{ $siteSetting["phone"] ?? "+256 776 121 422" }} or visit us in Kampala, Uganda.')
@section('og_type', 'website')
@section('meta_keywords', 'contact Cloudlink, IT consultation Uganda, IT support Kampala, get a quote, Cloudlink phone number')

@push('schema')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "ContactPage",
    "name": "Contact Cloudlink IT Services",
    "url": "{{ route('contact.index') }}",
    "description": "Get in touch with Cloudlink IT Services for a free consultation.",
    "mainEntity": {
        "@type": "LocalBusiness",
        "name": "{{ $siteSetting['site_name'] ?? 'Cloudlink IT Services' }}",
        "telephone": "{{ $siteSetting['phone'] ?? '' }}",
        "email": "{{ $siteSetting['email'] ?? '' }}",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "{{ $siteSetting['address'] ?? '' }}",
            "addressLocality": "Kampala",
            "addressCountry": "UG"
        },
        "openingHoursSpecification": {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
            "opens": "08:00",
            "closes": "18:00"
        }
    }
}
</script>
@endpush

@section('content')

{{-- Page Header --}}
<section class="relative h-72 md:h-96">
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1423666639041-f56000c27a9a?w=1920&h=500&fit=crop')"></div>
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>
    <div class="relative z-10 flex items-center justify-center h-full">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-heading font-extrabold text-white uppercase">Contact Us</h1>
            <div class="w-16 h-1 bg-yellow-500 mx-auto mt-4"></div>
        </div>
    </div>
</section>

{{-- Contact Content --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            {{-- Contact Form --}}
            <div class="lg:col-span-2">
                <h2 class="text-2xl font-heading font-extrabold text-gray-900 uppercase mb-2">Send Us a Message</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-6"></div>

                @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 mb-6">
                    <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 mb-6">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Full Name *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full border border-gray-300 px-4 py-3 focus:border-sky-500 focus:outline-none transition">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email Address *</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full border border-gray-300 px-4 py-3 focus:border-sky-500 focus:outline-none transition">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-sm font-semibold text-gray-700 mb-1">Phone Number</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="w-full border border-gray-300 px-4 py-3 focus:border-sky-500 focus:outline-none transition">
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-semibold text-gray-700 mb-1">Subject *</label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required class="w-full border border-gray-300 px-4 py-3 focus:border-sky-500 focus:outline-none transition">
                        </div>
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-semibold text-gray-700 mb-1">Message *</label>
                        <textarea id="message" name="message" rows="6" required class="w-full border border-gray-300 px-4 py-3 focus:border-sky-500 focus:outline-none transition">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold px-10 py-3 text-sm uppercase tracking-wide transition">
                        <i class="fas fa-paper-plane mr-2"></i>Send Message
                    </button>
                </form>
            </div>

            {{-- Contact Info Sidebar --}}
            <div>
                <div class="bg-gray-900 p-8 text-white mb-8">
                    <h3 class="text-lg font-heading font-bold uppercase mb-6">Get in Touch</h3>
                    <div class="space-y-5">
                        @if(!empty($siteSetting['address']))
                        <div class="flex items-start space-x-3">
                            <div class="w-10 h-10 bg-yellow-500 text-gray-900 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-sm">Address</p>
                                <p class="text-gray-300 text-sm">{{ $siteSetting['address'] }}</p>
                            </div>
                        </div>
                        @endif
                        @if(!empty($siteSetting['phone']))
                        <div class="flex items-start space-x-3">
                            <div class="w-10 h-10 bg-yellow-500 text-gray-900 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-sm">Phone</p>
                                <p class="text-gray-300 text-sm">{{ $siteSetting['phone'] }}</p>
                                @if(!empty($siteSetting['phone2']))
                                <p class="text-gray-300 text-sm">{{ $siteSetting['phone2'] }}</p>
                                @endif
                            </div>
                        </div>
                        @endif
                        @if(!empty($siteSetting['email']))
                        <div class="flex items-start space-x-3">
                            <div class="w-10 h-10 bg-yellow-500 text-gray-900 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-sm">Email</p>
                                <p class="text-gray-300 text-sm">{{ $siteSetting['email'] }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                {{-- Social Links --}}
                <div class="bg-sky-500 p-6 text-center">
                    <h3 class="text-lg font-heading font-bold text-white uppercase mb-4">Follow Us</h3>
                    <div class="flex justify-center space-x-3">
                        @if(!empty($siteSetting['facebook']))
                        <a href="{{ $siteSetting['facebook'] }}" target="_blank" class="w-10 h-10 bg-white text-sky-500 flex items-center justify-center hover:bg-yellow-500 hover:text-gray-900 transition"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if(!empty($siteSetting['twitter']))
                        <a href="{{ $siteSetting['twitter'] }}" target="_blank" class="w-10 h-10 bg-white text-sky-500 flex items-center justify-center hover:bg-yellow-500 hover:text-gray-900 transition"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if(!empty($siteSetting['instagram']))
                        <a href="{{ $siteSetting['instagram'] }}" target="_blank" class="w-10 h-10 bg-white text-sky-500 flex items-center justify-center hover:bg-yellow-500 hover:text-gray-900 transition"><i class="fab fa-instagram"></i></a>
                        @endif
                        @if(!empty($siteSetting['linkedin']))
                        <a href="{{ $siteSetting['linkedin'] }}" target="_blank" class="w-10 h-10 bg-white text-sky-500 flex items-center justify-center hover:bg-yellow-500 hover:text-gray-900 transition"><i class="fab fa-linkedin-in"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Google Maps --}}
        @if(!empty($siteSetting['google_maps_embed']))
        <div class="mt-12">
            {!! $siteSetting['google_maps_embed'] !!}
        </div>
        @endif
    </div>
</section>

@endsection