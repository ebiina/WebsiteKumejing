@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="mb-8 p-6 bg-gradient-to-r from-village-primary to-village-secondary rounded-2xl text-white shadow-lg">
    <div class="flex items-center gap-6">
        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center text-3xl">👋</div>
        <div>
            <h1 class="text-3xl font-bold">Halo, {{ auth()->user()->name }}!</h1>
            <p class="text-white/80 mt-1">Selamat datang kembali di Panel Admin Desa Kumejing. Kelola informasi desa dengan mudah hari ini.</p>
        </div>
    </div>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-xl">📰</div>
            <div>
                <div class="text-gray-500 text-xs font-bold uppercase tracking-widest">Total Berita</div>
                <div class="text-2xl font-black text-village-primary">{{ $stats['total_posts'] }}</div>
            </div>
        </div>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center text-xl">👥</div>
            <div>
                <div class="text-gray-500 text-xs font-bold uppercase tracking-widest">Perangkat Desa</div>
                <div class="text-2xl font-black text-village-primary">{{ $stats['total_officials'] }}</div>
            </div>
        </div>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center text-xl">📸</div>
            <div>
                <div class="text-gray-500 text-xs font-bold uppercase tracking-widest">Galeri Foto</div>
                <div class="text-2xl font-black text-village-primary">{{ $stats['total_galleries'] }}</div>
            </div>
        </div>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-village-accent/20 hover:shadow-md transition">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-village-accent/10 text-village-accent rounded-xl flex items-center justify-center text-xl">📩</div>
            <div>
                <div class="text-gray-500 text-xs font-bold uppercase tracking-widest">Aspirasi Baru</div>
                <div class="text-2xl font-black text-village-accent">{{ $stats['total_aspirations'] }}</div>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Population Summary -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-8 py-6 border-b border-gray-100 flex justify-between items-center">
            <h2 class="text-xl font-bold text-village-primary">Statistik Kependudukan</h2>
            <a href="{{ route('admin.stats.index') }}" class="text-sm text-village-secondary font-bold hover:underline">Kelola Penuh &rarr;</a>
        </div>
        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($stats['population_stats'] as $stat)
                <div class="flex items-center justify-between p-5 bg-gray-50 rounded-xl hover:bg-village-light/20 transition group">
                    <div>
                        <div class="text-xs text-gray-400 font-bold uppercase tracking-widest">{{ $stat->category }}</div>
                        <div class="text-gray-700 font-bold mt-1">{{ $stat->label }}</div>
                    </div>
                    <div class="text-3xl font-black text-village-primary group-hover:scale-110 transition">{{ number_format($stat->count) }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-8 py-6 border-b border-gray-100">
            <h2 class="text-xl font-bold text-village-primary">Aksi Cepat</h2>
        </div>
        <div class="p-8 space-y-4">
            <a href="{{ route('admin.posts.create', ['type' => 'news']) }}" class="flex items-center gap-4 p-4 rounded-xl border-2 border-dashed border-gray-200 hover:border-village-secondary hover:bg-village-light/10 transition group">
                <div class="w-10 h-10 bg-village-light text-village-primary rounded-lg flex items-center justify-center text-lg">+</div>
                <span class="font-bold text-gray-700 group-hover:text-village-secondary">Buat Berita Baru</span>
            </a>
            <a href="{{ route('admin.posts.create', ['type' => 'agenda']) }}" class="flex items-center gap-4 p-4 rounded-xl border-2 border-dashed border-gray-200 hover:border-village-secondary hover:bg-village-light/10 transition group">
                <div class="w-10 h-10 bg-village-light text-village-primary rounded-lg flex items-center justify-center text-lg">+</div>
                <span class="font-bold text-gray-700 group-hover:text-village-secondary">Tambah Agenda</span>
            </a>
            <a href="{{ route('admin.galleries.create') }}" class="flex items-center gap-4 p-4 rounded-xl border-2 border-dashed border-gray-200 hover:border-village-secondary hover:bg-village-light/10 transition group">
                <div class="w-10 h-10 bg-village-light text-village-primary rounded-lg flex items-center justify-center text-lg">+</div>
                <span class="font-bold text-gray-700 group-hover:text-village-secondary">Unggah Foto Galeri</span>
            </a>
            <a href="{{ route('admin.profile.index') }}" class="flex items-center gap-4 p-4 rounded-xl border-2 border-dashed border-gray-200 hover:border-village-secondary hover:bg-village-light/10 transition group">
                <div class="w-10 h-10 bg-village-light text-village-primary rounded-lg flex items-center justify-center text-lg">⚙️</div>
                <span class="font-bold text-gray-700 group-hover:text-village-secondary">Update Profil Desa</span>
            </a>
        </div>
    </div>
</div>
@endsection
