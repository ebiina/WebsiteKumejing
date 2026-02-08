@extends('layouts.public')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[80vh] flex items-center text-white overflow-hidden">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/hero-bg.jpg') }}" alt="Background Desa Kumejing" class="w-full h-full object-cover">
        <!-- Overlay for readability -->
        <div class="absolute inset-0 bg-village-primary/70"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10 text-center py-32">
        <h2 class="text-village-accent font-bold tracking-widest mb-4">Selamat Datang di</h2>
        <h1 class="text-5xl md:text-7xl font-bold mb-8">Website Resmi<br>Desa Kumejing</h1>
        <p class="text-xl md:text-2xl text-WHITE-300 max-w-3xl mx-auto mb-12">
            Sarana transparansi dan informasi publik untuk mewujudkan Desa Kumejing yang lebih maju, mandiri, dan sejahtera.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('public.profile') }}" class="px-8 py-4 bg-village-accent text-village-primary font-bold rounded-full hover:bg-yellow-500 transition shadow-lg">Kenali Desa Kami</a>
            <a href="{{ route('public.posts', ['type' => 'news']) }}" class="px-8 py-4 bg-transparent border-2 border-white font-bold rounded-full hover:bg-white hover:text-village-primary transition font-bold">Berita Desa</a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-12 bg-white shadow-inner -mt-10 mx-auto container px-4 rounded-xl relative z-20 max-w-6xl border reveal">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x">
        @foreach($stats as $stat)
        <div class="p-4">
            <div class="text-gray-500 text-sm font-medium mb-2">{{ $stat->label }}</div>
            <div class="text-4xl font-medium text-village-primary">{{ number_format($stat->count) }}</div>
        </div>
        @endforeach
    </div>
</section>

<!-- News & Agenda Section -->
<section class="py-24 container mx-auto px-4 reveal">
    <div class="flex justify-between items-end mb-12">
        <div>
            <h2 class="text-4xl font-bold text-village-primary mb-2">Informasi Terkini</h2>
            <div class="h-1.5 w-24 bg-village-accent rounded-full"></div>
        </div>
        <a href="{{ route('public.posts', ['type' => 'news']) }}" class="text-village-secondary font-bold hover:underline">Lihat Semua Berita &rarr;</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($posts as $post)
        <article class="bg-white rounded-2xl shadow-sm overflow-hidden group hover:shadow-xl transition duration-300">
            <div class="relative h-56 overflow-hidden">
                @if($post->image)
                <img src="{{ asset('assets/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                @else
                <div class="w-full h-full bg-village-light flex items-center justify-center p-12">
                    <img src="{{ asset('assets/LOGO KAB WONOSOBO.png') }}" alt="Kumejing" class="max-h-full opacity-20 grayscale">
                </div>
                @endif
                <div class="absolute top-4 left-4 bg-village-accent text-village-primary text-xs font-bold px-3 py-1 rounded-full uppercase">Berita</div>
            </div>
            <div class="p-6">
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

                <span>{{ $post->created_at->format('d F Y') }}</span>
            </div>
                <h3 class="text-xl font-bold text-village-primary mb-4 line-clamp-2 hover:text-village-secondary transition">
                    <a href="{{ route('public.posts.detail', $post->slug) }}">{{ $post->title }}</a>
                </h3>
                <p class="text-gray-600 text-sm line-clamp-3 mb-6">
                    {{ Str::limit(strip_tags($post->content), 120) }}
                </p>
                <a href="{{ route('public.posts.detail', $post->slug) }}" class="text-village-secondary font-bold text-sm hover:underline">Baca Selengkapnya</a>
            </div>
        </article>
        @empty
        <p class="col-span-3 text-center text-gray-500">Belum ada berita terbaru.</p>
        @endforelse
    </div>
</section>

<!-- Agenda Section -->
<section class="py-24 bg-village-light/30 reveal">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row gap-16">
            <div class="md:w-1/3">
                <h2 class="text-4xl font-bold text-village-primary mb-6">Agenda<br>Kegiatan Desa</h2>
                <div class="h-1.5 w-24 bg-village-accent rounded-full mb-8"></div>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    Ikuti berbagai kegiatan dan acara penting yang berlangsung di Desa Kumejing. Pastikan Anda tidak melewatkan momen kebersamaan warga.
                </p>
                <a href="{{ route('public.posts', ['type' => 'agenda']) }}" class="px-8 py-3 bg-village-secondary text-white font-bold rounded-full hover:bg-village-primary transition shadow-md inline-block">Lihat Semua Agenda</a>
            </div>
            <div class="md:w-2/3 space-y-6">
                @forelse($agendas as $agenda)
                <div class="bg-white p-6 rounded-2xl shadow-sm flex items-center gap-6 group hover:bg-village-secondary hover:text-white transition duration-300">
                    <div class="flex-shrink-0 w-20 h-20 bg-village-light rounded-xl flex flex-col items-center justify-center text-village-primary group-hover:bg-white transition">
                        <span class="text-2xl font-bold">{{ $agenda->event_date ? $agenda->event_date->format('d') : '' }}</span>
                        <span class="text-xs font-bold uppercase">{{ $agenda->event_date ? $agenda->event_date->format('M') : '' }}</span>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold mb-1">{{ $agenda->title }}</h4>
                        <p class="text-sm opacity-70">{{ $agenda->event_date ? $agenda->event_date->format('H:i') : '' }} WIB • Kantor Desa Kumejing</p>
                    </div>
                    <div class="ml-auto">
                        <a href="{{ route('public.posts.detail', $agenda->slug) }}" class="w-10 h-10 border border-current rounded-full flex items-center justify-center opacity-50 hover:opacity-100 transition">&rarr;</a>
                    </div>
                </div>
                @empty
                <p class="text-gray-500">Belum ada agenda terdekat.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-24 bg-village-primary relative overflow-hidden">
    <div class="container mx-auto px-4 relative z-10 flex flex-col md:flex-row items-center justify-between gap-12 text-white">
        <div class="text-center md:text-left">
            <h2 class="text-4xl font-bold mb-4">Punya Aspirasi atau Masukan?</h2>
            <p class="text-xl text-gray-300">Suara Anda sangat berarti untuk pembangunan Desa Kumejing yang lebih baik.</p>
        </div>
        <a href="{{ route('public.contact') }}" class="px-10 py-5 bg-village-accent text-village-primary font-bold text-xl rounded-full hover:bg-yellow-500 transition shadow-xl transform hover:scale-105">Sampaikan Aspirasi</a>
    </div>
</section>
@endsection
