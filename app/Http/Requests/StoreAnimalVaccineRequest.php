<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnimalVaccineRequest extends FormRequest
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
            'type' => 'required|string|max:30',
            'price' => 'required|numeric|min:0',
            'apply_date' => 'nullable|date_format:Y-m-d\TH:i',
            'observations' => 'nullable|string',
            'administered_by' => 'required|string|max:30',
        ];
    }
}
