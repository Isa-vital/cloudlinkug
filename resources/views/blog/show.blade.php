@extends('layouts.public')

@section('title', $post->title . ' — Blog — ' . ($siteSetting['site_name'] ?? 'Cloudlink IT Services'))
@section('meta_description', Str::limit($post->excerpt ?? strip_tags($post->body), 160))
@section('og_type', 'article')
@section('og_image', $post->featured_image ? asset('storage/' . $post->featured_image) : ($defaultTechImage ?? asset('images/og-default.jpg')))
@section('canonical', route('blog.show', $post->slug))

@push('schema')
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "headline": "{{ $post->title }}",
        "url": "{{ route('blog.show', $post->slug) }}",
        "description": "{{ Str::limit($post->excerpt ?? strip_tags($post->body), 200) }}",
        "image": "{{ $post->featured_image ? asset('storage/' . $post->featured_image) : ($defaultTechImage ?? '') }}",
        "datePublished": "{{ $post->published_at?->toIso8601String() }}",
        "dateModified": "{{ $post->updated_at->toIso8601String() }}",
        "author": {
            "@type": "Person",
            "name": "{{ $post->author }}"
        },
        "publisher": {
            "@type": "Organization",
            "name": "{{ $siteSetting['site_name'] ?? 'Cloudlink IT Services' }}",
            "url": "{{ config('app.url') }}",
            "logo": {
                "@type": "ImageObject",
                "url": "{{ asset('images/og-default.jpg') }}"
            }
        },
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{ route('blog.show', $post->slug) }}"
        },
        "articleSection": "{{ $post->category ?? 'Technology' }}",
        "wordCount": {
            {
                str_word_count(strip_tags($post - > body ?? ''))
            }
        }
    }
</script>
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
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
                "name": "Blog",
                "item": "{{ route('blog.index') }}"
            },
            {
                "@type": "ListItem",
                "position": 3,
                "name": "{{ $post->title }}",
                "item": "{{ route('blog.show', $post->slug) }}"
            }
        ]
    }
</script>
@endpush

@section('content')

{{-- Post Header --}}
<section class="relative h-72 md:h-96">
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ $post->featured_image ? asset('storage/' . $post->featured_image) : ($defaultTechImage ?? 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=1920&h=600&fit=crop') }}')"></div>
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>
    <div class="relative z-10 flex items-center justify-center h-full">
        <div class="text-center px-4 max-w-3xl">
            @if($post->category)
            <span class="inline-block bg-yellow-500 text-gray-900 text-xs font-bold uppercase tracking-wide px-3 py-1 mb-4">{{ $post->category }}</span>
            @endif
            <h1 class="text-3xl md:text-5xl font-heading font-extrabold text-white uppercase leading-tight">{{ $post->title }}</h1>
            <div class="flex items-center justify-center space-x-4 mt-4 text-gray-300 text-sm">
                <span><i class="far fa-user mr-1"></i>{{ $post->author }}</span>
                <span><i class="far fa-calendar-alt mr-1"></i>{{ $post->published_at->format('F d, Y') }}</span>
                <span><i class="far fa-clock mr-1"></i>{{ $post->read_time }} min read</span>
            </div>
        </div>
    </div>
</section>

