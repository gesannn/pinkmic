@extends('layouts.app')

@section('title', $studio->name . ' - PINKMIC RECORDS')

@section('content')
<section class="detail">
    <img src="{{ $studio->image ?: asset('images/placeholder.svg') }}" alt="{{ $studio->name }}" onerror="this.onerror=null;this.src='{{ asset('images/placeholder.svg') }}'">
    <div>
        <p class="eyebrow">{{ $studio->type }}</p>
        <h1>{{ $studio->name }}</h1>
        <p>📍 {{ $studio->location }}</p>
        <p>{{ $studio->description }}</p>
        <p>👥 Maks. {{ $studio->capacity }} orang</p>
        <h2>Rp {{ number_format($studio->price_per_hour, 0, ',', '.') }} <small>/ jam</small></h2>

        @if(session('user_id'))
            <form class="booking" method="post" action="{{ route('booking.store', $studio) }}">
                @csrf
                <h3>Booking sekarang</h3>
                <input type="date" name="booking_date" min="{{ date('Y-m-d') }}" value="{{ old('booking_date') }}" required>
                <div>
                    <input type="time" name="start_time" value="{{ old('start_time') }}" required>
                    <input type="time" name="end_time" value="{{ old('end_time') }}" required>
                </div>
                <button class="cta" type="submit">Ajukan Booking</button>
            </form>
        @else
            <a class="cta" href="{{ route('login') }}">Login untuk Booking</a>
        @endif
    </div>
</section>
@endsection
