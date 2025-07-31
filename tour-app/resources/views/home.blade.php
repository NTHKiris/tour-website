@extends('layouts.tour')

@section('title', 'Trang chủ | Quy Nhơn Tour - Khám phá vẻ đẹp Quy Nhơn')
@section('description', 'Khám phá những điểm đến tuyệt vời tại Quy Nhơn với các tour du lịch chất lượng cao. Kỳ Co, Eo Gió, Quy Nhon và nhiều địa điểm hấp dẫn khác.')

@section('content')

    <x-hero-section title="Trọn niềm vui với những chuyến đi đáng nhớ"
        description="Quy Nhơn - thành phố huyền thoại với bãi biển trong xanh, Eo Gió hùng vĩ và tháp Chăm cổ kính. Cùng khám phá vẻ đẹp hoang sơ và tận hưởng những trải nghiệm tuyệt vời nơi đây!"
        image1="/images/ky-co.jpg" image2="/images/eo-gio.jpg" image3="/images/quy-nhon.jpg" />

    <x-choose-me />
    <x-featured-tour :tours="$tours" title="Tour nổi bật" subtitle="Khám phá những điểm đến tuyệt vời nhất tại Quy Nhơn" />
    <x-booking-guide />
    <x-feed-back :feedbacks="[
            [
                'content' => 'Tour Kỳ Co - Eo Gió thật sự tuyệt vời! Hướng dẫn viên nhiệt tình, địa điểm đẹp như mơ. Gia đình tôi đã có những kỷ niệm không thể quên. Chắc chắn sẽ quay lại!',
                'initials' => 'NL',
                'name' => 'Nguyễn Thị Lan',
                'location' => 'TP. Hồ Chí Minh',
                'avatar_class' => 'bg-gradient-to-br from-cyan-400 to-blue-500'
            ],
            [
                'content' => 'Dịch vụ chuyên nghiệp, lịch trình hợp lý. Đặc biệt ấn tượng với tour văn hóa Chăm, rất bổ ích và thú vị. Giá cả hợp lý, đáng đồng tiền bát gạo.',
                'initials' => 'TM',
                'name' => 'Trần Văn Minh',
                'location' => 'Hà Nội',
                'avatar_class' => 'bg-gradient-to-br from-emerald-400 to-green-500'
            ],
            [
                'content' => 'Lần đầu đến Quy Nhơn, được công ty tổ chức tour rất chu đáo. Khách sạn tốt, đồ ăn ngon, lịch trình không vội vàng. Cảm ơn team rất nhiều!',
                'initials' => 'LH',
                'name' => 'Lê Thị Hương',
                'location' => 'Đà Nẵng',
                'avatar_class' => 'bg-gradient-to-br from-purple-400 to-pink-500'
            ],
        ]" />
@endsection