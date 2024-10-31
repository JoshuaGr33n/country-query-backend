<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
            'code' => 'required|string|min:2|max:3|alpha', // Allows only 2 or 3 letter alphabetic codes
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'ISO code is required.',
            'code.string' => 'ISO code must be a string.',
            'code.min' => 'ISO code must be at least 2 characters long.',
            'code.max' => 'ISO code must not exceed 3 characters.',
            'code.alpha' => 'ISO code must contain only alphabetic characters.',
        ];
    }
}
