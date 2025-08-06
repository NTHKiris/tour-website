@props([
    'action',
    'method' => 'POST',
    'post' => null,
    'categories' => [],
    'submitText' => 'Đăng bài viết',
    'title' => 'Thông tin bài viết',
    'cancelUrl' => null
])

<div class=" rounded-xl overflow-hidden">
    <!-- Header -->
    <div class="px-8 ">
        <h2 class="text-2xl font-bold text-gray-600 flex items-center">
            <i class="fas fa-edit mr-3"></i>{{ $title }}
        </h2>
    </div>

    <!-- Error Messages -->
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
     @if($post && $post->images && $post->images->count() > 0)
        <div class="space-y-2 pt-8 px-8" >
            <label class="flex items-center text-lg font-semibold text-gray-700">
                <i class="fas fa-image mr-2 text-cyan-500"></i>
                Hình ảnh hiện tại
            </label>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($post->images as $image)
                    <div class="relative group">
                        <img src="{{ $image->url }}" alt="{{ $image->alt }}" 
                            class="w-full h-48 object-cover rounded-lg shadow-md">
                        <form action="{{ route('images.destroy', $image->id) }}" method="POST" class="absolute top-2 right-2">
                            @csrf
                            @method('DELETE')
                            <button 
                                type="submit"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa ảnh này?')"
                                class="bg-gray-300 bg-opacity-40 hover:bg-red-700 text-white rounded-full p-2 shadow transition duration-200 hover:scale-110"
                            >
                                <i class="fas fa-trash text-sm"></i>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>

    <!-- Form -->
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="space-y-8 pb-8 px-8">
        @csrf
        @if($method !== 'POST')
            @method($method)
        @endif

        <!-- Title Field -->
        <div class="space-y-2">
            <label for="title" class="flex items-center text-lg font-semibold text-gray-700">
                <i class="fas fa-heading mr-2 text-cyan-500"></i>
                Tiêu đề bài viết
                <span class="text-red-500 ml-1">*</span>
            </label>
            <input 
                type="text" 
                name="title" 
                id="title"
                value="{{ old('title', $post->title ?? '') }}"
                class="w-full lg:w-1/3 md:min-w-[400px] px-4 py-3 border-none ring-2 ring-cyan-300 border-gray-200 rounded-xl focus:ring-2 focus:ring-cyan-500 transition-all duration-300 text-lg"
                
                required
            >
            @error('title')
                <p class="text-red-500 text-sm mt-1 flex items-center">
                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                </p>
            @enderror
        </div>

        <!-- Link Field -->
        <div class="space-y-2">
            <label for="link" class="flex items-center text-lg font-semibold text-gray-700">
                <i class="fas fa-link mr-2 text-cyan-500"></i>
                Đường dẫn tham khảo
                <span class="text-gray-500 text-sm font-normal ml-2">(Tùy chọn)</span>
            </label>
            <input 
                type="url" 
                name="link" 
                id="link"
                value="{{ old('link', $post->link ?? '') }}"
                class="w-full lg:w-1/3 md:min-w-[400px] px-4 py-3 border-none ring-2 ring-cyan-300 border-gray-200 rounded-xl focus:ring-2 focus:ring-cyan-500 transition-all duration-300 text-lg"
               
            >
            @error('link')
                <p class="text-red-500 text-sm mt-1 flex items-center">
                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                </p>
            @enderror
        </div>

        <!-- Category Field -->
        <div class="space-y-2">
            <label for="category_id" class="flex text-lg font-semibold text-gray-700">
                <i class="fas fa-tags mr-2 text-cyan-500"></i>
                Danh mục
                <span class="text-red-500 ml-1">*</span>
            </label>
            <select 
                name="category_id" 
                id="category_id"
                class="w-full lg:w-1/3 md:min-w-[400px] px-4 py-3 border-none ring-2 ring-cyan-300 border-gray-200 rounded-xl focus:ring-2 focus:ring-cyan-500 transition-all duration-300 text-lg"
                required
            >
                <option value="">-- Chọn danh mục --</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" 
                        {{ old('category_id', $post->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-sm mt-1 flex items-center">
                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                </p>
            @enderror
        </div>

        <!-- Images Field -->
        <div class="space-y-2">
            <label for="images" class="flex items-center text-lg font-semibold text-gray-700">
                <i class="fas fa-images mr-2 text-cyan-500"></i>
                Hình ảnh minh họa
              
            </label>
            <input 
                type="file" 
                name="images[]" 
                id="images" 
                multiple 
                accept="image/*"
                class="w-full lg:w-1/3 md:min-w-[400px] px-4 py-3 border-2 border-dashed border-gray-300 rounded-xl focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 transition-all duration-300 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100"
            >
            
            @error('images')
                <p class="text-red-500 text-sm mt-1 flex items-center">
                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                </p>
            @enderror
            @error('images.*')
                <p class="text-red-500 text-sm mt-1 flex items-center">
                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                </p>
            @enderror
        </div>

        <!-- Description Field -->
        <div class="space-y-2">
            <label for="description" class="flex items-center text-lg font-semibold text-gray-700">
                <i class="fas fa-align-left mr-2 text-cyan-500"></i>
                Mô tả chi tiết
                <span class="text-red-500 ml-1">*</span>
            </label>
            <textarea 
                name="description" 
                id="description"
                rows="6"
                class="w-full px-4 py-3 border-none ring-2 ring-cyan-300 border-gray-200 rounded-xl focus:ring-2 focus:ring-cyan-500 transition-all duration-300 text-lg"
                
            >{{ old('description', $post->description ?? '') }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1 flex items-center">
                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                </p>
            @enderror
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 pt-8 border-t border-gray-200">
            <button 
                type="submit"
                class="flex-1 bg-gradient-to-r from-cyan-500 to-blue-600 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:from-cyan-600 hover:to-blue-700 hover:-translate-y-1 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center"
            >
                <i class="fas fa-paper-plane mr-2"></i>
                {{ $submitText }}
            </button>
            <a 
                href="{{ $cancelUrl ?? route('posts.index') }}"
                class="flex-1 sm:flex-none bg-gray-100 text-gray-700 px-8 py-4 rounded-xl font-semibold text-lg hover:bg-gray-200 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center"
            >
                <i class="fas fa-times mr-2"></i>
                Hủy bỏ
            </a>
        </div>
    </form>

   

<!-- TinyMCE Script -->
@push('scripts')
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
    branding: false,
    promotion: false
});


</script>
@endpush