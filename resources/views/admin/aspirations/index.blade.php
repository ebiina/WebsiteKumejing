@extends('layouts.admin')

@section('title', 'Kelola Aspirasi Warga')

@section('content')
<div class="bg-white rounded-lg shadow-sm overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="px-6 py-3 text-sm font-semibold text-gray-600">Nama Pengirim</th>
                <th class="px-6 py-3 text-sm font-semibold text-gray-600">Pesan</th>
                <th class="px-6 py-3 text-sm font-semibold text-gray-600">Tanggal</th>
                <th class="px-6 py-3 text-sm font-semibold text-gray-600">Status</th>
                <th class="px-6 py-3 text-sm font-semibold text-gray-600">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($aspirations as $item)
            <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium text-village-primary">{{ $item->name }}</td>
                <td class="px-6 py-4 text-gray-600 italic">
                    {{ Str::limit($item->message, 50) }}
                </td>
                <td class="px-6 py-4 text-gray-500 text-sm">
                    {{ $item->created_at->format('d/m/y H:i') }}
                </td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 text-xs rounded-full font-bold uppercase
                        {{ $item->status == 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                        {{ $item->status == 'reviewed' ? 'bg-green-100 text-green-700' : '' }}
                        {{ $item->status == 'hidden' ? 'bg-gray-100 text-gray-700' : '' }}">
                        {{ $item->status }}
                    </span>
                </td>
                <td class="px-6 py-4 flex gap-2">
                    <a href="{{ route('admin.aspirations.show', $item->id) }}" class="text-blue-600 hover:underline">Detail</a>
                    <form action="{{ route('admin.aspirations.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus aspirasi ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-8 text-center text-gray-500 italic">Belum ada aspirasi dari warga.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-8">
    {{ $aspirations->links() }}
</div>
@endsection
