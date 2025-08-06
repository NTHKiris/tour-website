<?php

namespace Database\Factories;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destination>
 */
class DestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        // Định nghĩa tọa độ
        $latitude = $this->faker->latitude;
        $longitude = $this->faker->longitude;
        return [
            'name' => $this->faker->city,
            'slug' => $this->faker->slug,
            'description' => $this->faker->text,
            'location' => $this->faker->country,
            'coordinates' => DB::raw("ST_GeomFromText('POINT($longitude $latitude)')"),
            'featured_image' => $this->faker->imageUrl,
        ];
    }

    
}
