@extends('layouts.tour')
@section('title', $post->title)

@section('content')
    <div class="relative bg-gradient-to-br from-cyan-500 to-blue-700 text-white p-10 max-w-5xl mx-auto mt-24">
        <div
            class="inline-flex items-center mb-2 px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-medium border border-white/30">
            <i class="fas fa-tag mr-2"></i>
            {{$post->category->name ?? 'Chưa phân loại'}}
        </div>
        <h1 class="text-4xl font-bold leading-tight ">{{$post->title}}</h1>

        <div class="flex flex-wrap gap-6 text-white/90 ">
            <div class="">
                <i class="fas fa-user mr-2"></i>
                <span>{{ $post->author->name ?? 'Ẩn danh' }}</span>
            </div>
            <div>
                <i class="fas fa-calendar mr-2"></i>
                <span>{{ $post->created_at->format('d/m/Y') }}</span>
            </div>
            <div>
                <i class="fas fa-clock mr-2"></i>
                <span>{{ $post->created_at->diffForHumans() }}</span>
            </div>
        </div>
    </div>
    <div class="max-w-5xl mx-auto">
        @if ($post->images && $post->images->count() > 0)
            <div>
                @if ($post->Images->count() === 1)
                    <div class="h-96 rounded-2xl overflow-hidden relative m-6">
                        <img src="{{$post->images->first()->url}}" alt="" class="h-full w-full object-cover">

                    </div>
                @else

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-6">
                        @foreach($post->images as $index => $image)
                            <div
                                class="relative group cursor-pointer {{ $index === 0 && $post->images->count() > 2 ? 'md:col-span-2 md:row-span-2' : '' }}">
                                <img src="{{ $image->url }}" alt="{{ $image->alt }}"
                                    class="w-full h-48 {{ $index === 0 && $post->images->count() > 2 ? 'md:h-full' : '' }} object-cover rounded-xl shadow-lg group-hover:shadow-xl transition-all duration-300">

                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        @endif
        <div class="px-6 mb-10">

            <div class="max-w-none mb-8">
                <div class="text-gray-700 leading-relaxed text-lg">
                    {!! $post->description !!}
                </div>
            </div>
            <div class="flex flex-col sm:flex-row sm:justify-end gap-4 pt-8 border-t border-gray-200">
                <a href="{{ route('posts.index') }}"
                    class="flex-1 sm:flex-none bg-gray-100 text-gray-700 px-6 py-3 rounded-xl font-semibold hover:bg-gray-200 hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Quay lại danh sách
                </a>

                @can('update', $post)
                    <a href="{{ route('posts.edit', $post) }}"
                        class="flex-1 sm:flex-none bg-gradient-to-r from-amber-500 to-orange-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-amber-600 hover:to-orange-700 hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center">
                        <i class="fas fa-edit mr-2"></i>
                        Chỉnh sửa
                    </a>
                @endcan

                @can('delete', $post)
                    <button onclick="confirmDelete()"
                        class="flex-1 sm:flex-none bg-gradient-to-r from-red-500 to-red-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-red-600 hover:to-red-700 hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center">
                        <i class="fas fa-trash mr-2"></i>
                        Xóa bài viết
                    </button>
                @endcan

            </div>
        </div>
    </div>
    <div id="deleteModal"
        class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl p-8 max-w-md w-full">
            <div class="text-center">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-exclamation-triangle text-2xl text-red-600"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Xác nhận xóa</h3>
                <p class="text-gray-600 mb-6">Bạn có chắc chắn muốn xóa bài viết này?</p>
                <div class="flex gap-4">
                    <button onclick="closeDeleteModal()"
                        class="flex-1 bg-gray-100 text-gray-700 py-3 rounded-xl font-semibold hover:bg-gray-200 transition-colors">
                        Hủy
                    </button>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full bg-red-600 text-white py-3 rounded-xl font-semibold hover:bg-red-700 transition-colors">
                            Xóa bài viết
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            const modal = document.getElementById('deleteModal')
            modal.classList.remove('hidden')
            document.body.style.overflow = 'hidden'
        }
        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal')
            modal.classList.add('hidden')
            document.body.style.overflow = 'auto'
        }
    </script>
@endsection