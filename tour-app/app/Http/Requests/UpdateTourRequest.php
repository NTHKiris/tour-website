<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTourRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'sometimes|string|max:255',                // Tiêu đề là bắt buộc, kiểu chuỗi, tối đa 255 ký tự
            'slug' => 'sometimes|string|max:255|unique:tours,slug,' . $this->route('tour'),
            'description' => 'sometimes|nullable|string',                    // Mô tả có thể để trống, kiểu chuỗi
            //'itinerary' => 'sometimes|json',                    // Lịch trình có thể để trống, kiểu chuỗi
            //'duration' => 'sometimes|integer|min:1',               // Thời gian là bắt buộc, kiểu số nguyên, tối thiểu 1
            //'price' => 'sometimes|numeric|min:0',                   // Giá là bắt buộc, kiểu số, tối thiểu 0
            'max_participants' => 'sometimes|integer|min:1',      // Số lượng người tham gia tối đa là bắt buộc, tối thiểu 1
             'destination_id' => 'sometimes|exists:destinations,id', // ID địa điểm là bắt buộc và phải tồn tại trong bảng destinations
            // 'user_id' => 'sometimes|exists:users,id',              // ID người dùng là bắt buộc và phải tồn tại trong bảng users
             'status' => 'sometimes|nullable|in:Active,Inactive',             // Trạng thái có thể để trống, chỉ cho phép các giá trị 'active' hoặc 'inactive'
             'featured' => 'sometimes|nullable|boolean',                       // Nổi bật có thể để trống, kiểu boolean
        ];
    }
}
