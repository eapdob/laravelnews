<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminFooterTitleUpdateRequest extends FormRequest
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
            'footerTitles.*.language_id' => 'digits:1,100',
            'footerTitles.*.title' => ['required', 'max:500']
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
            'footerTitles.*.language_id' => 'Footer Title Language ID',
            'footerTitles.*.title' => 'Footer Title',
        ];
    }
}
