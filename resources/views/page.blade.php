@extends('layouts.public')

@section('title', $page->title . ' — ' . ($siteSetting['site_name'] ?? 'Cloudlink IT Services'))
@section('meta_description', $page->meta_description ?? Str::limit(strip_tags($page->content), 160))
@section('og_type', 'article')
@section('canonical', route('page.show', $page->slug))

@push('schema')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'WebPage',
    'name' => $page->title,
    'url' => route('page.show', $page->slug),
    'description' => $page->meta_description ?? Str::limit(strip_tags($page->content), 200),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')

{{-- Page Header --}}
<section class="relative h-64 md:h-80">
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=1920&h=500&fit=crop')"></div>
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>
    <div class="relative z-10 flex items-center justify-center h-full">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-heading font-extrabold text-white uppercase">{{ $page->title }}</h1>
        </div>
    </div>
</section>

{{-- Page Content --}}
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed
            [&_h2]:text-2xl [&_h2]:font-heading [&_h2]:font-extrabold [&_h2]:text-gray-900 [&_h2]:uppercase [&_h2]:mb-4 [&_h2]:mt-10
            [&_h3]:text-xl [&_h3]:font-heading [&_h3]:font-bold [&_h3]:text-gray-900 [&_h3]:uppercase [&_h3]:mb-3 [&_h3]:mt-8
            [&_ul]:space-y-2 [&_li]:text-gray-600
            [&_strong]:text-gray-900">
            {!! $page->content !!}
        </div>
    </div>
</section>

@endsection