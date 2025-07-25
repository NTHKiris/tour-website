<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',          // Tiêu đề là bắt buộc, kiểu chuỗi, tối đa 255 ký tự
            'slug' => 'required|string|unique:tours,slug', // Slug là bắt buộc, kiểu chuỗi, và phải là duy nhất trong bảng tours
            'description' => 'required|string',              // Mô tả là bắt buộc, kiểu chuỗi
            'itinerary' => 'required|string',                // Lịch trình là bắt buộc, kiểu chuỗi
            'duration' => 'required|integer|min:1',         // Thời gian là bắt buộc, kiểu số nguyên và phải lớn hơn 0
            'price' => 'required|numeric|min:0',            // Giá là bắt buộc, kiểu số và phải lớn hơn hoặc bằng 0
            'max_participants' => 'required|integer|min:1', // Số lượng tối đa người tham gia là bắt buộc, kiểu số nguyên và phải lớn hơn 0
            'destination_id' => 'required|exists:destinations,id', // ID địa điểm là bắt buộc và phải có trong bảng destinations
            'status' => 'required|in:active,inactive',      // Trạng thái là bắt buộc và chỉ có thể là 'active' hoặc 'inactive'
            'featured' => 'nullable|boolean',                // Nổi bật có thể để trống và phải là kiểu boolean
        ];
    }
}
