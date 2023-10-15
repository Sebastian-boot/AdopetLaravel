<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFoundationsRequest extends FormRequest
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
            'introduction' =>'nullable|string',
            'history'=>'nullable|string',
            'email' =>'nullable|string',
            'phone'=>'nullable|string',
            'website'=>'nullable|string',
            'nit'=>'nullable|string',
            'employeeCount' => 'nullable|numeric',
            'foundationFoundingDate' => 'nullable|date_format:d-m-Y',
            'animalsAssitedCount' => 'nullable|numeric',
            'currentAnimalAssitedCount' => 'nullable|numeric',
            'limitAnimalAssitedCount'=> 'nullable|numeric',
            'foundationrating' => 'nullable|numeric',
        ];
    }
}
