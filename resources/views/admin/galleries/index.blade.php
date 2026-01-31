@extends('layouts.admin')

@section('title', 'Kelola Galeri Foto')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <a href="{{ route('admin.galleries.create') }}" class="bg-village-primary text-white px-4 py-2 rounded hover:bg-village-secondary transition">
        + Tambah Foto
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @forelse($galleries as $gallery)
    <div class="bg-white rounded-lg shadow-sm overflow-hidden border">
        <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="w-full h-48 object-cover">
        <div class="p-4">
            <h3 class="font-bold text-village-primary truncate">{{ $gallery->title }}</h3>
            <div class="mt-4 flex justify-between items-center">
                <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="text-blue-600 text-sm hover:underline">Edit</a>
                <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 text-sm hover:underline">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full py-12 text-center text-gray-500 italic">Belum ada foto di galeri.</div>
    @endforelse
</div>

<div class="mt-8">
    {{ $galleries->links() }}
</div>
@endsection
