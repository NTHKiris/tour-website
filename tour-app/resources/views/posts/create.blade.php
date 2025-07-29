@extends('layouts.tour')

@section('title', 'Tạo bài viết mới - Bình Định Tour')
@section('description', 'Chia sẻ những trải nghiệm du lịch tuyệt vời tại Bình Định')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Tạo bài viết mới</h1>
            </div>

            <!-- Post Form Component -->
            <x-post-form :action="route('posts.store')" :categories="$categories" title="Thông tin bài viết"
                submit-text="Đăng bài viết" :cancel-url="route('posts.index')" />
        </div>
    </div>
@endsection