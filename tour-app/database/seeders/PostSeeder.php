<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use App\Models\Image;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        // Lấy categories theo slug từ PostCategorySeeder
        $categories = PostCategory::pluck('id', 'slug');

        $posts = [
            [
                'title' => 'Khám phá Eo Gió - Kỳ Co: Thiên đường biển đảo Quy Nhơn',
                'link' => 'https://www.vietnambooking.com/du-lich/eo-gio-ky-co-quy-nhon.html',
                'description' => '<h2>Eo Gió - Kỳ Co: Điểm đến không thể bỏ qua tại Quy Nhơn</h2>

                <p>Eo Gió và Kỳ Co được mệnh danh là "thiên đường biển đảo" của Quy Nhơn, nơi sở hữu vẻ đẹp hoang sơ và thơ mộng khiến bất kỳ du khách nào cũng phải say đắm.</p>

                <h3>Eo Gió - Nơi gió biển hòa quyện</h3>
                <p>Eo Gió nằm cách trung tâm thành phố Quy Nhơn khoảng 20km về phía Đông Nam. Đây là một vịnh nhỏ được bao quanh bởi những vách đá cao chót vót, tạo nên một khung cảnh hùng vĩ và thơ mộng.</p>

                <p><strong>Điểm nổi bật của Eo Gió:</strong></p>
                <ul>
                <li>Vách đá dựng đứng cao hàng chục mét</li>
                <li>Nước biển trong xanh như ngọc bích</li>
                <li>Không gian yên tĩnh, hoang sơ</li>
                <li>Điểm chụp ảnh "sống ảo" tuyệt đẹp</li>
                </ul>

                <h3>Kỳ Co - Maldives của Việt Nam</h3>
                <p>Cách Eo Gió không xa, Kỳ Co là một bãi biển tuyệt đẹp với cát trắng mịn và nước biển trong vắt. Nhiều người ví Kỳ Co như "Maldives của Việt Nam" bởi vẻ đẹp nhiệt đới quyến rũ.</p>

                <p><strong>Trải nghiệm tại Kỳ Co:</strong></p>
                <ul>
                <li>Tắm biển trong làn nước trong xanh</li>
                <li>Lặn ngắm san hô và cá nhiệt đới</li>
                <li>Thưởng thức hải sản tươi sống</li>
                <li>Cắm trại qua đêm trên bãi biển</li>
                </ul>

                <p>Eo Gió - Kỳ Co không chỉ là điểm đến lý tưởng cho những ai yêu thích biển cả, mà còn là nơi để bạn tìm lại sự bình yên trong tâm hồn giữa khung cảnh thiên nhiên tuyệt đẹp.</p>',
                'category_slug' => 'diem-den',
                'images' => [
                    'https://th.bing.com/th/id/R.00bc637673ce7690356aaac07e77a151?rik=H8PlzSoW5Grg5g&pid=ImgRaw&r=0',
                    'https://vnn-imgs-f.vgcloud.vn/2020/02/25/12/eo-gio-cliff-tourist-magnet-in-quy-nhon-1.jpg'
                ]
            ],
            [
                'title' => 'Top 10 món ăn đặc sản Quy Nhơn không thể bỏ qua',
                'link' => 'https://dulichvietnam.com.vn/mon-an-dac-san-quy-nhon',
                'description' => '<h2>Khám phá ẩm thực Quy Nhơn - Hương vị biển cả đậm đà</h2>

                    <p>Quy Nhơn không chỉ nổi tiếng với những bãi biển đẹp mà còn sở hữu nền ẩm thực phong phú, đặc sắc với hương vị biển cả đậm đà.</p>

                    <h3>1. Bánh xèo tôm nhảy</h3>
                    <p>Món bánh xèo Quy Nhơn có điểm đặc biệt là tôm tươi còn nhảy tanh tách, được cho vào bánh khi còn sống. Vỏ bánh giòn rụm, màu vàng óng từ nghệ.</p>

                    <h3>2. Chả cá nha đam</h3>
                    <p>Đây là món ăn độc đáo chỉ có ở Quy Nhơn. Cá tươi được làm thành chả, trộn với nha đam tạo nên hương vị thanh mát, giòn ngon khó quên.</p>

                    <h3>3. Bánh ít lá gai</h3>
                    <p>Bánh ít lá gai Quy Nhơn có vỏ bánh màu tím đen đặc trưng từ lá gai, nhân tôm thịt thơm ngon.</p>

                    <h3>4. Nem nướng Ninh Hòa</h3>
                    <p>Tuy có tên Ninh Hòa nhưng món này rất phổ biến ở Quy Nhơn. Nem được nướng trên than hồng, thơm phức.</p>

                    <h3>5. Bún chả cá</h3>
                    <p>Món bún chả cá Quy Nhơn có nước dùng trong vắt, thơm mùi cá, chả cá dai giòn.</p>

                    <p>Mỗi món ăn đều mang trong mình hương vị đặc trưng của biển cả và sự sáng tạo của người dân Quy Nhơn.</p>',
                'category_slug' => 'am-thuc',
                'images' => [
                    'https://2trip.vn/wp-content/uploads/2020/09/mon-an-dac-san-quy-nhon-binh-dinh.jpg',
                    'https://tse2.mm.bing.net/th/id/OIP.zIG3aPwoqhPpn5CrYpPncQHaEa?r=0&rs=1&pid=ImgDetMain&o=7&rm=3',
                    'https://tse1.mm.bing.net/th/id/OIP.DeZ4WH5c9WyUgGtDwLpCVAHaEY?r=0&rs=1&pid=ImgDetMain&o=7&rm=3'

                ]
            ],
            [
                'title' => 'Hướng dẫn chi tiết du lịch Quy Nhơn 3 ngày 2 đêm',
                'link' => 'https://travel.com.vn/quy-nhon-3-ngay-2-dem',
                'description' => '<h2>Lịch trình du lịch Quy Nhơn 3 ngày 2 đêm hoàn hảo</h2>

                <p>Quy Nhơn - thành phố biển xinh đẹp của tỉnh Bình Định, là điểm đến lý tưởng cho những ai muốn tìm kiếm sự yên bình và khám phá vẻ đẹp hoang sơ của biển cả.</p>

                <h3>NGÀY 1: KHÁM PHÁ TRUNG TÂM QUY NHƠN</h3>
                <ul>
                <li><strong>Sáng:</strong> Tham quan Tháp Đôi, Bảo tàng Quy Nhơn</li>
                <li><strong>Chiều:</strong> Nhà thờ Mằng Lăng, bãi biển Quy Nhơn</li>
                <li><strong>Tối:</strong> Thưởng thức bánh xèo tôm nhảy, khám phá chợ đêm</li>
                </ul>

                <h3>NGÀY 2: EO GIÓ - KỲ CO</h3>
                <ul>
                <li><strong>Sáng:</strong> Khởi hành đi Eo Gió, tham quan chụp ảnh</li>
                <li><strong>Chiều:</strong> Di chuyển đến Kỳ Co, tắm biển, lặn ngắm san hô</li>
                <li><strong>Tối:</strong> BBQ hải sản, ngắm hoàng hôn</li>
                </ul>

                <h3>NGÀY 3: CÙ LAO XANH</h3>
                <ul>
                <li><strong>Sáng:</strong> Đi tàu ra Cù Lao Xanh</li>
                <li><strong>Chiều:</strong> Khám phá đảo, ăn trưa hải sản</li>
                <li><strong>Tối:</strong> Trở về, di chuyển ra sân bay</li>
                </ul>

                <h3>CHI PHÍ DỰ KIẾN</h3>
                <p>Tổng chi phí cho 1 người khoảng 4.400.000 - 7.000.000 VNĐ bao gồm vé máy bay, khách sạn, ăn uống và tham quan.</p>

                <p>Với lịch trình này, bạn sẽ có cơ hội trải nghiệm trọn vẹn vẻ đẹp của Quy Nhơn từ những bãi biển hoang sơ, ẩm thực đặc sắc đến văn hóa lịch sử phong phú.</p>',
                'category_slug' => 'kinh-nghiem-du-lich',
                'images' => [
                    'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800',
                    'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=800'
                ]
            ],
            [
                'title' => 'Review chi tiết Kỳ Co Beach Resort - Thiên đường nghỉ dưỡng',
                'link' => 'https://booking.com/ky-co-beach-resort',
                'description' => '<h2>Kỳ Co Beach Resort - Trải nghiệm nghỉ dưỡng đẳng cấp</h2>

                <p>Sau chuyến trải nghiệm 2 ngày 1 đêm tại Kỳ Co Beach Resort, tôi muốn chia sẻ những cảm nhận chân thực nhất về khu nghỉ dưỡng được mệnh danh là "Maldives của Việt Nam".</p>

                <h3>VỊ TRÍ VÀ CẢNH QUAN</h3>
                <p>Kỳ Co Beach Resort tọa lạc tại bán đảo Kỳ Co, cách trung tâm Quy Nhơn khoảng 25km. Resort được bao quanh bởi những vách đá tự nhiên hùng vĩ và bãi biển cát trắng mịn màng.</p>

                <h3>PHÒNG NGHỈ VÀ TIỆN NGHI</h3>
                <p>Resort có 3 loại phòng chính: Villa, Bungalow và Standard Room. Villa hướng biển với diện tích 45m² được thiết kế hiện đại, tối giản với tone màu trắng chủ đạo.</p>

                <h3>ẨM THỰC</h3>
                <p>Resort có 2 nhà hàng chính: Nhà hàng buffet và nhà hàng hải sản ven biển. Buffet sáng đa dạng món Á - Âu, hải sản tươi ngon, đặc biệt là tôm hùm nướng.</p>

                <h3>TỔNG KẾT</h3>
                <p><strong>Điểm tổng: 4.3/5 ⭐</strong></p>
                <p>Kỳ Co Beach Resort là lựa chọn tuyệt vời cho những ai muốn trải nghiệm kỳ nghỉ sang trọng giữa thiên nhiên hoang sơ. Mặc dù giá cả không rẻ, nhưng trải nghiệm xứng đáng với số tiền bỏ ra.</p>',
                'category_slug' => 'khach-san-luu-tru',
                'images' => [
                    'https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=800',
                    'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=800'
                ]
            ],
            [
                'title' => 'Cù Lao Xanh - Hòn đảo hoang sơ đẹp nhất Quy Nhơn',
                'link' => 'https://vietnam-travel.org/cu-lao-xanh-quy-nhon',
                'description' => '<h2>Cù Lao Xanh - Viên ngọc xanh giữa biển khơi Quy Nhơn</h2>

                <p>Cù Lao Xanh, hay còn gọi là đảo Yến, là một hòn đảo nhỏ nằm cách bờ biển Quy Nhơn khoảng 24km về phía Đông Nam. Với vẻ đẹp hoang sơ, nước biển trong xanh và hệ sinh thái biển phong phú.</p>

                <h3>VẺ ĐẸP THIÊN NHIÊN HOANG SƠ</h3>
                <p>Cù Lao Xanh có diện tích khoảng 3km², được bao quanh bởi những vách đá granite hùng vĩ và những bãi cát trắng mịn màng.</p>

                <h3>HOẠT ĐỘNG TRẢI NGHIỆM</h3>
                <ul>
                <li><strong>Lặn ngắm san hô:</strong> Độ trong của nước biển lên đến 15-20m</li>
                <li><strong>Câu cá:</strong> Tham gia cùng ngư dân địa phương</li>
                <li><strong>Trekking:</strong> Khám phá toàn bộ hòn đảo</li>
                <li><strong>Cắm trại:</strong> Trải nghiệm qua đêm trên bãi biển</li>
                </ul>

                <h3>ẨM THỰC ĐẶC SẢN</h3>
                <p>Cù Lao Xanh nổi tiếng với tôm hùm tươi ngon, cua biển, ốc biển và đặc biệt là yến sào - đặc sản quý hiếm từ tổ chim yến.</p>

                <h3>CHI PHÍ THAM KHẢO</h3>
                <p>Chi phí tham quan 1 ngày khoảng 800.000 - 1.200.000 VNĐ/người bao gồm vé tàu, ăn uống và các hoạt động.</p>

                <p>Cù Lao Xanh không chỉ là một điểm đến du lịch mà còn là nơi để bạn tìm lại sự bình yên, kết nối với thiên nhiên và tạo nên những kỷ niệm đẹp không thể nào quên.</p>',
                'category_slug' => 'diem-den',
                'images' => [
                    'https://th.bing.com/th/id/OIP.fqgHoWxO_g-f2OugQjtSOQHaE7?r=0&o=7rm=3&rs=1&pid=ImgDetMain&o=7&rm=3',
                    'https://robbreport.com/wp-content/uploads/2023/03/Baliceauxcopy.jpg?w=681&h=383&crop=1'
                ]
            ],
            [
                'title' => 'Lễ hội Cầu Ngư - Nét văn hóa độc đáo của ngư dân Quy Nhơn',
                'link' => 'https://binhdinh.gov.vn/le-hoi-cau-ngu',
                'description' => '<h2>Lễ hội Cầu Ngư - Truyền thống văn hóa biển đảo</h2>

                <p>Lễ hội Cầu Ngư là một trong những lễ hội truyền thống quan trọng nhất của cộng đồng ngư dân Quy Nhơn, thể hiện niềm tin tâm linh và mong muốn được biển cả ban phước lành.</p>

                <h3>NGUỒN GỐC VÀ Ý NGHĨA</h3>
                <p>Lễ hội Cầu Ngư có nguồn gốc từ hàng trăm năm trước, bắt nguồn từ tín ngưỡng của ngư dân đối với Thần biển - vị thần bảo hộ cho những chuyến ra khơi bình an và mùa vụ bội thu.</p>

                <h3>THỜI GIAN TỔ CHỨC</h3>
                <p>Lễ hội thường được tổ chức vào đầu năm âm lịch (tháng 1-2), khi ngư dân chuẩn bị cho mùa biển mới. Thời gian cụ thể tùy thuộc vào từng làng chài, nhưng thường kéo dài 2-3 ngày.</p>

                <h3>CÁC NGHI THỨC CHÍNH</h3>
                <ul>
                <li><strong>Lễ cúng khai mạc:</strong> Cúng lễ Thần biển, cầu cho mùa biển thuận lợi</li>
                <li><strong>Rước kiệu:</strong> Rước kiệu thần từ đình làng ra bờ biển</li>
                <li><strong>Thả thuyền hoa:</strong> Thả những chiếc thuyền nhỏ chở hoa và lễ vật ra biển</li>
                <li><strong>Thi đua thể thao:</strong> Đua thuyền, kéo co, bóng chuyền bãi biển</li>
                </ul>

                <h3>ĐẶC SẮC VĂN HÓA</h3>
                <p>Điểm đặc biệt của lễ hội Cầu Ngư Quy Nhơn là sự kết hợp hài hòa giữa tín ngưỡng dân gian và các hoạt động cộng đồng sôi động.</p>

                <h3>HOẠT ĐỘNG VĂN HÓA - NGHỆ THUẬT</h3>
                <ul>
                <li><strong>Hát bài chòi:</strong> Dân ca truyền thống miền Trung</li>
                <li><strong>Múa lân:</strong> Biểu diễn múa lân sư rồng</li>
                <li><strong>Đờn ca tài tử:</strong> Nghệ thuật âm nhạc dân gian</li>
                <li><strong>Kể chuyện dân gian:</strong> Truyền thuyết về biển cả</li>
                </ul>

                <p>Lễ hội Cầu Ngư Quy Nhơn là một trải nghiệm văn hóa độc đáo, giúp du khách hiểu sâu hơn về đời sống tinh thần của cộng đồng ngư dân và vẻ đẹp truyền thống của vùng biển Bình Định.</p>',
                'category_slug' => 'le-hoi-su-kien',
                'images' => [
                    'https://cdn.phongthuytamnguyen.com/pttn/uploads/2022/02/24/2022_02_24___1645693388___le-hoi-cau-ngu-dac-sac-vung-dat-bien-nha-trang-1-pngc7d997a0baec515bae71f87f7af3b989.png'

                ]
            ],
            [
                'title' => 'Khám phá Tháp Đôi Quy Nhơn – Di tích Chăm Pa giữa lòng thành phố',
                'link' => 'https://dulichbinhdinh.com.vn/thap-doi-quy-nhon',
                'description' => '<h2>Tháp Đôi Quy Nhơn – Biểu tượng kiến trúc Chăm Pa</h2>
        <p>Tháp Đôi nằm ngay trung tâm thành phố Quy Nhơn, là một trong những di tích Chăm Pa nổi bật nhất tại Bình Định.</p>
        <h3>Kiến trúc độc đáo</h3>
        <p>Tháp gồm hai tòa tháp đứng song song, cao khoảng 20m, được xây dựng bằng gạch nung đỏ với những hoa văn tinh xảo.</p>
        <h3>Trải nghiệm văn hóa</h3>
        <p>Đến đây, bạn sẽ được tìm hiểu về lịch sử, kiến trúc và văn hóa Chăm Pa, cũng như thưởng thức các lễ hội truyền thống được tổ chức định kỳ.</p>',
                'category_slug' => 'lich-su-van-hoa',
                'images' => [
                    'https://th.bing.com/th/id/R.9dc7ba668be3b9e714e70d5e678b940c?rik=JmwD7fXpUlaJ9g&pid=ImgRaw&r=0'
                ]
            ],
            [
                'title' => 'Trải nghiệm trekking Núi Vũng Chua – Đỉnh cao săn mây Quy Nhơn',
                'link' => 'https://quynhontourist.vn/trekking-vung-chua',
                'description' => '<h2>Núi Vũng Chua – Điểm trekking lý tưởng</h2>
        <p>Núi Vũng Chua cao 600m, là nơi lý tưởng để săn mây và ngắm toàn cảnh thành phố Quy Nhơn từ trên cao.</p>
        <h3>Lộ trình trekking</h3>
        <p>Chặng đường dài khoảng 4km, đi qua rừng thông, suối nhỏ và những bãi cỏ xanh mướt.</p>
        <h3>Lưu ý khi trekking</h3>
        <ul>
            <li>Chuẩn bị nước uống, giày leo núi</li>
            <li>Đi theo nhóm và có hướng dẫn viên nếu lần đầu</li>
            <li>Khởi hành sớm để kịp ngắm bình minh trên đỉnh</li>
        </ul>',
                'category_slug' => 'kinh-nghiem-du-lich',
                'images' => [
                    'https://eholiday.vn/wp-content/uploads/2023/02/nui-vung-chua-quy-nhon.jpg'
                ]
            ],
            [
                'title' => 'Ẩm thực đường phố Quy Nhơn – Những món ăn vặt không thể bỏ lỡ',
                'link' => 'https://quynhonfood.com/am-thuc-duong-pho',
                'description' => '<h2>Ẩm thực đường phố Quy Nhơn</h2>
        <p>Quy Nhơn không chỉ nổi tiếng với hải sản mà còn có vô vàn món ăn vặt hấp dẫn.</p>
        <h3>Một số món ăn vặt nổi bật</h3>
        <ul>
            <li>Bánh xèo tôm nhảy</li>
            <li>Bánh hỏi lòng heo</li>
            <li>Chè Nhớ</li>
            <li>Nem nướng</li>
            <li>Bánh canh chả cá</li>
        </ul>
        <p>Đừng quên dạo quanh các khu chợ đêm để thưởng thức trọn vẹn hương vị Quy Nhơn!</p>',
                'category_slug' => 'am-thuc',
                'images' => [
                    'https://haloquynhontravel.com/wp-content/uploads/2022/09/am-thuc-quy-nhon-2.png',
                ]
            ],
        ];

        foreach ($posts as $data) {
            if (isset($categories[$data['category_slug']])) {

                $authorId = User::inRandomOrder()->value('id');


                $post = Post::create([
                    'title' => $data['title'],
                    'link' => '',
                    'description' => $data['description'],
                    'category_id' => $categories[$data['category_slug']],
                    'author_id' => $authorId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);


                $post->link = route('posts.show', ['post' => $post->id], false);
                $post->save();

                if (isset($data['images']) && is_array($data['images'])) {
                    foreach ($data['images'] as $imageUrl) {
                        Image::create([
                            'url' => $imageUrl,
                            'alt' => $post->title,
                            'imageable_id' => $post->id,
                            'imageable_type' => Post::class,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }
        }
    }
}