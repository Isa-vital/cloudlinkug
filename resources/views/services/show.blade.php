@extends('layouts.public')

@section('title', $service->title . ' — ' . ($siteSetting['site_name'] ?? 'Cloudlink IT Services'))
@section('meta_description', Str::limit($service->description, 160))
@section('og_type', 'website')
@section('og_image', $service->image_path ? asset('storage/' . $service->image_path) : ($serviceImages[$service->slug] ?? $defaultTechImage))
@section('canonical', route('services.show', $service->slug))

@push('schema')
<script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@type": "Service",
        "name": "{{ $service->title }}",
        "url": "{{ route('services.show', $service->slug) }}",
        "description": "{{ Str::limit($service->description, 250) }}",
        "provider": {
            "@type": "LocalBusiness",
            "name": "{{ $siteSetting['site_name'] ?? 'Cloudlink IT Services' }}",
            "url": "{{ config('app.url') }}",
            "telephone": "{{ $siteSetting['phone'] ?? '' }}",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "{{ $siteSetting['address'] ?? '' }}",
                "addressLocality": "Kampala",
                "addressCountry": "UG"
            }
        },
        "areaServed": {
            "@type": "Country",
            "name": "Uganda"
        }
    }
</script>
<script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "{{ config('app.url') }}"
            },
            {
                "@type": "ListItem",
                "position": 2,
                "name": "Services",
                "item": "{{ route('services.index') }}"
            },
            {
                "@type": "ListItem",
                "position": 3,
                "name": "{{ $service->title }}",
                "item": "{{ route('services.show', $service->slug) }}"
            }
        ]
    }
</script>
@endpush

@section('content')

{{-- Service Header --}}
<section class="relative h-72 md:h-96">
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ $service->image_path ? asset('storage/' . $service->image_path) : ($serviceImages[$service->slug] ?? $defaultTechImage) }}')"></div>
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>
    <div class="relative z-10 flex items-center justify-center h-full">
        <div class="text-center px-4">
            <div class="w-16 h-16 bg-yellow-500 text-gray-900 flex items-center justify-center mx-auto mb-4">
                <i class="{{ $service->icon_class ?? 'fas fa-cog' }} text-2xl"></i>
            </div>
            <h1 class="text-3xl md:text-5xl font-heading font-extrabold text-white uppercase">{{ $service->title }}</h1>
        </div>
    </div>
</section>

{{-- Service Content --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            {{-- Main Content --}}
            <div class="lg:col-span-2">
                <img src="{{ $service->image_path ? asset('storage/' . $service->image_path) : ($serviceImages[$service->slug] ?? $defaultTechImage) }}" alt="{{ $service->title }}" class="w-full h-96 object-cover mb-8">

                <h2 class="text-2xl font-heading font-extrabold text-gray-900 uppercase mb-4">Overview</h2>
                <div class="w-12 h-1 bg-yellow-500 mb-6"></div>
                <p class="text-gray-600 leading-relaxed mb-8">{{ $service->description }}</p>

                <h3 class="text-xl font-heading font-bold text-gray-900 uppercase mb-4">Key Benefits</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                    <div class="flex items-start space-x-3">
                        <div class="w-6 h-6 bg-yellow-500 text-gray-900 flex items-center justify-center flex-shrink-0 mt-0.5"><i class="fas fa-check text-xs"></i></div>
                        <span class="text-gray-600">Expert consultation and needs assessment</span>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-6 h-6 bg-yellow-500 text-gray-900 flex items-center justify-center flex-shrink-0 mt-0.5"><i class="fas fa-check text-xs"></i></div>
                        <span class="text-gray-600">Tailored solutions for your business</span>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-6 h-6 bg-yellow-500 text-gray-900 flex items-center justify-center flex-shrink-0 mt-0.5"><i class="fas fa-check text-xs"></i></div>
                        <span class="text-gray-600">Professional installation and setup</span>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-6 h-6 bg-yellow-500 text-gray-900 flex items-center justify-center flex-shrink-0 mt-0.5"><i class="fas fa-check text-xs"></i></div>
                        <span class="text-gray-600">Ongoing support and maintenance</span>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-6 h-6 bg-yellow-500 text-gray-900 flex items-center justify-center flex-shrink-0 mt-0.5"><i class="fas fa-check text-xs"></i></div>
                        <span class="text-gray-600">Competitive pricing</span>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-6 h-6 bg-yellow-500 text-gray-900 flex items-center justify-center flex-shrink-0 mt-0.5"><i class="fas fa-check text-xs"></i></div>
                        <span class="text-gray-600">24/7 technical support available</span>
                    </div>
                </div>

                {{-- CTA --}}
                <div class="bg-gray-50 p-8">
                    <h3 class="text-xl font-heading font-bold text-gray-900 uppercase mb-2">Interested in this service?</h3>
                    <p class="text-gray-600 mb-4">Contact us today for a free consultation and personalized quote.</p>
                    <a href="/contact" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold px-8 py-3 text-sm uppercase tracking-wide transition">Request a Quote</a>
                </div>
            </div>

            {{-- Sidebar — Related Services --}}
            <div>
                <div class="bg-gray-50 p-6 mb-8">
                    <h3 class="text-lg font-heading font-bold text-gray-900 uppercase mb-4">Other Services</h3>
                    <div class="space-y-3">
                        @foreach($relatedServices as $related)
                        <a href="/services/{{ $related->slug }}" class="flex items-center space-x-3 p-3 hover:bg-white transition group">
                            <div class="w-8 h-8 bg-sky-500 text-white flex items-center justify-center flex-shrink-0">
                                <i class="{{ $related->icon_class ?? 'fas fa-cog' }} text-xs"></i>
                            </div>
                            <span class="text-gray-700 group-hover:text-sky-500 text-sm font-medium transition">{{ $related->title }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>

                <div class="bg-sky-500 p-6 text-center">
                    <i class="fas fa-headset text-4xl text-white mb-3"></i>
                    <h3 class="text-lg font-heading font-bold text-white uppercase mb-2">Need Help?</h3>
                    <p class="text-white text-sm mb-4">Our team is ready to assist you.</p>
                    <p class="text-white font-bold">{{ $siteSetting['phone'] ?? '' }}</p>
                    <a href="/contact" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold px-6 py-2 text-sm uppercase tracking-wide mt-4 transition">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection