<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
            'tour_id' => 'required|exists:tours,id',
            'tour_date' => 'required|date|after_or_equal:today',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0',
            'note' => 'nullable|string'
        ];
    }

    public function messages(): array
    {
        return [
            'tour_id.required' => 'Tour ID là bắt buộc.',
            'tour_id.exists' => 'Tour không tồn tại.',
            'tour_date.required' => 'Ngày tour là bắt buộc.',
            'tour_date.date' => 'Ngày tour không hợp lệ.',
            'tour_date.after_or_equal' => 'Ngày tour phải từ hôm nay trở đi.',
            'adults.required' => 'Số lượng người lớn là bắt buộc.',
            'adults.integer' => 'Số lượng người lớn phải là số nguyên.',
            'adults.min' => 'Phải có ít nhất 1 người lớn.',
            'children.required' => 'Số lượng trẻ em là bắt buộc.',
            'children.integer' => 'Số lượng trẻ em phải là số nguyên.',
            'children.min' => 'Số lượng trẻ em không được âm.',
        ];
    }
}
