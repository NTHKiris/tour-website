<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        $authorId = User::first()->id ?? 1;

        $categories = PostCategory::whereIn('slug', [
            'highlights',
            'activities',
            'news',
            'food',
            'accommodation',
            'review',
            'tips'
        ])->pluck('id', 'slug');

        $posts = [
            [
                'title' => 'Quy Nhơn Tour 3 Days 2 Nights: The land of martial arts',
                'link' => 'https://quynhontourist.com/en/quy-nhon-tour-3-days-2-nights/',
                'description' => 'Tour 3 ngày 2 đêm khám phá Quy Nhơn – Bồng Sơn, Hàm Hoà, Kỳ Co, Eo Gió… trong vùng đất võ truyền thống.',
                'category_slug' => 'review',
            ],
            [
                'title' => 'Ky Co Tour (By Road) – Eo Gio Heaven in one day',
                'link' => 'https://quynhontourist.com/en/ky-co-tour-by-road-eo-gio-heaven-in-one-day/',
                'description' => 'Tour 1 ngày bằng ô tô, khám phá Eo Gió – Kỳ Co, một trong những “thiên đường” biển Quy Nhơn.',
                'category_slug' => 'activities',
            ],
            [
                'title' => 'Quy Nhon City Tour: Discover the peaceful coastal city in one day',
                'link' => 'https://quynhontourist.com/en/quy-nhon-city-tour/',
                'description' => 'Tour nửa ngày khám phá thành phố Quy Nhơn yên bình, các điểm check‑in và văn hóa đặc trưng.',
                'category_slug' => 'highlights',
            ],
            [
                'title' => 'Two Quy Nhon island tour in one day: Hon Kho island – Ky Co Beach',
                'link' => 'https://quynhontourist.com/en/two-quy-nhon-island-tour-in-one-day/',
                'description' => 'Khám phá Hòn Khô – Kỳ Co trong một ngày, lặn ngắm san hô và thưởng ngoạn biển trời.',
                'category_slug' => 'activities',
            ],
            [
                'title' => 'Ky Co Resort Tour 2 Days 1 Night: Overnight in Heaven',
                'link' => 'https://quynhontourist.com/en/ky-co-resort-tour-2-days-1-night/',
                'description' => 'Tour 2 ngày 1 đêm nghỉ dưỡng ở Ky Co Resort, ngắm bình minh và hoàng hôn tại thiên đường biển.',
                'category_slug' => 'accommodation',
            ],
            [
                'title' => 'Top 9 homestay Quy Nhơn cho thuê nguyên căn mới nhất 2025',
                'link' => 'https://quynhontourist.com/homestay-quy-nhon-cho-thue-nguyen-can-tu-quan/',
                'description' => 'Danh sách 9 homestay nguyên căn tại Quy Nhơn, phù hợp cho nhóm đông và trải nghiệm tự do.',
                'category_slug' => 'accommodation',
            ],
            [
                'title' => 'Chill hết cỡ với TOP 6 homestay Nhơn Lý đẹp “thần sầu”',
                'link' => 'https://quynhontourist.com/top-6-homestay-nhon-ly/',
                'description' => 'Tổng hợp 6 homestay ven biển Nhơn Lý với không gian chill cực “xịn” cho nhóm bạn hoặc cặp đôi.',
                'category_slug' => 'accommodation',
            ],
            [
                'title' => '[REVIEW] Du lịch Tuy Hòa – Quy Nhơn 4 ngày 3 đêm cực chi tiết',
                'link' => 'https://quynhontourist.com/review-du-lich-tuy-hoa-quy-nhon-4-ngay-3-dem/',
                'description' => 'Review chi tiết lịch trình 4 ngày 3 đêm khám phá Tuy Hòa và Quy Nhơn, đầy đủ chi phí và trải nghiệm.',
                'category_slug' => 'review',
            ],
            [
                'title' => 'Top homestay Cù Lao Xanh giá siêu hời',
                'link' => 'https://quynhontourist.com/khach-san-homestay-cu-lao-xanh/',
                'description' => 'Lựa chọn homestay giá rẻ Cù Lao Xanh – từ 100k/phòng, view biển xanh, phù hợp đi nhóm và yêu thiên nhiên.',
                'category_slug' => 'accommodation',
            ],
            [
                'title' => 'Quy Nhơn Team Building Tour one day: We are one',
                'link' => 'https://quynhontourist.com/en/quy-nhon-team-building-tour-one-day-we-are-one/',
                'description' => 'Tour team building 1 ngày tại Quy Nhơn, kết hợp vui chơi tập thể và tham quan những điểm nổi bật trong thành phố.',
                'category_slug' => 'activities',
            ],
        ];

        foreach ($posts as $data) {
            if (isset($categories[$data['category_slug']])) {
                Post::create([
                    'title' => $data['title'],
                    'link' => $data['link'],
                    'description' => $data['description'],
                    'category_id' => $categories[$data['category_slug']],
                    'author_id' => $authorId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}