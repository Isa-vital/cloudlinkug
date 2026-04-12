@extends('layouts.admin')

@section('page_title', 'Add Hero Slide')

@section('content')

<div class="max-w-3xl">
    <form action="{{ route('admin.hero-slides.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.hero-slides._form')
        <div class="mt-6 flex space-x-3">
            <button type="submit" class="bg-sky-500 hover:bg-sky-600 text-white font-bold px-8 py-3 text-sm uppercase tracking-wide transition">
                <i class="fas fa-save mr-2"></i>Create Slide
            </button>
            <a href="{{ route('admin.hero-slides.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold px-8 py-3 text-sm uppercase tracking-wide transition">Cancel</a>
        </div>
    </form>
</div>

@endsection