<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin - Situs Resmi Desa Kumejing</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/LOGO KAB WONOSOBO.png') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-village-primary text-white flex-shrink-0">
            <div class="p-6 flex items-center gap-3 border-b border-village-secondary/30">
                <img src="{{ asset('assets/LOGO KAB WONOSOBO.png') }}" alt="Logo" class="w-10 h-auto">
                <span class="text-xl font-bold uppercase tracking-wider">Admin Desa</span>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="block py-3 px-6 hover:bg-village-secondary {{ request()->routeIs('admin.dashboard') ? 'bg-village-secondary' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.profile.index') }}" class="block py-3 px-6 hover:bg-village-secondary {{ request()->routeIs('admin.profile.*') ? 'bg-village-secondary' : '' }}">
                    Struktur Desa
                </a>
                <a href="{{ route('admin.posts.index', ['type' => 'news']) }}" class="block py-3 px-6 hover:bg-village-secondary {{ request()->routeIs('admin.posts.*') && request('type') == 'news' ? 'bg-village-secondary' : '' }}">
                    Berita
                </a>
                <a href="{{ route('admin.posts.index', ['type' => 'agenda']) }}" class="block py-3 px-6 hover:bg-village-secondary {{ request()->routeIs('admin.posts.*') && request('type') == 'agenda' ? 'bg-village-secondary' : '' }}">
                    Agenda
                </a>
                <a href="{{ route('admin.galleries.index') }}" class="block py-3 px-6 hover:bg-village-secondary {{ request()->routeIs('admin.galleries.*') ? 'bg-village-secondary' : '' }}">
                    Galeri
                </a>
                <a href="{{ route('admin.stats.index') }}" class="block py-3 px-6 hover:bg-village-secondary {{ request()->routeIs('admin.stats.*') ? 'bg-village-secondary' : '' }}">
                    Statistik
                </a>
                <a href="{{ route('admin.aspirations.index') }}" class="block py-3 px-6 hover:bg-village-secondary {{ request()->routeIs('admin.aspirations.*') ? 'bg-village-secondary' : '' }}">
                    Aspirasi
                </a>
                <div class="mt-10 px-6">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left py-2 px-4 bg-village-accent text-village-primary font-bold rounded hover:bg-yellow-500 transition">
                            Logout
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-10">
            <header class="mb-8 border-b pb-4 flex justify-between items-center">
                <h1 class="text-3xl font-bold text-village-primary">@yield('title', 'Dashboard')</h1>
                <div class="text-gray-600">
                    Selamat datang, <span class="font-semibold">{{ Auth::user()->name }}</span>
                </div>
            </header>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
