<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(4),
            'image' => 'storage/event.jpg',
            'start_date' => $this->faker->dateTimeBetween('+1 days', '+1 month'),
            'end_date' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'location' => $this->faker->city(),
            'user_id' => User::where('role', 'organizer')
                ->inRandomOrder()
                ->value('id'),
        ];
    }

    public function organizer(User $organizer)
    {
        return $this->state(fn () => [
            'user_id' => $organizer->id,
        ]);
    }
}
