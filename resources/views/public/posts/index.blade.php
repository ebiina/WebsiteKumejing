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
        <h1 class="text-5xl font-bold mb-4">{{ $type == 'news' ? 'Berita Desa' : 'Agenda Kegiatan' }}</h1>
        <div class="flex justify-center items-center gap-2 text-village-light">
            <a href="{{ route('home') }}" class="hover:text-village-accent">Beranda</a>
            <span>/</span>
            <span class="text-white">{{ $type == 'news' ? 'Berita' : 'Agenda' }}</span>
        </div>
    </div>
</section>

<!-- Content -->
<section class="py-24 container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
        @forelse($posts as $post)
        <article class="bg-white rounded-2xl shadow-sm overflow-hidden group hover:shadow-xl transition duration-300 border flex flex-col">
            <div class="relative h-56 overflow-hidden">
                @if($post->image)
                <img src="{{ asset('assets/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                @else
                <div class="w-full h-full bg-village-light flex items-center justify-center p-12">
                    <img src="{{ asset('assets/LOGO KAB WONOSOBO.png') }}" alt="Kumejing" class="max-h-full opacity-20 grayscale">
                </div>
                @endif
                <div class="absolute top-4 left-4 bg-village-accent text-village-primary text-xs font-bold px-3 py-1 rounded-full uppercase">
                    {{ $post->type == 'news' ? 'Berita' : 'Agenda' }}
                </div>
            </div>
            <div class="p-6 flex flex-col flex-1">
            <div class="flex items-center gap-2 text-gray-400 text-xs leading-none mb-3">
                <svg
                    width="14"
                    height="14"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="text-village-accent shrink-0"
                >
                    <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>

                <span>
                    @if($post->type == 'agenda' && $post->event_date)
                        {{ $post->event_date->format('d M Y, H:i') }} WIB
                    @else
                        {{ $post->created_at->format('d F Y') }}
                    @endif
                </span>
            </div>
                <h3 class="text-xl font-bold text-village-primary mb-4 line-clamp-2 hover:text-village-secondary transition">
                    <a href="{{ route('public.posts.detail', $post->slug) }}">{{ $post->title }}</a>
                </h3>
                <p class="text-gray-600 text-sm line-clamp-3 mb-6 flex-1">
                    {{ Str::limit(strip_tags($post->content), 120) }}
                </p>
                <a href="{{ route('public.posts.detail', $post->slug) }}" class="text-village-secondary font-bold text-sm flex items-center gap-2 hover:underline">
                    Baca Selengkapnya
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </article>
        @empty
        <p class="col-span-3 text-center py-20 text-gray-500 italic">Belum ada {{ $type == 'news' ? 'berita' : 'agenda' }} yang dipublikasikan.</p>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $posts->links() }}
    </div>
</section>
@endsection
