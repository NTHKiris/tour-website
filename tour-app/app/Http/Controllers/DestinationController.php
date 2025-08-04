<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDestinationRequest;
use App\Http\Requests\UpdateDestinationRequest;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DestinationController extends Controller
{
    use AuthorizesRequests;
    public function adminIndex()
    {
        $destinations = Destination::all();
        return view('admin.destinations', compact('destinations'));
    }
    public function index(Request $request)
    {

        $query = Destination::orderBy('created_at', 'desc');
        // if ($request->has('location')) {
        //     $destination = PostCategory::where('slug', $request->destination)->first();
        //     if ($destination) {
        //         $query->where('destination_id', $destination->id);
        //     }
        // }
        // if ($request->filled('search')) {
        //     $query->where('name', 'like', '%' . $request->search . '%');
        // }
        // if ($request->has('my') && auth()->check()) {
        //     $query->where('author_id', auth()->id());
        // }
        $destinations = $query->get();
        return view('destinations.index', ['destinations' => $destinations]);
    }

    public function create()
    {
        $destinations = Destination::all();
        return view('destinations.create', compact('destinations'));
    }

    public function store(StoreDestinationRequest $request)
    {

        $data = $request->validated();
        $data['slug'] = 'temp';
        if (empty($data['featured_image'])) {
            $data['featured_image'] = '#';
        }
        // Xử lý tọa độ: tách từ "12.3456, 108.1234"
        if (!empty($data['coordinates'])) {
            // Tách chuỗi thành mảng [lat, lng]
            $coords = explode(',', $data['coordinates']);

            if (count($coords) == 2) {
                $lat = trim($coords[0]);
                $lng = trim($coords[1]);

                // Chuyển thành POINT(lng lat)
                $data['coordinates'] = DB::raw("ST_GeomFromText('POINT($lng $lat)')");
            } else {
                unset($data['coordinates']); // tránh lỗi nếu format sai
            }
        }



        $destination = Destination::create($data);
        $destination->slug = Str::slug($destination->id);


        if ($destination->featured_image === '#') {
            $destination->featured_image = config('app.url') . '/destinations/' . $destination->id;
            $destination->save();
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('destinations', 'public');

                $image = $destination->images()->create([
                    'url' => '/storage/' . $path,
                    'alt' => $destination->title,
                ]);
            }
        } else {
            \Log::info('No images uploaded');
        }

        return redirect()->route('tours.index')->with('success', 'Tạo địa điểm mới thành công!');
    }

    public function show(Destination $destination)
    {

        $destination->load(['images']);
        return view('tours.index');
    }

    public function edit(Destination $destination)
    {
        $this->authorize('delete', $destination);
        $destination->load('images');
        $coords = DB::selectOne("SELECT ST_X(coordinates) as lat, ST_Y(coordinates) as lng FROM destinations WHERE id = ?", [$destination->id]);

        $destination->lat = $coords->lat ?? null;
        $destination->lng = $coords->lng ?? null;
        return view('destinations.edit', compact('destination'));
    }

    public function update(UpdateDestinationRequest $request, Destination $destination)
    {
        $this->authorize('delete', $destination);
        $data = $request->validated();
        // Xử lý tọa độ: tách từ "12.3456, 108.1234"
        if (!empty($data['coordinates'])) {
            // Tách chuỗi thành mảng [lat, lng]
            $coords = explode(',', $data['coordinates']);

            if (count($coords) == 2) {
                $lat = trim($coords[0]);
                $lng = trim($coords[1]);

                // Chuyển thành POINT(lng lat)
                $data['coordinates'] = DB::raw("ST_GeomFromText('POINT($lng $lat)')");
            } else {
                unset($data['coordinates']); // tránh lỗi nếu format sai
            }
        }
        $destination->update($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('posts', 'public');
                $destination->images()->create([
                    'url' => '/storage/' . $path,
                    'alt' => $destination->title,
                ]);
            }
        }
        return redirect()->route('tours.index')->with('success', 'Cập nhật địa điểm mới thành công!');
    }

    public function destroy(Destination $destination)
    {
        $this->authorize('delete', $destination);

        $destination->images()->delete();
        $destination->delete();
        return redirect()->back()->with('success', 'Địa danh đã được xóa!');
    }

    public function restore($id)
    {

        $post = Destination::withTrashed()->findOrFail($id);
        $this->authorize('restore', $post);
        $post->restore();
        $post->images()->withTrashed()->restore();

        return redirect()->route('posts.index');
    }
    public function forceDelete($id)
    {
        $post = Destination::withTrashed()->findOrFail($id);
        $this->authorize('forceDelete', $post);

        foreach ($post->images()->withTrashed()->get() as $image) {
            $image->forceDelete();
        }
        $post->forceDelete();
        return redirect()->route('posts.index');
    }

}
