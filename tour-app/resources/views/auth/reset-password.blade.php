@extends('layouts.guest')

@section('title', 'Đặt lại mật khẩu')

@section('content')
    <div class="relative min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/quy-nhon.jpg') }}" alt="Background" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-cyan-900/40"></div>
        </div>
        <div
            class="relative z-10 max-w-md w-full bg-white/90 rounded-2xl shadow-xl p-8 border border-gray-100 backdrop-blur">
            <div class="text-center mb-6">
                <div class="flex justify-center mb-4">
                    <span class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-cyan-100">
                        <i class="fas fa-key text-cyan-600 text-3xl"></i>
                    </span>
                </div>
                <h2 class="text-2xl font-bold text-cyan-700 mb-2">Đặt lại mật khẩu</h2>
                <p class="text-gray-600">
                    Nhập email và mật khẩu mới để đặt lại mật khẩu của bạn.
                </p>
            </div>

            <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-envelope mr-2 text-cyan-500"></i>
                        Email
                    </label>
                    <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required
                        autofocus
                        class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-all duration-300 text-lg {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}"
                        placeholder="Nhập email của bạn">
                    @error('email')
                        <p class="text-red-500 text-sm mt-2 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-lock mr-2 text-cyan-500"></i>
                        Mật khẩu mới
                    </label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-all duration-300 text-lg {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }}"
                        placeholder="Nhập mật khẩu mới">
                    @error('password')
                        <p class="text-red-500 text-sm mt-2 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-lock mr-2 text-cyan-500"></i>
                        Xác nhận mật khẩu
                    </label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        autocomplete="new-password"
                        class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-all duration-300 text-lg {{ $errors->has('password_confirmation') ? 'border-red-500' : 'border-gray-300' }}"
                        placeholder="Nhập lại mật khẩu mới">
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm mt-2 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-lg font-semibold text-white bg-cyan-600 hover:bg-cyan-700 transition">
                        <i class="fas fa-sync-alt mr-2"></i> Đặt lại mật khẩu
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection