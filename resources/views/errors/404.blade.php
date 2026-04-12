@extends('layouts.public')
@section('title', 'Page Not Found')

@section('content')
<section class="min-h-[70vh] flex items-center justify-center bg-gray-50">
    <div class="text-center px-6">
        <h1 class="text-9xl font-heading font-extrabold text-yellow-400">404</h1>
        <h2 class="text-3xl font-heading font-bold text-gray-800 mt-4">Page Not Found</h2>
        <p class="text-gray-500 mt-3 max-w-md mx-auto">
            The page you're looking for doesn't exist or has been moved. Let's get you back on track.
        </p>
        <div class="mt-8 flex flex-col sm:flex-row items-center justify-center space-y-3 sm:space-y-0 sm:space-x-4">
            <a href="{{ route('home') }}" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold px-8 py-3">Go to Homepage</a>
            <a href="{{ route('contact.index') }}" class="border-2 border-gray-300 hover:border-sky-400 text-gray-700 font-semibold px-8 py-3">Contact Us</a>
        </div>
    </div>
</section>
@endsection