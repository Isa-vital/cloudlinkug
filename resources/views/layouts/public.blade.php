<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', $siteSetting['tagline'] ?? 'Powering Business Through Smart Technology')">
    <meta name="keywords" content="@yield('meta_keywords', 'IT services Uganda, IT consulting Kampala, cloud solutions, cybersecurity, software development, EFRIS, smart security, Cloudlink')">
    <meta name="author" content="{{ $siteSetting['site_name'] ?? 'Cloudlink IT Services' }}">
    <meta name="robots" content="@yield('meta_robots', 'index, follow')">
    <title>@yield('title', $siteSetting['site_name'] ?? 'Cloudlink IT Services')</title>
    <link rel="canonical" href="@yield('canonical', url()->current())">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="@yield('canonical', url()->current())">
    <meta property="og:title" content="@yield('title', $siteSetting['site_name'] ?? 'Cloudlink IT Services')">
    <meta property="og:description" content="@yield('meta_description', $siteSetting['tagline'] ?? 'Powering Business Through Smart Technology')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-default.jpg'))">
    <meta property="og:site_name" content="{{ $siteSetting['site_name'] ?? 'Cloudlink IT Services' }}">
    <meta property="og:locale" content="en_UG">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="@yield('twitter_card', 'summary_large_image')">
    <meta name="twitter:title" content="@yield('title', $siteSetting['site_name'] ?? 'Cloudlink IT Services')">
    <meta name="twitter:description" content="@yield('meta_description', $siteSetting['tagline'] ?? 'Powering Business Through Smart Technology')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/og-default.jpg'))">

    {{-- Structured Data — Organization (sitewide) --}}
    <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@type": "LocalBusiness",
            "name": "{{ $siteSetting['site_name'] ?? 'Cloudlink IT Services' }}",
            "description": "{{ $siteSetting['tagline'] ?? 'Powering Business Through Smart Technology' }}",
            "url": "{{ config('app.url') }}",
            "logo": "{{ asset('images/og-default.jpg') }}",
            "telephone": "{{ $siteSetting['phone'] ?? '' }}",
            "email": "{{ $siteSetting['email'] ?? '' }}",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "{{ $siteSetting['address'] ?? 'Plot 24, Kampala Road' }}",
                "addressLocality": "Kampala",
                "addressCountry": "UG"
            },
            "sameAs": [
                @if(!empty($siteSetting['facebook']))
                "{{ $siteSetting['facebook'] }}"
                @endif
                @if(!empty($siteSetting['twitter'])), "{{ $siteSetting['twitter'] }}"
                @endif
                @if(!empty($siteSetting['instagram'])), "{{ $siteSetting['instagram'] }}"
                @endif
                @if(!empty($siteSetting['linkedin'])), "{{ $siteSetting['linkedin'] }}"
                @endif
            ]
        }
    </script>
    @stack('schema')

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        yellow: {
                            400: '#FFC300',
                            500: '#FFC300',
                            600: '#e6b000'
                        },
                        sky: {
                            400: '#38BDF8',
                            500: '#38BDF8',
                            600: '#0ea5e9'
                        },
                    },
                    fontFamily: {
                        heading: ['"Barlow Condensed"', 'sans-serif'],
                        body: ['"DM Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;500;600;700;800&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            font-family: 'DM Sans', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Barlow Condensed', sans-serif;
        }

        .hero-slide {
            transition: opacity 0.7s ease-in-out;
        }
    </style>
    @stack('styles')
</head>

<body class="bg-white text-gray-800">

    {{-- ── Sticky Navbar ── --}}
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white shadow-md" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                {{-- Logo --}}
                <a href="/" class="flex items-center space-x-2">
                    <span class="text-2xl font-heading font-extrabold text-gray-900">Cloud<span class="text-sky-500">link</span></span>
                </a>

                {{-- Desktop Nav --}}
                <div class="hidden md:flex items-center space-x-6">
                    <a href="/" class="font-medium text-gray-700 hover:text-sky-500 transition {{ request()->is('/') ? 'text-sky-500' : '' }}">Home</a>
                    <a href="/about" class="font-medium text-gray-700 hover:text-sky-500 transition {{ request()->is('about') ? 'text-sky-500' : '' }}">About</a>
                    <a href="/services" class="font-medium text-gray-700 hover:text-sky-500 transition {{ request()->is('services*') ? 'text-sky-500' : '' }}">Services</a>
                    <a href="/portfolio" class="font-medium text-gray-700 hover:text-sky-500 transition {{ request()->is('portfolio*') ? 'text-sky-500' : '' }}">Portfolio</a>
                    <a href="/blog" class="font-medium text-gray-700 hover:text-sky-500 transition {{ request()->is('blog*') ? 'text-sky-500' : '' }}">Blog</a>
                    <a href="/contact" class="font-medium text-gray-700 hover:text-sky-500 transition {{ request()->is('contact') ? 'text-sky-500' : '' }}">Contact</a>
                    <a href="/contact" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold px-5 py-2 text-sm uppercase tracking-wide transition">Get a Quote</a>
                </div>

                {{-- Mobile Menu Button --}}
                <button class="md:hidden text-gray-700 focus:outline-none" id="mobile-menu-btn">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>

        {{-- Mobile Nav --}}
        <div class="hidden md:hidden bg-white border-t" id="mobile-menu">
            <div class="px-4 py-3 space-y-2">
                <a href="/" class="block py-2 text-gray-700 hover:text-sky-500 font-medium">Home</a>
                <a href="/about" class="block py-2 text-gray-700 hover:text-sky-500 font-medium">About</a>
                <a href="/services" class="block py-2 text-gray-700 hover:text-sky-500 font-medium">Services</a>
                <a href="/portfolio" class="block py-2 text-gray-700 hover:text-sky-500 font-medium">Portfolio</a>
                <a href="/blog" class="block py-2 text-gray-700 hover:text-sky-500 font-medium">Blog</a>
                <a href="/contact" class="block py-2 text-gray-700 hover:text-sky-500 font-medium">Contact</a>
                <a href="/contact" class="block bg-yellow-500 text-gray-900 font-bold px-5 py-2 text-sm text-center uppercase tracking-wide">Get a Quote</a>
            </div>
        </div>
    </nav>

    {{-- Spacer for fixed navbar --}}
    <div class="h-16"></div>

    {{-- ── Main Content ── --}}
    <main>
        @yield('content')
    </main>

    {{-- ── Footer ── --}}
    <footer class="bg-gray-900 text-gray-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                {{-- About --}}
                <div>
                    <h3 class="text-xl font-heading font-bold text-white mb-4">Cloud<span class="text-sky-500">link</span></h3>
                    <p class="text-sm leading-relaxed">{{ $siteSetting['footer_text'] ?? '' }}</p>
                    <div class="flex space-x-3 mt-4">
                        @if(!empty($siteSetting['facebook']))
                        <a href="{{ $siteSetting['facebook'] }}" target="_blank" class="w-9 h-9 bg-gray-700 hover:bg-sky-500 flex items-center justify-center transition"><i class="fab fa-facebook-f text-sm text-white"></i></a>
                        @endif
                        @if(!empty($siteSetting['twitter']))
                        <a href="{{ $siteSetting['twitter'] }}" target="_blank" class="w-9 h-9 bg-gray-700 hover:bg-sky-500 flex items-center justify-center transition"><i class="fab fa-twitter text-sm text-white"></i></a>
                        @endif
                        @if(!empty($siteSetting['instagram']))
                        <a href="{{ $siteSetting['instagram'] }}" target="_blank" class="w-9 h-9 bg-gray-700 hover:bg-sky-500 flex items-center justify-center transition"><i class="fab fa-instagram text-sm text-white"></i></a>
                        @endif
                        @if(!empty($siteSetting['linkedin']))
                        <a href="{{ $siteSetting['linkedin'] }}" target="_blank" class="w-9 h-9 bg-gray-700 hover:bg-sky-500 flex items-center justify-center transition"><i class="fab fa-linkedin-in text-sm text-white"></i></a>
                        @endif
                    </div>
                </div>

                {{-- Quick Links --}}
                <div>
                    <h4 class="text-lg font-heading font-bold text-white mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="/" class="hover:text-yellow-400 transition">Home</a></li>
                        <li><a href="/about" class="hover:text-yellow-400 transition">About Us</a></li>
                        <li><a href="/services" class="hover:text-yellow-400 transition">Services</a></li>
                        <li><a href="/portfolio" class="hover:text-yellow-400 transition">Portfolio</a></li>
                        <li><a href="/contact" class="hover:text-yellow-400 transition">Contact</a></li>
                    </ul>
                </div>

                {{-- Services --}}
                <div>
                    <h4 class="text-lg font-heading font-bold text-white mb-4">Our Services</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="/services/it-consulting-services" class="hover:text-yellow-400 transition">IT Consulting</a></li>
                        <li><a href="/services/smart-security-solutions" class="hover:text-yellow-400 transition">Smart Security</a></li>
                        <li><a href="/services/software-development" class="hover:text-yellow-400 transition">Software Development</a></li>
                        <li><a href="/services/solar-installations" class="hover:text-yellow-400 transition">Solar Installations</a></li>
                        <li><a href="/services/e-receipting-efris-e-invoicing" class="hover:text-yellow-400 transition">EFRIS Solutions</a></li>
                    </ul>
                </div>

                {{-- Contact Info --}}
                <div>
                    <h4 class="text-lg font-heading font-bold text-white mb-4">Contact Us</h4>
                    <ul class="space-y-3 text-sm">
                        @if(!empty($siteSetting['address']))
                        <li class="flex items-start space-x-2">
                            <i class="fas fa-map-marker-alt text-yellow-400 mt-1"></i>
                            <span>{{ $siteSetting['address'] }}</span>
                        </li>
                        @endif
                        @if(!empty($siteSetting['phone']))
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-phone text-yellow-400"></i>
                            <a href="tel:{{ $siteSetting['phone'] }}" class="hover:text-yellow-400 transition">{{ $siteSetting['phone'] }}</a>
                        </li>
                        @endif
                        @if(!empty($siteSetting['email']))
                        <li class="flex items-center space-x-2">
                            <i class="fas fa-envelope text-yellow-400"></i>
                            <a href="mailto:{{ $siteSetting['email'] }}" class="hover:text-yellow-400 transition">{{ $siteSetting['email'] }}</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        {{-- Bottom Bar --}}
        <div class="border-t border-gray-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex flex-col md:flex-row items-center justify-between text-sm">
                <p>&copy; {{ date('Y') }} {{ $siteSetting['site_name'] ?? 'Cloudlink IT Services' }}. All rights reserved.</p>
                <p class="mt-2 md:mt-0"><a href="/privacy-policy" class="hover:text-yellow-400 transition">Privacy Policy</a></p>
            </div>
        </div>
    </footer>

    {{-- ── WhatsApp Widget ── --}}
    @if(!empty($siteSetting['whatsapp']))
    <a href="https://wa.me/{{ $siteSetting['whatsapp'] }}" target="_blank" class="fixed bottom-6 right-6 z-50 bg-green-500 hover:bg-green-600 text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg transition" title="Chat on WhatsApp">
        <i class="fab fa-whatsapp text-2xl"></i>
    </a>
    @endif

    {{-- ── Scripts ── --}}
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
    @stack('scripts')
</body>

</html>