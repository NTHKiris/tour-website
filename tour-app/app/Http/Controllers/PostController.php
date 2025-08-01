<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
class PostController extends Controller
{

    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {

        $query = Post::with(['category', 'images'])->orderBy('created_at', 'desc');
        if ($request->has('category')) {
            $category = PostCategory::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        if ($request->has('my') && auth()->check()) {
            $query->where('author_id', auth()->id());
        }
        $posts = $query->get();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        $categories = PostCategory::all();
        return view('posts.create', compact('categories'));
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        $data['author_id'] = auth()->id();
        if (empty($data['link'])) {
            $data['link'] = '#';
        }
        $post = Post::create($data);

        if ($post->link === '#') {
            $post->link = config('app.url') . '/posts/' . $post->id;
            $post->save();
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('posts', 'public');



                $image = $post->images()->create([
                    'url' => '/storage/' . $path,
                    'alt' => $post->title,
                ]);
            }
        }

        return redirect()->route('posts.show', $post)->with('success', 'Post created successfully!');
    }

    public function show(Post $post)
    {

        $post->load(['category', 'images']);
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        $categories = PostCategory::all();
        $post->load('images');
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->authorize('update', $post);
        $data = $request->validated();
        $post->update($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('posts', 'public');
                $post->images()->create([
                    'url' => '/storage/' . $path,
                    'alt' => $post->title,
                ]);
            }
        }

        return redirect()->route('posts.show', $post);
    }
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->images()->delete();
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function restore($id)
    {

        $post = Post::withTrashed()->findOrFail($id);
        $this->authorize('restore', $post);
        $post->restore();
        $post->images()->withTrashed()->restore();

        return redirect()->route('posts.index');
    }
    public function forceDelete($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $this->authorize('forceDelete', $post);

        foreach ($post->images()->withTrashed()->get() as $image) {
            $image->forceDelete();
        }
        $post->forceDelete();
        return redirect()->route('posts.index');
    }

}
