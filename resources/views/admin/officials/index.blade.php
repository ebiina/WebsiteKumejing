@extends('layouts.admin')

@section('title', 'Kelola Perangkat Desa')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.officials.create') }}" class="bg-village-primary text-white px-4 py-2 rounded hover:bg-village-secondary transition">
        + Tambah Perangkat Desa
    </a>
</div>

<div class="bg-white rounded-lg shadow-sm overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="px-6 py-3 text-sm font-semibold text-gray-600">Urutan</th>
                <th class="px-6 py-3 text-sm font-semibold text-gray-600">Foto</th>
                <th class="px-6 py-3 text-sm font-semibold text-gray-600">Nama</th>
                <th class="px-6 py-3 text-sm font-semibold text-gray-600">Jabatan</th>
                <th class="px-6 py-3 text-sm font-semibold text-gray-600">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($officials as $official)
            <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-6 py-4 text-gray-500 font-mono">{{ $official->order }}</td>
                <td class="px-6 py-4">
                    @if($official->photo)
                    <img src="{{ asset('storage/' . $official->photo) }}" alt="{{ $official->name }}" class="h-12 w-12 rounded-full object-cover">
                    @else
                    <div class="h-12 w-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-400">?</div>
                    @endif
                </td>
                <td class="px-6 py-4 font-medium text-village-primary">{{ $official->name }}</td>
                <td class="px-6 py-4 text-gray-600">{{ $official->position }}</td>
                <td class="px-6 py-4 flex gap-2">
                    <a href="{{ route('admin.officials.edit', $official->id) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('admin.officials.destroy', $official->id) }}" method="POST" onsubmit="return confirm('Hapus perangkat desa ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-8 text-center text-gray-500 italic">Belum ada data perangkat desa.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
