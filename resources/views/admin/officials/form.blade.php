@extends('layouts.admin')

@section('title', (isset($official) ? 'Edit ' : 'Tambah ') . 'Perangkat Desa')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-8 max-w-2xl">
    <form action="{{ isset($official) ? route('admin.officials.update', $official->id) : route('admin.officials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($official))
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 gap-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <x-input-label for="name" value="Nama Lengkap" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $official->name ?? '')" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="position" value="Jabatan" />
                    <x-text-input id="position" name="position" type="text" class="mt-1 block w-full" :value="old('position', $official->position ?? '')" required />
                    <x-input-error :messages="$errors->get('position')" class="mt-2" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <x-input-label for="order" value="Urutan Tampilan (Angka)" />
                    <x-text-input id="order" name="order" type="number" class="mt-1 block w-full" :value="old('order', $official->order ?? 0)" required />
                    <x-input-error :messages="$errors->get('order')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="photo" value="Foto Perangkat Desa" />
                    <input type="file" id="photo" name="photo" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-village-light file:text-village-primary hover:file:bg-village-secondary">
                    @if(isset($official) && $official->photo)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $official->photo) }}" alt="Current" class="h-20 w-auto rounded border">
                        </div>
                    @endif
                    <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                </div>
            </div>
        </div>

        <div class="mt-8 flex justify-end gap-3">
            <a href="{{ route('admin.officials.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">Batal</a>
            <x-primary-button class="bg-village-primary hover:bg-village-secondary">
                {{ isset($official) ? 'Perbarui' : 'Simpan' }}
            </x-primary-button>
        </div>
    </form>
</div>
@endsection
