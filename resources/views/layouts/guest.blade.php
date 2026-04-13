<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">

    <title>Admin Login — {{ config('app.name', 'Cloudlink IT Services') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;600;700;800&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
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
</head>

<body class="font-body text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-900 relative overflow-hidden">
        {{-- Background decoration --}}
        <div class="absolute top-0 right-0 w-96 h-96 bg-sky-500 opacity-10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-72 h-72 bg-yellow-500 opacity-10 rounded-full translate-y-1/2 -translate-x-1/2"></div>

        {{-- Logo --}}
        <div class="mb-6">
            <a href="/" class="flex items-center space-x-2">
                <span class="text-3xl font-heading font-extrabold text-white">Cloud<span class="text-sky-500">link</span></span>
            </a>
        </div>

        {{-- Card --}}
        <div class="w-full sm:max-w-md px-8 py-8 bg-white shadow-2xl overflow-hidden sm:rounded-lg relative z-10">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-heading font-bold text-gray-900 uppercase">Admin Login</h2>
                <div class="w-12 h-1 bg-yellow-500 mx-auto mt-2"></div>
            </div>
            {{ $slot }}
        </div>

        {{-- Footer --}}
        <p class="mt-6 text-gray-500 text-sm">&copy; {{ date('Y') }} Cloudlink IT Services. All rights reserved.</p>
    </div>
</body>

</html>