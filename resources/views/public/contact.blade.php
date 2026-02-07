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
            <h1 class="text-5xl font-bold mb-4">Kontak & Aspirasi</h1>
            <div class="flex justify-center items-center gap-2 text-village-light">
                <a href="{{ route('home') }}" class="hover:text-village-accent">Beranda</a>
                <span>/</span>
                <span class="text-white">Kontak Kami</span>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-24">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-16">
                <!-- Form Side -->
                <div class="lg:w-1/2">
                    <div class="bg-white p-10 rounded-3xl shadow-sm border border-village-light">
                        <h2 class="text-3xl font-bold text-village-primary mb-2">Kirim Aspirasi</h2>
                        <p class="text-gray-500 mb-8">Silakan sampaikan pertanyaan, kritik, atau saran Anda melalui formulir di bawah ini.</p>

                        @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-8" role="alert">
                            <p class="font-bold uppercase tracking-widest text-xs mb-1">Berhasil!</p>
                            <p>{{ session('success') }}</p>
                        </div>
                        @endif

                        <form action="{{ route('public.aspiration.submit') }}" method="POST">
                            @csrf
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-sm font-bold text-village-primary uppercase tracking-widest mb-2" for="name">Nama Lengkap</label>
                                    <input class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-village-secondary focus:border-transparent transition" id="name" name="name" type="text" placeholder="Masukkan nama Anda" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-village-primary uppercase tracking-widest mb-2" for="message">Pesan / Aspirasi</label>
                                    <textarea class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-village-secondary focus:border-transparent transition h-40" id="message" name="message" placeholder="Tuliskan pesan Anda di sini..." required></textarea>
                                </div>
                                <button class="w-full py-5 bg-village-primary text-white font-bold text-lg rounded-xl hover:bg-village-secondary transition shadow-lg transform active:scale-95 tracking-widest" type="submit">
                                    Kirim Sekarang
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Map & Info Side -->
                <div class="lg:w-1/2 flex flex-col gap-12">
                    <div>
                        <h2 class="text-3xl font-bold text-village-primary mb-6 uppercase tracking-wider">Lokasi Kantor Desa</h2>
                        <div class="rounded-3xl overflow-hidden shadow-sm border-4 border-white h-96 relative">
                            @if($profile && $profile->location_map)
                                <iframe src="{{ $profile->location_map }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-500">Peta belum dikonfigurasi.</div>
                            @endif
                        </div>
                    </div>

                    <div class="bg-village-primary p-10 rounded-3xl text-white">
                        <h3 class="text-2xl font-bold mb-8 uppercase tracking-widest border-b border-village-secondary/30 pb-4">Informasi Kontak</h3>
                        <div class="space-y-6">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-village-secondary/20 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold uppercase text-xs text-village-accent mb-1">Alamat Kantor</h4>
                                    <p class="text-gray-200">Kedungbulu, Kumejing, Kec. Wadaslintang, Kabupaten Wonosobo, Jawa Tengah 56365</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-village-secondary/20 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold uppercase text-xs text-village-accent mb-1">Alamat Email</h4>
                                    <p class="text-gray-200">kumejingdesa25@gmail.com</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-village-secondary/20 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold uppercase text-xs text-village-accent mb-1">Layanan WhatsApp</h4>
                                    <p class="text-gray-200">+62 852-2716-1222</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
