<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostCategoryRequest;
use App\Http\Requests\UpdatePostCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostCategoryController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $categories = PostCategory::withCount('posts')
            ->orderBy('name')
            ->get();

        return view('post-categories.index', compact('categories'));
    }

    public function create()
    {
        $this->authorize('create');

        return view('post-categories.create');
    }

    public function store(StorePostCategoryRequest $request)
    {
        $this->authorize('create', );

        $validated = $request->validated();

        $validated['slug'] = Str::slug($validated['name']);

        PostCategory::create($validated);

        return redirect()->route('post-categories.index')
            ->with('success', 'Danh mục đã được tạo thành công!');
    }

    public function show(PostCategory $postCategory)
    {

    }

    public function edit(PostCategory $postCategory)
    {
        $this->authorize('update', $postCategory);

        return view('post-categories.edit', compact('postCategory'));
    }

    public function update(UpdatePostCategoryRequest $request, PostCategory $postCategory)
    {
        $this->authorize('update', $postCategory);

        $validated = $request->validated();

        $validated['slug'] = Str::slug($validated['name']);

        $postCategory->update($validated);

        return redirect()->route('post-categories.index')
            ->with('success', 'Danh mục đã được cập nhật thành công!');
    }

    public function destroy(PostCategory $postCategory)
    {
        $this->authorize('delete', $postCategory);

        if ($postCategory->posts()->count() > 0) {
            return redirect()->route('post-categories.index')
                ->with('error', 'Không thể xóa danh mục này vì vẫn còn bài viết thuộc danh mục này!');
        }

        $postCategory->delete();

        return redirect()->route('post-categories.index')
            ->with('success', 'Danh mục đã được xóa thành công!');
    }
}
