<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnimalRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'age' => 'nullable|integer',
            'gender' => 'nullable|in:F,M',
            'coat_color' => 'nullable|string|max:50',
            'weight' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'breed_or_type' => 'nullable|string|max:50',
            'rescue_history' => 'nullable|string',
            'rescue_date' => 'nullable|date_format:Y-m-d\TH:i',
            'health_condition' => 'nullable|string',
            'rescue_place' => 'required|string',
            'animal_status_id' => 'nullable|integer',
        ];
    }
}
