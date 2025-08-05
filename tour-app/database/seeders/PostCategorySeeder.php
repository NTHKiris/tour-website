<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tắt kiểm tra khóa ngoại
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Xóa dữ liệu trước
        DB::table('post_categories')->delete();
        DB::statement('ALTER TABLE post_categories AUTO_INCREMENT = 1');

        // Bật lại kiểm tra khóa ngoại
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        $categories = [
            // Các danh mục thêm để dùng trong PostSeeder
            'Review',
            'Activities',
            'Highlights',
            'News',
            'Food',
            'Accommodation',
            'Tips',

            // Các danh mục khác như ban đầu nếu muốn giữ lại
            'Bãi biển',
            'Khu nghỉ dưỡng',
            'Địa điểm check-in',
            'Ẩm thực địa phương',
            'Thám hiểm',
            'Du lịch sinh thái',
            'Du lịch tâm linh',
            'Lễ hội & Văn hóa',
            'Chợ & mua sắm',
            'Câu cá & lặn biển',
            'Đảo & bán đảo',
            'Lịch sử & Kiến trúc',
            'Cắm trại & dã ngoại',
            'Thể thao biển',
            'Tham quan làng nghề',
            'Trải nghiệm địa phương',
            'Quán cà phê nổi tiếng',
            'Đi bộ đường dài',
            'Chụp ảnh nghệ thuật',
            'Hành trình gia đình'
        ];

        foreach ($categories as $name) {
            DB::table('post_categories')->insert([
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => "Danh mục: $name ở Quy Nhơn",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
    }
}