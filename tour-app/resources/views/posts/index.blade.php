@extends('layouts.tour')

@section('title', 'Blog - Bình Định Tour')

<div class="bg-gray-100 min-h-screen mt-20">
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="grid grid-cols-3 gap-8 ">
            <div class="col-span-2">
                <div class="mb-8">
                    <h1 class="text-4xl font-bold text-gray-900 mb-4 ">
                        <i
                            class="fa-solid fa-magnifying-glass text-cyan-400 mr-4 hover:-translate-y-1  duration-75 drop-shadow-lg drop-shadow-cyan-500/50"></i>
                        Blog
                        Du Lịch
                    </h1>
                    <p class="text-lg text-gray-600">Khám phá những điểm đến tuyệt vời và kinh nghiệm du lịch tại Quy
                        Nhơn</p>
                </div>
                <div>

                    @forelse ($posts as $post)
                        <div class="bg-white rounded-2xl shadow-lg ">
                            <div class=" h-64">

                            </div>
                            <div>

                            </div>
                        </div>

                    @empty
                        <div class="text-center mt-10 p-4">
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