<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizer = User::where('role', 'organizer')->first();

        if (! $organizer) {
            $this->command->warn('Organizer bulunamadı, EventSeeder atlandı.');
            return;
        }

        Event::factory()
            ->count(5)
            ->organizer($organizer)
            ->create();
    }
}
