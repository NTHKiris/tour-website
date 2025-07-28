<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTourRequest;
use App\Http\Requests\UpdateTourRequest;
use Illuminate\View\View;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::orderBy('id','desc')->paginate(6);
        return view('tours.TourIndex', compact('tours'));
    }

    public function create()
    {
        
    }

    public function store(StoreTourRequest $request)
    {
        $tour = new Tour();
        $tour->title = $request->input('title'); 
        $tour->slug = $request->input('slug');
        $tour->description = $request->input('description'); 
        $tour->itinerary = $request->input('itinerary');
        $tour->duration = $request->input('duration'); 
        $tour->price = $request->input('price');
        $tour->max_participants = $request->input('max_participants'); 
        $tour->destination_id = $request->input('destination_id');
        $tour->user_id = $request->user()->id; // Giả sử bạn đang lấy user_id từ người dùng đã đăng nhập
        $tour->status = $request->input('status'); 
        $tour->featured = $request->input('featured', false); // Giá trị mặc định là false nếu không có
        $tour->save();
        
        return redirect()->back()->with('success', 'Tour đã được tạo!');
    }

    public function show($searchItem)
    {
        // $tours = Tour::Where('id', 'like', '%'.$searchItem.'%')
        //             ->orWhere('title', 'like', '%'.$searchItem.'%')->get();
        // return view('TourIndex', compact('tours'));
    }

    public function edit($id)
    {
        dd('Edit method called'); // Kiểm tra xem có đến đây không
    }
    

    public function update(UpdateTourRequest $request, $id)
    {
        
        $tour = Tour::find($id);

        $validated = $request->validated();
        $newTitle = $validated['title'];

        $updated = $tour->update([
            'title' => $newTitle,
        
        ]);
        if ($updated) {
            return redirect()->route('tours.index')->with('success', 'Cập nhật thành công.'); 
        } else {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi cập nhật.');
        }
    }

    public function destroy($id)
    {
        $tour = Tour::find($id);
        $tour->delete();
        return redirect()->back()->with('success', 'Tour đã được xóa!');
    }
}
