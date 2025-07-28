<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p class="text-muted">
                Tác giả: {{ $post->author->name ?? 'Unknown' }} |
                Chuyên mục: {{ $post->category->name ?? 'Unknown' }} |
                Ngày tạo: {{ $post->created_at->format('d/m/Y H:i') }}
            </p>

            <div class="mb-3">
                <strong>Link:</strong> <a href="{{ $post->link }}" target="_blank">{{ $post->link }}</a>
            </div>

            <div class="mb-4">
                <strong>Mô tả:</strong>
                <p>{!! $post->description !!}</p>
            </div>

            @if($post->images && $post->images->count() > 0)
                <div class="mb-4">
                    <h3>Hình ảnh</h3>
                    <div class="row">
                        @foreach($post->images as $image)
                            <div class="col-md-4 mb-3">
                                <img src="{{ $image->url }}" alt="{{ $image->alt }}" class="img-fluid rounded">
                                <small class="text-muted d-block">{{ $image->alt }}</small>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="alert alert-info">
                    Không có hình ảnh nào được tải lên.
                </div>
            @endif

            <div class="mt-4">
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Chỉnh sửa</a>
            </div>
        </div>
    </div>
</div>