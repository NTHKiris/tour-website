@extends('layouts.tour')
<div class="container mt-20">
    <h2 class="mb-4">Danh sách bài viết</h2>
    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($post->images && count($post->images))
                        <img src="{{ $post->images[0]->url }}" class="card-img-top"
                            alt="{{ $post->images[0]->alt ?? $post->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->description, 120) }}</p>
                        <p class="card-text">
                            <small class="text-muted">
                                Chuyên mục: {{ $post->category->name ?? 'Không xác định' }}
                            </small>
                        </p>
                        <a href="{{ $post->link }}" target="_blank" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>