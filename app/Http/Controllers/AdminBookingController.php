<?php

namespace App\Http\Controllers;

use App\Models\Booking;

class AdminBookingController extends Controller
{
    public function index()
    {
        return view('admin.bookings.index', [
            'bookings' => Booking::with(['user', 'studio'])->latest('id')->get(),
        ]);
    }

    public function status(Booking $booking, string $status)
    {
        abort_unless(in_array($status, ['confirmed', 'rejected', 'cancelled'], true), 404);

        $booking->update(['status' => $status]);

        return back()->with('success', 'Status booking diperbarui.');
    }
}
