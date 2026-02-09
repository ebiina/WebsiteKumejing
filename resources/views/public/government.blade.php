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
        <h1 class="text-5xl font-bold mb-4">Pemerintahan</h1>
        <div class="flex justify-center items-center gap-2 text-village-light">
            <a href="{{ route('home') }}" class="hover:text-village-accent">Beranda</a>
            <span>/</span>
            <span class="text-white">Pemerintahan</span>
        </div>
    </div>
</section>

<!-- Officials Section -->
<section class="py-20 bg-white reveal">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">

            <!-- Section Header -->
            <div class="mb-16 text-center">
                <h2 class="text-4xl font-bold text-village-primary mb-4 flex items-center justify-center gap-4">
                    <svg class="w-10 h-10 text-village-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    Daftar Perangkat Desa
                </h2>
                <div class="w-24 h-1 bg-village-accent mx-auto rounded-full mb-6"></div>
                <p class="text-gray-500 max-w-2xl mx-auto">
                    Susunan kepemimpinan dan jajaran perangkat desa Kumejing yang bertugas melayani masyarakat.
                </p>
            </div>

            <div class="space-y-16">
                @php
                    $kepalaDesa = $officials->where('position', 'KEPALA DESA')->first();
                    $perangkatUtama = $officials->whereIn('position', [
                        'SEKRETARIS DESA', 'KASIE PEMERINTAHAN', 'KASIE KESEJAHTERAAN',
                        'KASIE PELAYANAN', 'KAUR KEUANGAN', 'KAUR TATA USAHA DAN UMUM', 'KAUR PERENCANAAN'
                    ])->sortBy('order');
                    $kewilayahan = $officials->filter(fn($o) => str_contains($o->position, 'KADUS'))->sortBy('order');
                    $staff = $officials->where('position', 'STAFF')->sortBy('order');
                @endphp

                <!-- Kepala Desa Level -->
                @if($kepalaDesa)
                <div class="flex justify-center">
                    <div class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100 text-center relative overflow-hidden max-w-md w-full group transition-all duration-300 hover:shadow-2xl">
                        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-village-primary via-village-secondary to-village-primary"></div>

                        <div class="flex flex-col items-center">
                            <div class="w-48 h-48 rounded-full overflow-hidden border-4 border-white shadow-xl mb-6 flex items-center justify-center bg-gray-50 ring-4 ring-village-primary/5 group-hover:ring-village-accent/30 transition-all duration-500">
                                @if($kepalaDesa->photo)
                                    <img src="{{ $kepalaDesa->photo_url }}" alt="{{ $kepalaDesa->name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-village-light flex items-center justify-center p-12">
                                        <img src="{{ asset('assets/LOGO KAB WONOSOBO.png') }}" class="max-h-full opacity-20 grayscale">
                                    </div>
                                @endif
                            </div>

                            <h3 class="text-2xl font-bold text-village-primary mb-2">{{ $kepalaDesa->name }}</h3>
                            <p class="px-6 py-1 bg-village-accent text-village-primary text-sm font-extrabold rounded-full uppercase tracking-wider">
                                {{ $kepalaDesa->position }}
                            </p>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Perangkat Desa Level -->
                @if($perangkatUtama->count() > 0)
                <div class="pt-16">
                    <div class="text-center mb-12">
                        <span class="px-6 py-1.5 bg-gray-100 text-gray-500 text-xl font-bold rounded-full uppercase tracking-[0.2em]">
                            Perangkat Desa
                        </span>
                    </div>

                    <div class="flex flex-wrap gap-8 justify-center">
                        @foreach($perangkatUtama as $official)
                        <div class="w-64 bg-white rounded-3xl p-6 border border-gray-100 shadow-md hover:shadow-xl transition-all duration-300 text-center group border-t-4 border-t-village-secondary/20 hover:border-t-village-accent">
                            <div class="w-24 h-24 rounded-full overflow-hidden mx-auto mb-4 ring-2 ring-gray-100 group-hover:ring-village-accent group-hover:scale-105 transition-all duration-300">
                                @if($official->photo)
                                    <img src="{{ $official->photo_url }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-village-light flex items-center justify-center p-6">
                                        <img src="{{ asset('assets/LOGO KAB WONOSOBO.png') }}" class="max-h-full opacity-10">
                                    </div>
                                @endif
                            </div>
                            <div class="text-sm font-bold text-village-primary mb-1 line-clamp-1">{{ $official->name }}</div>
                            <div class="text-xs text-village-secondary font-semibold uppercase tracking-tight">{{ $official->position }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Kadus -->
                @if($kewilayahan->count() > 0)
                <div class="pt-16">
                    <div class="text-center mb-12">
                        <span class="px-6 py-1.5 bg-gray-100 text-gray-500 text-xl font-bold rounded-full uppercase tracking-[0.2em]">
                            Kepala Dusun
                        </span>
                    </div>

                    <div class="flex flex-wrap gap-8 justify-center">
                        @foreach($kewilayahan as $official)
                        <div class="w-64 bg-white rounded-3xl p-6 border border-gray-100 shadow-md hover:shadow-xl transition-all duration-300 text-center group border-t-4 border-t-village-secondary/20 hover:border-t-village-accent">
                            <div class="w-24 h-24 rounded-full overflow-hidden mx-auto mb-4 ring-2 ring-gray-100 group-hover:ring-village-accent group-hover:scale-105 transition-all duration-300">
                                @if($official->photo)
                                    <img src="{{ $official->photo_url }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-village-light flex items-center justify-center p-6">
                                        <img src="{{ asset('assets/LOGO KAB WONOSOBO.png') }}" class="max-h-full opacity-10">
                                    </div>
                                @endif
                            </div>
                            <div class="text-sm font-bold text-village-primary mb-1">{{ $official->name }}</div>
                            <div class="text-xs text-village-secondary font-semibold uppercase tracking-tight">{{ $official->position }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Staff Level -->
                @if($staff->count() > 0)
                <div class="pt-16">
                    <div class="text-center mb-12">
                        <span class="px-6 py-1.5 bg-gray-100 text-gray-500 text-xl font-bold rounded-full uppercase tracking-[0.2em]">
                            Staf Desa
                        </span>
                    </div>

                    <div class="flex flex-wrap gap-8 justify-center">
                        @foreach($staff as $official)
                        <div class="w-64 bg-white rounded-3xl p-6 border border-gray-100 shadow-md hover:shadow-xl transition-all duration-300 text-center group border-t-4 border-t-village-secondary/20 hover:border-t-village-accent">
                            <div class="w-24 h-24 rounded-full overflow-hidden mx-auto mb-4 ring-2 ring-gray-100 group-hover:ring-village-accent group-hover:scale-105 transition-all duration-300">
                                @if($official->photo)
                                    <img src="{{ $official->photo_url }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-village-light flex items-center justify-center p-6">
                                        <img src="{{ asset('assets/LOGO KAB WONOSOBO.png') }}" class="max-h-full opacity-10">
                                    </div>
                                @endif
                            </div>
                            <div class="text-sm font-bold text-village-primary mb-1">{{ $official->name }}</div>
                            <div class="text-xs text-village-secondary font-semibold uppercase tracking-tight">{{ $official->position }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>

<!-- Call to Action -->
<div class="mt-32 pt-8">
    <div class="bg-gradient-to-r from-village-primary to-village-secondary rounded-[2.5rem] p-12 text-center text-white shadow-2xl relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-32 translate-x-32"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-village-accent/5 rounded-full translate-y-24 -translate-x-24"></div>

        <h3 class="text-3xl text-white font-bold mb-6 relative z-10 text-village-accent">
            Butuh Bantuan Kami?
        </h3>

        <p class="text-white mb-10 max-w-2xl mx-auto relative z-10 text-lg">
            Tim perangkat desa siap memberikan pelayanan terbaik dengan integritas dan profesionalisme. Hubungi kami untuk segala keperluan administrasi Anda.
        </p>

        <div class="flex flex-wrap gap-4 justify-center relative z-10 mt-6">
            <a href="{{ route('public.contact') }}" class="inline-flex items-center gap-3 bg-village-accent text-village-primary font-bold px-10 py-4 rounded-full hover:shadow-2xl transition-all duration-300 transform hover:scale-105 active:scale-95">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                Hubungi Kami
            </a>
        </div>
</div>

<!-- Structure Section -->
@if($profile && $profile->structure_image)
<section class="py-24 bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-village-primary mb-4">Struktur Organisasi</h2>
            <div class="h-1.5 w-32 bg-village-accent rounded-full mx-auto"></div>
        </div>
        <div class="bg-white p-8 rounded-3xl shadow-sm max-w-5xl mx-auto border text-center">
            <img src="{{ $profile->structure_image_url }}" alt="Struktur Organisasi" class="mx-auto block">
        </div>
    </div>
</section>
@endif
@endsection
