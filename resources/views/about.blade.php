@extends('layouts.public')

@section('title', 'About Us — ' . ($siteSetting['site_name'] ?? 'Cloudlink IT Services'))
@section('meta_description', $page->meta_description ?? 'Learn about Cloudlink IT Services — a leading technology company in Uganda providing end-to-end IT solutions for businesses of all sizes.')
@section('og_type', 'website')
@section('meta_keywords', 'about Cloudlink IT, IT company Uganda, technology company Kampala, IT solutions provider, Uganda IT team')

@push('schema')
<script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@type": "AboutPage",
        "name": "About Cloudlink IT Services",
        "url": "{{ route('about') }}",
        "description": "{{ $page->meta_description ?? 'Learn about Cloudlink IT Services' }}",
        "mainEntity": {
            "@type": "Organization",
            "name": "{{ $siteSetting['site_name'] ?? 'Cloudlink IT Services' }}",
            "url": "{{ config('app.url') }}",
            "foundingDate": "2015",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "{{ $siteSetting['address'] ?? '' }}",
                "addressLocality": "Kampala",
                "addressCountry": "UG"
            }
        }
    }
</script>
@endpush

@section('content')

{{-- Page Header Banner --}}
<section class="relative h-72 md:h-96">
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1920&h=500&fit=crop')"></div>
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>
    <div class="relative z-10 flex items-center justify-center h-full">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-heading font-extrabold text-white uppercase">About Us</h1>
            <div class="w-16 h-1 bg-yellow-500 mx-auto mt-4"></div>
        </div>
    </div>
</section>

{{-- Company Story & Mission --}}
<section class="py-20 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($page && $page->content)
        <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed
                [&_h2]:text-2xl [&_h2]:font-heading [&_h2]:font-extrabold [&_h2]:text-gray-900 [&_h2]:uppercase [&_h2]:mb-4 [&_h2]:mt-10
                [&_h3]:text-xl [&_h3]:font-heading [&_h3]:font-bold [&_h3]:text-gray-900 [&_h3]:uppercase [&_h3]:mb-3 [&_h3]:mt-8
                [&_ul]:space-y-2 [&_li]:text-gray-600
                [&_strong]:text-gray-900">
            {!! $page->content !!}
        </div>
        @else
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-heading font-extrabold text-gray-900 uppercase mb-4">Our Story</h2>
                <div class="w-16 h-1 bg-yellow-500 mb-6"></div>
                <p class="text-gray-600 leading-relaxed">{{ $siteSetting['about_text'] ?? '' }}</p>
            </div>
            <div>
                <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=600&h=400&fit=crop" alt="Our Story" class="w-full h-auto">
            </div>
        </div>
        @endif
    </div>
</section>

{{-- Core Values --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <h2 class="text-3xl md:text-4xl font-heading font-extrabold text-gray-900 uppercase">Our Core Values</h2>
            <div class="w-16 h-1 bg-yellow-500 mx-auto mt-3"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @php
            $values = [
            ['icon' => 'fas fa-lightbulb', 'title' => 'Innovation', 'desc' => 'Staying at the forefront of technology.'],
            ['icon' => 'fas fa-handshake', 'title' => 'Integrity', 'desc' => 'Trust through transparency.'],
            ['icon' => 'fas fa-trophy', 'title' => 'Excellence', 'desc' => 'Quality in everything we do.'],
            ['icon' => 'fas fa-users', 'title' => 'Partnership', 'desc' => 'True technology partners.'],
            ['icon' => 'fas fa-chart-line', 'title' => 'Impact', 'desc' => 'Measurable positive change.'],
            ];
            @endphp
            @foreach($values as $i => $value)
            <div class="text-center p-6 bg-white shadow-sm">
                <div class="w-14 h-14 {{ $i % 2 === 0 ? 'bg-yellow-500 text-gray-900' : 'bg-sky-500 text-white' }} flex items-center justify-center mx-auto mb-4">
                    <i class="{{ $value['icon'] }} text-xl"></i>
                </div>
                <h3 class="font-heading font-bold text-lg text-gray-900 uppercase mb-1">{{ $value['title'] }}</h3>
                <p class="text-gray-600 text-sm">{{ $value['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Team Members --}}
@if($team->count() > 0)
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <h2 class="text-3xl md:text-4xl font-heading font-extrabold text-gray-900 uppercase">Meet Our Team</h2>
            <div class="w-16 h-1 bg-yellow-500 mx-auto mt-3 mb-4"></div>
            <p class="text-gray-600 max-w-2xl mx-auto">The talented people behind Cloudlink IT Services.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($team as $member)
            <div class="text-center group">
                <div class="w-full h-72 bg-cover bg-center mb-4" style="background-image: url('{{ $member->photo_path ? asset('storage/' . $member->photo_path) : 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400&h=400&fit=crop&sig=' . $member->id }}')"></div>
                <h3 class="font-heading font-bold text-xl text-gray-900 uppercase">{{ $member->name }}</h3>
                <p class="text-sky-500 font-semibold text-sm uppercase tracking-wide mb-2">{{ $member->role }}</p>
                <p class="text-gray-600 text-sm px-4">{{ $member->bio }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- CTA --}}
<section class="bg-sky-500 py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-heading font-extrabold text-white uppercase mb-4">Let's Work Together</h2>
        <p class="text-white text-lg mb-8">Ready to start your next project? Get in touch with our team today.</p>
        <a href="/contact" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold px-10 py-4 text-lg uppercase tracking-wide transition">Contact Us</a>
    </div>
</section>

@endsection