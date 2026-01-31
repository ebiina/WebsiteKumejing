@extends('layouts.admin')

@section('title', 'Edit Foto Galeri')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-8 max-w-2xl">
    <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-6">
            <div>
                <x-input-label for="title" value="Judul Foto" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $gallery->title)" required />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="description" value="Keterangan (Opsional)" />
                <textarea id="description" name="description" class="block mt-1 w-full border-gray-300 focus:border-village-primary focus:ring-village-primary rounded-md shadow-sm h-24">{{ old('description', $gallery->description) }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="image" value="Ganti Foto (Kosongkan jika tidak ingin mengubah)" />
                <input type="file" id="image" name="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-village-light file:text-village-primary hover:file:bg-village-secondary">
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="Current" class="h-32 w-auto rounded border">
                </div>
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>
        </div>

        <div class="mt-8 flex justify-end gap-3">
            <a href="{{ route('admin.galleries.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">Batal</a>
            <x-primary-button class="bg-village-primary hover:bg-village-secondary">
                Perbarui
            </x-primary-button>
        </div>
    </form>
</div>
@endsection
