<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDestinationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|nullable|string|max:1000',
            'location' => 'nullable|string|max:255',
            'coordinates' => 'nullable|string|regex:/^-?\d{1,3}\.\d+,\s?-?\d{1,3}\.\d+$/',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên địa danh là bắt buộc.',
            'name.string' => 'Tên địa danh phải là chuỗi ký tự.',
            'name.max' => 'Tên địa danh không được vượt quá 255 ký tự.',

            'slug.required' => 'Slug là bắt buộc.',
            'slug.string' => 'Slug phải là chuỗi ký tự.',
            'slug.max' => 'Slug không được vượt quá 255 ký tự.',
            'slug.unique' => 'Slug đã tồn tại, vui lòng chọn slug khác.',

            'description.required' => 'Mô tả là bắt buộc.',
            'description.string' => 'Mô tả phải là chuỗi ký tự.',
            'description.max' => 'Mô tả không được vượt quá 1000 ký tự.',

            'location.string' => 'Vị trí phải là chuỗi ký tự.',
            'location.max' => 'Vị trí không được vượt quá 255 ký tự.',

            'coordinates.regex' => 'Toạ độ phải đúng định dạng: vĩ độ, kinh độ. Ví dụ: 12.3456, 108.1234',

            'images.*.image' => 'Tệp tải lên phải là hình ảnh.',
            'images.*.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif hoặc webp.',
            'images.*.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
        ];
    }

}
