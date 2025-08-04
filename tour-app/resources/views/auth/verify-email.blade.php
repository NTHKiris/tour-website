@extends('layouts.guest')

@section('title', 'Xác thực email')

@section('content')
    <div class="relative min-h-screen flex items-center justify-center  py-12 px-4">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/quy-nhon.jpg') }}" alt="Background" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-cyan-900/40"></div>
        </div>
        <div class="max-w-md w-full bg-white/90 rounded-2xl shadow-xl p-8 border border-gray-100 backdrop-blur">
            <div class="text-center mb-6">
                <div class="flex justify-center mb-4">
                    <span class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-cyan-100">
                        <i class="fas fa-envelope-open-text text-cyan-600 text-3xl"></i>
                    </span>
                </div>
                <h2 class="text-2xl font-bold text-cyan-700 mb-2">Xác thực email của bạn</h2>
                <p class="text-gray-600">
                    Cảm ơn bạn đã đăng ký! Vui lòng kiểm tra email và nhấn vào liên kết xác thực để hoàn tất đăng ký.<br>
                    Nếu bạn chưa nhận được email, bạn có thể yêu cầu gửi lại.
                </p>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-700 bg-green-50 border-l-4 border-green-400 p-4 rounded">
                    Đã gửi lại liên kết xác thực tới email của bạn!
                </div>
            @endif

            <div class="mt-6 flex flex-col gap-4">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-lg font-semibold text-white bg-cyan-600 hover:bg-cyan-700 transition ">
                        <i class="fas fa-paper-plane mr-2"></i> Gửi lại email xác thực
                    </button>
                </form>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex justify-center  items-center py-3 px-4 rounded-lg text-cyan-700 bg-gray-100 hover:bg-gray-200 font-semibold transition">
                        <i class="fas fa-sign-out-alt mr-2"></i> Đăng xuất
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection