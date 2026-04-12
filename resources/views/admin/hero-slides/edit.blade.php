@extends('layouts.admin')

@section('page_title', 'Edit Hero Slide')

@section('content')

<div class="max-w-3xl">
    <form action="{{ route('admin.hero-slides.update', $heroSlide) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('admin.hero-slides._form', ['slide' => $heroSlide])
        <div class="mt-6 flex space-x-3">
            <button type="submit" class="bg-sky-500 hover:bg-sky-600 text-white font-bold px-8 py-3 text-sm uppercase tracking-wide transition">
                <i class="fas fa-save mr-2"></i>Update Slide
            </button>
            <a href="{{ route('admin.hero-slides.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold px-8 py-3 text-sm uppercase tracking-wide transition">Cancel</a>
        </div>
    </form>
</div>

@endsection