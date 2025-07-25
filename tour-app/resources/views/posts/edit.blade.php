@extends('layouts.tour')

@section('content')
<div class="container mt-20">
    <h2>Sửa bài viết</h2>
    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}"
                required>
            @error('title')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" name="link" id="link" class="form-control" value="{{ old('link', $post->link) }}">
            @error('link')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea name="description" id="description" class="form-control" rows="4"
                required>{{ old('description', $post->description) }}</textarea>
            @error('description')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Chuyên mục</label>
            <select name="category_id" id="category_id" class="form-select" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Ảnh hiện tại</label>
            <div>
                @foreach($post->images as $image)
                    <img src="{{ $image->url }}" alt="{{ $image->alt }}" width="100" class="me-2 mb-2">
                @endforeach
            </div>
        </div>

        <div class="mb-3">
            <label for="images" class="form-label">Thay ảnh mới (có thể chọn nhiều)</label>
            <input type="file" name="images[]" id="images" class="form-control" multiple>
            @error('images')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary ms-2">Quay lại</a>
    </form>