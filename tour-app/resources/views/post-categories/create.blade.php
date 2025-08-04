@extends('layouts.tour')

@section('title', 'Tạo danh mục mới')

@section('content')
    <div class="max-w-md mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6 text-cyan-700 text-center">Tạo danh mục mới</h1>
        <form method="POST" action="{{ route('post-categories.store') }}" class="space-y-5 bg-white p-6 rounded-xl shadow">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                    Tên danh mục <span class="text-red-500">*</span>
                </label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                    class="w-full px-3 py-2 border rounded focus:ring-cyan-500 focus:border-cyan-500 @error('name') border-red-500 @enderror"
                    placeholder="Nhập tên danh mục">
                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                    Mô tả
                </label>
                <textarea id="description" name="description" rows="3"
                    class="w-full px-3 py-2 border rounded focus:ring-cyan-500 focus:border-cyan-500 @error('description') border-red-500 @enderror"
                    placeholder="Nhập mô tả (tùy chọn)">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-2 pt-2">
                <a href="{{ route('admin.posts-categories.index') }}"
                    class="px-4 py-2 text-sm font-semibold rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition-all duration-200">
                    Hủy
                </a>
                <button type="submit"
                    class="px-4 py-2 text-sm font-semibold rounded-lg bg-gradient-to-r from-cyan-600 to-blue-600 text-white shadow-md hover:from-cyan-700 hover:to-blue-700 transition-all duration-200">
                    Tạo danh mục
                </button>
            </div>
        </form>
    </div>
@endsection