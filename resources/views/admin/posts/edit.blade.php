@extends('layouts.admin')

@section('title', 'Edit ' . ($type == 'news' ? 'Berita' : 'Agenda'))

@section('content')
<div class="bg-white rounded-lg shadow-sm p-8 max-w-4xl">
    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="type" value="{{ $type }}">

        <div class="grid grid-cols-1 gap-6">
            <div>
                <x-input-label for="title" value="Judul" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $post->title)" required />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            @if($type == 'agenda')
            <div>
                <x-input-label for="event_date" value="Tanggal Kegiatan" />
                <x-text-input id="event_date" name="event_date" type="datetime-local" class="mt-1 block w-full" :value="old('event_date', $post->event_date ? $post->event_date->format('Y-m-d\TH:i') : '')" required />
                <x-input-error :messages="$errors->get('event_date')" class="mt-2" />
            </div>
            @endif

            <div>
                <x-input-label for="content" value="Konten" />
                <textarea id="content" name="content" class="block mt-1 w-full border-gray-300 focus:border-village-primary focus:ring-village-primary rounded-md shadow-sm h-64" required>{{ old('content', $post->content) }}</textarea>
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="image" value="Gambar Utama" />
                <input type="file" id="image" name="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-village-light file:text-village-primary hover:file:bg-village-secondary">
                @if($post->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Preview" class="h-32 w-auto rounded border">
                    </div>
                @endif
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>
        </div>

        <div class="mt-8 flex justify-end gap-3">
            <a href="{{ route('admin.posts.index', ['type' => $type]) }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">Batal</a>
            <x-primary-button class="bg-village-primary hover:bg-village-secondary">
                Perbarui
            </x-primary-button>
        </div>
    </form>
</div>
@endsection
