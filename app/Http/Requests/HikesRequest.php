<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HikesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'excerpt' => ['required', 'string'],
            'description' => ['required', 'string'],
            'activity_type' => ['required', 'string'],
            'difficulty' => ['required', 'string'],
            'distance' => ['required', 'integer'],
            'duration' => ['required', 'string'],
            'positive_elevation' => ['required', 'integer'],
            'negative_elevation' => ['required', 'integer'],
            'municipality' => ['required', 'string'],
            'highest_point' => ['required', 'integer'],
            'lowest_point' => ['required', 'integer'],
            'location' => ['required', 'string'],
            'ign_reference' => ['nullable', 'string'],
            'hike_url' => ['nullable', 'string'],
            'is_return_starting_point' => ['required', 'boolean'],
            'imagesUrl' => ['required', 'array'],
        ];
    }
}
