@extends('layouts.public')

@section('title', ($siteSetting['site_name'] ?? 'Cloudlink IT Services') . ' — ' . ($siteSetting['tagline'] ?? ''))
@section('meta_description', $siteSetting['about_short'] ?? ($siteSetting['tagline'] ?? 'Leading IT solutions provider in Uganda offering consulting, software development, cybersecurity, and smart technology services.'))
@section('og_type', 'website')
@section('canonical', config('app.url'))
@section('meta_keywords', 'IT services Uganda, IT consulting Kampala, software development Uganda, cybersecurity, EFRIS solutions, cloud computing, smart security, Cloudlink IT')

@push('schema')
<script type="application/ld+json">
    {
        !!json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => $siteSetting['site_name'] ?? 'Cloudlink IT Services',
            'url' => config('app.url'),
            'description' => $siteSetting['tagline'] ?? 'Powering Business Through Smart Technology',
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => config('app.url').
                '/blog?q={search_term_string}',
                'query-input' => 'required name=search_term_string',
            ],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!
    }
</script>
@endpush

@section('content')

{{-- ══════════════════════════════════════════════════════════════
     HERO SECTION — Full-width photo slider
     ══════════════════════════════════════════════════════════════ --}}
<section class="relative h-[600px] md:h-[700px] overflow-hidden" id="hero">
    @forelse($slides as $index => $slide)
    <div class="hero-slide absolute inset-0 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}" data-slide="{{ $index }}">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ $slide->image_path ? asset('storage/' . $slide->image_path) : ($heroImages[$slide->display_order] ?? $defaultTechImage) }}')"></div>
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        <div class="relative z-10 flex items-center justify-center h-full">
            <div class="text-center px-4 max-w-4xl">
                <h1 class="text-4xl md:text-6xl font-heading font-extrabold text-white uppercase leading-tight mb-4">{{ $slide->heading }}</h1>
                <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-2xl mx-auto">{{ $slide->subheading }}</p>
                @if($slide->button_text)
                <a href="{{ $slide->button_url ?? '/contact' }}" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold px-8 py-3 text-lg uppercase tracking-wide transition">{{ $slide->button_text }}</a>
                @endif
            </div>
        </div>
    </div>
    @empty
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=1920&h=700&fit=crop')"></div>
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>
    <div class="relative z-10 flex items-center justify-center h-full">
        <div class="text-center px-4 max-w-4xl">
            <h1 class="text-4xl md:text-6xl font-heading font-extrabold text-white uppercase leading-tight mb-4">{{ $siteSetting['hero_heading'] ?? 'Powering Business Through Smart Technology' }}</h1>
            <p class="text-lg md:text-xl text-gray-200 mb-8">{{ $siteSetting['hero_subheading'] ?? '' }}</p>
            <a href="/contact" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold px-8 py-3 text-lg uppercase tracking-wide transition">Get Started</a>
        </div>
    </div>
    @endforelse

    {{-- Slider Navigation Dots --}}
    @if($slides->count() > 1)
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-20 flex space-x-2">
        @foreach($slides as $index => $slide)
        <button class="w-3 h-3 rounded-full transition {{ $index === 0 ? 'bg-yellow-500' : 'bg-white bg-opacity-50' }}" data-dot="{{ $index }}"></button>
        @endforeach
    </div>
    @endif
</section>


