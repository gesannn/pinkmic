@extends('layouts.app')

@section('title', 'Kelola Studio - PINKMIC RECORDS')

@section('content')
<section class="section">
    <div class="section-head">
        <div>
            <p class="eyebrow">ADMIN</p>
            <h1>Kelola Studio</h1>
        </div>
        <a class="cta" href="{{ route('admin.studios.create') }}">+ Tambah Studio</a>
    </div>
    <div class="grid">
        @forelse($studios as $studio)
            <article class="card">
                <img src="{{ $studio->image ?: asset('images/placeholder.svg') }}" alt="{{ $studio->name }}" onerror="this.onerror=null;this.src='{{ asset('images/placeholder.svg') }}'">
                <div class="card-body">
                    <h3>{{ $studio->name }}</h3>
                    <p>{{ $studio->location }}</p>
                    <p>Rp {{ number_format($studio->price_per_hour, 0, ',', '.') }}/jam</p>
                    <a class="outline" href="{{ route('admin.studios.edit', $studio) }}">Edit</a>
                    <form style="display:inline" method="post" action="{{ route('admin.studios.destroy', $studio) }}" onsubmit="return confirm('Hapus studio ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </div>
            </article>
        @empty
            <p>Belum ada studio.</p>
        @endforelse
    </div>
</section>
@endsection
