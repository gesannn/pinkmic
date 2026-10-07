<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    protected $fillable = ['name', 'type', 'location', 'description', 'price_per_hour', 'capacity', 'image'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
