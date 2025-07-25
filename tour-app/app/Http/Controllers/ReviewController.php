<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::orderBy('id','desc')->paginate(10);
        return view('ReviewIndex', compact('reviews'));
    }

    public function create()
    {
        //
    }

    public function store(StoreReviewRequest $request, $rating, $comment, $user_id, $tour_id)
    {
        $review = new Review();
        $review->rating = $request->input('rating'); 
        $review->comment = $request->input('comment');
        $review->user_id = $request->user()->id; 
        $review->tour_id = $request->input('tour_id');
        $review->save();

        return redirect()->back()->with('success', 'Đánh giá đã được tạo!');
    }

    public function show(Request $request)
    {
        $searchTerm = $request->input('search');
        $reviews = Review::Where('id', $searchTerm)->get();
        return view('ReviewIndex', compact('reviews'));
    }

    public function edit(Review $review)
    {
        //
    }
    public function update(UpdateReviewRequest $request, $id)
    {
        $review = Review::find($id);
        $validated = $request->validated();
        $newRating = $validated['rating'];

        $updated = $review->update([
            'rating' => $newRating,
        
        ]);
        if ($updated) {
            return redirect()->route('reviews.index')->with('success', 'Đánh giá đã được cập nhật!');
        } else {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi cập nhật.');
        }
    }
    public function destroy($id)
    {
        $review = Review::find($id);
        if ($review) {
            $review->delete();
            return redirect()->route('reviews.index')->with('success', 'Review deleted successfully!');
        }

        return redirect()->route('reviews.index')->with('error', 'Review not found.');
    }
}
