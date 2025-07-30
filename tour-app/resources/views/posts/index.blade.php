@extends('layouts.tour')

@section('title', 'Blog - Bình Định Tour')

@push('styles')

<x-banner title="Blog du lịch">

</x-banner>
<div class="min-h-screen mt-20 posts-container" id="postsContainer">
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class=" gap-8 ">
            <div class="col-span-2">
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-4 ">
                        <i
                            class="fa-solid fa-book text-cyan-500 mr-4 hover:-translate-y-1  duration-75 drop-shadow-lg drop-shadow-cyan-500/50"></i>
                        Blog
                        Du Lịch
                    </h1>
                    <p class="text-lg text-gray-600">Khám phá những điểm đến tuyệt vời và kinh nghiệm du lịch tại Quy
                        Nhơn</p>
                </div>

                <div>
                    <div class="ml-10 ">
                        <h3>
                            <i class="fas fa-search mr-2 text-cyan-500 mb-4"></i> Tìm kiếm
                        </h3>
                        <form action="" class="">
                            <input type="text" name="search" value="{{request('search')}}"
                                placeholder="Tìm kiếm bài viết....."
                                class=" rounded-lg ring-1 ring-cyan-400 forcus:ring-2  focus:ring-cyan-500 forcus:ring-2  border-none w-1/3 ml-4 mr-2 ">
                            <button type="submit" class="bg-cyan-500 text-white p-3 rounded-lg  "><i
                                    class="fas fa-search"></i></button>
                        </form>

                    </div>
                </div>

                @php
                    $categories = \App\Models\PostCategory::all();
                @endphp

                <div class="mx-10 mb-6 flex flex-wrap gap-2">
                    @auth
                        <a href="{{ route('posts.create') }}"
                            class="ml-2 px-4 py-2 rounded-full font-semibold bg-cyan-500 text-white hover:bg-amber-600 transition-colors flex items-center">
                            <i class="fas fa-plus mr-2"></i> Tạo bài viết
                        </a>
                    @endauth
                    <a href="{{route('posts.index')}}"
                        class="px-4 py-2 rounded-full font-semibold {{ request('category') ? 'bg-gray-100 text-gray-700' : 'bg-cyan-500 text-white' }}">All</a>
                    @auth

                        <a href="{{ route('posts.index', array_merge(request()->except('page'), ['my' => 1])) }}"
                            class="px-4 py-2 rounded-full font-semibold {{ request('my') ? 'bg-cyan-500 text-white' : 'bg-gray-100 text-gray-700' }}">
                            Bài viết của tôi
                        </a>

                    @endauth
                    @foreach ($categories as $category)
                        <a href="{{route('posts.index', ['category' => $category->slug])}}"
                            class="px-4 py-2 rounded-full font-semibold {{ (request('category') == $category->slug) ? 'bg-cyan-500 text-white' : 'bg-gray-100 text-gray-700' }}">{{$category->name}}</a>
                    @endforeach
                </div>

                {{-- card --}}
                <div class="mx-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 relative  ">

                    @forelse ($posts as $post)
                        <div class="bg-white rounded-xl border mb-6 overflow-hidden relative hover:shadow-xl ">
                            <div class="relative h-64 ">
                                @if ($post->images && $post->images->count() > 0)
                                    <img src="{{$post->images->first()->url}}" alt=""
                                        class="h-full w-full object-cover transition-transform duration-300 hover:scale-110">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-tr from-blue-300 to-cyan-500 flex items-center justify-center">
                                        <img src="/Logo.png" alt="" class="w-auto h-full">
                                    </div>
                                @endif
                            </div>
                            <div class="absolute top-4 left-4">
                                <span class="bg-cyan-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    <i class="fas fa-tag mr-1"></i>{{$post->category->name ?? 'Uncategory' }}
                                </span>
                            </div>
                            <div class="absolute top-4 right-4">
                                <span class="bg-black/60 text-white     rounded-full text-sm px-3 py-1">
                                    <i class="fas fa-calendar-alt mr-1"></i>{{$post->created_at->format('M d, Y')}}
                                </span>
                            </div>

                            <div class="p-6">
                                <h2 class="text-xl font-bold text-gray-800 hover:text-cyan-600 transition-colors pb-2"><a
                                        href="">{{Str::limit($post->title, 45)}}</a></h2>
                                <p class="text-gray-600 mb-4 leading-relaxed line-clamp-3 pb-6 ">
                                    {{ Str::limit(html_entity_decode(strip_tags($post->description)), 100) }}
                                </p>
                            </div>

                            <div class="px-6 pb-6 absolute bottom-0 w-full">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm"><i
                                            class="fas fa-user mr-2"></i>{{$post->author->name ?? 'anonymous'}}</span>
                                    <a href="{{$post->link}}" class="text-cyan-500 hover:text-cyan-700">Đọc thêm <i
                                            class="fas fa-arrow-right ml-1 "></i> </a>
                                </div>

                            </div>
                        </div>

                    @empty

                        <div class=" text-center mt-10 p-4 col-span-full">
                            <i class="fa-regular fa-newspaper text-gray-300 text-6xl"></i>
                            <h3 class="text-2xl font-semibold">Chưa có bài viết nào</h3>
                            @auth
                                <a href="{{route('posts.create')}}">
                                    <i class="fas fa-plus mr-2"></i>Tạo bài viết đầu tiên
                                </a>

                            @endauth
                        </div>
                    @endforelse

                </div>
            </div>
            <div class="col-span-1">

            </div>
        </div>
    </div>
</div>