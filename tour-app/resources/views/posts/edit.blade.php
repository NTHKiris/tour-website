    @extends('layouts.tour')

@section('title', 'Chỉnh sửa bài viết - Bình Định Tour')
@section('description', 'Chỉnh sửa thông tin bài viết du lịch')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Chỉnh sửa bài viết</h1>
            </div>


            <x-post-form :action="route('posts.update', $post)" method="PUT" :post="$post" :categories="$categories"
                title="Chỉnh sửa thông tin bài viết" submit-text="Cập nhật bài viết"
                :cancel-url="route('posts.show', $post)" />
        </div>
    </div>
@endsection