@extends('layouts.admin')

@section('title', 'Detail Aspirasi')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-8 max-w-2xl">
    <div class="mb-6">
        <h3 class="text-sm font-semibold uppercase text-gray-500">Pengirim</h3>
        <p class="text-xl font-bold text-village-primary">{{ $aspiration->name }}</p>
        <p class="text-sm text-gray-500">{{ $aspiration->created_at->format('d F Y \p\u\k\u\l H:i') }}</p>
    </div>

    <div class="mb-8 p-6 bg-gray-50 rounded italic border">
        "{{ $aspiration->message }}"
    </div>

    <form action="{{ route('admin.aspirations.update', $aspiration->id) }}" method="POST" class="border-t pt-6">
        @csrf
        @method('PUT')
        
        <x-input-label for="status" value="Ubah Status Aspirasi" />
        <select name="status" id="status" class="mt-1 block w-full border-gray-300 focus:border-village-primary focus:ring-village-primary rounded-md shadow-sm">
            <option value="pending" {{ $aspiration->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="reviewed" {{ $aspiration->status == 'reviewed' ? 'selected' : '' }}>Selesai Ditinjau</option>
            <option value="hidden" {{ $aspiration->status == 'hidden' ? 'selected' : '' }}>Sembunyikan</option>
        </select>

        <div class="mt-8 flex justify-end gap-3">
            <a href="{{ route('admin.aspirations.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">Kembali</a>
            <x-primary-button class="bg-village-primary hover:bg-village-secondary">
                Simpan Perubahan
            </x-primary-button>
        </div>
    </form>
</div>
@endsection
