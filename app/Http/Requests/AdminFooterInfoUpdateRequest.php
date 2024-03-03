<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminFooterInfoUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'logo' => ['nullable', 'image', 'max:3000'],
            'description.*.language_id' => 'digits:1,100',
            'description.*.description' => ['required', 'max:300'],
            'description.*.copyright' => ['required', 'max:255']
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'description.*.language_id' => 'Footer Info Language ID',
            'description.*.description' => 'Footer Info description',
            'description.*.copyright' => 'Footer Info copyright'
        ];
    }
}
