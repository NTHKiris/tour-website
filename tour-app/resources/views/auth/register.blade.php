@extends('layouts.guest')

@section('title', 'Đăng ký - Quy Nhơn Tour')

@section('content')
    <div class="relative min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 overflow-hidden">
        <!-- Background image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/quy-nhon.jpg') }}" alt="Background" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-cyan-900/40"></div>
        </div>

        <div class="relative z-10 max-w-md w-full space-y-8">
            <!-- Header -->
            <div class="text-center">
                <h2 class="text-3xl font-bold text-cyan-100 mb-2 drop-shadow">Tạo tài khoản mới</h2>
            </div>

            <!-- Register Form -->
            <div class="bg-white/90 rounded-2xl shadow-xl p-8 border border-gray-100 backdrop-blur">
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-user mr-2 text-cyan-500"></i>
                            Họ và tên
                        </label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                            autocomplete="name"
                            class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-all duration-300 text-lg {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}"
                            placeholder="Nhập họ và tên">
                        @error('name')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-envelope mr-2 text-cyan-500"></i>
                            Email
                        </label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            autocomplete="username"
                            class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-all duration-300 text-lg {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}"
                            placeholder="Nhập email của bạn">
                        @error('email')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-phone mr-2 text-cyan-500"></i>
                            Số điện thoại
                        </label>
                        <input id="phone" type="tel" name="phone" value="{{ old('phone') }}" required autocomplete="tel"
                            class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-all duration-300 text-lg {{ $errors->has('phone') ? 'border-red-500' : 'border-gray-300' }}"
                            placeholder="Nhập số điện thoại">
                        @error('phone')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-lock mr-2 text-cyan-500"></i>
                            Mật khẩu
                        </label>
                        <div class="relative">
                            <input id="password" type="password" name="password" required autocomplete="new-password"
                                class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-all duration-300 text-lg {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }}"
                                placeholder="Nhập mật khẩu">
                            <button type="button" onclick="togglePassword('password', 'password-icon')"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700">
                                <i id="password-icon" class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-lock mr-2 text-cyan-500"></i>
                            Xác nhận mật khẩu
                        </label>
                        <div class="relative">
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                autocomplete="new-password"
                                class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-all duration-300 text-lg {{ $errors->has('password_confirmation') ? 'border-red-500' : 'border-gray-300' }}"
                                placeholder="Nhập lại mật khẩu">
                            <button type="button" onclick="togglePassword('password_confirmation', 'confirm-password-icon')"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700">
                                <i id="confirm-password-icon" class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('password_confirmation')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-cyan-500 to-blue-600 text-white py-3 px-4 rounded-xl font-semibold text-lg hover:from-cyan-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transform hover:-translate-y-0.5 transition-all duration-300 shadow-lg hover:shadow-xl">
                        <i class="fas fa-user-plus mr-2"></i>
                        Đăng ký
                    </button>
                </form>
            </div>

            <!-- Back to Home -->
            <div class="text-center">
                <a href="{{ url('/') }}"
                    class="inline-flex items-center text-gray-100 hover:text-white font-medium drop-shadow">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Về trang chủ
                </a>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const passwordIcon = document.getElementById(iconId);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        }
    </script>
@endsection