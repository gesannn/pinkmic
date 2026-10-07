@extends('layouts.app')

@section('title', 'Booking Saya - PINKMIC RECORDS')

@section('content')
<section class="section">
    <p class="eyebrow">MY BOOKING</p>
    <h1>Booking Saya</h1>
    <div class="table-wrap">
        <table>
            <tr>
                <th>Studio</th><th>Tanggal</th><th>Jam</th><th>Total</th><th>Status</th><th></th>
            </tr>
            @forelse($bookings as $b)
                <tr>
                    <td>{{ $b->studio->name ?? '-' }}</td>
                    <td>{{ $b->booking_date->format('d/m/Y') }}</td>
                    <td>{{ substr($b->start_time, 0, 5) }} - {{ substr($b->end_time, 0, 5) }}</td>
                    <td>Rp {{ number_format($b->total_price, 0, ',', '.') }}</td>
                    <td><span class="status {{ $b->status }}">{{ $b->status }}</span></td>
                    <td>
                        @if(in_array($b->status, ['pending', 'confirmed']))
                            <form method="post" action="{{ route('booking.cancel', $b) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit">Batalkan</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">Belum ada booking.</td></tr>
            @endforelse
        </table>
    </div>
</section>
@endsection
