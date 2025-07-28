@extends('layouts.tour')

@section('title', 'Tạo bài viết mới - Bình Định Tour')

@section('content')
    <div class="mt-20">
        <div class="mx-auto">
            {{-- <div class="text-center">
                <div
                    class="h-16 w-16 bg-gradient-to-br from-blue-400 to-cyan-400 rounded-full mb-4 inline-flex items-center justify-center">
                    <i class="fas fa-pen-fancy text-2xl text-white"></i>
                </div>
                <h1>Tạo bài viết mới</h1>
            </div> --}}


            <div class="mx-10 lg:mx-[200px] rounded-xl overflow-hidden">

                <div class="bg-gradient-to-r from-cyan-500 to-blue-600 px-8 py-6">
                    <h2 class="text-2xl font-bold text-white flex items-center">
                        <i class="fas fa-edit mr-3"></i>Thông tin bài viết
                    </h2>
                </div>
                @if ($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-400 p-6 rounded-lg mt-2">
                        <div class="flex items-center mb-3">
                            <i class="fas fa-exclamation-triangle text-red-400 mr-2"></i>
                            <h3 class="text-lg font-semibold text-red-800">Có lỗi xảy ra</h3>
                        </div>
                        <ul class="list-disc list-inside text-red-700 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data" class="space-y-8 p-8">
                    @csrf
                    <div class="space-y-2">
                        <label for="title" class="flex items-center text-lg font-semibold text-gray-700">
                            <i class="fas fa-heading mr-2 text-cyan-500"></i>
                            Tiêu đề bài viết
                            <span class="text-red-500 ml-1">*</span>
                        </label>

                        <input type="text" name="title" id="title"
                            class="w-full lg:w-1/3 md:min-w-[400px] px-4 py-3 border-none ring-2 ring-cyan-300 border-gray-200 rounded-xl focus:ring-2 focus:ring-cyan-500 transition-all duration-300 text-lg">
                        @error('title')
                            <p>
                                {{$error}}
                            </p>
                        @enderror
                    </div>
                    <div class="space-y-2">

                        <label for="link" class="flex items-center text-lg font-semibold text-gray-700"><i
                                class="fas fa-link mr-2 text-cyan-500"></i>Đường dẫn tham khảo</label>
                        <input type="text" name="link" id="link"
                            class="w-full lg:w-1/3 md:min-w-[400px] px-4 py-3 border-none ring-2 ring-cyan-300 border-gray-200 rounded-xl focus:ring-2 focus:ring-cyan-500 transition-all duration-300 text-lg">
                        @error('link')
                            <p>{{$error}}</p>
                        @enderror
                    </div>
                    <div class="space-y-2">
                        <label for="category_id" class="flex text-lg font-semibold text-gray-700">
                            <i class="fas fa-tags mr-2 text-cyan-500"></i>
                            Chuyên mục
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <select name="category_id" id="category_id"
                            class="w-full lg:w-1/3 md:min-w-[400px] px-4 py-3 border-none ring-2 ring-cyan-300 border-gray-200 rounded-xl focus:ring-2 focus:ring-cyan-500 transition-all duration-300 text-lg">
                            <option value="">--Chọn phân loại--</option>
                            @foreach ($categories as $cat)
                                <option value="{{$cat->id}}" {{old('category_id') == $cat->id ? 'selected' : ''}}>
                                    {{$cat->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label for="images" class="flex items-center text-lg font-semibold text-gray-700 ">
                            <i class="fas fa-images mr-2 text-cyan-500"></i>
                            Hình ảnh minh họa
                        </label>
                        <input type="file" name="images[]" id="images" multiple accept="image/*"
                            class="w-full lg:w-1/3 md:min-w-[400px] px-4 py-3 border-2 border-dashed border-gray-300 rounded-xl focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 transition-all duration-300 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100">

                    </div>
                    <div class="space-y-2">
                        <label for="description" class="flex items-center text-lg font-semibold text-gray-700">
                            <i class="fas fa-align-left mr-2 text-cyan-500"></i>
                            Mô tả chi tiết
                            <span class="text-red-500 ml-1">*</span>

                        </label>
                        <textarea name="description" id="description">{{old('description')}}</textarea>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-4 pt-8 border-t border-gray-200">
                        <button type="submit"
                            class="flex-1 bg-gradient-to-r from-cyan-500 to-blue-600 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:from-cyan-600 hover:to-blue-700 hover:-translate-y-1 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Đăng bài viết
                        </button>
                        <a href=""
                            class="flex-1 sm:flex-none bg-gray-100 text-gray-700 px-8 py-4 rounded-xl font-semibold text-lg hover:bg-gray-200 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center"><i
                                class="fas fa-times mr-2"></i>
                            Hủy bỏ</a>
                    </div>

                </form>
            </div>


        </div>
    </div>
    <!-- TinyMCE Self-hosted CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"
        integrity="sha512-6JR4bbn8rCKvrkdoTJd/VFyXAN4CE9XMtgykPWgKiHjou56YDJxWsi90hAeMTYxNwUnKSQu9JPc3SQUg+aGCHw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        // Initialize TinyMCE
        tinymce.init({
            selector: '#description',
            height: 400,
            menubar: false,
            plugins: 'lists link image table code help wordcount',
            toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | removeformat help',
            content_style: 'body { font-family: Inter, sans-serif; font-size: 16px; line-height: 1.6; } p { text-indent: 2em; margin-bottom: 1em; }',
            placeholder: 'Chia sẻ chi tiết về trải nghiệm du lịch của bạn...',
            branding: false,
            promotion: false
        });
    </script>

@endsection