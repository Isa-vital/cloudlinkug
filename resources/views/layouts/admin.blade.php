<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Admin') — {{ $siteSetting['site_name'] ?? 'Cloudlink IT Services' }}</title>

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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;500;600;700;800&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
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
    </style>
    @stack('styles')
</head>

<body class="bg-gray-100">

    <div class="flex h-screen overflow-hidden">
        {{-- ── Sidebar ── --}}
        <aside class="hidden lg:flex lg:flex-shrink-0 w-64 bg-gray-900 text-gray-300 flex-col" id="sidebar">
            {{-- Logo --}}
            <div class="h-16 flex items-center px-6 bg-gray-800">
                <a href="/admin" class="text-xl font-heading font-extrabold text-white">Cloud<span class="text-sky-500">link</span> <span class="text-xs text-gray-400 font-body font-normal">CMS</span></a>
            </div>

            {{-- Nav --}}
            <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded text-sm hover:bg-gray-800 transition {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fas fa-tachometer-alt w-5 text-center"></i><span>Dashboard</span>
                </a>
                <a href="{{ route('admin.settings.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded text-sm hover:bg-gray-800 transition {{ request()->routeIs('admin.settings.*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fas fa-cog w-5 text-center"></i><span>Site Settings</span>
                </a>
                <a href="{{ route('admin.hero-slides.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded text-sm hover:bg-gray-800 transition {{ request()->routeIs('admin.hero-slides.*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fas fa-images w-5 text-center"></i><span>Hero Slides</span>
                </a>
                <a href="{{ route('admin.services.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded text-sm hover:bg-gray-800 transition {{ request()->routeIs('admin.services.*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fas fa-concierge-bell w-5 text-center"></i><span>Services</span>
                </a>
                <a href="{{ route('admin.portfolio.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded text-sm hover:bg-gray-800 transition {{ request()->routeIs('admin.portfolio.*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fas fa-briefcase w-5 text-center"></i><span>Portfolio</span>
                </a>
                <a href="{{ route('admin.testimonials.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded text-sm hover:bg-gray-800 transition {{ request()->routeIs('admin.testimonials.*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fas fa-quote-right w-5 text-center"></i><span>Testimonials</span>
                </a>
                <a href="{{ route('admin.team.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded text-sm hover:bg-gray-800 transition {{ request()->routeIs('admin.team.*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fas fa-users w-5 text-center"></i><span>Team Members</span>
                </a>
                <a href="{{ route('admin.messages.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded text-sm hover:bg-gray-800 transition {{ request()->routeIs('admin.messages.*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fas fa-envelope w-5 text-center"></i><span>Messages</span>
                </a>
                <a href="{{ route('admin.pages.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded text-sm hover:bg-gray-800 transition {{ request()->routeIs('admin.pages.*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fas fa-file-alt w-5 text-center"></i><span>Pages</span>
                </a>
                <a href="{{ route('admin.blog.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded text-sm hover:bg-gray-800 transition {{ request()->routeIs('admin.blog.*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="fas fa-blog w-5 text-center"></i><span>Blog Posts</span>
                </a>
            </nav>

            {{-- View Site --}}
            <div class="px-3 py-4 border-t border-gray-700">
                <a href="/" target="_blank" class="flex items-center space-x-3 px-3 py-2.5 text-sm hover:bg-gray-800 rounded transition">
                    <i class="fas fa-external-link-alt w-5 text-center"></i><span>View Website</span>
                </a>
            </div>
        </aside>

        {{-- ── Main Area ── --}}
        <div class="flex-1 flex flex-col overflow-hidden">
            {{-- Top Bar --}}
            <header class="h-16 bg-white shadow-sm flex items-center justify-between px-6 flex-shrink-0">
                <div class="flex items-center space-x-4">
                    <button class="lg:hidden text-gray-600" id="sidebar-toggle">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="text-lg font-heading font-bold text-gray-900 uppercase">@yield('page_title', 'Dashboard')</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-600">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm text-gray-500 hover:text-red-500 transition">
                            <i class="fas fa-sign-out-alt mr-1"></i>Logout
                        </button>
                    </form>
                </div>
            </header>

            {{-- Content --}}
            <main class="flex-1 overflow-y-auto p-6">
                {{-- Flash Messages --}}
                @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 mb-6 flex items-center justify-between" id="flash-success">
                    <span><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</span>
                    <button onclick="this.parentElement.remove()" class="text-green-500 hover:text-green-700"><i class="fas fa-times"></i></button>
                </div>
                @endif

                @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 mb-6 flex items-center justify-between">
                    <span><i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}</span>
                    <button onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-700"><i class="fas fa-times"></i></button>
                </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    {{-- Mobile Sidebar Overlay --}}
    <div class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden" id="sidebar-overlay"></div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebarOverlay = document.getElementById('sidebar-overlay');

        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', () => {
                sidebar.classList.toggle('hidden');
                sidebar.classList.toggle('fixed');
                sidebar.classList.toggle('inset-y-0');
                sidebar.classList.toggle('left-0');
                sidebar.classList.toggle('z-50');
                sidebarOverlay.classList.toggle('hidden');
            });
        }

        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', () => {
                sidebar.classList.add('hidden');
                sidebar.classList.remove('fixed', 'inset-y-0', 'left-0', 'z-50');
                sidebarOverlay.classList.add('hidden');
            });
        }

        // Auto-dismiss flash messages after 5 seconds
        setTimeout(() => {
            const flash = document.getElementById('flash-success');
            if (flash) flash.remove();
        }, 5000);
    </script>
    @stack('scripts')
</body>

</html>