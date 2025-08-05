<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Điểm đến',
                'description' => 'Khám phá những điểm đến tuyệt vời tại Quy Nhơn và Bình Định',
            ],
            [
                'name' => 'Ẩm thực',
                'description' => 'Những món ăn đặc sản không thể bỏ qua khi đến Quy Nhơn',
            ],
            [
                'name' => 'Lịch sử - Văn hóa',
                'description' => 'Tìm hiểu về lịch sử và văn hóa phong phú của vùng đất Bình Định',
            ],
            [
                'name' => 'Kinh nghiệm du lịch',
                'description' => 'Những kinh nghiệm hữu ích cho chuyến du lịch Quy Nhơn',
            ],
            [
                'name' => 'Lễ hội - Sự kiện',
                'description' => 'Các lễ hội và sự kiện văn hóa đặc sắc tại Bình Định',
            ],
            [
                'name' => 'Khách sạn - Lưu trú',
                'description' => 'Gợi ý những nơi lưu trú tốt nhất tại Quy Nhơn',
            ],
        ];

        foreach ($categories as $category) {
            $category['slug'] = \Str::slug($category['name']);
            PostCategory::create($category);
        }
    }
}