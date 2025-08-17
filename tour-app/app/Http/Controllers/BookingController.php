<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use App\Models\Tour;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class BookingController extends Controller
{
    use AuthorizesRequests;
    public function store(StoreBookingRequest $request)
    {
        try {
            $validated = $request->validated();
            $tour = Tour::findOrFail($validated['tour_id']);

            if ($tour->pricing_type === 'per_person') {
                $total = $tour->price * $validated['adults'] + $tour->child_price * $validated['children'];
            } else {
                $total = $tour->price;
            }

            $participants = $validated['adults'] + $validated['children'];

            $booking = Booking::create([
                'user_id' => Auth::id(),
                'tour_id' => $tour->id,
                'participants' => $participants,
                'adults' => $validated['adults'],
                'children' => $validated['children'],
                'tour_date' => $validated['tour_date'],
                'total_amount' => $total,
                'status' => 'pending',
                'note' => $validated['note'] ?? ''
            ]);

            return redirect()->route('payments.create', ['booking' => $booking->id])
                ->with('success', 'Đặt tour thành công! Vui lòng tiến hành thanh toán.');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Có lỗi xảy ra khi đặt tour: ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function show(Booking $booking)
    {
        $this->authorize('view', $booking);

        // Load relationships for the booking
        $booking->load(['tour', 'user', 'payments']);

        return view('bookings.show', compact('booking'));
    }
}
