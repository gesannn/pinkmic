<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Studio;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $bookings = Booking::with('studio')
            ->where('user_id', $request->session()->get('user_id'))
            ->latest('id')
            ->get();

        return view('user.bookings', compact('bookings'));
    }

    public function store(Request $request, Studio $studio)
    {
        $data = $request->validate([
            'booking_date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
        ]);

        if ($data['end_time'] <= $data['start_time']) {
            return back()->withInput()->with('error', 'Jam selesai harus setelah jam mulai.');
        }

        $conflict = Booking::where('studio_id', $studio->id)
            ->where('booking_date', $data['booking_date'])
            ->whereIn('status', ['pending', 'confirmed'])
            ->where('start_time', '<', $data['end_time'])
            ->where('end_time', '>', $data['start_time'])
            ->exists();

        if ($conflict) {
            return back()->withInput()->with('error', 'Jadwal tersebut sudah dipesan. Pilih jam lain.');
        }

        $hours = (strtotime($data['end_time']) - strtotime($data['start_time'])) / 3600;

        Booking::create([
            'user_id' => $request->session()->get('user_id'),
            'studio_id' => $studio->id,
            'booking_date' => $data['booking_date'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
            'total_price' => $hours * $studio->price_per_hour,
            'status' => 'pending',
        ]);

        return redirect()->route('user.bookings')->with('success', 'Booking berhasil dibuat dan menunggu konfirmasi admin.');
    }

    public function cancel(Request $request, Booking $booking)
    {
        abort_unless($booking->user_id == $request->session()->get('user_id'), 403);

        if (in_array($booking->status, ['pending', 'confirmed'], true)) {
            $booking->update(['status' => 'cancelled']);
        }

        return back()->with('success', 'Booking dibatalkan.');
    }
}
