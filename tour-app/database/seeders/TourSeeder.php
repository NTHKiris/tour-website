<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tour;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = User::first()->id ?? 1;

        $tours = [
            [
                'title' => 'Tour Eo Gió - Kỳ Co 1 ngày: Thiên đường biển đảo',
                'description' => 'Tham gia tour 1 ngày khám phá Eo Gió - Kỳ Co, hai trong những điểm đến đẹp nhất Quy Nhơn với vẻ đẹp hoang sơ và nước biển trong xanh như ngọc bích. Tour bao gồm tham quan Eo Gió - vịnh biển đẹp nhất Quy Nhơn, tắm biển tại Kỳ Co được mệnh danh là "Maldives của Việt Nam", lặn ngắm san hô và cá nhiệt đới, thưởng thức hải sản tươi sống và chụp ảnh tại những điểm check-in nổi tiếng. Dịch vụ bao gồm xe ô tô đời mới máy lạnh đưa đón tận nơi, hướng dẫn viên nhiệt tình am hiểu địa phương, bữa trưa hải sản tại nhà hàng ven biển, vé tham quan các điểm du lịch, bảo hiểm du lịch, nước suối và khăn lạnh. Tour phù hợp cho mọi lứa tuổi, đặc biệt lý tưởng cho gia đình, cặp đôi và nhóm bạn muốn khám phá vẻ đẹp thiên nhiên hoang sơ của Quy Nhơn.',
                'itinerary' => [
                    '07:00 - 08:00' => 'Đón khách tại khách sạn, khởi hành đi Eo Gió',
                    '08:30 - 10:30' => 'Tham quan Eo Gió, chụp ảnh, ngắm cảnh',
                    '11:00 - 12:00' => 'Di chuyển đến Kỳ Co, tắm biển thư giãn',
                    '12:00 - 13:30' => 'Ăn trưa hải sản tại nhà hàng ven biển',
                    '13:30 - 15:30' => 'Tự do tắm biển, lặn ngắm san hô (tùy chọn)',
                    '15:30 - 16:00' => 'Chuẩn bị về, mua sắm đặc sản',
                    '17:00' => 'Về đến trung tâm Quy Nhơn, kết thúc tour'
                ],
                'duration' => 1,
                'price' => 850000,
                'max_participants' => 25,
                'destination_id' => 1,
                'status' => 'Active',
                'featured' => 1,
                'images' => [
                    'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=800',
                    'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800',
                    'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800'
                ]
            ],
            [
                'title' => 'Tour Cù Lao Xanh 1 ngày: Khám phá đảo Yến hoang sơ',
                'description' => 'Tham gia tour 1 ngày khám phá Cù Lao Xanh (đảo Yến), hòn đảo hoang sơ với hệ sinh thái biển phong phú và những bãi biển cát trắng tuyệt đẹp. Trải nghiệm độc đáo bao gồm đi tàu cao tốc ra đảo Cù Lao Xanh, lặn ngắm san hô trong làn nước trong vắt, tham quan hang động tự nhiên, thưởng thức yến sào - đặc sản quý hiếm, câu cá cùng ngư dân địa phương và trekking khám phá toàn bộ hòn đảo. Điểm đặc biệt của tour là hệ sinh thái biển đa dạng với hơn 50 loài san hô, nước biển trong suốt với tầm nhìn sâu 15-20m, không gian yên tĩnh hoang sơ và cơ hội gặp rùa biển cùng cá nhiệt đới. Tour dành cho những ai yêu thích khám phá thiên nhiên hoang dã và muốn trải nghiệm cuộc sống của cộng đồng ngư dân truyền thống.',
                'itinerary' => [
                    '06:30 - 07:30' => 'Đón khách, di chuyển đến cảng Nhơn Hải',
                    '08:00 - 08:30' => 'Đi tàu cao tốc ra Cù Lao Xanh',
                    '09:00 - 11:00' => 'Tham quan đảo, lặn ngắm san hô',
                    '11:00 - 12:30' => 'Trekking khám phá hang động, chụp ảnh',
                    '12:30 - 14:00' => 'Ăn trưa hải sản, thưởng thức yến sào',
                    '14:00 - 15:30' => 'Tự do tắm biển, câu cá',
                    '15:30 - 16:00' => 'Trở về đất liền',
                    '17:00' => 'Về đến Quy Nhơn, kết thúc tour'
                ],
                'duration' => 1,
                'price' => 1200000,
                'max_participants' => 20,
                'destination_id' => 2,
                'status' => 'Active',
                'featured' => 1,
                'images' => [
                    'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=800',
                    'https://images.unsplash.com/photo-1506197603052-3cc9c3a201bd?w=800',
                    'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=800'
                ]
            ],
            [
                'title' => 'Tour Quy Nhơn City 1 ngày: Khám phá thành phố biển',
                'description' => 'Tour city 1 ngày khám phá những điểm tham quan nổi tiếng nhất của thành phố Quy Nhơn, từ di tích lịch sử đến những bãi biển đẹp và ẩm thực đặc sắc. Điểm tham quan chính bao gồm Tháp Đôi (Tháp Chăm) - di tích Chăm Pa cổ kính, Bảo tàng Quy Nhơn để tìm hiểu lịch sử văn hóa, Nhà thờ Mằng Lăng với kiến trúc Gothic độc đáo, bãi biển Quy Nhơn để tắm biển thư giãn, Chợ Đầm mua sắm đặc sản địa phương và Cầu Thị Nai - cây cầu dài nhất Việt Nam. Trải nghiệm ẩm thực đặc sắc với bánh xèo tôm nhảy, chả cá nha đam, bánh ít lá gai và nem nướng Ninh Hòa thơm ngon khó cưỡng. Tour phù hợp cho những ai muốn tìm hiểu về văn hóa, lịch sử và ẩm thực của Quy Nhơn trong thời gian ngắn.',
                'itinerary' => [
                    '08:00 - 08:30' => 'Đón khách tại khách sạn',
                    '08:30 - 09:30' => 'Tham quan Tháp Đôi, tìm hiểu văn hóa Chăm',
                    '09:30 - 10:30' => 'Thăm Bảo tàng Quy Nhơn',
                    '10:30 - 11:30' => 'Tham quan Nhà thờ Mằng Lăng',
                    '11:30 - 12:30' => 'Ăn trưa tại nhà hàng địa phương',
                    '13:00 - 14:30' => 'Tắm biển tại bãi biển Quy Nhơn',
                    '14:30 - 15:30' => 'Mua sắm tại Chợ Đầm',
                    '15:30 - 16:30' => 'Ngắm hoàng hôn tại Cầu Thị Nai',
                    '17:00' => 'Kết thúc tour, đưa khách về khách sạn'
                ],
                'duration' => 1,
                'price' => 650000,
                'max_participants' => 30,
                'destination_id' => 3,
                'status' => 'Active',
                'featured' => 0,
                'images' => [
                    'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800',
                    'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=800',
                    'https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?w=800'
                ]
            ],
            [
                'title' => 'Tour Quy Nhơn 3 ngày 2 đêm: Trọn vẹn vùng đất võ',
                'description' => 'Khám phá trọn vẹn vẻ đẹp của Quy Nhơn - Bình Định trong 3 ngày 2 đêm với lịch trình được thiết kế kỹ lưỡng, kết hợp tham quan, nghỉ dưỡng và trải nghiệm văn hóa địa phương. Điểm nổi bật của tour bao gồm khám phá đầy đủ các điểm đến nổi tiếng nhất Quy Nhơn, nghỉ dưỡng tại resort 4 sao view biển, trải nghiệm ẩm thực đặc sắc miền Trung, tham quan di tích lịch sử Chăm Pa, hoạt động thể thao biển đa dạng và mua sắm đặc sản địa phương. Lưu trú cao cấp tại khách sạn/resort 4 sao tiêu chuẩn quốc tế với phòng view biển đầy đủ tiện nghi, bể bơi, spa, gym hiện đại và nhà hàng buffet đa dạng món ăn. Tour lý tưởng cho gia đình, nhóm bạn hoặc cặp đôi muốn có kỳ nghỉ trọn vẹn tại một trong những điểm đến đẹp nhất miền Trung.',
                'itinerary' => [
                    'Ngày 1' => 'Đón sân bay - Check in khách sạn - Tham quan thành phố - Ăn tối hải sản',
                    'Ngày 2' => 'Eo Gió - Kỳ Co - Tắm biển - Lặn ngắm san hô - BBQ bãi biển',
                    'Ngày 3' => 'Cù Lao Xanh - Mua sắm đặc sản - Ra sân bay'
                ],
                'duration' => 3,
                'price' => 4500000,
                'max_participants' => 20,
                'destination_id' => 1,
                'status' => 'Active',
                'featured' => 1,
                'images' => [
                    'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800',
                    'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=800',
                    'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=800'
                ]
            ],
            [
                'title' => 'Tour Team Building Quy Nhơn 2 ngày 1 đêm',
                'description' => 'Chương trình team building 2 ngày 1 đêm tại Quy Nhơn được thiết kế đặc biệt để tăng cường tinh thần đoàn kết, gắn kết các thành viên trong công ty thông qua các hoạt động vui chơi và thử thách hấp dẫn. Hoạt động team building bao gồm các trò chơi tập thể trên bãi biển, thử thách sinh tồn trên đảo, thi nấu ăn với hải sản tươi sống, đua thuyền kayak trên biển, thi kéo co và bóng chuyền bãi biển, cùng gala dinner với chương trình văn nghệ. Dịch vụ chuyên nghiệp với MC dẫn dắt chương trình, thiết bị âm thanh ánh sáng hiện đại, photographer chụp ảnh kỷ niệm, quà tặng và giải thưởng hấp dẫn, xe đưa đón tận nơi. Chương trình phù hợp cho các công ty, tổ chức muốn tổ chức team building trong không gian biển đảo tuyệt đẹp của Quy Nhơn.',
                'itinerary' => [
                    'Ngày 1 - Sáng' => 'Đón đoàn - Check in resort - Khai mạc chương trình',
                    'Ngày 1 - Chiều' => 'Các hoạt động team building trên bãi biển',
                    'Ngày 1 - Tối' => 'Gala dinner - Chương trình văn nghệ - Giao lưu',
                    'Ngày 2 - Sáng' => 'Tham quan Eo Gió - Kỳ Co - Thi thử thách',
                    'Ngày 2 - Chiều' => 'Bế mạc - Trao giải - Về lại thành phố'
                ],
                'duration' => 2,
                'price' => 2800000,
                'max_participants' => 50,
                'destination_id' => 1,
                'status' => 'Active',
                'featured' => 0,
                'images' => [
                    'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=800',
                    'https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?w=800',
                    'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800'
                ]
            ],
            [
                'title' => 'Tour Quy Nhơn - Phú Yên 4 ngày 3 đêm: Khám phá miền Trung',
                'description' => 'Hành trình khám phá hai tỉnh miền Trung xinh đẹp - Bình Định và Phú Yên, trải nghiệm những cảnh đẹp hoang sơ, ẩm thực đặc sắc và văn hóa phong phú của vùng đất võ truyền thống. Điểm đến nổi bật tại Quy Nhơn bao gồm Eo Gió, Kỳ Co, Cù Lao Xanh và Tháp Đôi, tại Tuy Hòa có Gành Đá Đĩa, Bãi Môn và Mũi Điện, cùng đảo Hòn Nưa để lặn ngắm san hô và câu cá, Vũng Rô - vịnh biển đẹp nhất Phú Yên. Trải nghiệm đặc biệt bao gồm ngắm bình minh tại Gành Đá Đĩa, tắm biển tại những bãi biển hoang sơ, thưởng thức ẩm thực hai miền, chụp ảnh tại các điểm check-in nổi tiếng và mua sắm đặc sản địa phương. Tour dành cho những ai muốn khám phá sâu hơn về vẻ đẹp thiên nhiên và văn hóa của miền Trung Việt Nam.',
                'itinerary' => [
                    'Ngày 1' => 'Đến Quy Nhơn - Tham quan thành phố - Nghỉ đêm',
                    'Ngày 2' => 'Eo Gió - Kỳ Co - Cù Lao Xanh - Nghỉ đêm Quy Nhơn',
                    'Ngày 3' => 'Di chuyển Tuy Hòa - Gành Đá Đĩa - Bãi Môn - Nghỉ đêm Tuy Hòa',
                    'Ngày 4' => 'Vũng Rô - Mũi Điện - Mua sắm - Ra sân bay'
                ],
                'duration' => 4,
                'price' => 6200000,
                'max_participants' => 16,
                'destination_id' => 4,
                'status' => 'Active',
                'featured' => 1,
                'images' => [
                    'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800',
                    'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=800',
                    'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=800'
                ]
            ]
        ];

        foreach ($tours as $data) {
            // Tạo tour
            $tour = Tour::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'description' => $data['description'],
                'itinerary' => json_encode($data['itinerary']),
                'duration' => $data['duration'],
                'price' => $data['price'],
                'max_participants' => $data['max_participants'],
                'destination_id' => $data['destination_id'],
                'user_id' => $userId,
                'status' => $data['status'],
                'featured' => $data['featured'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Thêm ảnh minh họa
            if (isset($data['images']) && is_array($data['images'])) {
                foreach ($data['images'] as $imageUrl) {
                    Image::create([
                        'url' => $imageUrl,
                        'alt' => $tour->title,
                        'imageable_id' => $tour->id,
                        'imageable_type' => Tour::class,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}