@extends('layouts.guest')

@section('title', 'Đăng nhập')

@section('content')
    <div
        class="relative min-h-screen bg-gradient-to-br from-cyan-50 via-blue-50 to-indigo-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 ">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/quy-nhon.jpg') }}" alt="Background" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-cyan-900/40"></div>
        </div>
        <div class="absolute max-w-md w-full sapce-y-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-cyan-100 mb-2 drop-shadow p-6">Đăng nhập</h2>
            </div>

            @if (session('status'))
                <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded-lg">
                    <div class="flex">
                        <i class="fas fa-check-circle text-green-400 mr-2 mt-0.5"></i>
                        <p class="text-green-700">{{ session('status') }}</p>
                    </div>
                </div>
            @endif

            <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 ">
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block text-md font-semibold text-gray-700 mb-2"><i
                                class="fas fa-envelope mr-2 text-cyan-500"></i>
                            Email</label>
                        <input type="email" id="email" name="email" value="{{old('email')}}" required autofocus
                            class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-all duration-300 text-md {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }}">
                        @error('email')
                            <p class="text-red-500 text-md mt-2 fl  ex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-md font-semibold text-gray-700 mb-2 pt-2">
                            <i class="fas fa-lock mr-2 text-cyan-500"></i>
                            Mật khẩu
                        </label>
                        <div class="relative">
                            <input type="password" name="password" id="password"
                                class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-all duration-300 text-md {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }}">
                            <button type="button" onclick="togglePassword()"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700">
                                <i id="password-icon" class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-red-500 text-md mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <label for="remember_me">
                            <input type="checkbox" name="remember" id="remember_me"
                                class="h-4 w-4 text-cyan-600 forcus:ring-cyan-500 border-gray-300  rounded ">
                            <span>Ghi nhớ đăng nhập</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="text-sm text-cyan-600 hover:text-cyan-800 font-medium">
                                Quên mật khẩu?
                            </a>
                        @endif
                    </div>
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-cyan-500 to-blue-400 text-white py-3 px-4 rounded-xl font-semibold text-lg hover:from-cyan-600 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transform hover:-translate-y-0.5 transition-all duration-300 shadow-lg hover:shadow-xl">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Đăng nhập
                    </button>
                </form>
                @if (Route::has('register'))
                    <div class="mt-6 text-center">
                        <p class="text-gray-600">
                            Chưa có tài khoản?
                            <a href="{{ route('register') }}" class="text-cyan-600 hover:text-cyan-800 font-medium">
                                Đăng ký ngay
                            </a>
                        </p>
                    </div>
                @endif
                <div class="text-center">
                    <a href="{{ url('/') }}" class="inline-flex items-center text-gray-600 hover:text-gray-800 font-medium">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Về trang chủ
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password')
            const passwordIcon = document.getElementById('password-icon')

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('fa-eye')
                passwordIcon.classList.add('fa-eye-slash')
            } else {
                passwordInput.type = 'password'
                passwordIcon.classList.remove('fa-eye-slash')
                passwordIcon.classList.add('fa-eye')
            }
        }
    </script>
@endsection