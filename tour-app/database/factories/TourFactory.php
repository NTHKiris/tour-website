<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour>
 */
class TourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'description' => $this->faker->text,
            'itinerary' => json_encode(['Day 1' => $this->faker->sentence, 'Day 2' => $this->faker->sentence]),
            'duration' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->randomFloat(2, 50, 500),
            'max_participants' => $this->faker->numberBetween(1, 20),
            'destination_id' => \App\Models\Destination::factory(), // Tạo mới destination nếu cần
            'user_id' => \App\Models\User::factory(), // Tạo mới user nếu cần
            'status' => $this->faker->randomElement(['active', 'inactive', 'draft']),
            'featured' => $this->faker->boolean,
        ];
    }
}
