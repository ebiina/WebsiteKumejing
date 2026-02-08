@extends('layouts.public')

@section('content')
<!-- Page Header -->
<section class="relative py-24 text-white bg-village-primary overflow-hidden">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/header-bg.jpg') }}" class="w-full h-full object-cover" alt="Header Background">
        <div class="absolute inset-0 bg-village-primary/60"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="flex items-center gap-2 text-village-light text-sm mb-4">
            <a href="{{ route('home') }}" class="hover:text-village-accent">Beranda</a>
            <span>/</span>
            <a href="{{ route('public.posts', ['type' => $post->type]) }}" class="hover:text-village-accent">{{ $post->type == 'news' ? 'Berita' : 'Agenda' }}</a>
        </div>
        <h1 class="text-3xl md:text-5xl font-bold leading-tight">{{ $post->title }}</h1>
    </div>
</section>

<!-- Content -->
<article class="py-16 container mx-auto px-4 max-w-5xl">
    <div class="bg-white rounded-3xl shadow-sm overflow-hidden border">
        @if($post->image)
        <div class="h-[500px] w-full bg-gray-100">
            <img src="{{ asset('assets/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
        </div>
        @endif
        
        <div class="p-8 md:p-12">
            <div class="flex flex-wrap items-center gap-6 mb-8 text-sm text-gray-500 border-b pb-8">
                <div class="flex items-center gap-2">
                    <span class="text-village-primary font-bold">DITERBITKAN:</span>
                    {{ $post->created_at->format('d F Y') }}
                </div>
                @if($post->type == 'agenda' && $post->event_date)
                <div class="flex items-center gap-2">
                    <span class="text-village-accent font-bold">WAKTU KEGIATAN:</span>
                    {{ $post->event_date->format('d M Y, H:i') }} WIB
                </div>
                @endif
            </div>

            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed whitespace-pre-line">
                {!! nl2br(e($post->content)) !!}
            </div>

            <!-- Share buttons placeholder -->
            <div class="mt-16 pt-8 border-t flex items-center justify-between flex-wrap gap-4">
                <div class="font-bold text-village-primary uppercase tracking-widest text-sm">Bagikan ke media sosial:</div>
                <div class="flex gap-3">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="px-4 py-2 bg-[#1877F2] text-white text-xs font-bold rounded-lg hover:opacity-80 transition cursor-pointer">Facebook</a>
                    <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . url()->current()) }}" target="_blank" class="px-4 py-2 bg-[#25D366] text-white text-xs font-bold rounded-lg hover:opacity-80 transition cursor-pointer">WhatsApp</a>
                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(url()->current()) }}" target="_blank" class="px-4 py-2 bg-black text-white text-xs font-bold rounded-lg hover:opacity-80 transition cursor-pointer">X / Twitter</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Back Button -->
    <div class="mt-12 text-center">
        <a href="{{ route('public.posts', ['type' => $post->type]) }}" class="text-village-secondary font-bold hover:underline">&larr; Kembali ke Daftar {{ $post->type == 'news' ? 'Berita' : 'Agenda' }}</a>
    </div>
</article>
@endsection
