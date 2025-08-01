<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostCategory>
 */
class PostCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->randomElement([
            'Điểm đến hot',
            'Ẩm thực địa phương',
            'Văn hóa truyền thống',
            'Kinh nghiệm du lịch',
            'Lễ hội đặc sắc',
            'Khách sạn cao cấp',
            'Resort nghỉ dưỡng',
            'Homestay ấm cúng',
            'Phương tiện di chuyển',
            'Mua sắm - Quà tặng',
            'Hoạt động giải trí',
            'Tour trọn gói',
        ]);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->sentence(10),
        ];
    }
}