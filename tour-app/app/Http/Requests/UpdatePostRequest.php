<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'sometimes|required|string|max:255',
            'link' => 'sometimes|required|url|max:255',
            'description' => 'sometimes|required|string',
            'category_id' => 'sometimes|required|exists:post_categories,id',
            'author_id' => 'sometimes|required|exists:users,id',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
