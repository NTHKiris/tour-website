@extends('layouts.guest')

@section('title', 'Xác nhận mật khẩu')

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
                    <i class="fas fa-lock text-cyan-600 text-3xl"></i>
                </span>
            </div>
            <h2 class="text-2xl font-bold text-cyan-700 mb-2">Xác nhận mật khẩu</h2>
            <p class="text-gray-600">
                Đây là khu vực bảo mật. Vui lòng nhập lại mật khẩu để tiếp tục.
            </p>
        </div>

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
            @csrf
            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-lock mr-2 text-cyan-500"></i>
                    Mật khẩu
                </label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-all duration-300 text-lg {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }}"
                    placeholder="Nhập mật khẩu">
                @error('password')
                    <p class="text-red-500 text-sm mt-2 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>
            <div>
                <button type="submit"
                    class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-lg font-semibold text-white bg-cyan-600 hover:bg-cyan-700 transition">
                    <i class="fas fa-check mr-2"></i> Xác nhận
                </button>
            </div>
        </form>