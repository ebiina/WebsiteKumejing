<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Situs Resmi Desa Kumejing</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/LOGO KAB WONOSOBO.png') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800">
    <!-- Top Bar -->
    <div class="bg-village-primary text-white py-2 text-sm">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div>Selamat Datang di Website Resmi Desa Kumejing</div>
            <div class="flex gap-4">
                <a href="https://wa.me/6285227161222" class="hover:text-village-accent transition">📞 WhatsApp Desa</a>
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-village-accent transition">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="hover:text-village-accent transition">Login Admin</a>
                @endauth
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/LOGO KAB WONOSOBO.png') }}" alt="Logo Wonosobo" class="w-12 h-auto">
                    <div>
                        <div class="font-bold text-xl text-village-primary leading-tight">Desa Kumejing</div>
                        <div class="text-xs text-gray-500 tracking-widest">Wadaslintang, Wonosobo</div>
                    </div>
                </div>
                
                <div class="hidden md:flex items-center gap-8 font-medium">
                    <a href="{{ route('home') }}" class="hover:text-village-secondary transition {{ request()->routeIs('home') ? 'text-village-secondary' : '' }}">Beranda</a>
                    <a href="{{ route('public.profile') }}" class="hover:text-village-secondary transition {{ request()->routeIs('public.profile') ? 'text-village-secondary' : '' }}">Profil</a>
                    <a href="{{ route('public.government') }}" class="hover:text-village-secondary transition {{ request()->routeIs('public.government') ? 'text-village-secondary' : '' }}">Pemerintahan</a>
                    <a href="{{ route('public.statistics') }}" class="hover:text-village-secondary transition {{ request()->routeIs('public.statistics') ? 'text-village-secondary' : '' }}">Statistik</a>
                    <a href="{{ route('public.posts', ['type' => 'news']) }}" class="hover:text-village-secondary transition {{ request()->routeIs('public.posts') && request('type') == 'news' ? 'text-village-secondary' : '' }}">Berita</a>
                    <a href="{{ route('public.posts', ['type' => 'agenda']) }}" class="hover:text-village-secondary transition {{ request()->routeIs('public.posts') && request('type') == 'agenda' ? 'text-village-secondary' : '' }}">Agenda</a>
                    <a href="{{ route('public.gallery') }}" class="hover:text-village-secondary transition {{ request()->routeIs('public.gallery') ? 'text-village-secondary' : '' }}">Galeri</a>
                    <a href="{{ route('public.contact') }}" class="px-5 py-2 bg-village-primary text-white rounded-full hover:bg-village-secondary transition">Hubungi Kami</a>
                </div>

                <!-- Mobile Menu Button -->
                <button class="md:hidden text-village-primary">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-village-primary text-white pt-16 pb-8">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
            <div>
                <div class="flex items-center gap-4 mb-6">
                    <img src="{{ asset('assets/LOGO KAB WONOSOBO.png') }}" alt="Logo Wonosobo" class="w-12 h-auto">
                    <h3 class="text-2xl font-bold">Desa Kumejing</h3>
                </div>
                <p class="text-gray-300 leading-relaxed mb-6">
                    Website resmi Desa Kumejing sebagai sarana informasi dan publikasi kegiatan pemerintah desa kepada seluruh lapisan masyarakat.
                </p>
                <div class="flex gap-4">
                    <a href="https://www.instagram.com/kumejing_official/" target="_blank" class="w-10 h-10 bg-village-secondary rounded-full flex items-center justify-center hover:bg-village-accent transition cursor-pointer text-village-primary shadow-sm" title="Instagram Resmi Desa Kumejing">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div>
                <h4 class="text-lg font-bold mb-6 border-b border-village-secondary/30 pb-2 inline-block">Tautan Cepat</h4>
                <ul class="space-y-4 text-gray-300">
                    <li><a href="{{ route('public.profile') }}" class="hover:text-village-accent transition">Profil Desa</a></li>
                    <li><a href="{{ route('public.government') }}" class="hover:text-village-secondary transition">Perangkat Desa</a></li>
                    <li><a href="{{ route('public.posts', ['type' => 'news']) }}" class="hover:text-village-secondary transition">Berita Terkini</a></li>
                    <li><a href="{{ route('public.gallery') }}" class="hover:text-village-secondary transition">Galeri Kegiatan</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-bold mb-6 border-b border-village-secondary/30 pb-2 inline-block">Kantor Desa</h4>
                <p class="text-gray-300 mb-4">
                    Kedungbulu, Kumejing, Kec. Wadaslintang, Kabupaten Wonosobo, Jawa Tengah 56365
                </p>
                <p class="text-gray-300 mb-2">📧 email: kumejingdesa25@gmail.com</p>
                <p class="text-gray-300">📞 telp: +62 852-2716-1222</p>
            </div>
        </div>
        <div class="container mx-auto px-4 border-t border-village-secondary/20 pt-8 text-center text-gray-400 text-sm">
            &copy; {{ date('Y') }} Pemerintah Desa Kumejing. All Rights Reserved.
        </div>
    </footer>
</body>
</html>
