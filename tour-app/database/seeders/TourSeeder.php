<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tour;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // tạm tắt
        DB::table('tours')->delete(); // xóa dữ liệu cũ nếu có

        for ($i = 1; $i <= 20; $i++) {
            DB::table('tours')->insert([
                'title' => "Tour Quy Nhơn $i",
                'slug' => Str::slug("Tour Quy Nhơn $i"),
                'description' => "Khám phá vẻ đẹp thiên nhiên và văn hóa của Quy Nhơn trong hành trình Tour Quy Nhơn $i.",
                'itinerary' => json_encode([
                    'Day 1' => 'Tham quan Kỳ Co & Eo Gió',
                    'Day 2' => 'Khám phá thành cổ Đồ Bàn và bảo tàng Quang Trung'
                ]),
                'duration' => rand(2, 5),
                'price' => rand(1000000, 5000000),
                'max_participants' => rand(10, 30),
                'destination_id' => rand(1, 20), 
                'user_id' => 1, 
                'status' => 'Active',
                'featured' => rand(0, 1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // bật lại
    }
}
