@extends('layouts.public')

@section('content')
<!-- Page Header -->
<section class="bg-village-primary py-24 text-white">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-5xl font-bold mb-4">Profil Desa</h1>
        <div class="flex justify-center items-center gap-2 text-village-light">
            <a href="{{ route('home') }}" class="hover:text-village-accent">Beranda</a>
            <span>/</span>
            <span class="text-white">Profil Desa</span>
        </div>
    </div>
</section>

<!-- Content -->
<section class="py-24">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="mb-20">
            <h2 class="text-3xl font-bold text-village-primary mb-8 flex items-center gap-4">
                <span class="w-12 h-1 bg-village-accent rounded-full"></span>
                Sejarah Desa
            </h2>
            <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed whitespace-pre-line">
                {{ $profile->history ?? 'Informasi sejarah belum tersedia.' }}
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-20">
            <div class="bg-white p-10 rounded-3xl shadow-sm border-t-8 border-village-secondary">
                <h2 class="text-3xl font-bold text-village-primary mb-6">Visi</h2>
                <div class="text-gray-600 text-lg leading-relaxed whitespace-pre-line">
                    "{{ $profile->vision ?? 'Visi belum tersedia.' }}"
                </div>
            </div>
            <div class="bg-white p-10 rounded-3xl shadow-sm border-t-8 border-village-accent">
                <h2 class="text-3xl font-bold text-village-primary mb-6">Misi</h2>
                <div class="text-gray-600 text-lg leading-relaxed whitespace-pre-line">
                    {{ $profile->mission ?? 'Misi belum tersedia.' }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
