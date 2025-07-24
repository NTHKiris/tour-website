<!-- filepath: d:\Code\Intern\Tour\tour-app\resources\views\posts\create.blade.php -->

<div class="container">
    <h2 class="mb-4">Tạo bài viết mới</h2>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            @error('title') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Đường dẫn</label>
            <input type="url" name="link" id="link" class="form-control" value="{{ old('link') }}" required>
            @error('link') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea name="description" id="description" class="form-control" rows="4"
                required>{{ old('description') }}</textarea>
            @error('description') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Chuyên mục</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <option value="">-- Chọn chuyên mục --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="images" class="form-label">Ảnh bài viết (Tùy chọn)</label>
            <input type="file" name="images[]" id="images" class="form-control" multiple accept="image/*">
            <small class="form-text text-muted">Chọn một hoặc nhiều hình ảnh (JPEG, PNG, JPG, GIF, WEBP, tối đa 2MB mỗi file)</small>
            @error('images') <div class="text-danger">{{ $message }}</div> @enderror
            @error('images.*') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Tạo bài viết</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary ms-2">Hủy</a>
    </form>
</div>