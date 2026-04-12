@extends('layouts.public')

@section('title', 'Blog — ' . ($siteSetting['site_name'] ?? 'Cloudlink IT Services'))
@section('meta_description', 'Read the latest insights on IT solutions, technology trends, and digital transformation from Cloudlink IT Services.')

@section('content')

{{-- Page Header --}}
<section class="relative h-72 md:h-80">
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=1920&h=500&fit=crop')"></div>
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>
    <div class="relative z-10 flex items-center justify-center h-full">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-heading font-extrabold text-white uppercase">{{ isset($category) ? $category : 'Our Blog' }}</h1>
            <div class="w-16 h-1 bg-yellow-500 mx-auto mt-4"></div>
            <p class="text-gray-300 mt-3 max-w-xl mx-auto">Insights, tips, and news from the Cloudlink team</p>
        </div>
    </div>
</section>

{{-- Blog Grid --}}
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Category Filters --}}
        @if($categories->count() > 0)
        <div class="flex flex-wrap justify-center gap-3 mb-12">
            <a href="{{ route('blog.index') }}" class="px-5 py-2 text-sm font-bold uppercase tracking-wide transition {{ !isset($category) ? 'bg-sky-500 text-white' : 'bg-white text-gray-700 hover:bg-sky-500 hover:text-white' }}">All</a>
            @foreach($categories as $cat)
            <a href="{{ route('blog.category', $cat) }}" class="px-5 py-2 text-sm font-bold uppercase tracking-wide transition {{ (isset($category) && $category === $cat) ? 'bg-sky-500 text-white' : 'bg-white text-gray-700 hover:bg-sky-500 hover:text-white' }}">{{ $cat }}</a>
            @endforeach
        </div>
        @endif

        @if($posts->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
            <article class="bg-white shadow-sm hover:shadow-md transition group">
                <a href="{{ route('blog.show', $post->slug) }}">
                    <div class="h-52 bg-cover bg-center" style="background-image: url('{{ $post->featured_image ? asset('storage/' . $post->featured_image) : ($defaultTechImage ?? 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=800&h=500&fit=crop') }}')"></div>
                </a>
                <div class="p-6">
                    <div class="flex items-center space-x-3 text-xs text-gray-400 mb-3">
                        @if($post->category)
                        <span class="bg-sky-50 text-sky-600 font-semibold px-2 py-0.5 uppercase">{{ $post->category }}</span>
                        @endif
                        <span><i class="far fa-calendar-alt mr-1"></i>{{ $post->published_at->format('M d, Y') }}</span>
                        <span><i class="far fa-clock mr-1"></i>{{ $post->read_time }} min read</span>
                    </div>
                    <h2 class="text-xl font-heading font-bold text-gray-900 uppercase mb-2 group-hover:text-sky-500 transition">
                        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                    </h2>
                    <p class="text-gray-600 text-sm leading-relaxed mb-4">{{ Str::limit($post->excerpt ?? strip_tags($post->body), 120) }}</p>
                    <a href="{{ route('blog.show', $post->slug) }}" class="text-sky-500 font-semibold text-sm hover:text-yellow-500 transition uppercase tracking-wide">Read More <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </article>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-12 flex justify-center">
            {{ $posts->links() }}
        </div>
        @else
        <div class="text-center py-20">
            <i class="fas fa-newspaper text-5xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-lg">No blog posts yet. Check back soon!</p>
        </div>
        @endif
    </div>
</section>

{{-- CTA --}}
<section class="bg-sky-500 py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-heading font-extrabold text-white uppercase mb-4">Have a Tech Question?</h2>
        <p class="text-white text-lg mb-8">Get in touch with our experts for a free consultation.</p>
        <a href="/contact" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold px-10 py-4 text-lg uppercase tracking-wide transition">Contact Us</a>
    </div>
</section>

@endsection
