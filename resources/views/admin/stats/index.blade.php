@extends('layouts.admin')

@section('title', 'Kelola Statistik Kependudukan')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.stats.create') }}" class="bg-village-primary text-white px-4 py-2 rounded hover:bg-village-secondary transition">
        + Tambah Data Statistik
    </a>
</div>

<div class="bg-white rounded-lg shadow-sm overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="px-6 py-3 text-sm font-semibold text-gray-600">Label</th>
                <th class="px-6 py-3 text-sm font-semibold text-gray-600">Jumlah</th>
                <th class="px-6 py-3 text-sm font-semibold text-gray-600">Kategori</th>
                <th class="px-6 py-3 text-sm font-semibold text-gray-600">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($stats as $stat)
            <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium text-village-primary">{{ $stat->label }}</td>
                <td class="px-6 py-4 font-bold">{{ number_format($stat->count) }}</td>
                <td class="px-6 py-4 text-gray-600 uppercase text-xs">{{ $stat->category }}</td>
                <td class="px-6 py-4 flex gap-2">
                    <a href="{{ route('admin.stats.edit', $stat->id) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('admin.stats.destroy', $stat->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-6 py-8 text-center text-gray-500 italic">Belum ada data statistik.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
