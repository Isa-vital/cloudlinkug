@extends('layouts.public')

@section('title', 'Portfolio — ' . ($siteSetting['site_name'] ?? 'Cloudlink IT Services'))
@section('meta_description', 'View our portfolio of successful IT projects across various industries in Uganda and East Africa.')
@section('og_type', 'website')
@section('meta_keywords', 'IT portfolio Uganda, IT projects, software projects, technology solutions, case studies, Cloudlink projects')

@push('schema')
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "CollectionPage",
        "name": "Portfolio — Cloudlink IT Services",
        "url": "{{ route('portfolio.index') }}",
        "description": "View our portfolio of successful IT projects across various industries."
    }
</script>
@endpush

@section('content')

{{-- Page Header --}}
<section class="relative h-72 md:h-96">
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1920&h=500&fit=crop')"></div>
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>
    <div class="relative z-10 flex items-center justify-center h-full">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-heading font-extrabold text-white uppercase">Our Portfolio</h1>
            <div class="w-16 h-1 bg-yellow-500 mx-auto mt-4"></div>
        </div>
    </div>
</section>

{{-- Filter + Grid --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Category Filters --}}
        <div class="flex flex-wrap justify-center gap-3 mb-12">
            <button class="filter-btn px-5 py-2 text-sm font-bold uppercase tracking-wide bg-sky-500 text-white transition" data-category="all">All</button>
            @foreach($categories as $category)
            <button class="filter-btn px-5 py-2 text-sm font-bold uppercase tracking-wide bg-gray-200 text-gray-700 hover:bg-sky-500 hover:text-white transition" data-category="{{ Str::slug($category) }}">{{ $category }}</button>
            @endforeach
        </div>

        {{-- Projects Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="portfolio-grid">
            @foreach($projects as $project)
            <div class="project-card group relative overflow-hidden" data-category="{{ Str::slug($project->category) }}">
                <img src="{{ $project->image_path ? asset('storage/' . $project->image_path) : ($projectImages[$project->category] ?? $defaultTechImage) }}" alt="{{ $project->title }}" class="w-full h-64 object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-70 transition-all duration-300 flex items-center justify-center">
                    <div class="text-center opacity-0 group-hover:opacity-100 transition-all duration-300 px-6">
                        <span class="inline-block bg-yellow-500 text-gray-900 text-xs font-bold uppercase tracking-wide px-3 py-1 mb-2">{{ $project->category }}</span>
                        <h3 class="text-white font-heading font-bold text-xl uppercase mb-2">{{ $project->title }}</h3>
                        <p class="text-gray-300 text-sm">{{ Str::limit($project->description, 80) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="bg-sky-500 py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-heading font-extrabold text-white uppercase mb-4">Have a Project in Mind?</h2>
        <p class="text-white text-lg mb-8">Let's discuss how we can bring your vision to life.</p>
        <a href="/contact" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold px-10 py-4 text-lg uppercase tracking-wide transition">Start a Project</a>
    </div>
</section>

@endsection

@push('scripts')
<script>
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const category = this.dataset.category;

            // Update active button styles
            document.querySelectorAll('.filter-btn').forEach(b => {
                b.classList.remove('bg-sky-500', 'text-white');
                b.classList.add('bg-gray-200', 'text-gray-700');
            });
            this.classList.remove('bg-gray-200', 'text-gray-700');
            this.classList.add('bg-sky-500', 'text-white');

            // Filter cards
            document.querySelectorAll('.project-card').forEach(card => {
                if (category === 'all' || card.dataset.category === category) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
</script>
@endpush