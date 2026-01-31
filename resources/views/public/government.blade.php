@extends('layouts.public')

@section('content')
<!-- Page Header -->
<section class="bg-village-primary py-24 text-white">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-5xl font-bold mb-4">Pemerintahan</h1>
        <div class="flex justify-center items-center gap-2 text-village-light">
            <a href="{{ route('home') }}" class="hover:text-village-accent">Beranda</a>
            <span>/</span>
            <span class="text-white">Pemerintahan</span>
        </div>
    </div>
</section>

<!-- Officials Section -->
<section class="py-24 container mx-auto px-4">
    <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-village-primary mb-4">Perangkat Desa</h2>
        <div class="h-1.5 w-24 bg-village-accent rounded-full mx-auto mb-6"></div>
        <p class="text-gray-500 max-w-2xl mx-auto">
            Dedikasi dan profesionalitas tim Pemerintah Desa Kumejing dalam melayani masyarakat.
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @forelse($officials as $official)
        <div class="bg-white rounded-2xl shadow-sm overflow-hidden group hover:shadow-xl transition duration-300 border">
            <div class="h-72 overflow-hidden bg-gray-100">
                @if($official->photo)
                <img src="{{ asset('storage/' . $official->photo) }}" alt="{{ $official->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                @else
                <div class="w-full h-full bg-village-light flex items-center justify-center p-16">
                    <img src="{{ asset('assets/LOGO KAB WONOSOBO.png') }}" alt="Logo" class="max-h-full opacity-20 grayscale">
                </div>
                @endif
            </div>
            <div class="p-6 text-center">
                <h3 class="text-xl font-bold text-village-primary mb-1">{{ $official->name }}</h3>
                <p class="text-village-secondary font-medium text-sm">{{ $official->position }}</p>
            </div>
        </div>
        @empty
        <p class="col-span-4 text-center text-gray-500">Data perangkat desa belum tersedia.</p>
        @endforelse
    </div>
</section>

<!-- Structure Section -->
@if($profile && $profile->structure_image)
<section class="py-24 bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-village-primary mb-4">Struktur Organisasi</h2>
            <div class="h-1.5 w-32 bg-village-accent rounded-full mx-auto"></div>
        </div>
        <div class="bg-white p-8 rounded-3xl shadow-sm max-w-5xl mx-auto border text-center">
            <img src="{{ asset('storage/' . $profile->structure_image) }}" alt="Struktur Organisasi" class="mx-auto block">
        </div>
    </div>
</section>
@endif
@endsection