{{-- ══════════════════════════════════════════════════════════════
     WHAT WE DO — Services Grid
     ══════════════════════════════════════════════════════════════ --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <h2 class="text-3xl md:text-4xl font-heading font-extrabold text-gray-900 uppercase">What We Do</h2>
            <div class="w-16 h-1 bg-yellow-500 mx-auto mt-3 mb-4"></div>
            <p class="text-gray-600 max-w-2xl mx-auto">We provide a wide range of technology solutions designed to help your business thrive in the digital age.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="bg-white border border-gray-100 shadow-sm hover:shadow-md transition group">
                <div class="h-48 bg-cover bg-center" style="background-image: url('{{ $service->image_path ? asset('storage/' . $service->image_path) : ($serviceImages[$service->slug] ?? $defaultTechImage) }}')"></div>
                <div class="p-6">
                    <div class="w-12 h-12 bg-sky-500 text-white flex items-center justify-center mb-4 -mt-12 relative z-10">
                        <i class="{{ $service->icon_class ?? 'fas fa-cog' }} text-xl"></i>
                    </div>
                    <h3 class="text-xl font-heading font-bold text-gray-900 mb-2 uppercase">{{ $service->title }}</h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-4">{{ Str::limit($service->description, 120) }}</p>
                    <a href="/services/{{ $service->slug }}" class="text-sky-500 font-semibold text-sm hover:text-yellow-500 transition uppercase tracking-wide">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-10">
            <a href="/services" class="inline-block border-2 border-sky-500 text-sky-500 hover:bg-sky-500 hover:text-white font-bold px-8 py-3 text-sm uppercase tracking-wide transition">View All Services</a>
        </div>
    </div>
</section>


{{-- ══════════════════════════════════════════════════════════════
     STATS BAR
     ══════════════════════════════════════════════════════════════ --}}
<section class="bg-yellow-500 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div>
                <p class="text-4xl md:text-5xl font-heading font-extrabold text-gray-900">200+</p>
                <p class="text-gray-800 font-semibold mt-1 uppercase text-sm tracking-wide">Happy Clients</p>
            </div>
            <div>
                <p class="text-4xl md:text-5xl font-heading font-extrabold text-gray-900">10+</p>
                <p class="text-gray-800 font-semibold mt-1 uppercase text-sm tracking-wide">Years Experience</p>
            </div>
            <div>
                <p class="text-4xl md:text-5xl font-heading font-extrabold text-gray-900">50+</p>
                <p class="text-gray-800 font-semibold mt-1 uppercase text-sm tracking-wide">Projects Completed</p>
            </div>
            <div>
                <p class="text-4xl md:text-5xl font-heading font-extrabold text-gray-900">24/7</p>
                <p class="text-gray-800 font-semibold mt-1 uppercase text-sm tracking-wide">Support Available</p>
            </div>
        </div>
    </div>
</section>


{{-- ══════════════════════════════════════════════════════════════
     ABOUT US SNAPSHOT
     ══════════════════════════════════════════════════════════════ --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            {{-- Photo --}}
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?w=700&h=500&fit=crop" alt="About Cloudlink IT Services" class="w-full h-auto object-cover">
                <div class="absolute bottom-0 left-0 w-2 h-24 bg-yellow-500"></div>
                <div class="absolute bottom-0 left-0 w-24 h-2 bg-yellow-500"></div>
            </div>

            {{-- Text --}}
            <div>
                <h2 class="text-3xl md:text-4xl font-heading font-extrabold text-gray-900 uppercase mb-2">About Cloudlink IT Services</h2>
                <div class="w-16 h-1 bg-yellow-500 mb-6"></div>
                <p class="text-gray-600 leading-relaxed mb-6">{{ $siteSetting['about_text'] ?? '' }}</p>
                <div class="space-y-3 mb-8">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-sky-500 text-white flex items-center justify-center flex-shrink-0"><i class="fas fa-check text-sm"></i></div>
                        <span class="text-gray-700 font-medium">Certified & experienced IT professionals</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-sky-500 text-white flex items-center justify-center flex-shrink-0"><i class="fas fa-check text-sm"></i></div>
                        <span class="text-gray-700 font-medium">Trusted by 200+ businesses across East Africa</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-sky-500 text-white flex items-center justify-center flex-shrink-0"><i class="fas fa-check text-sm"></i></div>
                        <span class="text-gray-700 font-medium">24/7 support and maintenance</span>
                    </div>
                </div>
                <a href="/about" class="inline-block bg-sky-500 hover:bg-sky-600 text-white font-bold px-8 py-3 text-sm uppercase tracking-wide transition">Learn More About Us</a>
            </div>
        </div>
    </div>
</section>


{{-- ══════════════════════════════════════════════════════════════
     FEATURED PROJECTS
     ══════════════════════════════════════════════════════════════ --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <h2 class="text-3xl md:text-4xl font-heading font-extrabold text-gray-900 uppercase">Featured Projects</h2>
            <div class="w-16 h-1 bg-yellow-500 mx-auto mt-3 mb-4"></div>
            <p class="text-gray-600 max-w-2xl mx-auto">A showcase of our recent work across various industries and technology domains.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($projects as $project)
            <div class="group relative overflow-hidden">
                <img src="{{ $project->image_path ? asset('storage/' . $project->image_path) : ($projectImages[$project->category] ?? $defaultTechImage) }}" alt="{{ $project->title }}" class="w-full h-64 object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-70 transition-all duration-300 flex items-center justify-center">
                    <div class="text-center opacity-0 group-hover:opacity-100 transition-all duration-300 px-4">
                        <span class="inline-block bg-yellow-500 text-gray-900 text-xs font-bold uppercase tracking-wide px-3 py-1 mb-2">{{ $project->category }}</span>
                        <h3 class="text-white font-heading font-bold text-xl uppercase">{{ $project->title }}</h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-10">
            <a href="/portfolio" class="inline-block border-2 border-sky-500 text-sky-500 hover:bg-sky-500 hover:text-white font-bold px-8 py-3 text-sm uppercase tracking-wide transition">View All Projects</a>
        </div>
    </div>
</section>


{{-- ══════════════════════════════════════════════════════════════
     TESTIMONIALS
     ══════════════════════════════════════════════════════════════ --}}
<section class="py-20 bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <h2 class="text-3xl md:text-4xl font-heading font-extrabold text-white uppercase">What Our Clients Say</h2>
            <div class="w-16 h-1 bg-yellow-500 mx-auto mt-3"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($testimonials->take(3) as $testimonial)
            <div class="bg-gray-800 p-8">
                <div class="flex items-center mb-4">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-yellow-500' : 'text-gray-600' }} text-sm"></i>
                        @endfor
                </div>
                <p class="text-gray-300 leading-relaxed mb-6 italic">"{{ $testimonial->message }}"</p>
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-sky-500 rounded-full flex items-center justify-center text-white font-bold">
                        {{ strtoupper(substr($testimonial->client_name, 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-white font-semibold">{{ $testimonial->client_name }}</p>
                        <p class="text-gray-400 text-sm">{{ $testimonial->company }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ══════════════════════════════════════════════════════════════
     WHY CHOOSE US
     ══════════════════════════════════════════════════════════════ --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <h2 class="text-3xl md:text-4xl font-heading font-extrabold text-gray-900 uppercase">Why Choose Cloudlink</h2>
            <div class="w-16 h-1 bg-yellow-500 mx-auto mt-3 mb-4"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-yellow-500 text-gray-900 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-award text-2xl"></i>
                </div>
                <h3 class="font-heading font-bold text-lg text-gray-900 uppercase mb-2">Proven Expertise</h3>
                <p class="text-gray-600 text-sm">Over 10 years of delivering successful IT projects across East Africa.</p>
            </div>
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-sky-500 text-white flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-headset text-2xl"></i>
                </div>
                <h3 class="font-heading font-bold text-lg text-gray-900 uppercase mb-2">24/7 Support</h3>
                <p class="text-gray-600 text-sm">Round-the-clock technical support to keep your systems running smoothly.</p>
            </div>
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-yellow-500 text-gray-900 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-cogs text-2xl"></i>
                </div>
                <h3 class="font-heading font-bold text-lg text-gray-900 uppercase mb-2">Custom Solutions</h3>
                <p class="text-gray-600 text-sm">Tailored technology solutions that fit your specific business needs and budget.</p>
            </div>
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-sky-500 text-white flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-handshake text-2xl"></i>
                </div>
                <h3 class="font-heading font-bold text-lg text-gray-900 uppercase mb-2">Trusted Partner</h3>
                <p class="text-gray-600 text-sm">Trusted by 200+ businesses as their go-to technology partner.</p>
            </div>
        </div>
    </div>
</section>


{{-- ══════════════════════════════════════════════════════════════
     CONTACT CTA STRIP
     ══════════════════════════════════════════════════════════════ --}}
<section class="bg-sky-500 py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-heading font-extrabold text-white uppercase mb-4">Ready to Transform Your Business?</h2>
        <p class="text-white text-lg mb-8 max-w-2xl mx-auto">Get in touch with our team today for a free consultation and discover how Cloudlink can power your success.</p>
        <a href="/contact" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold px-10 py-4 text-lg uppercase tracking-wide transition">Get a Free Quote</a>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // Hero Slider
    (function() {
        const slides = document.querySelectorAll('.hero-slide');
        const dots = document.querySelectorAll('[data-dot]');
        if (slides.length <= 1) return;

        let current = 0;

        function showSlide(index) {
            slides.forEach((s, i) => {
                s.style.opacity = i === index ? '1' : '0';
            });
            dots.forEach((d, i) => {
                d.className = d.className.replace(/bg-yellow-500|bg-white bg-opacity-50/g, '').trim();
                d.classList.add(i === index ? 'bg-yellow-500' : 'bg-white', i === index ? '' : 'bg-opacity-50');
            });
            current = index;
        }

        dots.forEach(dot => {
            dot.addEventListener('click', () => showSlide(parseInt(dot.dataset.dot)));
        });

        setInterval(() => {
            showSlide((current + 1) % slides.length);
        }, 5000);
    })();
</script>
@endpush