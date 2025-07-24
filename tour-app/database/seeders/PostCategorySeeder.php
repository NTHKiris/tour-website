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
                'name' => 'Địa điểm nổi bật',
                'slug' => 'highlights',
                'description' => 'Các địa điểm du lịch nổi tiếng tại Quy Nhơn.',
            ],
            [
                'name' => 'Ẩm Thực',
                'slug' => 'food',
                'description' => 'Khám phá ẩm thực đặc sản và quán ăn nổi bật.',
            ],
            [
                'name' => 'Tips & Tricks',
                'slug' => 'tips',
                'description' => 'Kinh nghiệm, mẹo hay khi du lịch Quy Nhơn.',
            ],
            [
                'name' => 'Văn Hóa & Lễ Hội',
                'slug' => 'culture',
                'description' => 'Thông tin về văn hóa, lễ hội truyền thống.',
            ],
            [
                'name' => 'Chỗ ở',
                'slug' => 'accommodation',
                'description' => 'Khách sạn, homestay, resort tại Quy Nhơn.',
            ],
            [
                'name' => 'Review Tour',
                'slug' => 'review',
                'description' => 'Đánh giá các tour và dịch vụ du lịch.',
            ],
            [
                'name' => 'Tin Tức & Sự Kiện',
                'slug' => 'news',
                'description' => 'Cập nhật tin tức, sự kiện du lịch mới nhất.',
            ],
            [
                'name' => 'Hoạt động giải trí',
                'slug' => 'activities',
                'description' => 'Các hoạt động vui chơi, giải trí hấp dẫn.',
            ],
        ];

        foreach ($categories as $cat) {
            PostCategory::create($cat);
        }
    }
}
