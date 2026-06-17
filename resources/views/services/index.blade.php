@extends('layouts.public')

@section('title', 'Our Services — ' . ($siteSetting['site_name'] ?? 'Cloudlink IT Services'))
@section('meta_description', 'Explore our comprehensive range of IT services including consulting, cybersecurity, software development, EFRIS solutions, solar installations, and more in Uganda.')
@section('og_type', 'website')
@section('meta_keywords', 'IT services, IT consulting Uganda, cybersecurity, software development, EFRIS solutions, solar installation, smart security, networking, cloud computing')

@push('schema')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'ItemList',
    'name' => 'IT Services by Cloudlink',
    'url' => route('services.index'),
    'numberOfItems' => $services->count(),
    'itemListElement' => $services->values()->map(fn($svc, $idx) => [
        '@type' => 'ListItem',
        'position' => $idx + 1,
        'item' => [
            '@type' => 'Service',
            'name' => $svc->title,
            'url' => route('services.show', $svc->slug),
            'description' => Str::limit(strip_tags($svc->description), 120),
        ],
    ])->all(),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')

{{-- Page Header --}}
<section class="relative h-72 md:h-96">
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=1920&h=500&fit=crop')"></div>
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>
    <div class="relative z-10 flex items-center justify-center h-full">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-heading font-extrabold text-white uppercase">Our Services</h1>
            <div class="w-16 h-1 bg-yellow-500 mx-auto mt-4"></div>
        </div>
    </div>
</section>

{{-- Services List — Alternating Layout --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @foreach($services as $index => $service)
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center {{ !$loop->last ? 'mb-16 pb-16 border-b border-gray-100' : '' }}">
            {{-- Image --}}
            <div class="{{ $index % 2 === 1 ? 'lg:order-2' : '' }}">
                <img src="{{ $service->image_path ? asset('storage/' . $service->image_path) : ($serviceImages[$service->slug] ?? $defaultTechImage) }}" alt="{{ $service->title }}" class="w-full h-80 object-cover">
            </div>
            {{-- Text --}}
            <div class="{{ $index % 2 === 1 ? 'lg:order-1' : '' }}">
                <div class="flex items-center space-x-3 mb-3">
                    <div class="w-10 h-10 bg-sky-500 text-white flex items-center justify-center">
                        <i class="{{ $service->icon_class ?? 'fas fa-cog' }}"></i>
                    </div>
                    <h2 class="text-2xl font-heading font-extrabold text-gray-900 uppercase">{{ $service->title }}</h2>
                </div>
                <div class="w-12 h-1 bg-yellow-500 mb-4"></div>
                {{-- Original: {{ $service->description }} — strip HTML tags from stored description --}}
                <p class="text-gray-600 leading-relaxed mb-6">{{ Str::limit(strip_tags($service->description), 200) }}</p>
                <a href="/services/{{ $service->slug }}" class="inline-block bg-sky-500 hover:bg-sky-600 text-white font-bold px-6 py-2 text-sm uppercase tracking-wide transition">Learn More</a>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-sky-500 py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-heading font-extrabold text-white uppercase mb-4">Need a Custom Solution?</h2>
        <p class="text-white text-lg mb-8">Contact us to discuss your specific requirements and get a tailored proposal.</p>
        <a href="/contact" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold px-10 py-4 text-lg uppercase tracking-wide transition">Get a Quote</a>
    </div>
</section>

@endsection