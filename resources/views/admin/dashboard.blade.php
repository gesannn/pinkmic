@extends('layouts.app')

@section('title', 'Admin - PINKMIC RECORDS')

@section('content')
<section class="section">
    <p class="eyebrow">CONTROL ROOM</p>
    <h1>Admin Dashboard</h1>
    <div class="stats">
        @foreach($stats as $label => $value)
            <div><small>{{ strtoupper($label) }}</small><strong>{{ $value }}</strong></div>
        @endforeach
    </div>
    <div class="admin-links">
        <a class="cta" href="{{ route('admin.studios.index') }}">Kelola Studio</a>
        <a class="outline" href="{{ route('admin.bookings.index') }}">Kelola Booking</a>
    </div>
</section>
@endsection
