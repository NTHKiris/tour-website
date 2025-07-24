<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
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
            'subscribers' => $this->faker->numberBetween(0, 1000),
            'link' => $this->faker->slug,
            'category_id' => \App\Models\PostCategory::factory(), // Tạo mới category nếu cần
            'author_id' => \App\Models\User::factory(), // Tạo mới user nếu cần
        ];
    }
}
