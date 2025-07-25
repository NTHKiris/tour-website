<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\PostCategory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
class PostController extends Controller
{
<<<<<<< HEAD
=======
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
>>>>>>> b3b744dd27fa891e5a2ff06310d4c3b5caf863d4
    public function index()
    {

        $posts = Post::with(['category', 'images'])->orderBy('created_at', 'desc')->get();
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
        $post = Post::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('posts', 'public');

                // Debug: Log the path and post info
                \Log::info('Storing image', [
                    'path' => $path,
                    'post_id' => $post->id,
                    'url' => '/storage/' . $path
                ]);

                $image = $post->images()->create([
                    'url' => '/storage/' . $path,
                    'alt' => $post->title,
                ]);

                \Log::info('Image created', ['image_id' => $image->id]);
            }
        } else {
            \Log::info('No images uploaded');
        }

        return redirect()->route('posts.show', $post)->with('success', 'Post created successfully!');
    }

    public function show(Post $post)
    {
<<<<<<< HEAD
        
=======

        $post->load(['category', 'images']);
        return view('posts.show', compact('post'));
>>>>>>> b3b744dd27fa891e5a2ff06310d4c3b5caf863d4
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
