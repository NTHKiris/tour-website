<?php

namespace Database\Seeders;

use App\Models\Destination;
use App\Models\Image;
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
        $destinations = [
            [
                'name' => 'Eo Gió - Kỳ Co',
                'description' => 'Eo Gió và Kỳ Co được mệnh danh là "thiên đường biển đảo" của Quy Nhơn, nơi sở hữu vẻ đẹp hoang sơ và thơ mộng khiến bất kỳ du khách nào cũng phải say đắm. Eo Gió nằm cách trung tâm thành phố Quy Nhơn khoảng 20km về phía Đông Nam, là một vịnh nhỏ được bao quanh bởi những vách đá cao chót vót, tạo nên một khung cảnh hùng vĩ và thơ mộng với vách đá granite tự nhiên và nước biển trong xanh. Kỳ Co sở hữu bãi cát trắng mịn màng và nước biển trong vắt, là nơi lý tưởng để tắm biển, lặn ngắm san hô và thưởng thức hải sản tươi sống. Nơi đây có hệ sinh thái san hô đa dạng, cá nhiệt đới phong phú, dịch vụ nhà hàng hải sản và cho thuê đồ lặn, cùng các resort cao cấp và homestay ven biển.',
                'location' => 'Nhơn Lý, Quy Nhơn, Bình Định',
                'coordinates' => [109.3167, 13.8833],
                'featured_image' => 'destinations/eo-gio-ky-co.jpg',
                'images' => [
                    'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=800',
                    'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800',
                    'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800'
                ]
            ],
            [
                'name' => 'Cù Lao Xanh (Đảo Yến)',
                'description' => 'Cù Lao Xanh, hay còn gọi là đảo Yến, là một hòn đảo nhỏ nằm cách bờ biển Quy Nhơn khoảng 24km. Với vẻ đẹp hoang sơ, hệ sinh thái biển phong phú và những bãi cát trắng tuyệt đẹp, đây là điểm đến lý tưởng cho những ai yêu thích khám phá thiên nhiên. Hòn đảo có diện tích khoảng 3km² với khoảng 3.000 người dân chủ yếu là ngư dân, nổi tiếng với đặc sản yến sào, tôm hùm và cua biển. Hệ sinh thái biển đa dạng với hơn 50 loài san hô và cá nhiệt đới phong phú. Du khách có thể trải nghiệm lặn ngắm san hô với độ trong 15-20m, câu cá cùng ngư dân địa phương, trekking khám phá toàn bộ hòn đảo, cắm trại qua đêm trên bãi biển và thưởng thức hải sản tươi sống. Thời gian tốt nhất để tham quan là mùa khô từ tháng 3-9, đặc biệt là tháng 4-8 khi biển lặng và thời tiết đẹp.',
                'location' => 'Nhơn Hải, An Nhơn, Bình Định',
                'coordinates' => [109.4167, 13.9167],
                'featured_image' => 'destinations/cu-lao-xanh.jpg',
                'images' => [
                    'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=800',
                    'https://images.unsplash.com/photo-1506197603052-3cc9c3a201bd?w=800',
                    'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=800'
                ]
            ],
            [
                'name' => 'Thành phố Quy Nhơn',
                'description' => 'Quy Nhơn là thành phố biển xinh đẹp, trung tâm chính trị, kinh tế, văn hóa của tỉnh Bình Định. Với lịch sử lâu đời, văn hóa đa dạng và những bãi biển tuyệt đẹp, Quy Nhơn là điểm đến hấp dẫn cho du khách trong và ngoài nước. Điểm tham quan nổi bật bao gồm Tháp Đôi - di tích Chăm Pa cổ kính từ thế kỷ 12, Bảo tàng Quy Nhơn trưng bày hiện vật lịch sử văn hóa, Nhà thờ Mằng Lăng với kiến trúc Gothic độc đáo, Cầu Thị Nai - cây cầu dài nhất Việt Nam (12,9km) và bãi biển Quy Nhơn ngay trung tâm thành phố. Ẩm thực đặc sắc với bánh xèo tôm nhảy, chả cá nha đam, bánh ít lá gai, nem nướng Ninh Hòa và bún chả cá. Thành phố có đầy đủ các loại hình lưu trú từ khách sạn 5 sao, resort cao cấp đến homestay, nhà nghỉ bình dân, phù hợp với mọi nhu cầu và ngân sách.',
                'location' => 'Quy Nhơn, Bình Định',
                'coordinates' => [109.2296, 13.7820],
                'featured_image' => 'destinations/quy-nhon-city.jpg',
                'images' => [
                    'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800',
                    'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=800',
                    'https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?w=800'
                ]
            ],
            [
                'name' => 'Tuy Hòa - Phú Yên',
                'description' => 'Tuy Hòa là thành phố biển xinh đẹp của tỉnh Phú Yên, nổi tiếng với Gành Đá Đĩa kỳ vĩ, những bãi biển hoang sơ và ẩm thực đặc sắc. Đây là điểm đến lý tưởng để khám phá vẻ đẹp thiên nhiên độc đáo của miền Trung. Điểm đến nổi bật bao gồm Gành Đá Đĩa - kỳ quan thiên nhiên với những cột đá basalt hình lục giác, Bãi Môn với bãi biển hoang sơ cát vàng mịn, Mũi Điện có ngọn hải đăng cổ và view biển tuyệt đẹp, Vũng Rô - vịnh biển đẹp nhất Phú Yên và đảo Hòn Nưa với san hô đa dạng. Trải nghiệm độc đáo bao gồm ngắm bình minh tại Gành Đá Đĩa vào lúc 5:30 sáng, lặn ngắm san hô tại đảo Hòn Nưa, tắm biển tại các bãi biển hoang sơ, chụp ảnh tại các điểm check-in nổi tiếng và thưởng thức hải sản tại các làng chài ven biển. Ẩm thực Phú Yên đặc trưng với bánh căn, bánh xèo tôm nhảy phiên bản Phú Yên, ốc gạo, bánh bèo và chả ram tôm đất.',
                'location' => 'Tuy Hòa, Phú Yên',
                'coordinates' => [109.2958, 13.0955],
                'featured_image' => 'destinations/tuy-hoa.jpg',
                'images' => [
                    'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800',
                    'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=800',
                    'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=800'
                ]
            ],
            [
                'name' => 'Ghềnh Ráng - Tiên Sa',
                'description' => 'Ghềnh Ráng - Tiên Sa là một trong những bãi biển đẹp nhất Quy Nhơn, nổi tiếng với những tảng đá granite khổng lồ, bãi cát vàng mịn và làn nước biển trong xanh. Đây cũng là nơi gắn liền với tên tuổi của nhà thơ Hàn Mặc Tử. Vẻ đẹp thiên nhiên với bãi biển cát vàng mịn, nước biển trong xanh, những tảng đá granite khổng lồ tự nhiên, rừng dương xanh mát tạo bóng râm và không gian yên tĩnh thơ mộng lãng mạn. Hoạt động du lịch bao gồm tắm biển với nước trong sóng nhẹ an toàn, chụp ảnh với nhiều góc đẹp cùng ghềnh đá, ngắm hoàng hôn với khung cảnh lãng mạn vào chiều tà, dã ngoại picnic dưới bóng cây dương và thể thao biển như lướt ván, chèo kayak. Nơi đây có bia tưởng niệm Hàn Mặc Tử tôn vinh nhà thơ tài hoa, đình Tiên Sa với kiến trúc truyền thống và làng chài với đời sống ngư dân địa phương.',
                'location' => 'Tiên Sa, Quy Nhơn, Bình Định',
                'coordinates' => [109.2500, 13.7500],
                'featured_image' => 'destinations/ghenh-rang-tien-sa.jpg',
                'images' => [
                    'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800',
                    'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800',
                    'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=800'
                ]
            ],
            [
                'name' => 'Bãi Xép',
                'description' => 'Bãi Xép là một trong những bãi biển hoang sơ và đẹp nhất của Quy Nhơn, nằm ở xã Nhơn Lý, cách trung tâm thành phố khoảng 20km. Với vẻ đẹp nguyên sơ, nước biển trong xanh và không gian yên tĩnh, Bãi Xép là điểm đến lý tưởng cho những ai muốn tìm kiếm sự bình yên. Đặc điểm nổi bật với bãi biển dài 3km có cát trắng mịn và nước trong xanh, địa hình được bao quanh bởi những ngọn núi xanh, không gian hoang sơ yên tĩnh ít du khách và sóng biển nhẹ nhàng phù hợp tắm biển. Hoạt động trải nghiệm bao gồm tắm biển với nước trong sạch an toàn, chụp ảnh khung cảnh hoang sơ thơ mộng, cắm trại qua đêm trên bãi biển, câu cá từ bờ hoặc thuê thuyền ra khơi và ngắm bình minh với khung cảnh tuyệt đẹp vào sáng sớm. Dịch vụ và tiện ích có vài nhà hàng hải sản nhỏ phục vụ du khách, cho thuê dù ghế với giá cả hợp lý, một số homestay của gia đình địa phương và bãi đỗ xe miễn phí gần bãi biển.',
                'location' => 'Nhơn Lý, Quy Nhơn, Bình Định',
                'coordinates' => [109.3000, 13.8500],
                'featured_image' => 'destinations/bai-xep.jpg',
                'images' => [
                    'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=800',
                    'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800',
                    'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800'
                ]
            ]
        ];

        foreach ($destinations as $data) {
            // Tạo destination
            $destination = Destination::create([
                'name' => $data['name'],
                'slug' => Str::slug($data['name']),
                'description' => $data['description'],
                'location' => $data['location'],
                'coordinates' => DB::raw("ST_GeomFromText('POINT({$data['coordinates'][0]} {$data['coordinates'][1]})')"),
                'featured_image' => $data['featured_image'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Thêm ảnh minh họa
            if (isset($data['images']) && is_array($data['images'])) {
                foreach ($data['images'] as $imageUrl) {
                    Image::create([
                        'url' => $imageUrl,
                        'alt' => $destination->name,
                        'imageable_id' => $destination->id,
                        'imageable_type' => Destination::class,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}