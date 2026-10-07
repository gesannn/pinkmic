<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Studio;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'stats' => [
                'studios' => Studio::count(),
                'bookings' => Booking::count(),
                'users' => User::where('role', 'user')->count(),
                'pending' => Booking::where('status', 'pending')->count(),
            ],
        ]);
    }
}
