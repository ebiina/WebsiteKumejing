@extends('layouts.admin')

@section('title', 'Struktur & Lokasi Desa')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-8 max-w-4xl">
    <div class="mb-6">
        <h2 class="text-xl font-bold text-village-primary mb-2">Pengaturan Gambar & Lokasi</h2>
        <p class="text-gray-500 text-sm">Kelola gambar struktur organisasi desa and link koordinat Google Maps.</p>
    </div>

    <form action="{{ route('admin.profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Hidden fields to preserve existing data if needed by validation --}}
        <input type="hidden" name="history" value="{{ $profile->history }}">
        <input type="hidden" name="vision" value="{{ $profile->vision }}">
        <input type="hidden" name="mission" value="{{ $profile->mission }}">

        <div class="grid grid-cols-1 gap-8">
            <!-- Struktur Organisasi -->
            <div class="p-6 bg-gray-50 rounded-xl border border-gray-100">
                <x-input-label for="structure_image" class="text-lg font-bold mb-4" value="Gambar Struktur Organisasi" />
                
                @if($profile->structure_image)
                    <div class="mb-4">
                        <p class="text-xs text-gray-400 mb-2 font-bold uppercase tracking-wider">Preview Saat Ini:</p>
                        <img src="{{ asset('storage/' . $profile->structure_image) }}" alt="Struktur" class="max-h-64 h-auto rounded-lg shadow-md border-4 border-white">
                    </div>
                @endif

                <div class="flex items-center justify-center w-full">
                    <label for="structure_image" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-white hover:bg-gray-50 transition">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 font-semibold text-center">Klik untuk upload atau drag and drop</p>
                            <p class="text-xs text-gray-400">PNG, JPG atau JPEG (Max. 2MB)</p>
                        </div>
                        <input type="file" id="structure_image" name="structure_image" class="hidden" />
                    </label>
                </div>
                <x-input-error :messages="$errors->get('structure_image')" class="mt-2" />
            </div>

            <!-- Google Maps -->
            <div class="p-6 bg-gray-50 rounded-xl border border-gray-100">
                <x-input-label for="location_map" class="text-lg font-bold mb-2" value="Link Google Maps (Iframe Source)" />
                <p class="text-xs text-gray-500 mb-4">Mempengaruhi peta yang tampil di halaman Kontak.</p>
                <x-text-input id="location_map" name="location_map" type="text" class="mt-1 block w-full border-gray-300 focus:border-village-primary focus:ring-village-primary shadow-sm" :value="old('location_map', $profile->location_map)" placeholder="https://www.google.com/maps/embed?pb=..." />
                <x-input-error :messages="$errors->get('location_map')" class="mt-2" />
            </div>
        </div>

        <div class="mt-10 flex justify-end gap-3">
            <x-primary-button class="bg-village-primary hover:bg-village-secondary py-3 px-8 text-lg shadow-lg transition transform hover:-translate-y-1">
                Simpan Perubahan
            </x-primary-button>
        </div>
    </form>
</div>
@endsection
