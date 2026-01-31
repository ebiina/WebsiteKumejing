@extends('layouts.admin')

@section('title', (isset($stat) ? 'Edit ' : 'Tambah ') . 'Data Statistik')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-8 max-w-xl">
    <form action="{{ isset($stat) ? route('admin.stats.update', $stat->id) : route('admin.stats.store') }}" method="POST">
        @csrf
        @if(isset($stat))
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 gap-6">
            <div>
                <x-input-label for="label" value="Label Data (Contoh: Total Penduduk)" />
                <x-text-input id="label" name="label" type="text" class="mt-1 block w-full" :value="old('label', $stat->label ?? '')" required />
                <x-input-error :messages="$errors->get('label')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="count" value="Jumlah / Angka" />
                <x-text-input id="count" name="count" type="number" class="mt-1 block w-full" :value="old('count', $stat->count ?? 0)" required />
                <x-input-error :messages="$errors->get('count')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="category" value="Kategori (Contoh: age, gender, general)" />
                <x-text-input id="category" name="category" type="text" class="mt-1 block w-full" :value="old('category', $stat->category ?? 'general')" required />
                <x-input-error :messages="$errors->get('category')" class="mt-2" />
            </div>
        </div>

        <div class="mt-8 flex justify-end gap-3">
            <a href="{{ route('admin.stats.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">Batal</a>
            <x-primary-button class="bg-village-primary hover:bg-village-secondary">
                {{ isset($stat) ? 'Perbarui' : 'Simpan' }}
            </x-primary-button>
        </div>
    </form>
</div>
@endsection
