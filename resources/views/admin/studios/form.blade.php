@extends('layouts.app')

@section('title', 'Form Studio - PINKMIC RECORDS')

@section('content')
<div class="auth wide">
    <p class="eyebrow">ADMIN STUDIO</p>
    <h1>{{ $studio->exists ? 'Edit' : 'Tambah' }} Studio</h1>
    <form method="post" action="{{ $studio->exists ? route('admin.studios.update', $studio) : route('admin.studios.store') }}">
        @csrf
        @if($studio->exists)
            @method('PUT')
        @endif
        <input name="name" value="{{ old('name', $studio->name) }}" placeholder="Nama studio" required>
        <input name="location" value="{{ old('location', $studio->location) }}" placeholder="Lokasi" required>
        <input name="type" value="{{ old('type', $studio->type) }}" placeholder="Tipe (Recording / Band / Vocal)" required>
        <input name="price_per_hour" type="number" min="0" value="{{ old('price_per_hour', $studio->price_per_hour) }}" placeholder="Harga/jam" required>
        <input name="capacity" type="number" min="1" value="{{ old('capacity', $studio->capacity ?: 4) }}" placeholder="Kapasitas" required>
        <input name="image" value="{{ old('image', $studio->image) }}" placeholder="URL gambar (opsional)">
        <textarea name="description" rows="4" placeholder="Deskripsi" required>{{ old('description', $studio->description) }}</textarea>
        <button class="cta" type="submit">Simpan</button>
    </form>
</div>
@endsection
