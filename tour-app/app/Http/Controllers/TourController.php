<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTourRequest;
use App\Http\Requests\UpdateTourRequest;
use Illuminate\View\View;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::orderBy('id','desc')->paginate(6);
        return view('tours.index', compact('tours'));
    }

    public function create(Request $request)
    {
        $tour = null;

        if ($request->has('id')) {
            $tourId = $request->query('id');
            $tour = Tour::find($tourId); 
        }

        return view('tours.create', compact('tour'));
    }

    public function store(StoreTourRequest $request)
    {
       $validated = $request->validated();
        $validated['user_id'] = $request->user()->id;

        Tour::create($validated);
        
        return redirect()->back()->with('success', 'Tour đã được tạo!');
    }

    public function show($id)
    {
        $tours = Tour::Where('id', 'like', '%'.$searchItem.'%')
                    ->orWhere('title', 'like', '%'.$searchItem.'%')->first();
        return view('tours.show', compact('tours'));
    }

    public function edit($id)
    {
        $tour = Tour::findOrFail($id);
        return view('tours.create', compact('tour'));
    }
    

    public function update(UpdateTourRequest $request, $id)
    {
        $tour = Tour::findOrFail($id);
        $validated = $request->validated();
        
        // Debug: Log dữ liệu được validate
        \Log::info('Tour update data:', $validated);
        
        try {
            $updated = $tour->update($validated);
            if ($updated) {
                return redirect()->route('tours.index')->with('success', 'Cập nhật thành công.'); 
            } else {
                return redirect()->back()->with('error', 'Có lỗi xảy ra khi cập nhật.');
            }
        } catch (\Exception $e) {
            \Log::error('Tour update error:', ['error' => $e->getMessage(), 'data' => $validated]);
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $tour = Tour::find($id);
        $tour->delete();
        return redirect()->back()->with('success', 'Tour đã được xóa!');
    }
}
