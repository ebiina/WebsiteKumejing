@extends('layouts.admin')

@section('title', 'Profil Desa')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-8">
    <form action="{{ route('admin.profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-6">
            <div>
                <x-input-label for="history" value="Sejarah Desa" />
                <textarea id="history" name="history" class="block mt-1 w-full border-gray-300 focus:border-village-primary focus:ring-village-primary rounded-md shadow-sm h-32">{{ old('history', $profile->history) }}</textarea>
                <x-input-error :messages="$errors->get('history')" class="mt-2" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <x-input-label for="vision" value="Visi Desa" />
                    <textarea id="vision" name="vision" class="block mt-1 w-full border-gray-300 focus:border-village-primary focus:ring-village-primary rounded-md shadow-sm h-32">{{ old('vision', $profile->vision) }}</textarea>
                    <x-input-error :messages="$errors->get('vision')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="mission" value="Misi Desa" />
                    <textarea id="mission" name="mission" class="block mt-1 w-full border-gray-300 focus:border-village-primary focus:ring-village-primary rounded-md shadow-sm h-32">{{ old('mission', $profile->mission) }}</textarea>
                    <x-input-error :messages="$errors->get('mission')" class="mt-2" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <x-input-label for="location_map" value="Link Google Maps (Iframe Source)" />
                    <x-text-input id="location_map" name="location_map" type="text" class="mt-1 block w-full" :value="old('location_map', $profile->location_map)" />
                    <p class="text-xs text-gray-500 mt-1">Contoh: https://www.google.com/maps/embed?pb=...</p>
                    <x-input-error :messages="$errors->get('location_map')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="structure_image" value="Struktur Organisasi (Gambar)" />
                    <input type="file" id="structure_image" name="structure_image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-village-light file:text-village-primary hover:file:bg-village-secondary">
                    @if($profile->structure_image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $profile->structure_image) }}" alt="Struktur" class="h-20 w-auto rounded border">
                        </div>
                    @endif
                    <x-input-error :messages="$errors->get('structure_image')" class="mt-2" />
                </div>
            </div>
        </div>

        <div class="mt-8 flex justify-end">
            <x-primary-button class="bg-village-primary hover:bg-village-secondary">
                Simpan Perubahan
            </x-primary-button>
        </div>
    </form>
</div>
@endsection
