@extends('layouts.tour')

@section('title', 'Quản lý danh mục bài viết')

@section('content')
    @php
        use App\Models\PostCategory;
    @endphp
    <div class="max-w-3xl mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6 text-cyan-700">Danh mục bài viết</h1>
        @if(session('error'))
            <div class="mb-4 px-4 py-2 bg-red-100 text-red-700 rounded">
                {{ session('error') }}
            </div>
        @endif
        @can('create', PostCategory::class)
            <div class="mb-6 text-right">
                <a href="{{ route('post-categories.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-cyan-500 text-white rounded hover:bg-cyan-600 text-sm font-semibold">
                    <i class="fa-solid fa-plus mr-2"></i> Thêm danh mục
                </a>
            </div>
        @endcan
        @if($categories->count())
            <div class="space-y-4">
                @foreach($categories as $category)
                    <div class="flex items-center justify-between bg-white rounded-lg shadow px-5 py-4">
                        <div>
                            <div class="font-semibold text-lg text-gray-900">{{ $category->name }}</div>
                            <div class="text-sm text-gray-500">
                                <i class="fa-solid fa-folder-open mr-1"></i>
                                {{ $category->posts_count }} bài viết
                            </div>
                        </div>
                        @auth
                            <div class="flex gap-2">
                                @can('update', $category)

                                    <a href="{{ route('post-categories.edit', $category) }}"
                                        class="inline-flex items-center px-3 py-1.5 bg-cyan-500 text-white rounded hover:bg-cyan-600 text-sm">
                                        <i class="fa-solid fa-pen-to-square mr-2"></i> Sửa
                                    </a>
                                @endcan
                                @can('delete', $category)

                                    <form action="{{ route('post-categories.destroy', $category) }}" method="POST"
                                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-3 py-1.5 bg-red-500 text-white rounded hover:bg-red-600 text-sm">
                                            <i class="fa-solid fa-trash mr-2"></i> Xóa
                                        </button>

                                    </form>
                                @endcan

                            </div>
                        @endauth
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center text-gray-500 py-12">
                <i class="fa-solid fa-folder-open text-4xl mb-3"></i>
                <div>Chưa có danh mục nào</div>
            </div>
        @endif
    </div>
@endsection