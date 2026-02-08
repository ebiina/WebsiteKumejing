@extends('layouts.public')

@section('content')
<!-- Page Header -->
<section class="relative py-24 text-white bg-village-primary overflow-hidden">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/header-bg.jpg') }}" class="w-full h-full object-cover" alt="Header Background">
        <div class="absolute inset-0 bg-village-primary/60"></div>
    </div>

    <div class="container mx-auto px-4 text-center relative z-10">
        <h1 class="text-5xl font-bold mb-4">Galeri Desa</h1>
        <div class="flex justify-center items-center gap-2 text-village-light">
            <a href="{{ route('home') }}" class="hover:text-village-accent">Beranda</a>
            <span>/</span>
            <span class="text-white">Galeri</span>
        </div>
    </div>
</section>

<!-- Gallery Grid -->
<section class="py-24 container mx-auto px-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($galleries as $gallery)
        <div class="group relative bg-white rounded-2xl shadow-sm overflow-hidden aspect-square border cursor-pointer hover:shadow-2xl transition duration-500">
            <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-village-primary via-transparent to-transparent opacity-0 group-hover:opacity-90 transition duration-500 flex flex-col justify-end p-6 text-white">
                <h3 class="font-bold text-lg mb-1 translate-y-4 group-hover:translate-y-0 transition duration-500">{{ $gallery->title }}</h3>
                <p class="text-sm text-gray-300 translate-y-4 group-hover:translate-y-0 transition duration-500 delay-100">{{ $gallery->description }}</p>
            </div>
        </div>
        @empty
        <p class="col-span-4 text-center py-20 text-gray-500">Belum ada koleksi foto di galeri.</p>
        @endforelse
    </div>

    <div class="mt-12">
        {{ $galleries->links() }}
    </div>
</section>
@endsection
