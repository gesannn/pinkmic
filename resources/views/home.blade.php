@extends('layouts.app')

@section('content')
<section class="hero">
    <div>
        <p class="eyebrow">RECORDING • BAND • VOCAL</p>
        <h1>Make noise.<br><span>Make memories.</span></h1>
        <p>Temukan studio musik terbaik di Makassar dan booking jadwalmu tanpa ribet.</p>
        <a class="cta" href="#studios">Cari Studio →</a>
    </div>
    <div class="hero-card">
        <b>✦ PINKMIC</b>
        <strong>RECORDS</strong>
        <small>Studio booking platform</small>
    </div>
</section>

<section id="studios" class="section">
    <div class="section-head">
        <div>
            <p class="eyebrow">EXPLORE</p>
            <h2>Studio pilihan</h2>
        </div>
        <form class="filters" method="get" action="{{ route('home') }}">
            <input name="q" value="{{ $q }}" placeholder="Cari studio atau lokasi...">
            <select name="type">
                <option value="">Semua tipe</option>
                @foreach($types as $t)
                    <option value="{{ $t }}" @selected($type === $t)>{{ $t }}</option>
                @endforeach
            </select>
            <button class="cta" type="submit">Cari</button>
        </form>
    </div>

    <div class="grid">
        @forelse($studios as $studio)
            <article class="card">
                <img src="{{ $studio->image ?: asset('images/placeholder.svg') }}" alt="{{ $studio->name }}" onerror="this.onerror=null;this.src='{{ asset('images/placeholder.svg') }}'">
                <div class="card-body">
                    <span>{{ $studio->type }}</span>
                    <h3>{{ $studio->name }}</h3>
                    <p>📍 {{ $studio->location }}</p>
                    <div class="price">Rp {{ number_format($studio->price_per_hour, 0, ',', '.') }} <small>/ jam</small></div>
                    <a href="{{ route('studio.show', $studio) }}" class="outline">Lihat &amp; Booking</a>
                </div>
            </article>
        @empty
            <p>Tidak ada studio ditemukan.</p>
        @endforelse
    </div>
</section>
@endsection
