@extends('layouts.tour')

@section('title', 'Chi tiết đặt tour')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Flash Messages -->
        @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                {{ session('error') }}
            </div>
        @endif
        
        @if(session('info'))
            <div class="mb-4 bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded">
                {{ session('info') }}
            </div>
        @endif
        
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="text-center mb-8">
                @php
                    $hasCompletedPayment = $booking->payments->where('status', 'completed')->count() > 0;
                    $hasFailedPayment = $booking->payments->where('status', 'failed')->count() > 0;
                    $hasPendingPayment = $booking->payments->where('status', 'pending')->count() > 0;
                @endphp
                
                @if($hasCompletedPayment)
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Đặt tour thành công!</h1>
                    <p class="text-gray-600">Thanh toán đã được xác nhận. Chúng tôi sẽ liên hệ với bạn sớm nhất.</p>
                @elseif($hasFailedPayment && !$hasCompletedPayment)
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Thanh toán chưa thành công</h1>
                    <p class="text-gray-600">Booking của bạn đã được tạo nhưng thanh toán chưa hoàn tất. Vui lòng thử lại.</p>
                @elseif($hasPendingPayment)
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Chờ xác nhận thanh toán</h1>
                    <p class="text-gray-600">Booking của bạn đã được tạo và đang chờ xác nhận thanh toán.</p>
                @else
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Chi tiết đặt tour</h1>
                    <p class="text-gray-600">Booking của bạn đã được tạo. Vui lòng hoàn tất thanh toán để xác nhận.</p>
                @endif
            </div>

            <div class="border-t border-gray-200 pt-8">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Thông tin đặt tour</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="font-medium text-gray-900 mb-2">Thông tin tour</h3>
                        <p class="text-gray-600 mb-1"><strong>Tên tour:</strong> {{ $booking->tour->title }}</p>
                        <p class="text-gray-600 mb-1"><strong>Ngày tour:</strong> {{ $booking->tour_date->format('d/m/Y') }}</p>
                        <p class="text-gray-600"><strong>Điểm đến:</strong> {{ $booking->tour->destination->name }}</p>
                    </div>
                    
                    <div>
                        <h3 class="font-medium text-gray-900 mb-2">Thông tin khách</h3>
                        <p class="text-gray-600 mb-1"><strong>Người lớn:</strong> {{ $booking->adults }} người</p>
                        <p class="text-gray-600 mb-1"><strong>Trẻ em:</strong> {{ $booking->children }} người</p>
                        <p class="text-gray-600"><strong>Tổng khách:</strong> {{ $booking->participants }} người</p>
                    </div>
                </div>

                @if($booking->note)
                <div class="mt-6">
                    <h3 class="font-medium text-gray-900 mb-2">Ghi chú</h3>
                    <p class="text-gray-600 bg-gray-50 p-3 rounded">{{ $booking->note }}</p>
                </div>
                @endif

                <div class="mt-6 pt-6 border-t border-gray-200">
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-medium text-gray-900">Tổng tiền:</span>
                        <span class="text-2xl font-bold text-sky-600">
                            {{ number_format($booking->total_amount, 0, ',', '.') }}đ
                        </span>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Trạng thái booking: 
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </p>
                </div>

                <!-- Payment Information -->
                @if($booking->payments->count() > 0)
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <h3 class="font-medium text-gray-900 mb-4">Thông tin thanh toán</h3>
                    @foreach($booking->payments as $payment)
                    <div class="bg-gray-50 p-4 rounded-lg mb-3">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm text-gray-600">Mã giao dịch: <span class="font-mono">{{ $payment->transaction_id }}</span></p>
                                <p class="text-sm text-gray-600">Phương thức: 
                                    @switch($payment->payment_method)
                                        @case('vnpay')
                                            VNPay
                                            @break
                                        @case('momo')
                                            MoMo
                                            @break
                                        @case('bank_transfer')
                                            Chuyển khoản ngân hàng
                                            @break
                                        @case('cash')
                                            Tiền mặt
                                            @break
                                        @default
                                            {{ $payment->payment_method }}
                                    @endswitch
                                </p>
                                <p class="text-sm text-gray-600">Số tiền: {{ number_format($payment->amount, 0, ',', '.') }}đ</p>
                                @if($payment->paid_at)
                                <p class="text-sm text-gray-600">Thời gian: {{ $payment->paid_at->format('d/m/Y H:i') }}</p>
                                @endif
                            </div>
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                @if($payment->status === 'completed') bg-green-100 text-green-800
                                @elseif($payment->status === 'pending') bg-yellow-100 text-yellow-800
                                @elseif($payment->status === 'failed') bg-red-100 text-red-800
                                @else bg-gray-100 text-gray-800 @endif">
                                @switch($payment->status)
                                    @case('completed')
                                        Đã thanh toán
                                        @break
                                    @case('pending')
                                        Chờ thanh toán
                                        @break
                                    @case('failed')
                                        Thất bại
                                        @break
                                    @default
                                        {{ ucfirst($payment->status) }}
                                @endswitch
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <div class="text-center">
                        <p class="text-gray-600 mb-4">Chưa có thông tin thanh toán</p>
                        <a href="{{ route('payments.create', $booking) }}" 
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg inline-block">
                            Thanh toán ngay
                        </a>
                    </div>
                </div>
                @endif
            </div>

            <div class="mt-8 flex justify-center space-x-4">
                <a href="{{ route('tours.index') }}" 
                    class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">
                    Xem thêm tour
                </a>
                <a href="{{ route('tours.show', $booking->tour->id) }}" 
                    class="bg-sky-500 hover:bg-sky-600 text-white px-6 py-2 rounded-lg">
                    Quay lại tour
                </a>
            </div>
        </div>
    </div>
</div>
@endsection