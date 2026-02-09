<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('Test1234'),
            'role' => 'admin',
        ]);

        // Organizer
        User::create([
            'name' => 'Organizer',
            'email' => 'organizer@test.com',
            'password' => Hash::make('Test1234'),
            'role' => 'organizer',
        ]);

        // Attendee
        User::create([
            'name' => 'Attendee',
            'email' => 'attendee@test.com',
            'password' => Hash::make('Test1234'),
            'role' => 'attendee',
        ]);
    }
}
