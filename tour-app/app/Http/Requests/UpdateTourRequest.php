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
            'title' => 'sometimes|string|max:255',
            'slug' => 'sometimes|string|max:255|unique:tours,slug,' . $this->route('id'),
            'pricing_type' => 'sometimes|in:per_person,package',
            'description' => 'sometimes|nullable|string',
            'itinerary' => 'sometimes|nullable|json',
            'duration' => 'sometimes|integer|min:1',
            'price' => 'sometimes|numeric|min:0',
            'child_price' => 'sometimes|numeric|min:0',
            'max_participants' => 'sometimes|integer|min:1',
            'destination_id' => 'sometimes|exists:destinations,id',
            'status' => 'sometimes|nullable|in:active,inactive,draft',
            'featured' => 'sometimes|nullable|boolean',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
