@extends('layouts.admin')

@section('title', 'Kelola ' . ($type == 'news' ? 'Berita' : 'Agenda'))

@section('content')
<div class="mb-6 flex justify-between items-center">
    <a href="{{ route('admin.posts.create', ['type' => $type]) }}" class="bg-village-primary text-white px-4 py-2 rounded hover:bg-village-secondary transition">
        + Tambah {{ $type == 'news' ? 'Berita' : 'Agenda' }}
    </a>
</div>

<div class="bg-white rounded-lg shadow-sm overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="px-6 py-3 text-sm font-semibold text-gray-600">Judul</th>
                @if($type == 'agenda')
                <th class="px-6 py-3 text-sm font-semibold text-gray-600">Tanggal Kegiatan</th>
                @endif
                <th class="px-6 py-3 text-sm font-semibold text-gray-600">Dibuat Pada</th>
                <th class="px-6 py-3 text-sm font-semibold text-gray-600">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
            <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-6 py-4">
                    <div class="font-medium text-village-primary">{{ $post->title }}</div>
                </td>
                @if($type == 'agenda')
                <td class="px-6 py-4 text-gray-600">
                    {{ $post->event_date ? $post->event_date->format('d M Y') : '-' }}
                </td>
                @endif
                <td class="px-6 py-4 text-gray-600 text-sm">
                    {{ $post->created_at->format('d M Y H:i') }}
                </td>
                <td class="px-6 py-4 flex gap-2">
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Hapus post ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-6 py-8 text-center text-gray-500 italic">Belum ada data.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $posts->links() }}
</div>
@endsection
