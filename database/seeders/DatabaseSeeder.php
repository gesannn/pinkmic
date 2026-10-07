<?php

namespace Database\Seeders;

use App\Models\Studio;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@pinkmic.test'],
            ['name' => 'PINKMIC Admin', 'password' => Hash::make('password'), 'role' => 'admin']
        );

        User::updateOrCreate(
            ['email' => 'user@pinkmic.test'],
            ['name' => 'Demo User', 'password' => Hash::make('password'), 'role' => 'user']
        );

        if (Studio::count() === 0) {
            $studios = [
                [
                    'name' => 'Pink Room',
                    'location' => 'Panakkukang, Makassar',
                    'type' => 'Recording',
                    'description' => 'Ruang recording nyaman untuk vokal, podcast, dan produksi musik.',
                    'price_per_hour' => 100000,
                    'capacity' => 5,
                    'image' => 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=900',
                ],
                [
                    'name' => 'Live Room',
                    'location' => 'Tamalanrea, Makassar',
                    'type' => 'Band',
                    'description' => 'Studio luas untuk latihan band dengan perlengkapan lengkap.',
                    'price_per_hour' => 80000,
                    'capacity' => 8,
                    'image' => 'https://images.unsplash.com/photo-1524368535928-5b5e00ddc76b?w=900',
                ],
                [
                    'name' => 'Vocal Booth',
                    'location' => 'Rappocini, Makassar',
                    'type' => 'Vocal',
                    'description' => 'Booth kedap untuk take vokal dan voice over.',
                    'price_per_hour' => 75000,
                    'capacity' => 2,
                    'image' => null,
                ],
            ];

            foreach ($studios as $studio) {
                Studio::create($studio);
            }
        }
    }
}
