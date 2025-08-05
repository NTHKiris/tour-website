<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('destinations')->delete(); // không dùng truncate vì có khóa ngoại
        DB::statement('ALTER TABLE destinations AUTO_INCREMENT = 1;');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('destinations')->insert([
            [
                'name' => 'Quy Nhơn 1',
                'slug' => 'quy-nhon-1',
                'description' => 'Thành phố biển Quy Nhơn - điểm đến hấp dẫn',
                'location' => 'Bình Định',
                'coordinates' => DB::raw("ST_GeomFromText('POINT(109.2296 13.7820)')"),
                'featured_image' => 'images/quy-nhon1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quy Nhơn 2',
                'slug' => 'quy-nhon-2',
                'description' => 'Du lịch Quy Nhơn – thiên đường nghỉ dưỡng',
                'location' => 'Bình Định',
                'coordinates' => DB::raw("ST_GeomFromText('POINT(109.2300 13.7821)')"),
                'featured_image' => 'images/quy-nhon2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quy Nhơn 3',
                'slug' => 'quy-nhon-3',
                'description' => 'Khám phá Eo Gió và Kỳ Co tại Quy Nhơn',
                'location' => 'Bình Định',
                'coordinates' => DB::raw("ST_GeomFromText('POINT(109.2310 13.7822)')"),
                'featured_image' => 'images/quy-nhon3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quy Nhơn 4',
                'slug' => 'quy-nhon-4',
                'description' => 'Khám phá Ghềnh Ráng Tiên Sa',
                'location' => 'Bình Định',
                'coordinates' => DB::raw("ST_GeomFromText('POINT(109.2320 13.7823)')"),
                'featured_image' => 'images/quy-nhon4.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quy Nhơn 5',
                'slug' => 'quy-nhon-5',
                'description' => 'Tắm biển Bãi Xép thơ mộng',
                'location' => 'Bình Định',
                'coordinates' => DB::raw("ST_GeomFromText('POINT(109.2330 13.7824)')"),
                'featured_image' => 'images/quy-nhon5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quy Nhơn 6',
                'slug' => 'quy-nhon-6',
                'description' => 'Tham quan Tháp Đôi Chăm cổ',
                'location' => 'Bình Định',
                'coordinates' => DB::raw("ST_GeomFromText('POINT(109.2340 13.7825)')"),
                'featured_image' => 'images/quy-nhon6.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quy Nhơn 7',
                'slug' => 'quy-nhon-7',
                'description' => 'Cù Lao Xanh – hòn ngọc biển khơi',
                'location' => 'Bình Định',
                'coordinates' => DB::raw("ST_GeomFromText('POINT(109.2350 13.7826)')"),
                'featured_image' => 'images/quy-nhon7.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quy Nhơn 8',
                'slug' => 'quy-nhon-8',
                'description' => 'Ngắm hoàng hôn ở Eo Gió',
                'location' => 'Bình Định',
                'coordinates' => DB::raw("ST_GeomFromText('POINT(109.2360 13.7827)')"),
                'featured_image' => 'images/quy-nhon8.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quy Nhơn 9',
                'slug' => 'quy-nhon-9',
                'description' => 'Tham quan Hòn Khô',
                'location' => 'Bình Định',
                'coordinates' => DB::raw("ST_GeomFromText('POINT(109.2370 13.7828)')"),
                'featured_image' => 'images/quy-nhon9.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quy Nhơn 10',
                'slug' => 'quy-nhon-10',
                'description' => 'Check-in cầu Thị Nại nổi tiếng',
                'location' => 'Bình Định',
                'coordinates' => DB::raw("ST_GeomFromText('POINT(109.2380 13.7829)')"),
                'featured_image' => 'images/quy-nhon10.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quy Nhơn 11',
                'slug' => 'quy-nhon-11',
                'description' => 'Thưởng thức hải sản tươi ngon',
                'location' => 'Bình Định',
                'coordinates' => DB::raw("ST_GeomFromText('POINT(109.2390 13.7830)')"),
                'featured_image' => 'images/quy-nhon11.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quy Nhơn 12',
                'slug' => 'quy-nhon-12',
                'description' => 'Du lịch tâm linh tại chùa Ông Núi',
                'location' => 'Bình Định',
                'coordinates' => DB::raw("ST_GeomFromText('POINT(109.2400 13.7831)')"),
                'featured_image' => 'images/quy-nhon12.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quy Nhơn 13',
                'slug' => 'quy-nhon-13',
                'description' => 'Đi bộ trên con đường xuyên biển',
                'location' => 'Bình Định',
                'coordinates' => DB::raw("ST_GeomFromText('POINT(109.2410 13.7832)')"),
                'featured_image' => 'images/quy-nhon13.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quy Nhơn 14',
                'slug' => 'quy-nhon-14',
                'description' => 'Khám phá đảo Kỳ Co bằng cano',
                'location' => 'Bình Định',
                'coordinates' => DB::raw("ST_GeomFromText('POINT(109.2420 13.7833)')"),
                'featured_image' => 'images/quy-nhon14.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quy Nhơn 15',
                'slug' => 'quy-nhon-15',
                'description' => 'Tận hưởng resort ven biển',
                'location' => 'Bình Định',
                'coordinates' => DB::raw("ST_GeomFromText('POINT(109.2430 13.7834)')"),
                'featured_image' => 'images/quy-nhon15.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quy Nhơn 16',
                'slug' => 'quy-nhon-16',
                'description' => 'Trải nghiệm chợ đêm Quy Nhơn',
                'location' => 'Bình Định',
                'coordinates' => DB::raw("ST_GeomFromText('POINT(109.2440 13.7835)')"),
                'featured_image' => 'images/quy-nhon16.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quy Nhơn 17',
                'slug' => 'quy-nhon-17',
                'description' => 'Lặn ngắm san hô tại Hòn Sẹo',
                'location' => 'Bình Định',
                'coordinates' => DB::raw("ST_GeomFromText('POINT(109.2450 13.7836)')"),
                'featured_image' => 'images/quy-nhon17.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quy Nhơn 18',
                'slug' => 'quy-nhon-18',
                'description' => 'Thư giãn tại Bãi Dại yên bình',
                'location' => 'Bình Định',
                'coordinates' => DB::raw("ST_GeomFromText('POINT(109.2460 13.7837)')"),
                'featured_image' => 'images/quy-nhon18.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quy Nhơn 19',
                'slug' => 'quy-nhon-19',
                'description' => 'Du ngoạn đồi cát Phương Mai',
                'location' => 'Bình Định',
                'coordinates' => DB::raw("ST_GeomFromText('POINT(109.2470 13.7838)')"),
                'featured_image' => 'images/quy-nhon19.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quy Nhơn 20',
                'slug' => 'quy-nhon-20',
                'description' => 'Vẻ đẹp hoang sơ của biển Quy Nhơn',
                'location' => 'Bình Định',
                'coordinates' => DB::raw("ST_GeomFromText('POINT(109.2480 13.7840)')"),
                'featured_image' => 'images/quy-nhon20.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
