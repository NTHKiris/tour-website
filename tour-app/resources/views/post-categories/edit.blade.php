@extends('layouts.tour')

@section('title', 'Chỉnh sửa danh mục')

@section('content')
    <div class="max-w-md mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6 text-cyan-700 text-center">Chỉnh sửa danh mục</h1>
        <form method="POST" action="{{ route('post-categories.update', $postCategory) }}"
            class="space-y-5 bg-white p-6 rounded-xl shadow">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                    Tên danh mục <span class="text-red-500">*</span>
                </label>
                <input type="text" id="name" name="name" value="{{ old('name', $postCategory->name) }}" required
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
                    placeholder="Nhập mô tả (tùy chọn)">{{ old('description', $postCategory->description) }}</textarea>
                @error('description')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-2 pt-2">
                <a href="{{ route('admin.posts-categories.index') }}"
                    class="px-4 py-2 border rounded text-gray-700 hover:bg-gray-50 text-sm">Hủy</a>
                <button type="submit"
                    class="px-4 py-2 bg-cyan-500 text-white rounded hover:bg-cyan-600 text-sm font-semibold">Cập
                    nhật</button>
            </div>
        </form>
    </div>
@endsection