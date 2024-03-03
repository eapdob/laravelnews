<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminSocialCountStoreRequest extends FormRequest
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
            'icon' => ['required'],
            'description.*.language_id' => 'digits:1,100',
            'description.*.fan_count' => ['required', 'max:255'],
            'description.*.fan_type' => ['required', 'max:255'],
            'description.*.button_text' => ['required', 'max:255'],
            'color' => ['required', 'max:255'],
            'url' => ['required']
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
            'description.*.language_id' => 'Language ID',
            'description.*.fan_count' => 'Fan Count',
            'description.*.fan_type' => 'Fan Type',
            'description.*.button_text' => 'Button Text',
        ];
    }
}
