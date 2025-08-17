@extends('layouts.tour')
@section('title', 'Thanh toán đặt tour')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h1 class="font-bold text-3xl text-gray-900">Thanh toán đặt tour</h1>
                <p class="mt-2 text-lg text-gray-600">Vui lòng chọn phương thức thanh toán</p>
            </div>
            
            <!-- Thông tin đặt tour -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
                <div class="p-6">
                    <h2 class="font-semibold text-xl text-gray-800 mb-4">Thông tin đặt tour</h2>
                    <div class="border-t border-gray-200 pt-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Tour</h3>
                                <p class="mt-1 text-lg font-medium text-gray-900">{{ $booking->tour->title }}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Ngày tham gia</h3>
                                <p class="mt-1 text-lg font-medium text-gray-900">
                                    {{ $booking->tour_date->format('d/m/Y') }}
                                </p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Số người</h3>
                                <p class="mt-1 text-lg font-medium text-gray-900">
                                    @if ($booking->children > 0)
                                        {{ $booking->adults }} người lớn, {{ $booking->children }} trẻ em
                                    @else
                                        {{ $booking->adults }} người
                                    @endif
                                </p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Tổng tiền</h3>
                                <p class="mt-1 text-2xl font-bold text-blue-600">
                                    {{ number_format($booking->total_amount, 0, ',', '.') }} VNĐ
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Phương thức thanh toán -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="p-6">
                    <h2 class="font-semibold text-xl text-gray-800 mb-6">Chọn phương thức thanh toán</h2>
                    
                    @if($errors->any())
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    
                    <form action="{{ route('payments.store', $booking) }}" method="POST" class="space-y-4">
                        @csrf
                        
                        <!-- VNPay -->
                        <div class="payment-method">
                            <input type="radio" id="vnpay" name="payment_method" value="vnpay" class="sr-only" required>
                            <label for="vnpay" class="flex items-center justify-between p-4 border-2 rounded-lg cursor-pointer hover:bg-gray-50 transition border-gray-200">
                                <div class="flex items-center">
                                    <div class="w-4 h-4 border-2 rounded-full mr-3 flex items-center justify-center">
                                        <div class="w-2 h-2 bg-blue-600 rounded-full hidden"></div>
                                    </div>
                                    <img src="{{ asset('images/payment/vnpay.png') }}" alt="VNPay" class="h-8 w-auto mr-3" onerror="this.style.display='none'">
                                    <div>
                                        <span class="font-medium text-gray-900">Thanh toán qua VNPay</span>
                                        <p class="text-sm text-gray-500">Thanh toán trực tuyến qua thẻ ATM, Visa, MasterCard</p>
                                    </div>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400"></i>
                            </label>
                        </div>

                        <!-- MoMo -->
                        <div class="payment-method">
                            <input type="radio" id="momo" name="payment_method" value="momo" class="sr-only">
                            <label for="momo" class="flex items-center justify-between p-4 border-2 rounded-lg cursor-pointer hover:bg-gray-50 transition border-gray-200">
                                <div class="flex items-center">
                                    <div class="w-4 h-4 border-2 rounded-full mr-3 flex items-center justify-center">
                                        <div class="w-2 h-2 bg-blue-600 rounded-full hidden"></div>
                                    </div>
                                    <img src="{{ asset('images/payment/momo.png') }}" alt="MoMo" class="h-8 w-auto mr-3" onerror="this.style.display='none'">
                                    <div>
                                        <span class="font-medium text-gray-900">Thanh toán qua MoMo</span>
                                        <p class="text-sm text-gray-500">Thanh toán nhanh qua ví điện tử MoMo</p>
                                    </div>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400"></i>
                            </label>
                        </div>

                        <!-- Chuyển khoản ngân hàng -->
                        <div class="payment-method">
                            <input type="radio" id="bank_transfer" name="payment_method" value="bank_transfer" class="sr-only">
                            <label for="bank_transfer" class="flex items-center justify-between p-4 border-2 rounded-lg cursor-pointer hover:bg-gray-50 transition border-gray-200">
                                <div class="flex items-center">
                                    <div class="w-4 h-4 border-2 rounded-full mr-3 flex items-center justify-center">
                                        <div class="w-2 h-2 bg-blue-600 rounded-full hidden"></div>
                                    </div>
                                    <i class="fas fa-university text-blue-600 text-2xl mr-3"></i>
                                    <div>
                                        <span class="font-medium text-gray-900">Chuyển khoản ngân hàng</span>
                                        <p class="text-sm text-gray-500">Chuyển khoản trực tiếp qua tài khoản ngân hàng</p>
                                    </div>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400"></i>
                            </label>
                        </div>

                        <!-- Tiền mặt -->
                        <div class="payment-method">
                            <input type="radio" id="cash" name="payment_method" value="cash" class="sr-only">
                            <label for="cash" class="flex items-center justify-between p-4 border-2 rounded-lg cursor-pointer hover:bg-gray-50 transition border-gray-200">
                                <div class="flex items-center">
                                    <div class="w-4 h-4 border-2 rounded-full mr-3 flex items-center justify-center">
                                        <div class="w-2 h-2 bg-blue-600 rounded-full hidden"></div>
                                    </div>
                                    <i class="fas fa-money-bill text-green-600 text-2xl mr-3"></i>
                                    <div>
                                        <span class="font-medium text-gray-900">Thanh toán tiền mặt</span>
                                        <p class="text-sm text-gray-500">Thanh toán tiền mặt khi gặp hướng dẫn viên</p>
                                    </div>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400"></i>
                            </label>
                        </div>
                        
                        <div class="flex space-x-4 mt-8">
                            <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg font-medium transition duration-200">
                                Tiến hành thanh toán
                            </button>
                            <a href="{{ route('tours.show', $booking->tour) }}" class="flex-1 bg-gray-300 text-gray-700 py-3 px-6 rounded-lg font-medium text-center hover:bg-gray-400 transition duration-200">
                                Quay lại
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <style>
        .payment-method input:checked + label {
            border-color: #2563eb;
            background-color: #eff6ff;
        }
        
        .payment-method input:checked + label .w-2 {
            display: block !important;
        }
    </style>
@endsection
