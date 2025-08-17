@extends('layouts.tour')

@section('title', 'Thanh toán thành công')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-50 to-blue-50 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="text-center mb-8">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Thanh toán thành công!</h1>
                <p class="text-gray-600">Cảm ơn bạn đã thanh toán. Booking của bạn đã được xác nhận.</p>
            </div>

            <div class="border-t border-gray-200 pt-8">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Thông tin thanh toán</h2>
                
                <div class="bg-gray-50 p-6 rounded-lg mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="font-medium text-gray-900 mb-2">Thông tin tour</h3>
                            <p class="text-gray-600 mb-1"><strong>Tên tour:</strong> {{ $booking->tour->title }}</p>
                            <p class="text-gray-600 mb-1"><strong>Ngày tour:</strong> {{ $booking->tour_date->format('d/m/Y') }}</p>
                            @if($booking->tour->destination)
                                <p class="text-gray-600"><strong>Điểm đến:</strong> {{ $booking->tour->destination->name }}</p>
                            @endif
                        </div>
                        
                        <div>
                            <h3 class="font-medium text-gray-900 mb-2">Thông tin khách</h3>
                            <p class="text-gray-600 mb-1"><strong>Người lớn:</strong> {{ $booking->adults }} người</p>
                            <p class="text-gray-600 mb-1"><strong>Trẻ em:</strong> {{ $booking->children }} người</p>
                            <p class="text-gray-600"><strong>Tổng khách:</strong> {{ $booking->participants }} người</p>
                        </div>
                    </div>
                </div>

                @if($booking->note)
                <div class="mb-6">
                    <h3 class="font-medium text-gray-900 mb-2">Ghi chú</h3>
                    <p class="text-gray-600 bg-gray-50 p-3 rounded">{{ $booking->note }}</p>
                </div>
                @endif

                <div class="pt-6 border-t border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-medium text-gray-900">Tổng tiền đã thanh toán:</span>
                        <span class="text-2xl font-bold text-green-600">
                            {{ number_format($booking->total_amount, 0, ',', '.') }}đ
                        </span>
                    </div>
                    <p class="text-sm text-gray-500">
                        Trạng thái booking: 
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                            Đã xác nhận
                        </span>
                    </p>
                </div>

                <!-- Thông tin liên hệ -->
                <div class="mt-8 p-4 bg-blue-50 rounded-lg">
                    <h3 class="font-medium text-blue-900 mb-2">Thông tin quan trọng</h3>
                    <ul class="text-sm text-blue-800 space-y-1">
                        <li>• Chúng tôi sẽ gửi email xác nhận chi tiết tour trong vòng 24h</li>
                        <li>• Vui lòng có mặt tại điểm tập trung trước giờ khởi hành 30 phút</li>
                        <li>• Mang theo CMND/CCCD và giấy tờ cần thiết</li>
                        <li>• Liên hệ hotline: <strong>1900-xxxx</strong> nếu có thắc mắc</li>
                    </ul>
                </div>
            </div>

            <div class="mt-8 flex justify-center space-x-4">
                <a href="{{ route('bookings.show', $booking) }}" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                    Xem chi tiết booking
                </a>
                <a href="{{ route('tours.index') }}" 
                    class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">
                    Xem thêm tour
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
