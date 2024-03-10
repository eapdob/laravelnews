<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminFooterGridThreeUpdateRequest extends FormRequest
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
            'description.*.language_id' => 'digits:1,100',
            'description.*.name' => ['required', 'max:255'],
            'url' => ['required'],
            'status' => ['boolean']
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
            'description.*.language_id' => 'Footer Grid Three Language ID',
            'description.*.name' => 'Footer Grid Three Name'
        ];
    }
}
