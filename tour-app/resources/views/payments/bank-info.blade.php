@extends('layouts.tour')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Thông tin chuyển khoản</h1>

            <!-- Thông tin booking -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-semibold mb-4">Thông tin đặt tour</h2>
                <div class="space-y-2">
                    <p><span class="font-medium">Mã giao dịch:</span> {{ $payment->transaction_id }}</p>
                    <p><span class="font-medium">Tour:</span> {{ $payment->booking->tour->title }}</p>
                    <p><span class="font-medium">Ngày:</span> {{ $payment->booking->tour_date->format('d/m/Y') }}</p>
                    <p><span class="font-medium">Tổng tiền:</span>
                        <span class="text-2xl font-bold text-blue-600">
                            {{ number_format($payment->amount, 0, ',', '.') }} VNĐ
                        </span>
                    </p>
                </div>
            </div>

            <!-- Thông tin chuyển khoản -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6 mb-6">
                <h2 class="text-xl font-semibold text-yellow-800 mb-4">
                    <i class="fas fa-university mr-2"></i>
                    Thông tin tài khoản nhận
                </h2>

                <div class="space-y-4">
                    <div class="bg-white p-4 rounded border">
                        <p class="font-semibold text-gray-800">Ngân hàng: <span class="text-blue-600">Vietcombank</span></p>
                        <p class="font-semibold text-gray-800">Số tài khoản: <span
                                class="text-blue-600 font-mono">1234567890</span></p>
                        <p class="font-semibold text-gray-800">Chủ tài khoản: <span class="text-blue-600">CÔNG TY TOUR
                                ABC</span></p>
                        <p class="font-semibold text-gray-800">Chi nhánh: <span class="text-blue-600">Hà Nội</span></p>
                    </div>

                    <div class="bg-white p-4 rounded border">
                        <p class="font-semibold text-gray-800">Nội dung chuyển khoản:</p>
                        <p class="text-blue-600 font-mono bg-gray-100 p-2 rounded mt-1">
                            {{ $payment->transaction_id }} {{ $payment->booking->user->name }}
                        </p>
                        <button
                            onclick="copyToClipboard('{{ $payment->transaction_id }} {{ $payment->booking->user->name }}')"
                            class="mt-2 text-sm bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                            Sao chép
                        </button>
                    </div>
                </div>
            </div>

            <!-- Hướng dẫn -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-6">
                <h3 class="text-lg font-semibold text-blue-800 mb-3">Hướng dẫn chuyển khoản</h3>
                <ol class="list-decimal list-inside space-y-2 text-blue-700">
                    <li>Đăng nhập vào ứng dụng ngân hàng hoặc đến ATM/quầy giao dịch</li>
                    <li>Chọn chức năng chuyển khoản</li>
                    <li>Nhập thông tin tài khoản nhận như trên</li>
                    <li>Nhập chính xác nội dung chuyển khoản</li>
                    <li>Kiểm tra lại thông tin và thực hiện chuyển khoản</li>
                    <li>Lưu lại biên lai giao dịch</li>
                </ol>
            </div>

            <!-- Lưu ý -->
            <div class="bg-red-50 border border-red-200 rounded-lg p-6 mb-6">
                <h3 class="text-lg font-semibold text-red-800 mb-3">Lưu ý quan trọng</h3>
                <ul class="list-disc list-inside space-y-1 text-red-700">
                    <li>Vui lòng chuyển khoản đúng số tiền: <strong>{{ number_format($payment->amount, 0, ',', '.') }}
                            VNĐ</strong></li>
                    <li>Nhập chính xác nội dung chuyển khoản để hệ thống tự động xác nhận</li>
                    <li>Sau khi chuyển khoản, vui lòng chờ 5-10 phút để hệ thống cập nhật</li>
                    <li>Nếu có vấn đề, vui lòng liên hệ hotline: <strong>1900-xxxx</strong></li>
                </ul>
            </div>

            <!-- Actions -->
            <div class="flex space-x-4">
                <button onclick="markAsPaid()"
                    class="flex-1 bg-green-600 text-white py-3 px-6 rounded-lg font-medium hover:bg-green-700 transition duration-200">
                    Tôi đã chuyển khoản
                </button>
                <a href="{{ route('bookings.show', $payment->booking) }}"
                    class="flex-1 bg-gray-300 text-gray-700 py-3 px-6 rounded-lg font-medium text-center hover:bg-gray-400 transition duration-200">
                    Quay lại booking
                </a>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function () {
                alert('Đã sao chép nội dung chuyển khoản!');
            });
        }

        function markAsPaid() {
            if (confirm('Bạn đã thực hiện chuyển khoản thành công?')) {
                // Có thể gửi request để đánh dấu đã thanh toán
                // Hoặc chuyển đến trang xác nhận
                alert('Cảm ơn bạn! Chúng tôi sẽ xác nhận thanh toán trong vòng 24h.');
                window.location.href = '{{ route("bookings.show", $payment->booking) }}';
            }
        }
    </script>
@endsection