@extends('layouts.app')

@section('title', 'Kelola Booking - PINKMIC RECORDS')

@section('content')
<section class="section">
    <p class="eyebrow">ADMIN</p>
    <h1>Kelola Booking</h1>
    <div class="table-wrap">
        <table>
            <tr>
                <th>User</th><th>Studio</th><th>Jadwal</th><th>Total</th><th>Status</th><th>Aksi</th>
            </tr>
            @forelse($bookings as $b)
                <tr>
                    <td>{{ $b->user->name ?? '-' }}</td>
                    <td>{{ $b->studio->name ?? '-' }}</td>
                    <td>{{ $b->booking_date->format('d/m/Y') }} {{ substr($b->start_time, 0, 5) }}-{{ substr($b->end_time, 0, 5) }}</td>
                    <td>Rp {{ number_format($b->total_price, 0, ',', '.') }}</td>
                    <td><span class="status {{ $b->status }}">{{ $b->status }}</span></td>
                    <td>
                        @if($b->status === 'pending')
                            <form style="display:inline" method="post" action="{{ route('admin.bookings.status', [$b, 'confirmed']) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit">Konfirmasi</button>
                            </form>
                            <form style="display:inline" method="post" action="{{ route('admin.bookings.status', [$b, 'rejected']) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit">Tolak</button>
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