{{-- Post Content --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            {{-- Main Article --}}
            <article class="lg:col-span-2">
                @if($post->excerpt)
                <p class="text-lg text-gray-600 italic border-l-4 border-yellow-500 pl-4 mb-8">{{ $post->excerpt }}</p>
                @endif

                <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed
                    [&_h2]:text-2xl [&_h2]:font-heading [&_h2]:font-extrabold [&_h2]:text-gray-900 [&_h2]:uppercase [&_h2]:mb-4 [&_h2]:mt-10
                    [&_h3]:text-xl [&_h3]:font-heading [&_h3]:font-bold [&_h3]:text-gray-900 [&_h3]:uppercase [&_h3]:mb-3 [&_h3]:mt-8
                    [&_ul]:space-y-2 [&_li]:text-gray-600
                    [&_strong]:text-gray-900
                    [&_a]:text-sky-500 [&_a]:underline
                    [&_img]:w-full [&_img]:my-6
                    [&_blockquote]:border-l-4 [&_blockquote]:border-yellow-500 [&_blockquote]:pl-4 [&_blockquote]:italic [&_blockquote]:text-gray-500">
                    {!! $post->body !!}
                </div>

                {{-- Share Buttons --}}
                <div class="border-t border-gray-200 mt-10 pt-6">
                    <p class="text-sm font-semibold text-gray-700 uppercase mb-3">Share this article</p>
                    <div class="flex space-x-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" rel="noopener" class="w-10 h-10 bg-blue-600 text-white flex items-center justify-center hover:opacity-80 transition"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" target="_blank" rel="noopener" class="w-10 h-10 bg-sky-500 text-white flex items-center justify-center hover:opacity-80 transition"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($post->title) }}" target="_blank" rel="noopener" class="w-10 h-10 bg-blue-700 text-white flex items-center justify-center hover:opacity-80 transition"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->url()) }}" target="_blank" rel="noopener" class="w-10 h-10 bg-green-500 text-white flex items-center justify-center hover:opacity-80 transition"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>

                {{-- Back link --}}
                <div class="mt-8">
                    <a href="{{ route('blog.index') }}" class="text-sky-500 hover:text-sky-600 font-semibold text-sm uppercase tracking-wide"><i class="fas fa-arrow-left mr-2"></i>Back to Blog</a>
                </div>
            </article>

            {{-- Sidebar --}}
            <aside>
                {{-- Recent Posts --}}
                @if($recent->count() > 0)
                <div class="bg-gray-50 p-6 mb-8">
                    <h3 class="text-lg font-heading font-bold text-gray-900 uppercase mb-4">Recent Posts</h3>
                    <div class="space-y-4">
                        @foreach($recent as $r)
                        <a href="{{ route('blog.show', $r->slug) }}" class="flex items-start space-x-3 group">
                            <div class="w-16 h-16 flex-shrink-0 bg-cover bg-center" style="background-image: url('{{ $r->featured_image ? asset('storage/' . $r->featured_image) : ($defaultTechImage ?? '') }}')"></div>
                            <div>
                                <p class="text-sm font-medium text-gray-800 group-hover:text-sky-500 transition leading-tight">{{ Str::limit($r->title, 50) }}</p>
                                <p class="text-xs text-gray-400 mt-1">{{ $r->published_at->format('M d, Y') }}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Categories --}}
                @php
                $allCategories = \App\Models\BlogPost::published()->whereNotNull('category')->distinct()->pluck('category');
                @endphp
                @if($allCategories->count() > 0)
                <div class="bg-gray-50 p-6 mb-8">
                    <h3 class="text-lg font-heading font-bold text-gray-900 uppercase mb-4">Categories</h3>
                    <div class="space-y-2">
                        @foreach($allCategories as $cat)
                        <a href="{{ route('blog.category', $cat) }}" class="flex items-center space-x-2 text-sm text-gray-700 hover:text-sky-500 transition">
                            <i class="fas fa-chevron-right text-xs text-yellow-500"></i>
                            <span>{{ $cat }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- CTA Card --}}
                <div class="bg-sky-500 p-6 text-center">
                    <i class="fas fa-headset text-4xl text-white mb-3"></i>
                    <h3 class="text-lg font-heading font-bold text-white uppercase mb-2">Need IT Help?</h3>
                    <p class="text-white text-sm mb-4">Our team is ready to assist you.</p>
                    <p class="text-white font-bold">{{ $siteSetting['phone'] ?? '' }}</p>
                    <a href="/contact" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold px-6 py-2 text-sm uppercase tracking-wide mt-4 transition">Contact Us</a>
                </div>
            </aside>
        </div>
    </div>
</section>

{{-- Related Posts --}}
@if($related->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-heading font-extrabold text-gray-900 uppercase mb-8 text-center">Related Articles</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($related as $rel)
            <article class="bg-white shadow-sm hover:shadow-md transition group">
                <a href="{{ route('blog.show', $rel->slug) }}">
                    <div class="h-48 bg-cover bg-center" style="background-image: url('{{ $rel->featured_image ? asset('storage/' . $rel->featured_image) : ($defaultTechImage ?? '') }}')"></div>
                </a>
                <div class="p-5">
                    <p class="text-xs text-gray-400 mb-2"><i class="far fa-calendar-alt mr-1"></i>{{ $rel->published_at->format('M d, Y') }}</p>
                    <h3 class="text-lg font-heading font-bold text-gray-900 uppercase group-hover:text-sky-500 transition">
                        <a href="{{ route('blog.show', $rel->slug) }}">{{ $rel->title }}</a>
                    </h3>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection